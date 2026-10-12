import fs from 'node:fs/promises';
import path from 'node:path';
import sharp from 'sharp';
const root=path.resolve('../..');
const target=path.join(root,'wp-content/themes/MWhoster-child/assets/img/optimized');
await fs.mkdir(target,{recursive:true});
const inputs=[
  ['wp-content/uploads/2024/06/logo-mw.png','logo-mw',[600]],
  ['wp-content/uploads/2023/11/shared-web-hosting.png','shared-web-hosting',[327]],
  ['wp-content/uploads/2023/11/wordpress-hosting.png','wordpress-hosting',[327]],
  ['wp-content/uploads/2023/11/window-web-hosting.png','window-web-hosting',[327]],
];
const report=[];
for(const [file,name,widths] of inputs) {
  const source=path.join(root,file);const meta=await sharp(source).metadata();
  for(const width of widths) {
    if(width>meta.width)continue;
    const destination=path.join(target,`${name}-${width}.webp`);
    await sharp(source).resize({width}).webp({lossless:true,effort:6}).toFile(destination);
    report.push({source:file,sourceBytes:(await fs.stat(source)).size,output:path.relative(root,destination).replaceAll('\\','/'),width,bytes:(await fs.stat(destination)).size});
  }
}
await fs.writeFile('image-build-report.json',JSON.stringify(report,null,2)+'\n');
console.log(report);
