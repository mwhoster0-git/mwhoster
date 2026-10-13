import fs from 'node:fs/promises';
const read=async p=>JSON.parse(await fs.readFile(p,'utf8'));
const before=await read('artifacts/font-path-before/inventory.json');
const final=await read('artifacts/font-path-final/inventory.json');
const same=(a,b)=>JSON.stringify(a)===JSON.stringify(b);
const stripVersion=u=>u.replace(/([?&])ver=[^&]+/g,'');
const cases=before.map(b=>{
 const a=final.find(r=>r.route===b.route&&r.width===b.width);
 if(!a)throw Error('Missing final case');
 const targeted=b.route==='/'||b.route==='/shared-web-hosting/';
 const content=same(b.title,a.title)&&same(b.canonical,a.canonical)&&same(b.headings,a.headings)&&same(b.links,a.links)&&same(b.forms,a.forms);
 const fonts=a.resources.filter(r=>r.url.includes('/assets/fonts/inter/'));
 const preloads=a.preloads.filter(p=>p.as==='font'&&p.url.includes('/assets/fonts/inter/'));
 const fontStyles=a.styles.filter(s=>s.id==='mwhoster-inter-css');
 const builderPreserved=targeted||same(b.styles.map(s=>stripVersion(s.url)),a.styles.map(s=>stripVersion(s.url)));
 const interactions=targeted?a.interactions.faqStates?.join(',')==='true,false,true':true;
 const menu=a.width===390?a.interactions.offcanvas&&a.interactions.dropdown&&a.interactions.offcanvasClosed:a.interactions.desktopMenu;
 const pass=content&&same(b.hero,a.hero)&&!a.errors.length&&!a.overflow&&interactions&&menu&&builderPreserved&&(targeted?fonts.length===1&&preloads.length===1&&fontStyles.length===0:fonts.length===0&&preloads.length===0&&fontStyles.length===1);
 return {route:a.route,width:a.width,status:a.status,passed:!!pass,contentPreserved:content,heroTypographyAndGeometryIdentical:same(b.hero,a.hero),scriptsIdentical:same(b.scripts,a.scripts),builderStylesPreserved:builderPreserved,interactions:a.interactions,errors:a.errors,existingHTTPFailures:a.responses,localFontRequests:fonts.length,localFontPreloads:preloads.length,externalInterStylesheets:fontStyles.length,mobileHeroRequests:a.width===390&&a.route==='/'?a.resources.filter(r=>r.url.includes('Hero-image.svg')).length:undefined};
});
const median=a=>a.slice().sort((x,y)=>x-y)[Math.floor(a.length/2)];
const measurements={};
for(const phase of ['before','after','final']){
 const rows=await read(`artifacts/font-path-${phase}/lighthouse/summary.json`);
 measurements[phase]=['/','/shared-web-hosting/'].map(route=>{
  const runs=rows.filter(r=>r.route===route);
  if(!runs.length||runs.length>3||runs.some(r=>r.runtimeError))throw Error('Invalid measurement set');
  return {route,runs:runs.length,...Object.fromEntries(['FCP','LCP','CLS','TBT','bytes','requests'].map(k=>[k,median(runs.map(r=>r[k]))])),LCPRange:[Math.min(...runs.map(r=>r.LCP)),Math.max(...runs.map(r=>r.LCP))]};
 });
}
const manifest=await read('artifacts/font-path-rejected-material/tools/inter-manifest.json');
const result={baseCommit:'3a5977ac0047023ab4871ae708f7501b4f00609d',branch:'codex/home-shared-font-path',date:'2026-10-14',scope:['/','/shared-web-hosting/'],elementorControl:'/guide/',environment:{url:'http://mwhoster.test',Chrome:152,Lighthouse:'13.0.1',Node:'24.19.0',PHP:'8.3.16',viewport:'390x844',DPR:1,throttling:'simulate',browserCache:'cold per run',localPageCache:'bypassed',compression:'none',productionAnalyticsAndSubmissions:'blocked by existing local MU/CSP and browser/Lighthouse rules'},cases,measurements,fonts:{faces:manifest.faces,weights:manifest.weights,files:manifest.assets.length,bytes:manifest.assets.reduce((s,a)=>s+a.bytes,0),inlineCSSBytes:manifest.cssBytes,fontDisplay:manifest.fontDisplay,baselineCapture:manifest.sourceCapture},limits:['Final phase has one confirmation run per page; no three-run final median claim.','Intermediate phase records self-hosting without preload, which regressed simulated LCP and was corrected once.','Google selects font binaries by user agent; local assets pin the captured Chrome stylesheet variant.','Existing Elementor global.css 404 on guide remains.','No live/field performance or marketing-delivery claim.']};
result.retainedRuntimeChange=false;
result.disposition='Rejected and reverted: simulated local LCP regressed; single-font preload duplicated downloads. Existing asset integration restored exactly.';
result.totalLighthouseRuns=14;
result.candidateArchive='artifacts/font-path-rejected-material';
result.behaviorChecksPassed=cases.every(c=>c.contentPreserved&&c.heroTypographyAndGeometryIdentical&&c.scriptsIdentical&&c.builderStylesPreserved&&!c.errors.length);
result.candidateAcceptancePassed=false;
result.additionalLimit='Desktop home baseline screenshot showed delayed/missing hero SVG while candidate showed it; markup was unchanged. No pixel-identical image claim.';
await fs.writeFile('font-path-summary.json',JSON.stringify(result,null,2)+'\n');
console.log(JSON.stringify({cases:cases.length,failedCases:cases.filter(c=>!c.passed),measurements}));
// Failed candidate acceptance is an expected recorded outcome; runtime was reverted.
