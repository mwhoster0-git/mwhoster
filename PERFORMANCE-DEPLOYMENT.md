# MWHoster performance deployment and rollback

Implementation was prepared against local `http://mwhoster.test` and repository baseline `caac75b5b52f4f0fae30c18940ef084dd9d2c6fb` on `performance/wordpress-mobile`. The implementation session did not push, merge, deploy or write to the production DB. Subsequent repository activity merged the recorded implementation into `main` at `f8ee5873bcdde8c4f79405f6b4afa68ddc331af0`; deployment is not established by that merge.

Housekeeping on **13 October 2026** uses `codex/performance-repository-cleanup` from that HEAD. It stages removal of `.local`, `artifacts` and `node_modules` from the Git index while preserving their local files and corrects these reports. This cleanup is not yet committed or pushed, does not rewrite history and does not change runtime code or databases. Existing performance measurements and migration evidence are historical; no browser/Lighthouse suites or database checks were rerun for housekeeping. See `PERFORMANCE-RESULTS.md` for measurements, file inventory and remaining gaps.

## 1. Tracked-file release

Review the child-theme and `tools/performance` diff. Keep the newer shared-hosting content in the baseline. Release the changed child PHP/JS and **all** new child CSS, subset fonts and optimized images together. The existing parent theme, plugins, WordPress core, original image/font assets and old `main.css` remain untouched. The old 283-byte `main.min.css` is not used.

The child integration uses WordPress enqueue dependencies, `filemtime` asset versions and the defer strategy available since WordPress 6.3. Local WordPress is 7.1.2; verify the live version before release. Do not copy `wp-config.php`, the local database, `tools/performance/.local`, `tools/performance/artifacts`, `node_modules`, or local MU plugins to production. Tooling and reports are review/build material; only the child-theme files are needed at runtime. Keep migration tooling outside public access when running it on the server, or remove it after use. No server runtime dependency on Node/Python is added.

The cleanup removes **15,522 previously tracked files** from the proposed next tree: `.local` 953, `artifacts` 461 and `node_modules` 14,108. Local copies remain, and the existing `tools/performance/.gitignore` rules exclude future additions there. Build sources, package/requirements manifests, generated theme CSS/fonts/images and compact verification/build/media summaries stay tracked. Earlier commits still contain the removed material; this housekeeping does not purge history or existing remote/server copies. Review and commit this cleanup before publishing it, and use an explicit child-theme release allowlist rather than uploading the entire checkout. Any server-side removal of old published tooling/evidence is a separate owner-reviewed operation.

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

Local Apache delivered uncompressed assets, which inflates the local simulated Lighthouse timings. Verify live Brotli/gzip, public WordPress asset cache lifetimes, HTML page-cache hit rates and TTFB before proposing any change. Investigate large below-fold SVGs with lossless SVG optimization only after visual testing. Consider self-hosted Inter after licensing, language subset and font-request validation; this release preserves the existing family/weights with an early direct Google Fonts load.

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

