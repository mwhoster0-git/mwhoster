# MWHoster local performance implementation report

The implementation session used branch `performance/wordpress-mobile`, starting from clean commit `caac75b5b52f4f0fae30c18940ef084dd9d2c6fb`. The attached audit was treated as evidence and checked against the current checkout. The newer shared-hosting content was preserved. That session did not commit, push, merge or deploy. Subsequent repository activity recorded the implementation in Git and merged it into `main` at `f8ee5873bcdde8c4f79405f6b4afa68ddc331af0`; a Git merge does not establish deployment.

Repository housekeeping on **13 October 2026** used `codex/performance-repository-cleanup`, created from that HEAD. The agent untracked local tooling and corrected the reports without committing or pushing. Subsequent repository activity committed the cleanup as `ae5d4dfcfce0a48df4c557ffc3a462ad15102938` and merged it into `main` at `3a5977ac0047023ab4871ae708f7501b4f00609d`. Cleanup is recorded in the current tree; no history rewrite or deployment is established. The original measurements below are saved implementation-session results; the bounded 14 October font-path check is reported separately.

## 14 October 2026: bounded blocking-CSS candidate

The active candidate reduces the blocking child-theme stylesheet only on `http://mwhoster.test/` and `http://mwhoster.test/shared-web-hosting/`. Branch `codex/home-shared-css` preserves the clean starting HEAD `7595953ef0abe5d01161e0e9b41265b67aef2a7d`, including the committed rejected-font report/tooling. Local `main` remains at `3a5977ac0047023ab4871ae708f7501b4f00609d`; this branch was created from the existing checkout HEAD to preserve that newer work. No applicable AGENTS.md was found. No commit, push, deployment, package installation, database/settings/server change or agent delegation occurred.

The existing CSS/source-map build now produces `mwhoster-home-shared.css`. Structural review uses the complete header, footer, both PHP templates and child style source, including below-fold markup and inactive examples. It removes **1,214 simple single-class generated Bootstrap utility rules** absent from this inventory and the dynamic utility safelist, plus the unused login/signup and theme-switcher source groups. Components, grids, compound/unknown selectors, responsive media conditions, header/footer, pricing, forms, FAQs, helpers, animations, theme overrides and accessibility/interaction states retain their order. No initial-viewport coverage purge or deferred first-paint CSS is used. None of the removed utility classes appeared in the captured complete rendered DOM, including hidden menu markup.

The six-line enqueue addition selects this profile only for the matching homepage/shared route and assigned template after the existing static-content/Elementor guards. Missing profile files retain hosting CSS; other templates, builder content, global builder integrations, preview/editor and unknown routes retain their existing fallback behavior. External Inter delivery, Font Awesome faces/files, JavaScript/dependencies, marketing/consent configuration, images, content and outgoing targets are unchanged. Both local MU plugins and tracked Elementor upload CSS retain their previous hashes.

| CSS body size | Before | Candidate | Reduction |
|---|---:|---:|---:|
| Uncompressed bytes | 381,238 | 302,975 | 78,263 / 20.5% |
| gzip level 9 bytes | 52,420 | 44,738 | 7,682 / 14.7% |
| Brotli quality 11 bytes | 39,712 | 36,466 | 3,246 / 8.2% |

Compressed figures are offline body-size estimates, not observed live transfers. Local Apache delivered uncompressed CSS; measured hosting CSS transfer fell from 381,644 to 303,381 bytes including HTTP overhead. The number of blocking stylesheet requests is unchanged.

Conditions matched: logged-out local WordPress, Chrome 152, Lighthouse 13.0.1, Node 24.19, PHP 8.3.16, mobile 390×844/DPR 1, simulated throttling, cold browser storage/cache per run, existing local page-cache bypass and identical isolation. Production analytics/chat, outbound WP HTTP/mail/cron and submissions remained blocked by the unchanged local MU/CSP plus test rules. Excluded endpoints were denied; no external submission occurred.

| Local route | Phase / runs | FCP (s) | LCP (s) | CLS | TBT (ms) | Transfer bytes | Requests |
|---|---|---:|---:|---:|---:|---:|---:|
| `/` | Before / median of 2 | 5.11 | 9.09 | 0.00172 | 147.25 | 1,538,985 | 38 |
| `/` | Candidate / median of 3 | 4.81 | 9.36 | 0.00172 | 132.5 | 1,460,725 | 38 |
| `/shared-web-hosting/` | Before / 1 run | 4.51 | 6.08 | 0.01912 | 46.5 | 1,513,016 | 36 |
| `/shared-web-hosting/` | Candidate / 1 run | 4.21 | 5.63 | 0.01912 | 20.5 | 1,435,607 | 36 |

