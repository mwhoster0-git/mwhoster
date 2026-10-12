import fs from 'node:fs/promises';
const theme='../../wp-content/themes/MWhoster-child/';
for(const file of ['dist/index.php','dist/shared-web-hosting.php','dist/wordpress-web-hosting.php','dist/windows-web-hosting.php','dist/domain-registration.php']) {
 const old=await fs.readFile('.local/before-theme/'+file,'utf8');
 const urls=[...old.replace(/<!--[\s\S]*?-->/g,'').matchAll(/<img\b[^>]+>/g)].filter(m=>!m[0].match(/\bwidth=/)).map(m=>m[0].match(/src="([^"]+)/)?.[1]).filter(u=>u?.endsWith('.svg'));
 let html=await fs.readFile(theme+file,'utf8');
 for(const url of urls)html=html.replaceAll(`src="${url}"`,`src="${url}" style="width: 100%; height: auto;"`);
 await fs.writeFile(theme+file,html);
}
