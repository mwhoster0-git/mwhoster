import fs from 'node:fs/promises';
import path from 'node:path';
import crypto from 'node:crypto';
import postcss from 'postcss';
import {SourceMapConsumer} from 'source-map';
import {gzipSync,brotliCompressSync,constants as zlibConstants} from 'node:zlib';

const focused=process.argv.includes('--home-shared-only');
const review=JSON.parse(await fs.readFile('home-shared-css-review.json','utf8'));
const theme=path.resolve('../../wp-content/themes/MWhoster-child');
const source=await fs.readFile(path.join(theme,'assets/css/main.css'),'utf8');
const parsed=postcss.parse(source);
const consumer=await new SourceMapConsumer(JSON.parse(await fs.readFile(path.join(theme,'assets/css/main.css.map'),'utf8')));
const phpFiles=focused?review.markupSources:['header.php','footer.php','404.php',...(await fs.readdir(path.join(theme,'dist'))).filter(f=>f.endsWith('.php')).map(f=>'dist/'+f)];
const markup=(await Promise.all(phpFiles.map(f=>fs.readFile(path.join(theme,f),'utf8')))).join('\n');
const icons=focused?new Set(JSON.parse(await fs.readFile('build-report.json','utf8')).icons):new Set([...markup.matchAll(/\bfa-[a-z0-9-]+\b/g)].map(m=>m[0]));
const targetMarkup=(await Promise.all(review.markupSources.map(f=>fs.readFile(path.join(theme,f),'utf8')))).join('\n');
// All source tokens are conservative: comments and CSS selectors may retain extra
// classes. This is a complete-template inventory, never initial-viewport coverage.
const targetClasses=new Set([...targetMarkup.matchAll(/[A-Za-z_][A-Za-z0-9_-]*/g)].map(m=>m[0]));
review.utilitySafelist.forEach(c=>targetClasses.add(c));
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

function trimGeneratedUtilities(node,removed) {
  node.walkRules?.(rule=>{
    const origin=consumer.originalPositionFor({line:rule.source.start.line,column:rule.source.start.column-1}).source||'';
    const single=rule.selector.match(/^\.([A-Za-z_][A-Za-z0-9_-]*)$/);
    if(origin.endsWith(review.generatedUtilitySource)&&single&&!targetClasses.has(single[1])){
      removed.push({selector:rule.selector,bytes:Buffer.byteLength(rule.toString()),source:origin});rule.remove();
    }
  });
  // A top-level utility rule has no descendant rules.
  if(node.type==='rule'){
    const origin=consumer.originalPositionFor({line:node.source.start.line,column:node.source.start.column-1}).source||'';
    const single=node.selector.match(/^\.([A-Za-z_][A-Za-z0-9_-]*)$/);
    if(origin.endsWith(review.generatedUtilitySource)&&single&&!targetClasses.has(single[1])){removed.push({selector:node.selector,bytes:Buffer.byteLength(node.toString()),source:origin});return null;}
  }
  node.walkAtRules?.(n=>{if(n.nodes&&!n.nodes.length)n.remove();});
  return node.nodes&&!node.nodes.length?null:node;
}

for(const profile of focused?['home-shared']:['shared','hosting','carousel','full','home-shared']) {
  const out=postcss.root();
  const removed={};
  const utilities=[];
  for(const n of parsed.nodes) {
    const origin=origins.get(n);
    if(n.type==='atrule' && n.name==='import') continue;
    if(n.type==='comment' && n.text.includes('sourceMappingURL')) continue;
    let omit=false;
    if(profile!=='full') {
      omit=widgetVendor.test(origin) && !(profile==='carousel' && /vendors\/owl\./.test(origin));
      if(profile==='shared' && hostingOnly.test(origin)) omit=true;
      if(profile==='home-shared'&&Object.keys(review.excludedThemeSources).some(s=>origin.endsWith(s)))omit=true;
    }
    if(omit) {removed[origin]=(removed[origin]||0)+n.toString().length;continue;}
    const subset=profile==='hosting'||profile==='carousel'||profile==='home-shared';
    let clone=/vendors\/fontawesome/.test(origin)?iconNode(n,subset):n.clone();
    if(!clone)continue;
    if(profile==='home-shared'){clone=trimGeneratedUtilities(clone,utilities);if(!clone)continue;}
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
  if(profile==='home-shared'){
    const baseline=await fs.readFile(path.join(theme,'assets/css/mwhoster-hosting.css'));
    const sizes=b=>({raw:b.length,gzipLevel9:gzipSync(b,{level:9}).length,brotliQuality11:brotliCompressSync(b,{params:{[zlibConstants.BROTLI_PARAM_QUALITY]:11}}).length});
    const faces=root=>root.nodes.filter(n=>n.type==='atrule'&&n.name==='font-face').map(n=>n.toString());
    if(JSON.stringify(faces(postcss.parse(baseline)))!==JSON.stringify(faces(out)))throw Error('Font-face declarations changed');
    report.profiles[profile]={...report.profiles[profile],baselineSHA256:crypto.createHash('sha256').update(baseline).digest('hex'),outputSHA256:crypto.createHash('sha256').update(css).digest('hex'),sizes:{before:sizes(baseline),after:sizes(Buffer.from(css))},removedUtilityRules:utilities,sourceClasses:[...targetClasses].sort(),review,fontFacesIdentical:true};
  }
  await fs.writeFile(path.join(theme,`assets/css/mwhoster-${profile}.css`),css);
}
consumer.destroy();
if(!focused)await fs.writeFile(path.join(theme,'assets/fonts/subset-unicodes.txt'),[...unicode].sort((a,b)=>a-b).map(n=>'U+'+n.toString(16).toUpperCase()).join(','));
await fs.writeFile(focused?'home-shared-css-build-report.json':'build-report.json',JSON.stringify(report,null,2)+'\n');
console.log(JSON.stringify({source:report.sourceBytes,profiles:Object.fromEntries(Object.entries(report.profiles).map(([k,v])=>[k,v.bytes])),glyphs:unicode.size}));
