import fs from 'node:fs/promises';
import lighthouse from 'lighthouse';
import {launch} from 'chrome-launcher';
const phase=process.argv[2]||'before';
const runs=Number(process.env.MW_RUNS||3);
const routes=['/','/shared-web-hosting/','/wordpress-web-hosting/','/windows-web-hosting/','/domain-registration/','/blog/','/guide/'];
const output=`artifacts/${phase}/lighthouse`;
await fs.mkdir(output,{recursive:true});
const chrome=await launch({chromePath:'C:/Program Files/Google/Chrome/Application/chrome.exe',chromeFlags:['--headless=new','--no-proxy-server','--host-resolver-rules=MAP mwhoster.test 127.0.0.1']});
const results=[];
try {
for(const route of routes)for(let run=1;run<=runs;run++) {
  const {lhr}=await lighthouse('http://mwhoster.test'+route,{port:chrome.port,logLevel:'error',onlyCategories:['performance'],formFactor:'mobile',screenEmulation:{mobile:true,width:390,height:844,deviceScaleFactor:1,disabled:false},throttlingMethod:'simulate',disableStorageReset:false,blockedUrlPatterns:['*clientarea*','*whmcs*','*googletagmanager.com*','*google-analytics.com*','*facebook.com*','*facebook.net*','*tawk.to*','*tawk.link*']});
  const a=lhr.audits;
  const row={route,run,score:lhr.categories.performance.score,FCP:a['first-contentful-paint'].numericValue,LCP:a['largest-contentful-paint'].numericValue,CLS:a['cumulative-layout-shift'].numericValue,TBT:a['total-blocking-time'].numericValue,bytes:a['total-byte-weight'].numericValue,requests:a['network-requests'].details.items.length,runtimeError:lhr.runtimeError,environment:lhr.environment,lighthouseVersion:lhr.lighthouseVersion};
  results.push(row);
  await fs.writeFile(`${output}/${route.replaceAll('/','')||'home'}-${run}.json`,JSON.stringify(lhr));
  await fs.writeFile(`${output}/summary.json`,JSON.stringify(results,null,2));
  console.log(JSON.stringify(row));
}
} finally {await chrome.kill();}
