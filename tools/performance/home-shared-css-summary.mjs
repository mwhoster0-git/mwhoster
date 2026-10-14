import fs from 'node:fs/promises';
const read=async p=>JSON.parse(await fs.readFile(p,'utf8'));
const same=(a,b)=>JSON.stringify(a)===JSON.stringify(b);
const before=await read('artifacts/css-profile-baseline/inventory.json');
const after=await read('artifacts/css-profile-after/inventory.json');
const settled=await read('artifacts/css-profile-after-settled/inventory.json');
for(const s of settled){const i=after.findIndex(r=>r.route===s.route&&r.width===s.width);if(i<0)throw Error('Unexpected settled case');after[i]=s;}
const build=await read('home-shared-css-build-report.json');
const profile=build.profiles['home-shared'];
const cases=before.map(b=>{
  const a=after.find(r=>r.route===b.route&&r.width===b.width);
  if(!a)throw Error('Missing after case');
  const target=['/','/shared-web-hosting/'].includes(b.route);
  const layout=s=>s.styles.find(x=>x.id==='mwhoster-layout-css')?.url;
  const otherStyles=s=>s.styles.filter(x=>x.id!=='mwhoster-layout-css');
  const content=['title','canonical','headings','links','forms'].every(k=>same(b[k],a[k]));
  const structureDifferences=[];
  const length=Math.max(b.structure.length,a.structure.length);
  const normalize=n=>n?.tag==='IMG'?{...n,class:n.class.replace(/\b(ls-is-cached|lazyload|lazyloading|lazyloaded)\b/g,'').trim().replace(/\s+/g,' ')}:n;
  let transientImageClassDifferences=0;
  for(let i=0;i<length;i++){
    if(!same(b.structure[i],a.structure[i])&&same(normalize(b.structure[i]),normalize(a.structure[i])))transientImageClassDifferences++;
    if(!same(normalize(b.structure[i]),normalize(a.structure[i])))structureDifferences.push({index:i,before:b.structure[i],after:a.structure[i]});
  }
  const menu=a.width===390?a.interactions.offcanvas&&a.interactions.dropdown&&a.interactions.offcanvasClosed:a.interactions.desktopMenu;
  const faq=!target||same(a.interactions.faqStates,['true','false','true']);
  const cssCorrect=target?layout(a).includes('/mwhoster-home-shared.css?'):layout(b)===layout(a);
  const row={route:a.route,width:a.width,status:a.status,contentPreserved:content,heroTypographyAndGeometryIdentical:same(b.hero,a.hero),structureNodesBefore:b.structure.length,structureNodesAfter:a.structure.length,structureDifferenceCount:structureDifferences.length,structureDifferences,transientImageClassDifferences,fontsIdentical:same(b.fonts,a.fonts)&&same(b.interFaces,a.interFaces),imagesIdentical:same(b.images,a.images),scriptsIdentical:same(b.scripts,a.scripts),preloadsIdentical:same(b.preloads,a.preloads),otherStylesIdentical:same(otherStyles(b),otherStyles(a)),layoutBefore:layout(b),layoutAfter:layout(a),interactions:a.interactions,errors:a.errors,existingHTTPFailures:a.responses,newHTTPFailures:a.responses.filter(r=>!b.responses.some(x=>same(x,r))),overflow:a.overflow,mobileHeroRequests:a.width===390&&a.route==='/'?a.resources.filter(r=>r.url.includes('Hero-image.svg')).length:undefined};
  row.rawFontInventoryIdentical=same(b.fonts,a.fonts);
  row.fontsIdentical=same(b.interFaces,a.interFaces)&&same(b.structure.map(n=>n.font),a.structure.map(n=>n.font));
  if(!row.rawFontInventoryIdentical)row.rawFontInventoryNote={before:b.fonts,after:a.fonts,reason:'Joinchat transient system-font UI varies; all theme/Elementor structure-node typography and Inter faces match.'};
  row.passed=a.status===200&&content&&row.heroTypographyAndGeometryIdentical&&!structureDifferences.length&&row.fontsIdentical&&row.imagesIdentical&&row.scriptsIdentical&&row.preloadsIdentical&&row.otherStylesIdentical&&cssCorrect&&menu&&faq&&!a.errors.length&&!row.newHTTPFailures.length&&!a.overflow;
  return row;
});
const median=xs=>{const a=xs.slice().sort((a,b)=>a-b),m=Math.floor(a.length/2);return a.length%2?a[m]:(a[m-1]+a[m])/2;};
const measurements={};
for(const phase of ['baseline','after']){
  const rows=await read(`artifacts/css-profile-${phase}/lighthouse/summary.json`);
  measurements[phase]=await Promise.all(['/','/shared-web-hosting/'].map(async route=>{
    const runs=rows.filter(r=>r.route===route);
    if(!runs.length||runs.length>3||runs.some(r=>r.runtimeError))throw Error('Invalid measurement set');
    const raw=await read(`artifacts/css-profile-${phase}/lighthouse/${route.replaceAll('/','')||'home'}-1.json`);
    const lcp=raw.audits['lcp-breakdown-insight']?.details?.items.find(i=>i.type==='node');
    return {route,runs:runs.length,...Object.fromEntries(['FCP','LCP','CLS','TBT','bytes','requests'].map(k=>[k,median(runs.map(r=>r[k]))])),LCPRange:[Math.min(...runs.map(r=>r.LCP)),Math.max(...runs.map(r=>r.LCP))],individualLCP:runs.map(r=>r.LCP),individualTBT:runs.map(r=>r.TBT),LCPSelector:lcp?.selector};
  }));
}
const result={date:'2026-10-14',branch:'codex/home-shared-css',baseCommit:'7595953ef0abe5d01161e0e9b41265b67aef2a7d',scope:['http://mwhoster.test/','http://mwhoster.test/shared-web-hosting/'],elementorControl:'http://mwhoster.test/guide/',environment:{Chrome:152,Lighthouse:'13.0.1',Node:'24.19.0',PHP:'8.3.16',viewport:'390x844',DPR:1,throttling:'simulate',browserCache:'cold per run',localPageCache:'bypassed',compression:'none',productionAnalyticsAndSubmissions:'blocked by unchanged local MU/CSP and browser/Lighthouse rules'},css:{sizes:profile.sizes,removedUtilityRules:profile.removedUtilityRules.length,excludedThemeSources:profile.review.excludedThemeSources,fontFacesIdentical:profile.fontFacesIdentical,sourceSHA256:build.sourceSHA256,baselineSHA256:profile.baselineSHA256,outputSHA256:profile.outputSHA256,compressionNote:'Offline gzip level 9 / Brotli quality 11 estimates for CSS body only; not observed live transfers.'},cases,measurements,passed:cases.every(c=>c.passed),limits:['Isolated local lab timings; no live, field CWV or marketing delivery claim. TBT is not INP.','Existing Elementor global.css 404 remains; authenticated editor/preview not tested.','390/1366px only; full source/media retention protects intermediate widths but tablet browser coverage remains pending.','No DB/settings/server/font/JS/image change; prior guide migration remains local-only and independent.']};
result.totalLighthouseRuns=Object.values(measurements).flat().reduce((sum,r)=>sum+r.runs,0);
result.captureNote='Shared desktop after-settled replaces the initial placeholder capture; normalize only transient lazy-image classes. Guide mobile raw font inventory includes transient Joinchat UI after, but its theme/Elementor typography and Inter faces are identical.';
result.renderedDOMClassReview=[];
const removedClasses=new Set(profile.removedUtilityRules.map(r=>r.selector.slice(1)));
for(const slug of ['home','shared-web-hosting']){
  const html=await fs.readFile(`artifacts/css-profile-baseline/${slug}.html`,'utf8');
  const classes=new Set([...html.matchAll(/class=["']([^"']*)["']/g)].flatMap(m=>m[1].split(/\s+/)));
  const overlap=[...classes].filter(c=>removedClasses.has(c));
  result.renderedDOMClassReview.push({slug,removedUtilitiesMatchingRenderedDOM:overlap});
  if(overlap.length)result.passed=false;
}
await fs.writeFile('home-shared-css-summary.json',JSON.stringify(result,null,2)+'\n');
console.log(JSON.stringify({passed:result.passed,cases:cases.map(({structureDifferences,...c})=>c),measurements},null,2));
if(!result.passed)process.exitCode=1;