**Seven Lighthouse runs total.** The homepage baseline was repeated once because its first LCP differed materially from earlier saved evidence; the two current baseline runs were stable at 9.083–9.087s. The after phase was repeated to check LCP and the 61–218ms TBT variance; its third/final run gave LCP 8.634s and TBT 132.5ms. After LCP ranged 8.634–9.359s. No route/phase exceeded three runs. Shared hosting has single-run point comparisons, not a three-run median or statistical confidence claim. Both runs attributed mobile LCP to the hero paragraph. First paint improved on both targets and shared LCP improved in its point comparison, but homepage median LCP was **0.27s worse**. Retained as a tested smaller blocking-CSS candidate; an overall LCP improvement is not established. Local TBT is not INP and these results do not establish live/field Core Web Vitals.

Before/after screenshots and interactions cover both targets and Elementor control `http://mwhoster.test/guide/` at **390 and 1366px**. All six cases returned 200 with zero JS page errors, no new HTTP asset errors or overflow. Mobile menu open/dropdown/close, desktop hosting dropdown, FAQ true→false→true and pricing anchors passed. Existing `.affix` header behavior remained. Full scrolling exercised below-fold content. The first after shared desktop capture retained one lazy placeholder; a focused recheck observed the existing loader settle, without changing its attributes or code. The settled capture supersedes that case. All **1,944 visible structure nodes** matched geometry, typography, colors and display after normalizing only transient image-loader classes. Hero geometry, images, titles, canonical URLs, headings, links/forms, script/style dependencies and preloads matched. Menu/FAQ and hero/mid-page/footer comparison sheets were visually reviewed, including icons. Guide retained its original shared/Elementor styles; its existing `global.css` 404 remains. Its transient Joinchat system-font UI varied in the raw font inventory; all theme/Elementor typography and Inter faces matched.

PHP syntax, JS tool syntax, CSS parsing and a hash-identical focused CSS rebuild passed. The original CSS/source map, existing generated profiles, fonts/images, runtime JS, MU plugins and Elementor upload CSS are unchanged. Scoped diff/ignore validation excludes all WHMCS/clientarea changes. Source scans excluded dependencies/generated evidence; explicitly named local artifacts were read for comparison.

Created reviewable additions (currently untracked; no staging/commit performed):

- `wp-content/themes/MWhoster-child/assets/css/mwhoster-home-shared.css`
- `tools/performance/home-shared-css-review.json`
- `tools/performance/home-shared-css-build-report.json`
- `tools/performance/home-shared-css-summary.mjs`
- `tools/performance/home-shared-css-summary.json`

Modified existing files: `wp-content/themes/MWhoster-child/inc/performance.php`, `tools/performance/build.mjs`, `browser-audit.mjs`, `lighthouse.mjs`, `README.md`, and the root `PERFORMANCE-RESULTS.md` / `PERFORMANCE-DEPLOYMENT.md`. Runtime diff is only the new CSS and scoped selector; remaining changes are source/build/test/report material. The Lighthouse runner can explicitly append while preserving saved runs and enforcing three total per route/phase. New raw captures stay ignored under `tools/performance/artifacts/css-profile-baseline`, `css-profile-after`, `css-profile-after-settled`, `css-profile-qa`; an auxiliary initial browser baseline is in `css-profile-before`. Temporary structural-review/contact-sheet helpers remain ignored under `.local`. Existing historical evidence and guide rollback backups are preserved. This session did not send these changes to GitHub.

Remaining checks: tablet/intermediate widths, authenticated editor/preview, live compressed cold/warm-cache comparison, and normal consent/marketing delivery under an approved test setup. Homepage LCP remains unresolved; do not resume font work or expand this candidate without separate authorization. Prior all-article/live coverage and guide production migration remain independent outstanding owner-run work. The earlier cleanup is already committed; there is no cleanup awaiting commit. This candidate changes no DB records and cannot carry the earlier local guide migration through Git.

## 14 October 2026: bounded font-path experiment — rejected

Branch `codex/home-shared-font-path` was created from current `main` at `3a5977ac0047023ab4871ae708f7501b4f00609d`. No applicable AGENTS.md was found. Source inspection was limited to the child asset integration, reviewed CSS build/input and performance scripts; dependency/generated directories were excluded from source scans. Existing evidence was read through explicit artifact paths.

