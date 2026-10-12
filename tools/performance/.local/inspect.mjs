import fs from 'node:fs';
import postcss from 'postcss';
import {SourceMapConsumer} from 'source-map';
const inv=JSON.parse(fs.readFileSync('.local/db-inventory.json'));
for(const m of inv.meta.filter(m=>m.meta_key==='_elementor_data')){
  console.log('Elementor',m.ID,[...new Set([...m.meta_value.matchAll(/"widgetType":"([^"]+)/g)].map(x=>x[1]))]);
}
console.log('Kit:',fs.readFileSync('../../wp-content/uploads/elementor/css/post-24.css','utf8'));
const main='../../wp-content/themes/MWhoster-child/assets/css/main.css';
const css=postcss.parse(fs.readFileSync(main,'utf8'));
const consumer=await new SourceMapConsumer(JSON.parse(fs.readFileSync(main+'.map','utf8')));
const counts={};
for(const node of css.nodes){const p=consumer.originalPositionFor({line:node.source.start.line,column:node.source.start.column-1}); const key=p.source;counts[key]=(counts[key]||0)+node.toString().length;}
console.log(counts);consumer.destroy();
