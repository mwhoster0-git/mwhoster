# MWHoster performance deployment and rollback

Implementation was prepared against local `http://mwhoster.test` and repository baseline `caac75b5b52f4f0fae30c18940ef084dd9d2c6fb` on `performance/wordpress-mobile`. The implementation session did not push, merge, deploy or write to the production DB. Subsequent repository activity merged the recorded implementation into `main` at `f8ee5873bcdde8c4f79405f6b4afa68ddc331af0`; deployment is not established by that merge.

Housekeeping on **13 October 2026** used `codex/performance-repository-cleanup` from that HEAD. The agent untracked `.local`, `artifacts` and `node_modules` while preserving local files and corrected these reports without committing or pushing. Subsequent repository activity recorded cleanup commit `ae5d4dfcfce0a48df4c557ffc3a462ad15102938` and merged it into `main` at `3a5977ac0047023ab4871ae708f7501b4f00609d`. Cleanup is therefore present in the current tree. It did not rewrite history or change runtime code/databases, and Git state does not prove deployment. The original performance/migration evidence is historical; the bounded 14 October font-path check has separate results in `PERFORMANCE-RESULTS.md`.

The **14 October homepage/shared-hosting font experiment was rejected and reverted** on `codex/home-shared-font-path`. Local font-face inlining increased simulated local LCP; a single-font preload correction duplicated font downloads. The current child asset integration matches `main` exactly. There are no new runtime font/CSS assets to release or new database/settings/cache operations from this experiment. Candidate code, fonts/license and measurements are preserved under ignored `tools/performance/artifacts/`; do not deploy or apply its `rejected-runtime.patch`. Only documentation, bounded test tooling and the compact summary remain in the reviewable diff. No commit, push or deployment was performed in that session.

## 1. Tracked-file release

### Current bounded CSS candidate — 14 October 2026

Branch `codex/home-shared-css` starts at preserved checkout HEAD `7595953ef0abe5d01161e0e9b41265b67aef2a7d`; local `main` is still `3a5977ac0047023ab4871ae708f7501b4f00609d`. This session leaves uncommitted changes and five new untracked reviewable files. The previous cleanup is already committed; no cleanup is awaiting commit. No push or deployment occurred. Review `PERFORMANCE-RESULTS.md` and `tools/performance/home-shared-css-summary.json` before choosing to release: first paint improved, shared-hosting's single-run LCP improved, but homepage median LCP was 0.27s worse. Compressed CSS sizes are estimates; live gains remain unverified.

The only new runtime release files for this candidate are:

- `wp-content/themes/MWhoster-child/inc/performance.php` (six-line scoped profile selection)
- `wp-content/themes/MWhoster-child/assets/css/mwhoster-home-shared.css` (302,975 bytes)

Keep all existing theme assets available for fallback. Review/build additions are `tools/performance/home-shared-css-review.json`, `home-shared-css-build-report.json`, `home-shared-css-summary.mjs` and `home-shared-css-summary.json`, with updates to the existing build/browser/Lighthouse scripts and README. Raw evidence remains ignored/local; do not deploy tooling, `.local`, artifacts, dependencies or MU plugins. Fonts, runtime JS, analytics/consent and images are unchanged.

Rebuild only this candidate using the existing installed dependencies, from `tools/performance`:

```sh
node build.mjs --home-shared-only
```

No font/image build, plugin setting or DB migration is needed. The build reads the original CSS/source map and the complete two-template/header/footer/style inventory; update its utility safelist if future markup/JS introduces new generated utility classes. Do not select this restricted profile for another route without a new structural review.

Owner-run release steps, after review: save the currently deployed child integration, publish the generated CSS first, then the reviewed `inc/performance.php`. Purge only WordPress HTML caches for `/` and `/shared-web-hosting/` and their new versioned child CSS URL where a WordPress-scoped asset cache exists. Keep server/account-wide cache/compression policy unchanged. Check 390px/1366px hero, icons, all below-fold sections, mobile menu/dropdowns/close, desktop dropdown, FAQ both states and pricing anchors; verify one Elementor guide retains its existing styles. Confirm unchanged external Inter, scripts, preloads and no mobile hidden-hero request. Retest compressed live cold/warm caches and approved consent/marketing behavior. Tablet and authenticated editor/preview checks remain pending.