The candidate changed only confirmed static `/` and `/shared-web-hosting/`: local Inter WOFF2s and inline font-face declarations replaced the external Inter stylesheet. The captured Chrome stylesheet's 35 normal face declarations, five weights, language ranges and `font-display: swap` were retained. All seven downloaded binaries/license were pinned by SHA-256. Hosting CSS was left at 381,238 bytes with its original cascade, icons and interaction states. Builder/preview/global-content and missing-asset guards kept the original external path; ten CLI-stub scope/fallback cases passed without WP bootstrap or DB access.

The first candidate removed one stylesheet request but **regressed simulated local LCP**. A single correction preloaded just the Latin file used by the English hero paragraph. It caused **two downloads of the same 48,256-byte font** in both browser and Lighthouse evidence and further regressed LCP. The candidate was rejected; `inc/performance.php` was restored exactly to the current-main baseline. **No runtime performance improvement is retained from this experiment.** No further optimization attempt or performance run followed the rejection.

Conditions: `http://mwhoster.test/` and `http://mwhoster.test/shared-web-hosting/`, Chrome 152, Lighthouse 13.0.1, Node 24.19, PHP 8.3.16, mobile 390×844/DPR 1, simulated throttling, cold browser cache per run, bypassed local page cache and uncompressed local responses. The existing local MU/CSP setup blocked production analytics, outbound WP HTTP/mail/cron and submissions. Browser/Lighthouse rules denied excluded endpoints. No package installation, DB/settings operation, server change, commit, push or deployment occurred.

| Local route | Phase / runs | FCP (s) | LCP (s) | CLS | TBT (ms) | Transfer (MiB) | Requests |
|---|---|---:|---:|---:|---:|---:|---:|
| `/` | Before / median of 3 | 4.66 | 6.23 | 0.00172 | 53.0 | 1.47 | 36 |
| `/` | Local fonts, no preload / median of 3 | 4.96 | 6.68 | 0.00172 | 31.5 | 1.48 | 35 |
| `/` | Single-font preload correction / 1 run | 4.96 | 6.99 | 0.00220 | 91.0 | 1.52 | 38 |
| `/shared-web-hosting/` | Before / median of 3 | 4.51 | 6.08 | 0.01912 | 25.5 | 1.44 | 36 |
| `/shared-web-hosting/` | Local fonts, no preload / median of 3 | 4.81 | 6.53 | 0.01912 | 47.0 | 1.45 | 35 |
| `/shared-web-hosting/` | Single-font preload correction / 1 run | 4.81 | 6.83 | 0.01912 | 39.0 | 1.50 | 36 |

There were **14 total Lighthouse runs**: three per page for the before and no-preload phases, then one per page for the correction. No phase exceeded three runs. The correction has no three-run median or statistical confidence claim. Homepage before LCP ranged 6.23–9.10s; shared before was 6.080–6.082s. CPU/TTFB varied. These are isolated local measurements, not live performance or field INP/CWV evidence. Google chooses font variants by user agent: the browser-captured Latin binary was 48,256 bytes; mobile Lighthouse's external variant was 48,432 bytes. Binary equality is asserted only against the captured source URLs, not every browser's Google variant.

Before and candidate checks covered both targets plus Elementor `/guide/` at **390 and 1366px**. Mobile offcanvas/dropdown/close, desktop menu, FAQ true→false→true and pricing anchors worked. All six cases returned 200 with zero JS page errors and no overflow. Hero text/font styles/dimensions, titles, canonicals, headings, links/forms and script assets matched. Guide retained its external Inter/Elementor styles with no local font preload. Its existing `global.css` 404 remains. The desktop homepage baseline screenshot had a delayed/missing SVG rendering while the candidate screenshot showed it; artwork markup/loading attributes were not changed, and pixel-identical image capture is not claimed. No authenticated Elementor editor or live marketing delivery was tested.

Evidence: tracked `tools/performance/font-path-summary.json` and its summary script; ignored `artifacts/font-path-before`, `font-path-after`, `font-path-final` (including screenshots, network inventories, Lighthouse JSON and `rejected-runtime.patch`). Candidate source/build/manifest/scope-test files and fonts/license are preserved in ignored `artifacts/font-path-rejected-material/`. They are not deployed or active. Rollback restored the exact baseline source; additional post-rollback browser runs were not performed.

The rejected font session's reviewable diff comprised report corrections, bounded runner improvements and its compact experiment summary; it retained no runtime change. The later CSS-only candidate above supersedes that diff description and keeps the restored font delivery. The font-loading goal remains unresolved. Any future font experiment needs separate authorization and evidence from the compressed live dependency path. Existing field/marketing/Elementor/editor and article-baseline priorities below remain open.

