import fs from 'node:fs/promises';
import {chromium} from 'playwright';
const browser=await chromium.launch({executablePath:'C:/Program Files/Google/Chrome/Application/chrome.exe',headless:true,args:['--no-proxy-server','--host-resolver-rules=MAP mwhoster.test 127.0.0.1']});
const context=await browser.newContext({viewport:{width:1366,height:900},serviceWorkers:'block'});
await fs.mkdir('artifacts/visual',{recursive:true});
const results=[];
for(const slug of (process.env.MW_SLUGS||'home,shared-web-hosting,wordpress-web-hosting,windows-web-hosting,domain-registration,domain-transfer,blog,guide,contact,privacy-policy,terms-conditions,how-to-install-wordpress-with-auto-installer,shared-hosting-vs-cloud-hosting').split(',')) {
for(const phase of ['before','after']) {
 const page=await context.newPage();
 if(phase==='before')await page.setExtraHTTPHeaders({'X-MW-Baseline':'1'});
 await page.route('**/*',async r=>{
  const u=new URL(r.request().url());
  if(/clientarea|whmcs/i.test(u.href))return r.abort();
  if(u.hostname==='mwhoster.test'||['fonts.gstatic.com','fonts.googleapis.com'].includes(u.hostname))return r.continue();
  if(['mw.bloggerplex.top','www.mwhoster.com'].includes(u.hostname)&&u.pathname.startsWith('/wp-content/uploads/')&&r.request().resourceType()==='image')return r.fulfill({response:await r.fetch({url:'http://mwhoster.test'+u.pathname})});
  return r.abort();
 });
 await page.goto('http://mwhoster.test/'+(slug==='home'?'':slug+'/'),{waitUntil:'load',timeout:60000});
 await page.evaluate(()=>document.fonts.ready);
 for(let y=0;y<await page.evaluate(()=>document.documentElement.scrollHeight);y+=700) {await page.evaluate(y=>scrollTo(0,y),y);await page.waitForTimeout(100);}
 await page.waitForTimeout(400);
 await page.evaluate(()=>scrollTo(0,0));await page.waitForTimeout(100);
 await page.screenshot({path:`artifacts/visual/${slug}-${phase}.png`,fullPage:true});
 const info=await page.evaluate(()=>({height:document.documentElement.scrollHeight,images:[...document.images].filter(e=>e.getBoundingClientRect().width).map(e=>({src:e.currentSrc,alt:e.alt,box:[e.getBoundingClientRect().width,e.getBoundingClientRect().height],natural:[e.naturalWidth,e.naturalHeight]})),overflow:[...document.querySelectorAll('body *')].filter(e=>{const r=e.getBoundingClientRect();return r.width>0 && (r.right>innerWidth+1||r.left< -1)&&!e.closest('.offcanvas,.hs-mega-menu,.owl-stage');}).slice(0,12).map(e=>({tag:e.tagName,cls:e.className,text:e.textContent.slice(0,60)}))}));
 results.push({slug,phase,...info});console.log(JSON.stringify({slug,phase,...info}));
 await fs.writeFile('artifacts/visual/geometry.json',JSON.stringify(results,null,2));await page.close();
}}
await browser.close();
