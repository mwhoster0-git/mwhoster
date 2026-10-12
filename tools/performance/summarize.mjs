import fs from 'node:fs/promises';
const read=async p=>JSON.parse(await fs.readFile(p,'utf8'));
const before=await read('artifacts/before/inventory.json');
const afterMap=new Map((await read('artifacts/after/inventory.json')).map(r=>[r.route+':'+r.width,r]));
for(const phase of ['after-final','after-articles'])for(const r of await read(`artifacts/${phase}/inventory.json`))afterMap.set(r.route+':'+r.width,r);
const after=[...afterMap.values()];
const unique=a=>[...new Set(a)].sort();
const same=(a,b)=>JSON.stringify(a)===JSON.stringify(b);
const normalizeLink=s=>s.replace('http://mw.bloggerplex.top/wp-content/uploads/','http://mwhoster.test/wp-content/uploads/');
const identity=before.map(b=>{
 const a=afterMap.get(b.route+':'+b.width);
 return {route:b.route,width:b.width,title:same(b.title,a.title),canonical:same(b.canonical,a.canonical),headings:same(unique(b.headings),unique(a.headings)),links:same(unique(b.links.map(normalizeLink)),unique(a.links.map(normalizeLink))),forms:same(b.forms,a.forms)};
});
const assets=after.filter(r=>r.width===390).map(r=>({route:r.route,jquery:r.jquery,jqueryCopies:r.scripts.filter(s=>/jquery(?:-3\.[\d.]+)?(?:\.min)?\.js(?:\?|$)/.test(s.url)).length,owl:r.scripts.some(s=>s.url.includes('owl.carousel')),unusedWidgetScript:r.scripts.some(s=>/bootstrap-slider|magnific-popup|validator\.min/.test(s.url)),elementorFrontend:r.styles.some(s=>s.id==='elementor-frontend-css'),kit:r.styles.some(s=>/elementor-post-24/.test(s.id)),css:r.styles.find(s=>s.id==='mwhoster-layout-css')?.url}));
const metrics={};const median=values=>values.sort((a,b)=>a-b)[Math.floor(values.length/2)];
const schemaDifferences=[];
const schemaChanges=[];
function diffSchema(a,b,route,path=''){
 if(a&&b&&typeof a==='object'&&typeof b==='object'){for(const key of new Set([...Object.keys(a),...Object.keys(b)]))diffSchema(a[key],b[key],route,path+'/'+key);}
 else if(a!==b)schemaChanges.push({route,path,before:a,after:b});
}
for(const b of before.filter(r=>r.width===390)){
 const slug=b.route==='/'?'home':b.route.split('/')[1];
 const oldHTML=await fs.readFile(`artifacts/before/${slug}.html`,'utf8');
 let newHTML;
 for(const phase of ['after-articles','after-final','after']){try{newHTML=await fs.readFile(`artifacts/${phase}/${slug}.html`,'utf8');break;}catch(e){if(e.code!=='ENOENT')throw e;}}
 const extract=html=>[...html.matchAll(/<script\b[^>]*type="application\/ld\+json"[^>]*>([\s\S]*?)<\/script>/g)].map(m=>JSON.parse(m[1],(key,value)=>key==='dateModified'?undefined:value));
 // Guide content writes legitimately update dateModified; all other schema is compared.
 if(!same(extract(oldHTML),extract(newHTML))){schemaDifferences.push(b.route);diffSchema(extract(oldHTML),extract(newHTML),b.route);}
}
for(const phase of ['before','after']){
 const runs=await read(`artifacts/${phase}/lighthouse/summary.json`);
 metrics[phase]=unique(runs.map(r=>r.route)).map(route=>({route,runs:runs.filter(r=>r.route===route).length,...Object.fromEntries(['score','FCP','LCP','CLS','TBT','bytes','requests'].map(key=>[key,median(runs.filter(r=>r.route===route).map(r=>r[key]))]))}));
}
const report={baselineCommit:'caac75b5b52f4f0fae30c18940ef084dd9d2c6fb',browserCases:after.length,publicRoutes:unique(after.map(r=>r.route)),identityDifferences:identity.filter(r=>Object.values(r).some(v=>v===false)),javascriptErrors:after.filter(r=>r.errors.length).map(r=>({route:r.route,width:r.width,errors:r.errors})),overflows:after.filter(r=>r.overflow).map(r=>({route:r.route,width:r.width,preexisting:before.find(b=>b.route===r.route&&b.width===r.width)?.overflow})),assets,metrics,homeMobileHeroRequests:afterMap.get('/:390').resources.filter(r=>r.url.includes('Hero-image.svg')).length,domainDesktopCLS:{before:before.find(r=>r.route==='/domain-registration/'&&r.width===1366).shifts.reduce((s,e)=>s+e.value,0),after:afterMap.get('/domain-registration/:1366').shifts.reduce((s,e)=>s+e.value,0)},interactions:await read('artifacts/after-final/interaction-smoke.json')};
report.schemaDifferencesExceptModificationDates=schemaDifferences;
report.schemaChangesExceptModificationDates=schemaChanges;
await fs.writeFile('verification-summary.json',JSON.stringify(report,null,2)+'\n');
console.log(JSON.stringify(report));