## Implemented changes

- Removed the child footer's second jQuery 3.6.0 load. All current public pages now use one WordPress jQuery 3.7.1 copy, with Migrate retained. Child JS uses a noConflict-compatible ready wrapper, explicit dependencies and safe WordPress defer handling.
- Guarded optional plugin initialization by matching markup and API availability. Corrected Bootstrap tooltip initialization. Fixed the HSMegaMenu keyboard scope error through a child integration, made existing menu triggers focusable, and restored the active Windows/domain-transfer carousels. No vendor library source was edited. Scroll handlers now coalesce writes using requestAnimationFrame.
- Moved raw child CSS/JS, GA4 and Tawk loaders into enqueue APIs. GA4/PYS/Meta, outgoing attribution, Joinchat and Tawk remain. There is no interaction-gated measurement or global jQuery deferral.
- Built separate, source-backed CSS profiles while retaining Bootstrap interaction/responsive/accessibility rules and the original cascade. Preserved article wrapper styles after full-page comparison. Unknown templates use full CSS; current Elementor content retains its full widget/icon vocabulary. The obsolete `main.min.css` stub is never used.
- Removed verified-unneeded Elementor frontend/font loading only on six confirmed static PHP templates. Kept active global kit CSS and conservative fallback checks for future embedded/global builder content. Editor/preview bypass pruning.
- Replaced Inter's nested CSS import with a direct early stylesheet, preserving its weights and typography. Built licensed Font Awesome subsets for known theme icons, with a conservative class/glyph inventory and retained font metadata.
- Added measured image dimensions while preserving responsive widths. Kept the desktop homepage SVG eager/high priority and prevented its download on mobile with a matching picture source. Reserved the domain hero's square geometry before Smush runs; no arbitrary section height or overflow hiding was added.
- Added four lossless WebP image derivatives and existing responsive map-image candidates. Original assets remain available. Below-fold images keep the existing lazy loader.
- Verified 24 guide image replacements against both local files and HTTPS production upload resources. Applied the eight-field targeted migration only to the separate local WordPress DB; tested rollback/reapply. Production application remains an explicit owner-run step.

## Local environment and scope

`http://mwhoster.test` works with loopback DB host `127.0.0.1`; local WordPress `home` and `siteurl` were verified before DB work. Credentials and `wp-config.php` are unchanged. No production DB connection, DB-wide replacement or schema change was used.

Windows/Laragon, PHP 8.3.16, Apache 2.4.62, WordPress 7.1.2, Elementor 3.23.0-beta4, Smush 4.3.4, Chrome 152, Node 24.19 and Lighthouse 13.0.1. Tests used logged-out pages, disabled local page cache, cold browser cache per Lighthouse run, simulated mobile throttling, 390×844 viewport/DPR 1, identical isolation before/after, and no CDN. Local responses were uncompressed. Network/CPU/TTFB varied; three-run medians reduce but do not eliminate that noise.

Production analytics/chat requests, outbound WP HTTP/mail/cron and form submissions were blocked during tests by a guarded temporary local MU plugin and browser rules. No external message, order or domain query was submitted. WHMCS/clientarea requests were explicitly denied. Those excluded paths, files, configs, hooks, payment/tracking integrations and databases were not searched, edited, built or tested. Only WordPress-side outgoing link/form attributes were compared.

<!-- ROUTES -->
## Exact tested URLs and rendering paths

All listed URLs use the local site and returned HTTP 200. Classification uses the assigned template, stored Elementor documents and rendered content, not the `elementor-default` class. Global kit 24 is retained.

