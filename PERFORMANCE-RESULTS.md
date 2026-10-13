# MWHoster local performance implementation report

The implementation session used branch `performance/wordpress-mobile`, starting from clean commit `caac75b5b52f4f0fae30c18940ef084dd9d2c6fb`. The attached audit was treated as evidence and checked against the current checkout. The newer shared-hosting content was preserved. That session did not commit, push, merge or deploy. Subsequent repository activity recorded the implementation in Git and merged it into `main` at `f8ee5873bcdde8c4f79405f6b4afa68ddc331af0`; a Git merge does not establish deployment.

Repository housekeeping on **13 October 2026** uses `codex/performance-repository-cleanup`, created from that HEAD. Only the local tooling directories are removed from the Git index and the two reports are corrected. The removals are staged and await an owner-reviewed commit; no commit, push, history rewrite or deployment was performed during housekeeping. Runtime implementation files remain tracked and unchanged. All measurements below are saved results from the earlier implementation session; no performance tests or database checks were rerun for housekeeping.

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
The historical implementation inventory comprised 43 created reviewable files and 9 modified existing files, listed below. All 52 are now tracked and retained. The cleanup branch stages index-only removal of 953 previously tracked files under `tools/performance/.local/`, 461 under `tools/performance/artifacts/` and 14,108 under `tools/performance/node_modules/` (**15,522 files total**). Their local files remain in place. Source/build scripts, package manifests, generated runtime assets and compact verification summaries stay tracked. The cleanup changes these two reports and does not modify runtime code, MU plugins or tracked Elementor upload CSS. `PERFORMANCE-HANDOFF.md` remains preserved as an existing untracked handoff.

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

Local-only folders remain on disk: `tools/performance/.local/` (baseline theme snapshot, local DB inventory, WP-CLI, Python dependencies and migration backups), `tools/performance/node_modules/`, and `tools/performance/artifacts/` (screenshots, HTML and raw Lighthouse output). The existing `tools/performance/.gitignore` rules apply after index removal, so new files there are ignored. This removes them from the proposed next Git tree, not from earlier commits or GitHub history. The owner must commit/review this branch before the repository records the cleanup. Do not deploy these directories or the checkout wholesale.

The complete `.local` and `artifacts` directories are additionally preserved outside both the repository and public web root at `C:\Users\user\MWHoster-Performance-Backups\2026-10-13-cleanup-f8ee5873\.local` and `C:\Users\user\MWHoster-Performance-Backups\2026-10-13-cleanup-f8ee5873\artifacts`. Backup verification compares relative file paths and sizes without inspecting backup contents. A metadata-only `backup-manifest.json` is stored alongside them. Guide rollback data is preserved in the original local `.local/guide-media-final.json` and the external backup's matching path. The actual eight-guide database migration remains a local-only change; tracking or copying its backup does not apply it to production. No database access or migration took place during housekeeping.

Both local MU plugins are unchanged and remain installed: `wp-content/mu-plugins/mwhoster-performance-test.php` blocks outbound WordPress HTTP/mail/cron plus browser analytics/chat/form submission when its local-host/loopback guards activate; `mwhoster-local-cache.php` preserves the existing local page-cache bypass. Normal local marketing/chat/form delivery is therefore still unverified under the test setup. Later, after explicitly authorized test completion and a safe analytics test setup, remove only the temporary test-isolation MU plugin; preserve the cache plugin. Neither local MU plugin should be deployed.

The tracked Elementor upload CSS `wp-content/uploads/elementor/css/post-3.css` and `post-82.css` is retained unchanged. The earlier plan to delete these generated files is superseded; any later regeneration must be a separately reviewed WordPress operation. Authenticated editor/preview, remaining article-width coverage, live/cache/marketing verification and the pre-existing issues listed above remain outstanding. Housekeeping does not complete those checks.

For exact release, migration, rollback, cache scope and live smoke-test steps, see `PERFORMANCE-DEPLOYMENT.md`.