Candidate rollback: restore the saved prior `inc/performance.php` and purge those two WordPress HTML caches; the original hosting/full/shared profiles remain available. After cached HTML no longer references the candidate, its CSS may be removed. This is independent of the older guide-media DB rollback. The earlier eight-guide migration remains local-only; this CSS task neither accessed nor changed the DB and a Git release will not carry those edits. Both existing local MU plugins and tracked Elementor upload CSS remain unchanged; their effects/removal procedure below still apply.

Review the child-theme and `tools/performance` diff. Keep the newer shared-hosting content in the baseline. Release the changed child PHP/JS and **all** new child CSS, subset fonts and optimized images together. The existing parent theme, plugins, WordPress core, original image/font assets and old `main.css` remain untouched. The old 283-byte `main.min.css` is not used.

The child integration uses WordPress enqueue dependencies, `filemtime` asset versions and the defer strategy available since WordPress 6.3. Local WordPress is 7.1.2; verify the live version before release. Do not copy `wp-config.php`, the local database, `tools/performance/.local`, `tools/performance/artifacts`, `node_modules`, or local MU plugins to production. Tooling and reports are review/build material; only the child-theme files are needed at runtime. Keep migration tooling outside public access when running it on the server, or remove it after use. No server runtime dependency on Node/Python is added.

The committed cleanup removed **15,522 previously tracked files** from the current tree: `.local` 953, `artifacts` 461 and `node_modules` 14,108. Local copies remain, and the existing `tools/performance/.gitignore` rules exclude future additions there. Build sources, package/requirements manifests, generated theme CSS/fonts/images and compact verification/build/media summaries stay tracked. Earlier commits still contain the removed material; this housekeeping did not purge history or existing remote/server copies. Use an explicit child-theme release allowlist rather than uploading the entire checkout. Any server-side removal of old published tooling/evidence is a separate owner-reviewed operation.

External preservation is at `C:\Users\user\MWHoster-Performance-Backups\2026-10-13-cleanup-f8ee5873\`, with complete `.local` and `artifacts` copies and a metadata-only `backup-manifest.json`. This path is outside the repository and public web root. Original local evidence and rollback files also remain in place; no backup contents were inspected during housekeeping.

Builds are reproducible from the reviewed original CSS/source map, font files and explicit image sources. From `tools/performance`, use Node >=22.19, Python with the pinned requirements, then:

```sh
npm ci --ignore-scripts
python -m pip install -r requirements.txt
node build.mjs
python subset-fonts.py
node build-images.mjs
```

Commit/release the generated outputs with their source/build tools. Rebuild icon subsets if new theme icon classes are introduced. Unknown templates fall back to complete theme CSS. Keep the full icon vocabulary on Elementor content. Do not replace the new profiles with a coverage-only purge.

Before release, save the current deployed child-theme version or archive. Apply this reviewed theme release through the owner's normal Git/deployment procedure. Do not deploy the local checkout wholesale. This document does not authorize any WHMCS or account-wide change.

## 2. WordPress / Elementor / plugin settings

No production plugin or consent setting was changed. Elementor remains active. Custom-template pruning is restricted to six explicit PHP templates, empty/non-builder page content, and no published global header/footer/popup/single-page/archive integration. Global kit CSS remains. Builder/editor/preview and Elementor page/post assets remain available. Recheck this allowlist if adding a global template, popup, shortcode or embedded builder content.

The local test MU plugin `wp-content/mu-plugins/mwhoster-performance-test.php` is **still installed and unchanged**. Its `mwhoster.test`/loopback guards activate outbound WordPress HTTP/mail/cron blocks and a response CSP preventing analytics/chat/form submission. The pre-existing `mwhoster-local-cache.php` is also unchanged and keeps local page caching bypassed. Keep these local files out of deployment. After later authorized testing is complete and an approved analytics test setup is in place, remove only the temporary test-isolation MU plugin; do not remove the existing cache plugin as part of that step. The cleanup did not validate normal marketing/chat/form delivery.

The currently tracked generated upload CSS `wp-content/uploads/elementor/css/post-3.css` and `post-82.css` remains unchanged. Do not execute the older plan to delete those files. Authenticated editor/preview and remaining article-width checks are still outstanding; no new runtime verification is implied by repository housekeeping.

Local kit ID 24, blog ID 5035, guide ID 82 and single-post template ID 106 were discovered from the local WordPress DB. Do not hard-code these IDs in production operations. The integration reads the active kit dynamically.

Smush's installed lazy-load exclusion API and `no-lazyload` class preserve real above-fold image sources. The homepage SVG stays hidden below 768px, with a data-URI picture source so mobile does not download it. There is no mobile hero preload. Other below-fold images retain the existing lazy-loading implementation. Do not enable a second independent lazy loader or add blanket script delay/async, including for jQuery or marketing.

The local import already requested missing generated Elementor files (`global.css`, `post-58.css`, `post-149.css`). Check these on live first. If also missing, use **WordPress admin → Elementor → Tools → Regenerate CSS & Data** in the WordPress installation, then purge only the affected WordPress page cache. This is an owner-run generated-asset repair, not a Git file change. Review legal/contact page screenshots afterwards. Do not remove stylesheet requests globally to conceal missing files.

GA4, PixelYourSite/Meta, Joinchat and Tawk remain in place. GA4/Tawk moved to enqueue APIs without interaction delay. No duplicate marketing loader was removed. Tawk's script responded HTTP 200 with permissive CORS during this work; the audit's failure was not reproduced for that script. An actual chat conversation was not opened. Validate consent and events in the owner's approved test/debug setup after release.

## 3. Separate targeted guide-media migration

**A Git push does not apply database edits.** The only local content migration changed the `post_content` fields of eight guides, replacing 24 unique legacy HTTP image URLs. No Elementor metadata needed changes. The migration resolves each guide by its slug, not the observed local IDs (4512, 4521, 4531, 4536, 4542, 4546, 4550, 4555). `tools/performance/guide-media-manifest.json` contains exact field/old/new pairs and SHA-256 evidence: all 24 local images matched an HTTP-200 response from their HTTPS production upload URLs. This verifies image resources only, not client-area endpoints.

Local dry-run, apply, rollback and reapply passed during the implementation session. Last recorded local dry-run: **0 fields would change**. The eight-guide content migration was left applied in the separate local WordPress DB; this housekeeping did not access that DB or confirm its state anew. Local replacements use `http://mwhoster.test/wp-content/uploads/...`; production replacements use the initially verified `https://www.mwhoster.com/wp-content/uploads/...`.

