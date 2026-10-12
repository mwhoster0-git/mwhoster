import fs from 'node:fs';
const slug='how-to-install-wordpress-with-auto-installer';
const read=phase=>[...fs.readFileSync(`artifacts/${phase}/${slug}.html`,'utf8').matchAll(/<script\b[^>]*type="application\/ld\+json"[^>]*>([\s\S]*?)<\/script>/g)].map(m=>JSON.parse(m[1]));
function diff(a,b,p='') {if(a&&b&&typeof a==='object'&&typeof b==='object'){for(const k of new Set([...Object.keys(a),...Object.keys(b)]))diff(a[k],b[k],p+'/'+k);}else if(a!==b)console.log(JSON.stringify({path:p,before:a,after:b}));}
diff(read('before'),read('after-articles'));