| Local ID | Exact local URL | Rendering path | Screenshot widths |
|---:|---|---|---|
| 3 | http://mwhoster.test/privacy-policy/ | Elementor page 3 | 390 / 768 / 1366 |
| 7 | http://mwhoster.test/ | dist/index.php | 390 / 768 / 1366 |
| 11 | http://mwhoster.test/windows-web-hosting/ | dist/windows-web-hosting.php | 390 / 768 / 1366 |
| 13 | http://mwhoster.test/shared-web-hosting/ | dist/shared-web-hosting.php | 390 / 768 / 1366 |
| 15 | http://mwhoster.test/wordpress-web-hosting/ | dist/wordpress-web-hosting.php | 390 / 768 / 1366 |
| 35 | http://mwhoster.test/domain-registration/ | dist/domain-registration.php | 390 / 768 / 1366 |
| 37 | http://mwhoster.test/domain-transfer/ | dist/domain-transfer.php | 390 / 768 / 1366 |
| 58 | http://mwhoster.test/terms-conditions/ | Elementor page 58 | 390 / 768 / 1366 |
| 82 | http://mwhoster.test/guide/ | Elementor page 82 | 390 / 768 / 1366 |
| 149 | http://mwhoster.test/contact/ | Elementor page 149 | 390 / 768 / 1366 |
| 4512 | http://mwhoster.test/how-to-order-shared-web-hosting-package/ | Elementor single-post template 106 | 390 |
| 4521 | http://mwhoster.test/how-to-install-wordpress-with-auto-installer/ | Elementor single-post template 106 | 390 / 768 / 1366 |
| 4531 | http://mwhoster.test/how-to-install-ssl-certificate-on-your-website/ | Elementor single-post template 106 | 390 |
| 4536 | http://mwhoster.test/how-to-create-an-email-account-in-mw-panel/ | Elementor single-post template 106 | 390 |
| 4542 | http://mwhoster.test/how-to-create-an-ftp-account-in-mw-panel/ | Elementor single-post template 106 | 390 |
| 4546 | http://mwhoster.test/how-to-add-domain-to-your-mw-panel/ | Elementor single-post template 106 | 390 |
| 4550 | http://mwhoster.test/how-to-connect-domain-with-hosting/ | Elementor single-post template 106 | 390 |
| 4555 | http://mwhoster.test/how-to-create-subdomain/ | Elementor single-post template 106 | 390 |
| 4946 | http://mwhoster.test/impact-of-server-location-on-seo-website-performance/ | Elementor single-post template 106 | 390 |
| 4948 | http://mwhoster.test/what-is-web-hosting-and-why-do-you-need-it/ | Elementor single-post template 106 | 390 |
| 4952 | http://mwhoster.test/what-is-ssl-certifcate-why-it-is-important-for-website-security/ | Elementor single-post template 106 | 390 |
| 4954 | http://mwhoster.test/best-ecommerce-hosting-for-small-businesses/ | Elementor single-post template 106 | 390 |
| 4956 | http://mwhoster.test/how-to-migrate-website-from-one-hosting-to-another/ | Elementor single-post template 106 | 390 |
| 5021 | http://mwhoster.test/difference-between-domain-and-web-hosting-know-the-essentials/ | Elementor single-post template 106 | 390 |
| 5030 | http://mwhoster.test/how-to-check-website-hosting-in-pakistan-a-step-by-step-guide/ | Elementor single-post template 106 | 390 |
| 5035 | http://mwhoster.test/blog/ | Elementor page 5035 | 390 / 768 / 1366 |
| 5075 | http://mwhoster.test/what-is-shared-hosting-benefits-and-drawbacks/ | Elementor single-post template 106 | 390 |
| 5080 | http://mwhoster.test/tips-tricks-how-to-install-ssl-certificate/ | Elementor single-post template 106 | 390 |
| 5083 | http://mwhoster.test/how-to-choose-the-best-domain-name-for-your-business/ | Elementor single-post template 106 | 390 |
| 5100 | http://mwhoster.test/vps-hosting-the-ultimate-guide/ | Elementor single-post template 106 | 390 |
| 5105 | http://mwhoster.test/the-ultimate-guide-to-ecommerce-hosting-for-small-businesses-in-2024/ | Elementor single-post template 106 | 390 |
| 5118 | http://mwhoster.test/what-is-web-hosting/ | Elementor single-post template 106 | 390 |
| 5121 | http://mwhoster.test/shared-hosting-vs-cloud-hosting/ | Elementor single-post template 106 | 390 / 768 / 1366 |
<!-- /ROUTES -->

## Before / after measurements

<!-- METRICS -->
Three mobile runs per route per phase (**42 Lighthouse runs**). Each cell is before → after.

