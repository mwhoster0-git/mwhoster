import fs from 'node:fs/promises';
import path from 'node:path';
import crypto from 'node:crypto';
import postcss from 'postcss';
import {SourceMapConsumer} from 'source-map';

const theme=path.resolve('../../wp-content/themes/MWhoster-child');
const source=await fs.readFile(path.join(theme,'assets/css/main.css'),'utf8');
const parsed=postcss.parse(source);
const consumer=await new SourceMapConsumer(JSON.parse(await fs.readFile(path.join(theme,'assets/css/main.css.map'),'utf8')));
const phpFiles=['header.php','footer.php','404.php',...(await fs.readdir(path.join(theme,'dist'))).filter(f=>f.endsWith('.php')).map(f=>'dist/'+f)];
const markup=(await Promise.all(phpFiles.map(f=>fs.readFile(path.join(theme,f),'utf8')))).join('\n');
const icons=new Set([...markup.matchAll(/\bfa-[a-z0-9-]+\b/g)].map(m=>m[0]));
const unicode=new Set();
const profiles={};
const report={sourceBytes:Buffer.byteLength(source),sourceSHA256:crypto.createHash('sha256').update(source).digest('hex'),icons:[...icons].sort(),profiles:{}};
const origins=new Map(parsed.nodes.map(n=>[n,consumer.originalPositionFor({line:n.source.start.line,column:n.source.start.column-1}).source||'unknown']));
const widgetVendor=/vendors\/(bootstrap-slider|animate|themify-icons|magnific-popup|owl\.carousel|owl\.theme)/;
// Blog rules also style the parent theme's article wrapper, even with Elementor content.
const hostingOnly=/\/(?:components\/_(?:accordion|badge|forms|animation|background-image|promo|hero-section|location-map|testimonial|customer|services|features)|pages\/_(?:about-us|contact-us|login-signup|utility|price)|themes\/_theme-switcher)\.scss$/;

function iconNode(node,subset) {
  const n=node.clone();
  if(n.type==='rule' && n.selector.includes('.fa-')) {
    const content=n.nodes?.find(d=>d.prop==='content');
    if(content) {
      // Only glyph-name aliases are pruned. Size, animation, accessibility and other utilities remain.
      const names=[...n.selector.matchAll(/\.((?:fa-)[a-z0-9-]+)/g)].map(m=>m[1]);
      if(subset && names.length && !names.some(name=>icons.has(name))) return null;
    }
  }
  if(subset) n.walkDecls?.(d=>{
    if(d.prop==='src') d.value=d.value.replace(/\.\.\/fonts\/(fa-[a-z0-9-]+)\.(woff2|ttf)/g,'../fonts/subsets/$1.$2');
  });
  return n;
}

for(const profile of ['shared','hosting','carousel','full']) {
  const out=postcss.root();
  const removed={};
  for(const n of parsed.nodes) {
    const origin=origins.get(n);
    if(n.type==='atrule' && n.name==='import') continue;
    if(n.type==='comment' && n.text.includes('sourceMappingURL')) continue;
    let omit=false;
    if(profile!=='full') {
      omit=widgetVendor.test(origin) && !(profile==='carousel' && /vendors\/owl\./.test(origin));
      if(profile==='shared' && hostingOnly.test(origin)) omit=true;
    }
    if(omit) {removed[origin]=(removed[origin]||0)+n.toString().length;continue;}
    const subset=profile==='hosting'||profile==='carousel';
    const clone=/vendors\/fontawesome/.test(origin)?iconNode(n,subset):n.clone();
    if(!clone)continue;
    // Generated CSS lives beside its reviewed source so relative URLs retain their meaning.
    out.append(clone);
    if(subset) clone.walkDecls?.('content',d=>{
      for(const m of d.value.matchAll(/\\([0-9a-fA-F]{3,6})/g))unicode.add(parseInt(m[1],16));
      for(const c of d.value)if(c.codePointAt(0)>=0xE000 && c.codePointAt(0)<=0xF8FF)unicode.add(c.codePointAt(0));
    });
  }
  if(profile==='shared') {
    // Elementor keeps its complete icon vocabulary. Only the fixed child-theme chrome uses subsets.
    out.append(postcss.parse(`@font-face{font-family:MWHosterSolid;font-style:normal;font-weight:900;font-display:block;src:url("../fonts/subsets/fa-solid-900.woff2") format("woff2")}@font-face{font-family:MWHosterBrands;font-style:normal;font-weight:400;font-display:block;src:url("../fonts/subsets/fa-brands-400.woff2") format("woff2")}.header-main .fa,.header-main .fas,.footer-1 .fa,.footer-1 .fas,.scroll-top .fas{font-family:MWHosterSolid;font-weight:900}.header-main .fab,.footer-1 .fab{font-family:MWHosterBrands;font-weight:400}`));
  }
  const css=out.toString();
  profiles[profile]=css;
  report.profiles[profile]={bytes:Buffer.byteLength(css),removedSources:removed};
  await fs.writeFile(path.join(theme,`assets/css/mwhoster-${profile}.css`),css);
}
consumer.destroy();
await fs.writeFile(path.join(theme,'assets/fonts/subset-unicodes.txt'),[...unicode].sort((a,b)=>a-b).map(n=>'U+'+n.toString(16).toUpperCase()).join(','));
await fs.writeFile('build-report.json',JSON.stringify(report,null,2)+'\n');
console.log(JSON.stringify({source:report.sourceBytes,profiles:Object.fromEntries(Object.entries(report.profiles).map(([k,v])=>[k,v.bytes])),glyphs:unicode.size}));
