import sharp from 'sharp';
for(const slug of ['home','domain-registration','shared-hosting-vs-cloud-hosting']){
 const a=await sharp(`artifacts/visual/${slug}-before.png`).resize({width:450}).png().toBuffer();
 const b=await sharp(`artifacts/visual/${slug}-after.png`).resize({width:450}).png().toBuffer();
 const ma=await sharp(a).metadata(),mb=await sharp(b).metadata();
 await sharp({create:{width:900,height:Math.max(ma.height,mb.height),channels:3,background:'white'}}).composite([{input:a,left:0,top:0},{input:b,left:450,top:0}]).png().toFile(`artifacts/visual/${slug}-comparison.png`);
}
