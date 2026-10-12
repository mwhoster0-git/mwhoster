import fs from 'node:fs/promises';
const theme='../../wp-content/themes/MWhoster-child/';
for(const file of ['header.php','footer.php','dist/index.php']) {
 let html=await fs.readFile(theme+file,'utf8');
 const replacements=[['/wp-content/uploads/2024/06/logo-mw.png','logo-mw-600.webp'],['/wp-content/uploads/2023/11/shared-web-hosting.png','shared-web-hosting-327.webp'],['/wp-content/uploads/2023/11/wordpress-hosting.png','wordpress-hosting-327.webp'],['/wp-content/uploads/2023/11/window-web-hosting.png','window-web-hosting-327.webp']];
 for(const [src,dest] of replacements)html=html.replaceAll(`src="${src}"`,`src="<?php echo esc_url( mwhoster_image_url( 'assets/img/optimized/${dest}' ) ); ?>"`);
 if(file==='header.php')html=html.replace('alt="logo"','alt="logo" class="mwhoster-eager no-lazyload" loading="eager"').replace('data-bs-target="#offcanvasLeft"','data-bs-target="#offcanvasLeft" aria-label="Open navigation"');
 if(file==='dist/index.php') {
  html=html.replace(/<img src="\/wp-content\/uploads\/2024\/03\/Hero-image.svg"[^>]+>/,tag=>`<picture class="no-lazyload">\n                            <source media="(max-width: 767px)" srcset="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='1' height='1'/%3E">\n                            ${tag.replace('class="img-fluid mob-hide"','class="img-fluid mob-hide mwhoster-eager no-lazyload" loading="eager" fetchpriority="high"')}\n                        </picture>`);
  html=html.replace('src="/wp-content/uploads/2024/03/map-location.png"','src="/wp-content/uploads/2024/03/map-location.png" srcset="/wp-content/uploads/2024/03/map-location-300x183.png 300w, /wp-content/uploads/2024/03/map-location-768x467.png 768w, /wp-content/uploads/2024/03/map-location-1024x623.png 1024w, /wp-content/uploads/2024/03/map-location.png 1218w" sizes="(min-width: 1280px) 1218px, calc(100vw - 30px)"');
 }
 await fs.writeFile(theme+file,html);
}
let domain=await fs.readFile(theme+'dist/domain-registration.php','utf8');
domain=domain.replace(/<img src="\/wp-content\/uploads\/2024\/03\/domain-registeration.svg"[^>]+>/,tag=>tag.replace('class="img-fluid"','class="img-fluid mwhoster-eager no-lazyload" loading="eager" fetchpriority="high"'));
await fs.writeFile(theme+'dist/domain-registration.php',domain);