| Local route | FCP (s) | LCP (s) | CLS | TBT (ms) | Transfer (MiB) | Requests | Score |
|---|---:|---:|---:|---:|---:|---:|---:|
| / | 10.06 → 4.66 | 10.59 → 6.23 | 0.00172 → 0.00172 | 88.5 → 50.0 | 2.28 → 1.47 | 41 → 36 | 56 → 61 |
| /shared-web-hosting/ | 9.91 → 4.51 | 10.43 → 6.08 | 0.01912 → 0.01912 | 25.5 → 50.0 | 2.26 → 1.44 | 41 → 36 | 56 → 62 |
| /wordpress-web-hosting/ | 9.91 → 4.51 | 10.43 → 6.08 | 0.01831 → 0.01831 | 21.5 → 15.5 | 2.26 → 1.44 | 41 → 36 | 56 → 64 |
| /windows-web-hosting/ | 9.91 → 4.51 | 10.36 → 6.31 | 0.06847 → 0.06847 | 72.0 → 114.5 | 2.24 → 1.48 | 40 → 36 | 55 → 58 |
| /domain-registration/ | 9.76 → 4.51 | 14.63 → 6.16 | 0.09382 → 0.00008 | 96.0 → 41.5 | 2.25 → 1.46 | 40 → 35 | 53 → 61 |
| /blog/ | 10.21 → 6.76 | 10.66 → 8.56 | 0.00312 → 0.00312 | 117.5 → 59.0 | 2.67 → 2.25 | 56 → 54 | 54 → 56 |
| /guide/ | 8.71 → 6.91 | 11.71 → 9.31 | 0.00000 → 0.00000 | 177.0 → 61.0 | 2.83 → 2.26 | 57 → 54 | 53 → 56 |

TBT increased on shared hosting (25.5 → 50ms) and Windows hosting (72 → 114.5ms); the Windows carousel is now running, and run-to-run CPU variability remains visible. The change does not uniformly improve every metric. No score target or field pass is claimed.
<!-- /METRICS -->

Metrics are **local lab results**, not live measurements. TBT is not INP. These numbers do not establish a field Core Web Vitals pass; LCP remains above the 2.5s field goal in this local simulation. No real-user data was available.

Separate unthrottled browser observation on `/domain-registration/` at 1366px: cumulative recorded layout shifts fell from **0.10081 to 0.00336**. At 390px the same observation fell from 0.09673 to 0.000071. These are single browser observations, distinct from Lighthouse medians. The earlier hero image reservation/lazy-load timing moved the popular-domain section; reserving the actual 450×450 hero geometry stabilized it.

| Source-backed asset group | Before | After | Difference |
|---|---:|---:|---:|
| Hosting theme CSS | 563,231 B | 381,238 B | −32.3% |
| Carousel theme CSS | 563,231 B | 385,759 B | −31.5% |
| Elementor shared theme CSS | 563,231 B | 405,021 B | −28.1% |
| Four theme WOFF2 files, combined | 287,976 B | 11,304 B | −96.1% |
| Four optimized PNG sources / WebP outputs, combined | 58,053 B | 26,098 B | −55.0% |

These are file sizes, not a claim that every file transfers on every page. Fonts required by Elementor content remain complete. On the mobile homepage the hidden ~400KB hero SVG made **zero** requests after the change; no hero preload was added.

## Verification and evidence

- Before/after inventories cover **33 public routes and 59 route/width cases**: 390, 768 and 1366px for all 11 pages and two representative articles; 390px for every other published article. Blog Load More was followed from 9 to **13 posts**. The local DB additionally exposed a published VPS article outside that listing; it was tested too. All eight guide articles were covered at 390px.
- Full-page screenshots, menu states, FAQ states, loaded blog results and asset/network inventories are saved under `tools/performance/artifacts/`. Additional scrolled desktop before/after screenshots cover 13 distinct page/article layouts. Hero, logo, content and footer geometry were compared after lazy images loaded. Article spacing and SVG width regressions found during this comparison were corrected and retested.
- All 59 final inventory cases returned HTTP 200 and recorded **zero JavaScript page errors**. Menu open/dropdown/close, keyboard arrow/Escape, FAQ true→false→true, pricing anchors and both carousel controls passed. Restored carousel dots move to the next group and visible author images load. Carousel section height changes reflect restored formerly-hidden content, not rewritten content.
- Exactly one jQuery copy on all 33 routes. Owl transfers only on Windows/domain-transfer. Slider, Magnific Popup and validator do not transfer on current routes. Elementor frontend CSS is absent only on the six confirmed custom templates and present on Elementor pages/posts; kit CSS is retained everywhere tested.
- Compared titles, canonical URLs, unique headings, outgoing/internal links and form attributes across all 59 cases. No changes, after normalizing the intentional guide-media URL replacements and carousel clones. Schema remains unchanged except on the eight migrated guides: their primary-image URLs now resolve locally, Yoast adds the known attachment dimensions/captions, and `dateModified` reflects the content write. Exact differences are recorded in the JSON summary. Raw computed font inventories also include Joinchat's transient system-font UI; its visibility varies between snapshots. Main typography and image/layout comparisons were preserved.
- PHP syntax checks passed for all changed/new executable PHP files, JS syntax passed, CSS parsed/built, and `git diff --check` passed. Rebuilding **16 CSS/font/image output files** produced identical SHA-256 hashes. The full theme CSS source, source map and original fonts/images were not modified.
- Final guide migration dry-run: **0 fields would change**. All 24 production HTTPS image resources returned HTTP 200 and matched local SHA-256 values. No guide links were followed into a client area.

