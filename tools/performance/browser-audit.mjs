import fs from 'node:fs/promises';
import path from 'node:path';
import { chromium } from 'playwright';

const phase = process.argv[2] || 'before';
if (!/^[a-z0-9-]+$/.test(phase)) throw Error('Invalid phase');
const base = 'http://mwhoster.test';
const out = path.resolve('artifacts', phase);
await fs.mkdir(out, {recursive:true});
const inventory = JSON.parse(await fs.readFile('.local/db-inventory.json','utf8'));
const published = inventory.posts.filter(p => ['page','post'].includes(p.post_type));
const selected = process.argv.includes('--main') ? published.filter(p => ['7','11','13','15','35','82','5035'].includes(p.ID)) : process.env.MW_IDS ? published.filter(p=>process.env.MW_IDS.split(',').includes(p.ID)) : published;
const chrome = process.env.MW_CHROME || 'C:/Program Files/Google/Chrome/Application/chrome.exe';
const browser = await chromium.launch({executablePath:chrome, headless:true, args:['--no-proxy-server','--host-resolver-rules=MAP mwhoster.test 127.0.0.1']});
const results=[];
for (const post of selected) {
  const route = post.ID==='7' ? '/' : `/${post.post_name}/`;
  if (/clientarea|whmcs/i.test(route)) throw Error('Out-of-scope route');
  const widths = process.env.MW_WIDTHS?process.env.MW_WIDTHS.split(',').map(Number):post.post_type==='page' || ['4521','5121'].includes(post.ID) ? [390,768,1366] : [390];
  if(widths.some(w=>![390,768,1366].includes(w)))throw Error('Unsupported audit width');
  for (const width of widths) {
    const context=await browser.newContext({viewport:{width,height:900},deviceScaleFactor:1, reducedMotion:'reduce',serviceWorkers:'block'});
    const page=await context.newPage();
    const errors=[], failed=[], responses=[], blocked=[],fontSources=[];
    await page.route('**/*', async r => {
      const u=new URL(r.request().url());
      if (/clientarea|whmcs/i.test(u.pathname+u.hostname)) { blocked.push(u.href); return r.abort(); }
      if (u.hostname==='mwhoster.test' || ['fonts.googleapis.com','fonts.gstatic.com'].includes(u.hostname)) return r.continue();
      if (['mw.bloggerplex.top','www.mwhoster.com'].includes(u.hostname) && u.pathname.startsWith('/wp-content/uploads/') && r.request().resourceType()==='image') {
        const local=await r.fetch({url:base+u.pathname}); return r.fulfill({response:local});
      }
      blocked.push(u.href); return r.abort();
    });
    page.on('pageerror',e=>errors.push(e.message));
    page.on('requestfailed',r=>failed.push({url:r.url(),error:r.failure()?.errorText}));
    page.on('response',r=>{if(r.status()>=400) responses.push({url:r.url(),status:r.status()});});
    page.on('response',r=>{if(new URL(r.url()).hostname==='fonts.googleapis.com'&&r.ok())fontSources.push(r.text());});
    await page.addInitScript(()=>{
      window.__shifts=[];
      new PerformanceObserver(l=>{for(const e of l.getEntries())if(!e.hadRecentInput)window.__shifts.push({value:e.value,sources:e.sources?.map(s=>({tag:s.node?.tagName,class:s.node?.className,previous:s.previousRect,current:s.currentRect}))});}).observe({type:'layout-shift',buffered:true});
    });
    const response=await page.goto(base+route,{waitUntil:'load',timeout:60000});
    await page.evaluate(()=>document.fonts.ready);
    await page.waitForTimeout(600);
    if(process.env.MW_SCROLL_ALL==='1'){
      for(let y=0;y<await page.evaluate(()=>document.documentElement.scrollHeight);y+=650){await page.evaluate(y=>scrollTo(0,y),y);await page.waitForTimeout(150);}
      // Revisit visible lazy images skipped during fast scrolling; observe the
      // existing loader rather than changing image attributes or forcing loads.
      const lazy=page.locator('img[data-src]');
      for(let i=0;i<await lazy.count();i++){
        const img=lazy.nth(i);
        if(!await img.isVisible())continue;
        if(await img.evaluate(e=>e.getAttribute('src')?.startsWith('data:'))){
          await img.scrollIntoViewIfNeeded();
          await img.evaluate(e=>new Promise((resolve,reject)=>{const deadline=Date.now()+15000;const check=()=>{if(!e.getAttribute('src')?.startsWith('data:')&&e.complete&&e.naturalWidth)return resolve();if(Date.now()>deadline)return reject(Error('Visible lazy image did not settle: '+e.getAttribute('data-src')));setTimeout(check,100);};check();}));
        }
      }
      await page.waitForTimeout(500);await page.evaluate(()=>scrollTo(0,0));await page.waitForTimeout(300);
    }
    const isolation=response.headers()['content-security-policy']||'';
    if(!isolation.includes("script-src 'self' 'unsafe-inline' 'unsafe-eval'")||!isolation.includes("form-action 'none'"))throw Error('Local test isolation is missing');
    if(fontSources.length)await fs.writeFile(path.join(out,`inter-${post.post_name}-${width}.css`),(await Promise.all(fontSources)).join('\n'));
    const stem=`${post.post_name}-${width}`;
    if(width===390) await fs.writeFile(path.join(out,post.post_name+'.html'),await page.content());
    await page.screenshot({path:path.join(out,stem+'.png'),fullPage:true});
    const snapshot=await page.evaluate(includeStructure=>({
      title:document.title,canonical:document.querySelector('link[rel=canonical]')?.href,bodyClass:document.body.className,
      hero:[...document.querySelectorAll('section:first-child h1,section:first-child p.lead')].map(e=>{const s=getComputedStyle(e),r=e.getBoundingClientRect();return {text:e.textContent.trim(),font:s.fontFamily,weight:s.fontWeight,size:s.fontSize,lineHeight:s.lineHeight,width:r.width,height:r.height};}),
      structure:includeStructure?[...document.querySelectorAll('.header-main *, .main *, footer *')].filter(e=>e.getBoundingClientRect().width&&e.getBoundingClientRect().height&&!e.closest('.hs-mega-menu,.offcanvas,.joinchat')).map(e=>{const r=e.getBoundingClientRect(),s=getComputedStyle(e);return {tag:e.tagName,class:e.className,text:e.children.length?'':e.textContent.trim(),box:[r.x,r.y,r.width,r.height].map(n=>Math.round(n*10)/10),font:[s.fontFamily,s.fontSize,s.fontWeight,s.lineHeight],color:s.color,background:s.backgroundColor,display:s.display};}):undefined,
      headings:[...document.querySelectorAll('h1,h2,h3')].map(e=>e.textContent.trim()),
      elementor:[...document.querySelectorAll('[data-elementor-id]')].map(e=>e.dataset.elementorId),
      styles:[...document.querySelectorAll('link[rel=stylesheet]')].map(e=>({id:e.id,url:e.href})),
      preloads:[...document.querySelectorAll('link[rel=preload]')].map(e=>({url:e.href,as:e.as,crossorigin:e.crossOrigin})),
      scripts:[...document.scripts].filter(e=>e.src).map(e=>({id:e.id,url:e.src,defer:e.defer})),
      links:[...document.querySelectorAll('a[href]')].map(e=>e.getAttribute('href')),
      forms:[...document.forms].map(f=>({action:f.getAttribute('action'),method:f.getAttribute('method'),inputs:[...f.querySelectorAll('input,button,select,textarea')].map(e=>({name:e.name,type:e.type,value:e.getAttribute('value')}))})),
      images:[...document.images].map(e=>({src:e.getAttribute('src'),lazy:e.getAttribute('data-src'),width:e.getAttribute('width'),height:e.getAttribute('height'),complete:e.complete,natural:[e.naturalWidth,e.naturalHeight],box:[e.getBoundingClientRect().width,e.getBoundingClientRect().height],priority:e.fetchPriority})),
      fonts:[...new Set([...document.querySelectorAll('h1,h2,p,a,button,input')].filter(e=>e.getBoundingClientRect().height).map(e=>getComputedStyle(e).fontFamily+' / '+getComputedStyle(e).fontWeight))],
      interFaces:[...document.fonts].filter(f=>f.family.includes('Inter')).map(f=>({family:f.family,weight:f.weight,status:f.status,range:f.unicodeRange})),
      overflow:document.documentElement.scrollWidth>innerWidth,
      jquery:window.jQuery?.fn.jquery,carousel:document.querySelectorAll('.owl-loaded').length,
      shifts:window.__shifts,
      resources:performance.getEntriesByType('resource').map(e=>({url:e.name,bytes:e.transferSize,duration:e.duration}))
    }),process.env.MW_SCROLL_ALL==='1');
    const interactions={};
    const faq=page.locator('.accordion [data-bs-toggle="collapse"]').first();
    if(await faq.count()){
      interactions.faqStates=[await faq.getAttribute('aria-expanded')];
      await faq.click();await page.waitForTimeout(400);interactions.faqStates.push(await faq.getAttribute('aria-expanded'));
      await page.screenshot({path:path.join(out,stem+'-faq.png')});
      await faq.click();await page.waitForTimeout(400);interactions.faqStates.push(await faq.getAttribute('aria-expanded'));
      await page.evaluate(()=>scrollTo(0,0));await page.waitForTimeout(300);
    }
    if (width===390) {
      const toggle=page.locator('[data-bs-target="#offcanvasLeft"]');
      if(await toggle.count()) {
        await toggle.click(); await page.waitForTimeout(400);
        interactions.offcanvas=await page.locator('#offcanvasLeft').evaluate(e=>e.classList.contains('show'));
        const hosting=page.locator('#offcanvasLeft [data-bs-toggle="dropdown"]').first();
        if(await hosting.count()) {await hosting.click();interactions.dropdown=await page.locator('#offcanvasLeft .dropdown-menu.show').count()>0;}
        await page.screenshot({path:path.join(out,stem+'-menu.png')});
        await page.locator('#offcanvasLeft [data-bs-dismiss="offcanvas"]').click(); await page.waitForTimeout(400);
        interactions.offcanvasClosed=await page.locator('#offcanvasLeft').evaluate(e=>!e.classList.contains('show'));
      }
      const pricing=page.locator('a[href="#pricing"]').first();
      if(await pricing.count()) {await pricing.click();interactions.pricing=await page.evaluate(()=>location.hash);}
    }
    if(post.post_name==='blog' && width===390) {
      interactions.loadMore=[];
      for(let n=0;n<8;n++) {
        const button=page.locator('.elementor-button:has-text("Load More")').first();
        if(!await button.isVisible().catch(()=>false))break;
        const count=await page.locator('article.elementor-post').count();
        await button.click();
        await page.waitForFunction(before=>document.querySelectorAll('article.elementor-post').length>before,count,{timeout:15000}).catch(()=>{});
        interactions.loadMore.push({before:count,after:await page.locator('article.elementor-post').count()});
        if(count===await page.locator('article.elementor-post').count())break;
      }
      interactions.blogLinks=await page.locator('.elementor-post__title a').evaluateAll(a=>a.map(e=>e.href));
      await page.screenshot({path:path.join(out,stem+'-loaded.png'),fullPage:true});
    }
    if(width===1366) {
      await page.evaluate(()=>scrollTo(0,0));await page.waitForTimeout(300);
      await page.locator('#hostingMegaMenu').hover();await page.waitForTimeout(300);
      interactions.desktopMenu=await page.locator('[aria-labelledby="hostingMegaMenu"]').isVisible();
      await page.screenshot({path:path.join(out,stem+'-menu.png')});
      await page.evaluate(()=>scrollTo(0,700));await page.waitForTimeout(300);
      interactions.scrolledHeader=await page.locator('.main-header-menu-wrap').evaluate(e=>({class:e.className,display:getComputedStyle(e).display}));
    }
    const result={route,width,id:post.ID,status:response.status(),...snapshot,interactions,errors,failed,responses,blocked};
    results.push(result); await fs.writeFile(path.join(out,'inventory.json'),JSON.stringify(results,null,2));
    console.log(JSON.stringify({phase,route,width,status:result.status,errors,overflow:result.overflow,elementor:result.elementor,interactions}));
    await context.close();
  }
}
await browser.close();
