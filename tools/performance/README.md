# MWHoster local performance work

Scope: public WordPress only. All scripts use explicit WordPress paths and refuse clientarea/WHMCS navigation. Never point this checkout at the production DB.

## Build

Node >=22.19 (tested with 24.19), Python 3.12 and PHP 7.4+ are required. From this directory:

```sh
npm ci --ignore-scripts
python -m pip install -r requirements.txt
node build.mjs
python subset-fonts.py
node build-images.mjs
```

The original `assets/css/main.css` and its source map remain the reviewed source. `main.min.css` is an incomplete old stub and is never used. `build.mjs` traverses the CSS syntax tree, preserving source order, complete Bootstrap rules (including responsive utilities, collapse/offcanvas/dropdown/focus/disabled states), theme layout and licenses. It removes explicitly identified vendor/source groups per profile, not rules based only on initial-load coverage. `full` is the fail-open profile for unknown templates. The custom profiles preserve all theme component CSS, remove unused vendor widgets, and retain Owl's CSS for carousel pages. The `shared` profile keeps the shared header/footer, Bootstrap, typography, helpers, buttons and social icons; Elementor retains its own content/widget assets and full icon vocabulary.

Icon class names are collected from every child PHP template, including inactive examples/comments as a conservative safelist. All non-glyph Font Awesome utilities remain. Pseudo-element glyphs in retained CSS are included too. FontTools retains copyright/license/name tables. Source fonts are Font Awesome Free, distributed under SIL OFL 1.1; CSS code uses MIT and icons use CC BY 4.0. See https://fontawesome.com/license/free and the preserved source notices. No vendor source font is modified. Rebuild after introducing an icon class. Elementor content uses complete fonts; only the fixed theme header/footer uses the subset there.

Images are lossless WebP derivatives from explicitly listed existing PNGs. Existing SVG artwork and original images remain available.

## Bounded Inter experiment (14 October 2026)

The scoped homepage/shared-hosting local-font candidate was **rejected and reverted**. Inlining the 35 captured font-face declarations removed the external stylesheet but worsened simulated local LCP; adding one Latin font preload duplicated that font request and did not improve it. The existing child asset integration and hosting CSS are restored unchanged. No new font loading behavior is active.

Candidate build/source/manifest/scope-test files and the downloaded font/license package are preserved under ignored `artifacts/font-path-rejected-material/`. The runtime patch is recorded at `artifacts/font-path-final/rejected-runtime.patch`. The archived tests/build scripts describe the candidate, not the currently active integration; do not deploy the archive or run its scope test against the reverted runtime. Fonts were downloaded under [Inter's SIL OFL license](https://github.com/google/fonts/blob/main/ofl/inter/OFL.txt); no package was installed.

The focused check used `MW_IDS=7,13,82`, `MW_WIDTHS=390,1366` and the existing browser runner. Lighthouse used `MW_ROUTES=/,/shared-web-hosting/`: three before runs per page, three intermediate no-preload runs per page, then one corrected-candidate confirmation per page (**14 total**). No phase exceeded three runs. The runner now rejects more than three or overwriting a measured phase. All before/intermediate/corrected artifacts remain in their separate folders; `node font-path-summary.mjs` produces the tracked compact summary. No additional score-driven optimization or measurements followed the rejection.

## Local verification

`local-db-inventory.php` uses SELECTs only, checks a loopback DB host and local `home`/`siteurl`, and never prints credentials. Its output and browser artifacts are ignored by Git. PHP scripts must be run with the Laragon PHP executable when PHP is not on PATH.

Before browser/Lighthouse tests, copy `local-test-isolation.php` to `wp-content/mu-plugins/mwhoster-performance-test.php`. It activates only on `mwhoster.test` with a loopback DB. It prevents outbound WordPress HTTP/mail/cron, and blocks browser tracking/chat via a response CSP. Browser tests additionally deny WHMCS and external requests except Google font assets. Verified legacy guide upload images can be fulfilled from their local counterparts for baseline screenshots. Remove this temporary MU plugin after tests; do not deploy it. Existing local cache controls are preserved.

```sh
php local-db-inventory.php
node browser-audit.mjs before
node lighthouse.mjs before
# After reviewed changes:
node browser-audit.mjs after
node lighthouse.mjs after
```

The browser runner covers published local WordPress pages/posts from the DB inventory. It captures 390/768/1366 px for distinct pages and two representative articles, plus 390 px for every article. It tests menu, FAQ and pricing controls without submitting forms. `MW_IDS` restricts a rerun to explicit discovered WordPress IDs. Lighthouse covers seven main routes with three cold browser-cache mobile runs each, simulated throttling, identical tracking isolation, 390×844 viewport, Chrome 152 and Lighthouse 13.0.1. Local Apache does not compress the responses in these measurements. Lab TBT is not field INP.

See the root `PERFORMANCE-DEPLOYMENT.md` for owner-run deployment/migration and rollback steps. A Git push does not migrate WordPress content/settings.
