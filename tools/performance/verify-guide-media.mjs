import fs from 'node:fs/promises';
import path from 'node:path';
import crypto from 'node:crypto';
const inv=JSON.parse(await fs.readFile('.local/db-inventory.json','utf8'));
const fields=[...inv.posts.map(p=>({id:p.ID,field:'post_content',value:p.post_content})),...inv.meta.map(m=>({id:m.ID,metaId:m.meta_id,field:m.meta_key,value:m.meta_value}))];
const entries=[];
for(const field of fields) {
  // Literal and JSON-escaped URLs only; no global DB replacement.
  const normalized=field.value.replaceAll('\\/','/');
  const matches=[...new Set(normalized.match(/http:\/\/mw\.bloggerplex\.top\/wp-content\/uploads\/2020\/08\/[^\s"'<>\\)]+/g)||[])];
  for(const old of matches)entries.push({id:field.id,slug:inv.posts.find(p=>p.ID===field.id).post_name,metaId:field.metaId,field:field.field,old,new:old.replace('http://mw.bloggerplex.top','https://www.mwhoster.com')});
}
// Rechecking after the targeted migration must not erase the reviewed manifest.
if(!entries.length){
 const existing=JSON.parse(await fs.readFile('guide-media-manifest.json','utf8'));
 if(!existing.entries?.length)throw Error('No legacy references or prior manifest to verify.');
 entries.push(...existing.entries);
}
const unique=[...new Set(entries.map(e=>e.old))];
const assets=[];
for(const old of unique) {
  const replacement=old.replace('http://mw.bloggerplex.top','https://www.mwhoster.com');
  const url=new URL(replacement);
  const relative=decodeURIComponent(url.pathname).slice(1);
  if(!relative.startsWith('wp-content/uploads/2020/08/')||relative.includes('..'))throw Error('Unexpected path');
  const local=await fs.readFile(path.resolve('../..',relative));
  const response=await fetch(replacement,{signal:AbortSignal.timeout(30000),redirect:'error'});
  const remote=Buffer.from(await response.arrayBuffer());
  const hash=b=>crypto.createHash('sha256').update(b).digest('hex');
  const row={old,new:replacement,path:relative,status:response.status,contentType:response.headers.get('content-type'),localBytes:local.length,remoteBytes:remote.length,localSHA256:hash(local),remoteSHA256:hash(remote),identical:hash(local)===hash(remote)};
  assets.push(row);console.log(JSON.stringify(row));
}
if(assets.some(a=>a.status!==200||!a.identical))throw Error('One or more replacements need review; no DB writes performed.');
await fs.writeFile('guide-media-manifest.json',JSON.stringify({entries,assets},null,2)+'\n');