Rollback data remains at `tools/performance/.local/guide-media-final.json` and is additionally preserved at `C:\Users\user\MWHoster-Performance-Backups\2026-10-13-cleanup-f8ee5873\.local\guide-media-final.json`. The cleanup removes it from current Git tracking; earlier commits retain their copy because history is not rewritten. Preserve the external backup. A backup file, Git commit or theme deployment does not carry out a database migration. No production migration, schema change or DB-wide replacement was performed. Production application remains the separate owner-run procedure below.

For production, the owner must first back up these WordPress records and use WP-CLI from the **WordPress root** with the production WordPress configuration. Never run this against a WHMCS database. Review the exact dry-run output before applying. Choose a fresh backup path **outside the web root**; replace the example `/secure/backups` with your protected backup directory:

```sh
wp --url=https://www.mwhoster.com --skip-plugins --skip-themes eval-file tools/performance/migrate-guide-media.php dry-run
wp --url=https://www.mwhoster.com --skip-plugins --skip-themes eval-file tools/performance/migrate-guide-media.php apply /secure/backups/mwhoster-guide-media-before.json
wp --url=https://www.mwhoster.com --skip-plugins --skip-themes eval-file tools/performance/migrate-guide-media.php dry-run
```

Expected first result: up to 8 content fields need changes (0 if already corrected); final result: 0. Stop and investigate unexpected records, missing guides or failed asset checks. The script only replaces manifest strings, uses WordPress APIs for serialization-safe writes, saves complete before/after values, refuses to overwrite backups and checks for concurrent edits. WordPress may update post modification metadata/revisions normally. It does not replace a database. Confirm all eight guides and 24 images over HTTPS afterwards. Apply Elementor's own cache regeneration only if required by the deployed version.

To undo just this migration, without overwriting later edits:

```sh
wp --url=https://www.mwhoster.com --skip-plugins --skip-themes eval-file tools/performance/migrate-guide-media.php rollback /secure/backups/mwhoster-guide-media-before.json
```

