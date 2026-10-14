import fs from 'node:fs/promises';
import lighthouse from 'lighthouse';
import {launch} from 'chrome-launcher';
const phase=process.argv[2]||'before';
const runs=Number(process.env.MW_RUNS||3);
if(!Number.isInteger(runs)||runs<1||runs>3)throw Error('Use one to three runs per route/phase');
const allowed=['/','/shared-web-hosting/','/wordpress-web-hosting/','/windows-web-hosting/','/domain-registration/','/blog/','/guide/'];
const routes=process.env.MW_ROUTES?process.env.MW_ROUTES.split(','):allowed;
if(routes.some(r=>!allowed.includes(r))||new Set(routes).size!==routes.length)throw Error('Route outside public test allowlist');
if(!/^[a-z0-9-]+$/.test(phase))throw Error('Invalid phase');
const output=`artifacts/${phase}/lighthouse`;
await fs.mkdir(output,{recursive:true});
let results=[];
try{
  results=JSON.parse(await fs.readFile(`${output}/summary.json`,'utf8'));
  if(process.env.MW_APPEND!=='1')throw Error('Phase already measured; use explicit append to preserve existing runs');
}catch(e){if(e.code!=='ENOENT')throw e;}
for(const route of routes)if(results.filter(r=>r.route===route).length+runs>3)throw Error('At most three total runs per route/phase');
const chrome=await launch({chromePath:'C:/Program Files/Google/Chrome/Application/chrome.exe',chromeFlags:['--headless=new','--no-proxy-server','--host-resolver-rules=MAP mwhoster.test 127.0.0.1']});
try {
for(const route of routes){
const previous=results.filter(r=>r.route===route).length;
for(let run=previous+1;run<=previous+runs;run++) {
  const {lhr}=await lighthouse('http://mwhoster.test'+route,{port:chrome.port,logLevel:'error',onlyCategories:['performance'],formFactor:'mobile',screenEmulation:{mobile:true,width:390,height:844,deviceScaleFactor:1,disabled:false},throttlingMethod:'simulate',disableStorageReset:false,blockedUrlPatterns:['*clientarea*','*whmcs*','*googletagmanager.com*','*google-analytics.com*','*facebook.com*','*facebook.net*','*tawk.to*','*tawk.link*']});
  const a=lhr.audits;
  const row={route,run,score:lhr.categories.performance.score,FCP:a['first-contentful-paint'].numericValue,LCP:a['largest-contentful-paint'].numericValue,CLS:a['cumulative-layout-shift'].numericValue,TBT:a['total-blocking-time'].numericValue,bytes:a['total-byte-weight'].numericValue,requests:a['network-requests'].details.items.length,runtimeError:lhr.runtimeError,environment:lhr.environment,lighthouseVersion:lhr.lighthouseVersion};
  results.push(row);
  await fs.writeFile(`${output}/${route.replaceAll('/','')||'home'}-${run}.json`,JSON.stringify(lhr));
  await fs.writeFile(`${output}/summary.json`,JSON.stringify(results,null,2));
  console.log(JSON.stringify(row));
}}
} finally {await chrome.kill();}
