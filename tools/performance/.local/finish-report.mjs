import fs from 'node:fs';
import {execFileSync} from 'node:child_process';
const root='../..';
const summary=JSON.parse(fs.readFileSync('verification-summary.json','utf8'));
const inv=JSON.parse(fs.readFileSync('.local/db-inventory.json','utf8'));
let report=fs.readFileSync(root+'/PERFORMANCE-RESULTS.md','utf8');
const routes=['/','/shared-web-hosting/','/wordpress-web-hosting/','/windows-web-hosting/','/domain-registration/','/blog/','/guide/'];
const fmt=(v,k)=>['FCP','LCP'].includes(k)?(v/1000).toFixed(2):k==='CLS'?v.toFixed(5):k==='bytes'?(v/1048576).toFixed(2):k==='score'?Math.round(v*100):v.toFixed(k==='TBT'?1:0);
const metrics=['FCP','LCP','CLS','TBT','bytes','requests','score'];
const lines=['Three mobile runs per route per phase (**42 Lighthouse runs**). Each cell is before → after.','', '| Local route | FCP (s) | LCP (s) | CLS | TBT (ms) | Transfer (MiB) | Requests | Score |','|---|---:|---:|---:|---:|---:|---:|---:|'];
for(const route of routes){const b=summary.metrics.before.find(r=>r.route===route),a=summary.metrics.after.find(r=>r.route===route);if(b.runs!==3||a.runs!==3)throw Error('Incomplete Lighthouse set');lines.push(`| ${route} | ${metrics.map(k=>fmt(b[k],k)+' → '+fmt(a[k],k)).join(' | ')} |`);}
lines.push('','TBT increased on shared hosting (25.5 → 50ms) and Windows hosting (72 → 114.5ms); the Windows carousel is now running, and run-to-run CPU variability remains visible. The change does not uniformly improve every metric. No score target or field pass is claimed.');
report=report.replace(/<!-- METRICS -->[\s\S]*?<!-- \/METRICS -->/,'<!-- METRICS -->\n'+lines.join('\n')+'\n<!-- /METRICS -->');
const urls=['## Exact tested URLs and rendering paths','','All listed URLs use the local site and returned HTTP 200. Classification uses the assigned template, stored Elementor documents and rendered content, not the `elementor-default` class. Global kit 24 is retained.','', '| Local ID | Exact local URL | Rendering path | Screenshot widths |','|---:|---|---|---|'];
for(const p of inv.posts.filter(p=>['page','post'].includes(p.post_type))){const url='http://mwhoster.test/'+(p.ID==='7'?'':p.post_name+'/');const template=inv.meta.find(m=>m.ID===p.ID&&m.meta_key==='_wp_page_template')?.meta_value;const rendering=template?.startsWith('dist/')?template:p.post_type==='post'?'Elementor single-post template 106':'Elementor page '+p.ID;urls.push(`| ${p.ID} | ${url} | ${rendering} | ${p.post_type==='page'||['4521','5121'].includes(p.ID)?'390 / 768 / 1366':'390'} |`);}
if(report.includes('<!-- ROUTES -->'))report=report.replace(/<!-- ROUTES -->[\s\S]*?<!-- \/ROUTES -->/,'<!-- ROUTES -->\n'+urls.join('\n')+'\n<!-- /ROUTES -->');
else report=report.replace('## Before / after measurements','<!-- ROUTES -->\n'+urls.join('\n')+'\n<!-- /ROUTES -->\n\n## Before / after measurements');
const git=args=>execFileSync('git',args,{cwd:root,encoding:'utf8'}).trim().split(/\r?\n/).filter(Boolean);
const added=git(['ls-files','--others','--exclude-standard','--','tools/performance','wp-content/themes/MWhoster-child','PERFORMANCE-DEPLOYMENT.md','PERFORMANCE-RESULTS.md']);
const changed=git(['diff','--name-only']);
if(changed.some(p=>!p.startsWith('wp-content/themes/MWhoster-child/')))throw Error('Unexpected tracked edit');
const inventory=[`${added.length} new reviewable files and ${changed.length} modified existing files. No staged changes or commits. All tracked changes are inside the child theme; new reviewable files are limited to that theme, performance tooling and these two root reports. Git status/name inventory shows no changed excluded files.`, '', '### Created files','',...added.map(p=>'- `'+p+'`'),'','### Modified existing files','',...changed.map(p=>'- `'+p+'`')];
report=report.replace(/<!-- FILES -->[\s\S]*?<!-- \/FILES -->/,'<!-- FILES -->\n'+inventory.join('\n')+'\n<!-- /FILES -->');
fs.writeFileSync(root+'/PERFORMANCE-RESULTS.md',report);
console.log(JSON.stringify({created:added.length,modified:changed.length,routes:summary.publicRoutes.length,identityDifferences:summary.identityDifferences.length}));