Detailed machine-readable evidence: `tools/performance/verification-summary.json`, `build-report.json`, `image-build-report.json`, `image-dimensions.json` and `guide-media-manifest.json`. Large raw Lighthouse reports, HTML captures and screenshots are local/ignored, not deployment files. `before-media` corrects the initial baseline runner's short Load More wait and serves verified legacy guide images locally; `after-final` and `after-articles` supersede affected cases in `after`. `summarize.mjs` merges these final cases and computes medians.

## Remaining gaps and pre-existing issues

- Live mobile/desktop retesting, cold/warm production cache comparison, marketing event delivery/consent validation and field INP/LCP/CLS remain owner/post-deployment work. Analytics were deliberately blocked locally. Tawk's script/CORS check succeeded, but no conversation was opened.
- Authenticated Elementor editor/preview and Theme Builder changes were not exercised in the browser. Code explicitly preserves these paths. Desktop/tablet screenshots for all remaining individual articles, archive/search/404 rendering and all possible widget states are not claimed complete; unknown templates retain the full CSS fallback. The existing 404 plugin redirects missing URLs to the homepage.
- The baseline already has horizontal overflow in the WordPress-hosting hero price at 1366px and the ecommerce-2024 article at 390px. These remain, with no new overflow cases observed. Some imported article text already contains encoding artifacts. These were not rewritten as part of a performance change.
- The baseline requested missing Elementor-generated `global.css`, `post-58.css` and `post-149.css`. Regeneration guidance is in the deployment document. Domain-transfer also has an existing relative `assets/img/create-website.svg` reference that resolves incorrectly; its form's existing target was preserved. These unrelated content/import defects remain.
- The existing scroll handler/CSS hides the header with `.affix` when scrolling; that baseline behavior remains. No new sticky-header design was introduced.
- Contact has Elementor contact links, not a sendable form in this local copy. No submission behavior or external messages were tested. Local PixelYourSite REST responses occasionally returned 429 during repeated isolated tests; production delivery was not assessed.
- Two representative article layouts were retested after restoring shared blog-wrapper CSS. Other article mobile snapshots predate that final spacing-only restoration; their initial inventories and content/assets remain recorded. The post-deployment checklist requires all-article completion.

## File inventory

<!-- FILES -->
The historical implementation inventory comprised 43 created reviewable files and 9 modified existing files, listed below. All 52 are tracked and retained. The committed cleanup removed 953 files under `tools/performance/.local/`, 461 under `tools/performance/artifacts/` and 14,108 under `tools/performance/node_modules/` (**15,522 files total**) from tracking. Their local files remain in place. Source/build scripts, package manifests, generated runtime assets and compact verification summaries stay tracked. Cleanup did not modify runtime code, MU plugins or tracked Elementor upload CSS. `PERFORMANCE-HANDOFF.md` is now also tracked and preserved as a historical handoff.

### Created files