Rollback refuses to overwrite a field that no longer matches the recorded before/after value. Resolve such a conflict manually using the protected backup. The rollback restores content fields, not the whole DB or timestamps.

## 4. Cache scope and rollback

After the theme release, purge **WordPress public-page HTML caches only**, then affected child-theme asset URLs at any WordPress-scoped CDN if necessary. File modification versions change asset URLs. Clear Elementor's generated CSS only when regeneration is needed. Check cold and warm requests for the current versioned CSS/JS/font/image URLs and ensure caches do not serve old HTML referencing incomplete assets.

Do not use an account-wide purge, change root `.htaccess`, shared PHP settings or global CDN/cache rules as part of this release. If the host has no WordPress-only purge boundary, establish that boundary with the owner first.

Theme rollback: restore the saved previous child-theme release as a unit and purge its WordPress page caches. Keep the original source images/fonts available. Theme rollback and guide DB rollback are independent. Never restore the local DB or a complete production DB snapshot merely to undo these eight fields.

## 5. Server-only proposals (not implemented)

Local Apache delivered uncompressed assets, which inflates the local simulated Lighthouse timings. Verify live Brotli/gzip, public WordPress asset cache lifetimes, HTML page-cache hit rates and TTFB before proposing any change. Investigate large below-fold SVGs with lossless SVG optimization only after visual testing. The bounded self-hosted/inline Inter candidate was rejected by the 14 October local comparison; do not treat self-hosting or font preload as automatically beneficial. A future authorized font change must verify the compressed live dependency path and preload reuse. The active integration still preserves the existing family/weights through the early direct Google Fonts load.

Any compression, CDN, runtime or server-cache work needs its own WordPress-scoped plan. Shared account/root settings require a separate review because they may affect WHMCS. None were changed here.

## 6. Post-deployment checklist

- Confirm the deployed commit/assets and WordPress version, then test logged-out public WordPress URLs listed in `PERFORMANCE-RESULTS.md`. Do not browse clientarea or submit domain/order forms.
- Capture mobile 360/390px, tablet 768px and desktop 1366px screenshots. Compare current content, fonts, icons, header/footer and below-fold imagery against this repository's baseline, especially the newer shared-hosting page.
- Test closed/open mobile offcanvas, dropdowns, keyboard navigation/Escape, desktop menu, scroll/header behavior, FAQ both ways, pricing anchors, Windows and domain-transfer carousels, blog Load More to 13 posts (or the current content count), all guide links and article/sidebar layouts. Test contact paths without sending external messages.
- Complete live desktop/tablet baselines for **every** article, not only the representative articles tested at those widths locally. Inspect the pre-existing WordPress-hosting desktop price overflow and ecommerce-article mobile overflow; they were preserved and require a separate layout/content fix.
- Check one WordPress jQuery 3.7.1 copy locally / expected core version live; Migrate retained. Check dependency order and zero JavaScript/PHP errors. Owl should only transfer on the two carousel templates; slider/popup/validator should not transfer on current pages.
- Confirm custom templates omit unneeded Elementor frontend/font assets, retain active kit inheritance, and blog/guide/posts/editor/preview retain all required builder assets. Check missing generated CSS and no new 404s or icon fallback boxes.
- Verify homepage mobile makes no hidden-hero request/preload; desktop uses real SVG `src`, eager loading and high fetch priority. Verify domain hero reservation, responsive logo/content/payment dimensions and below-fold lazy loading.
- Check titles, canonical URLs, headings, schema, internal links and WordPress-side outgoing form/link parameters. Do not submit WHMCS forms.
- Validate GA4 and Meta/PYS consent-before/after behavior and expected event counts with an approved debug/test setup. Verify outgoing attribution, Joinchat link and Tawk load; do not generate real leads, orders or messages. Local lab tests deliberately blocked measurement and cannot prove live delivery.
- Run Lighthouse mobile/desktop on the main routes under identical conditions, using medians of three runs. Compare FCP/LCP/CLS/TBT, requests and transferred bytes. Check cold and warm caches separately and inspect hero/LCP attribution and asset versioning.
- After sufficient field data, assess 75th-percentile LCP <=2.5s, INP <=200ms and CLS <=0.1. Local lab TBT is not INP; neither these tests nor a Lighthouse score establish a field Core Web Vitals pass.