- `PERFORMANCE-DEPLOYMENT.md`
- `PERFORMANCE-RESULTS.md`
- `tools/performance/.gitignore`
- `tools/performance/README.md`
- `tools/performance/browser-audit.mjs`
- `tools/performance/build-images.mjs`
- `tools/performance/build-report.json`
- `tools/performance/build.mjs`
- `tools/performance/guide-media-manifest.json`
- `tools/performance/image-build-report.json`
- `tools/performance/image-dimensions.json`
- `tools/performance/interaction-smoke.mjs`
- `tools/performance/lighthouse.mjs`
- `tools/performance/local-cli-guard.php`
- `tools/performance/local-db-inventory.php`
- `tools/performance/local-test-isolation.php`
- `tools/performance/migrate-guide-media.php`
- `tools/performance/package-lock.json`
- `tools/performance/package.json`
- `tools/performance/requirements.txt`
- `tools/performance/subset-fonts.py`
- `tools/performance/summarize.mjs`
- `tools/performance/verification-summary.json`
- `tools/performance/verify-guide-media.mjs`
- `tools/performance/visual-compare.mjs`
- `wp-content/themes/MWhoster-child/assets/css/mwhoster-carousel.css`
- `wp-content/themes/MWhoster-child/assets/css/mwhoster-full.css`
- `wp-content/themes/MWhoster-child/assets/css/mwhoster-hosting.css`
- `wp-content/themes/MWhoster-child/assets/css/mwhoster-shared.css`
- `wp-content/themes/MWhoster-child/assets/fonts/subset-unicodes.txt`
- `wp-content/themes/MWhoster-child/assets/fonts/subsets/fa-brands-400.ttf`
- `wp-content/themes/MWhoster-child/assets/fonts/subsets/fa-brands-400.woff2`
- `wp-content/themes/MWhoster-child/assets/fonts/subsets/fa-regular-400.ttf`
- `wp-content/themes/MWhoster-child/assets/fonts/subsets/fa-regular-400.woff2`
- `wp-content/themes/MWhoster-child/assets/fonts/subsets/fa-solid-900.ttf`
- `wp-content/themes/MWhoster-child/assets/fonts/subsets/fa-solid-900.woff2`
- `wp-content/themes/MWhoster-child/assets/fonts/subsets/fa-v4compatibility.ttf`
- `wp-content/themes/MWhoster-child/assets/fonts/subsets/fa-v4compatibility.woff2`
- `wp-content/themes/MWhoster-child/assets/img/optimized/logo-mw-600.webp`
- `wp-content/themes/MWhoster-child/assets/img/optimized/shared-web-hosting-327.webp`
- `wp-content/themes/MWhoster-child/assets/img/optimized/window-web-hosting-327.webp`
- `wp-content/themes/MWhoster-child/assets/img/optimized/wordpress-hosting-327.webp`
- `wp-content/themes/MWhoster-child/inc/performance.php`

### Modified existing files

- `wp-content/themes/MWhoster-child/assets/js/app.js`
- `wp-content/themes/MWhoster-child/dist/domain-registration.php`
- `wp-content/themes/MWhoster-child/dist/index.php`
- `wp-content/themes/MWhoster-child/dist/shared-web-hosting.php`
- `wp-content/themes/MWhoster-child/dist/windows-web-hosting.php`
- `wp-content/themes/MWhoster-child/dist/wordpress-web-hosting.php`
- `wp-content/themes/MWhoster-child/footer.php`
- `wp-content/themes/MWhoster-child/functions.php`
- `wp-content/themes/MWhoster-child/header.php`
<!-- /FILES -->

Local-only folders remain on disk: `tools/performance/.local/` (baseline theme snapshot, local DB inventory, WP-CLI, Python dependencies and migration backups), `tools/performance/node_modules/`, and `tools/performance/artifacts/` (screenshots, HTML and raw Lighthouse output). The existing `tools/performance/.gitignore` rules now exclude them, and the cleanup is committed in the current tree. Earlier commits and GitHub history retain the old material. Do not deploy these directories or the checkout wholesale.

The complete `.local` and `artifacts` directories are additionally preserved outside both the repository and public web root at `C:\Users\user\MWHoster-Performance-Backups\2026-10-13-cleanup-f8ee5873\.local` and `C:\Users\user\MWHoster-Performance-Backups\2026-10-13-cleanup-f8ee5873\artifacts`. Backup verification compares relative file paths and sizes without inspecting backup contents. A metadata-only `backup-manifest.json` is stored alongside them. Guide rollback data is preserved in the original local `.local/guide-media-final.json` and the external backup's matching path. The actual eight-guide database migration remains a local-only change; tracking or copying its backup does not apply it to production. No database access or migration took place during housekeeping.

Both local MU plugins are unchanged and remain installed: `wp-content/mu-plugins/mwhoster-performance-test.php` blocks outbound WordPress HTTP/mail/cron plus browser analytics/chat/form submission when its local-host/loopback guards activate; `mwhoster-local-cache.php` preserves the existing local page-cache bypass. Normal local marketing/chat/form delivery is therefore still unverified under the test setup. Later, after explicitly authorized test completion and a safe analytics test setup, remove only the temporary test-isolation MU plugin; preserve the cache plugin. Neither local MU plugin should be deployed.

The tracked Elementor upload CSS `wp-content/uploads/elementor/css/post-3.css` and `post-82.css` is retained unchanged. The earlier plan to delete these generated files is superseded; any later regeneration must be a separately reviewed WordPress operation. Authenticated editor/preview, remaining article-width coverage, live/cache/marketing verification and the pre-existing issues listed above remain outstanding. Housekeeping does not complete those checks.

For exact release, migration, rollback, cache scope and live smoke-test steps, see `PERFORMANCE-DEPLOYMENT.md`.
