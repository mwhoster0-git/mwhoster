<?php
/* Template Name: Shared Hosting
 * Template Post Type: post, page
 */
?>

<?php
// Reuse the existing Starter annual amount for both its card and hero billing.
$shared_starting_annual_price = '2999';
// Retain the hero's existing whole-rupee monthly display precision.
$shared_starting_monthly_price = round( (float) $shared_starting_annual_price / 10 );

// Page-specific SEO: retain the existing Yoast output and canonical handling.
$shared_title = 'Affordable Shared Web Hosting | NVMe Cloud | MWHoster';
$shared_description = 'Get 2 months free with annual NVMe shared hosting. Autoscaling CPU and RAM, free SSL and a 30-day money-back guarantee. Choose your MWHoster plan.';
foreach ( array( 'wpseo_title', 'wpseo_opengraph_title', 'wpseo_twitter_title', 'pre_get_document_title' ) as $shared_filter ) {
    add_filter( $shared_filter, static function () use ( $shared_title ) { return $shared_title; } );
}
foreach ( array( 'wpseo_metadesc', 'wpseo_opengraph_desc', 'wpseo_twitter_description' ) as $shared_filter ) {
    add_filter( $shared_filter, static function () use ( $shared_description ) { return $shared_description; } );
}
add_filter( 'wpseo_schema_webpage', static function ( $data ) use ( $shared_title, $shared_description ) {
    $data['name'] = $shared_title;
    $data['description'] = $shared_description;
    return $data;
} );
?>

<?php get_header(); ?>
<style>
/* Keep the existing price treatment within this page's responsive hero column. */
.shared-hosting-page .offer-price { font-size: clamp(80px, 10vw, 150px); line-height: 1; }
.shared-hosting-page .price-currency { font-size: 32px; }
.shared-hosting-page .cent-value { font-size: 32px; }
.shared-hosting-page .per-value { font-size: 24px; }
.shared-hosting-page .price-block { flex-wrap: nowrap; }

.shared-hosting-page .shared-launch-section { padding: 80px 0; }
.shared-hosting-page .shared-launch-card { padding: 56px 40px; text-align: center; background: linear-gradient(135deg, #f8fbff, #eef4ff); border: 1px solid #dce7f7; border-radius: 20px; box-shadow: 0 12px 32px rgba(9, 72, 179, .06); }
.shared-hosting-page .shared-launch-label { display: block; margin-bottom: 16px; color: #0948b3; font-size: 12px; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; }
.shared-hosting-page .shared-launch-card h2 { max-width: 720px; margin: 0 auto 18px; font-size: clamp(26px, 3vw, 36px); line-height: 1.25; }
.shared-hosting-page .shared-launch-copy { max-width: 760px; margin: 0 auto 28px; color: #475569; font-size: 17px; line-height: 1.75; }
.shared-hosting-page .shared-launch-actions { display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; }
.shared-hosting-page .shared-launch-actions .btn { display: inline-flex; align-items: center; justify-content: center; gap: 10px; min-height: 48px; padding: 12px 24px; border-radius: 8px; font-weight: 600; }
.shared-hosting-page .shared-launch-secondary { color: #0948b3; background: #fff; border: 1px solid #bdd0ec; }
.shared-hosting-page .shared-launch-secondary:hover { color: #fff; background: #0948b3; border-color: #0948b3; }
.shared-hosting-page .shared-launch-actions .btn:focus-visible { outline: 3px solid #f67a3c; outline-offset: 4px; }
@media (max-width: 575.98px) {
    .shared-hosting-page .shared-launch-section { padding: 48px 0; }
    .shared-hosting-page .shared-launch-card { padding: 36px 22px; border-radius: 14px; }
    .shared-hosting-page .shared-launch-copy { font-size: 16px; }
    .shared-hosting-page .shared-launch-actions .btn { width: 100%; padding: 12px 16px; }
}
.shared-hosting-page .action-btns { display: flex; flex-wrap: wrap; gap: 12px; }
@media (max-width: 767.98px) {
    .shared-hosting-page .big-price-wrap { margin-top: 32px; }
}
.shared-hosting-page .shared-comparison-scroll { overflow-x: auto; }
.shared-hosting-page .shared-comparison-scroll:focus-visible { outline: 3px solid #f67a3c; outline-offset: 3px; }
.shared-hosting-page .shared-comparison-table { width: 100%; min-width: 680px; border-collapse: collapse; }
.shared-hosting-page .shared-comparison-table th, .shared-hosting-page .shared-comparison-table td { padding: 18px; border: 1px solid #dce7f7; vertical-align: top; }
.shared-hosting-page .shared-comparison-table thead { background: #0948b3; color: #fff; }
.shared-hosting-page .shared-comparison-table tbody th { background: #f8fbff; }

/* Offer and purchase presentation stays scoped to this page. */
.shared-hosting-page .shared-offer-badge { display: inline-block; padding: 10px 16px; margin-bottom: 18px; border-radius: 8px; background: #f67a3c; color: #fff; font-size: 17px; font-weight: 700; line-height: 1.4; }
.shared-hosting-page .shared-hero-benefits { padding-left: 22px; margin-bottom: 22px; }
.shared-hosting-page .shared-hero-benefits li { margin-bottom: 6px; font-size: 16px; }
.shared-hosting-page .shared-guarantee, .shared-hosting-page .shared-offer-explanation { font-size: 16px; font-weight: 600; }
.shared-hosting-page .shared-price-label { margin-bottom: 20px; font-size: 20px; }
.shared-hosting-page .shared-price-period { margin: 12px 0 20px; font-size: 18px; }
.shared-hosting-page .shared-annual-billing { font-size: 16px; }
.shared-hosting-page .shared-policy-link { text-decoration: underline; text-underline-offset: 3px; }
.shared-hosting-page .shared-offer-hero .shared-policy-link, .shared-hosting-page .shared-question-link { color: #fff; }
.shared-hosting-page .shared-question-link { align-self: center; text-decoration: underline; text-underline-offset: 3px; }
.shared-hosting-page .btn { min-height: 48px; display: inline-flex; align-items: center; justify-content: center; font-size: 15px; font-weight: 600; }
.shared-hosting-page a:focus-visible { outline: 3px solid #172b4d; outline-offset: 4px; }
.shared-hosting-page .shared-offer-hero a:focus-visible, .shared-hosting-page .primary-bg a:focus-visible { outline-color: #fff; }
.shared-hosting-page #pricing .shared-plan-grid { align-items: stretch; }
.shared-hosting-page #pricing .shared-plan-grid > [class*="col-"] { display: flex; }
.shared-hosting-page #pricing .pricing-new-wrapper { display: flex; flex-direction: column; width: 100%; }
.shared-hosting-page #pricing .pricing-content { display: flex; flex-direction: column; flex: 1; }
.shared-hosting-page #pricing .pricing-feature-list-2 { flex: 1; }
.shared-hosting-page #pricing .pricing-feature-list-2 p { font-size: 14px; color: #475569; }
.shared-hosting-page #pricing .shared-buy { width: 100%; }
.shared-hosting-page .shared-plan-offer { margin: 0 0 16px; color: #0948b3; font-size: 14px; font-weight: 600; }
.shared-hosting-page .shared-recommended-badge { display: inline-block; margin-bottom: 14px; padding: 6px 10px; border-radius: 6px; background: #fff0e7; color: #172b4d; font-size: 14px; font-weight: 600; }
.shared-hosting-page .shared-plan-reassurance { margin: 12px 0 0; font-size: 14px; text-align: center; }
.shared-hosting-page .shared-purchase-reassurance { margin-top: 28px; padding: 24px; border: 1px solid #dce7f7; border-radius: 12px; text-align: center; background: #f8fbff; }
.shared-hosting-page .shared-purchase-reassurance p { margin-bottom: 10px; }
.shared-hosting-page .shared-section-action { margin-top: 28px; text-align: center; }
.shared-hosting-page .btn-tertiary, .shared-hosting-page .btn-tertiary:hover { color: #fff !important; }
@media (max-width: 767.98px) {
    .shared-hosting-page .shared-offer-hero .big-price-wrap { margin-top: 40px; }
}
</style>

    <div class="main shared-hosting-page">

    <section class="ptb-80 gradient-bg shared-offer-hero">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-md-6 col-lg-6">
                    <div class="hero-content-wrap text-white">
                        <span class="shared-offer-badge">2 Months Free with Annual Hosting</span>
                        <h1 class="text-white pt-3">Affordable Web Hosting. Powerful Cloud Performance.</h1>
                        <p class="lead">Launch a business website, blog or online store with fast NVMe SSD storage, autoscaling CPU and RAM, free SSL and DDoS protection. </p>
                        <ul class="shared-hero-benefits">
                            <li><i class="fas fa-check" aria-hidden="true"></i> Free SSL certificates</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Free migration assistance</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> 24/7 technical support</li>
                        </ul>
                        <p class="shared-guarantee">30-Days Money-Back Guarantee</p>
                        <div class="action-btns mt-4"><a href="<?php echo esc_url( home_url( '/shared-web-hosting/#pricing' ) ); ?>" class="btn btn-tertiary">Get Started</a></div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-5">
                    <div class="big-price-wrap position-relative text-center text-white">
                        <div class="price-block d-flex justify-content-center text-white"><span class="price-currency">Rs.</span>
                            <div class="offer-price"><?php echo esc_html( number_format_i18n( $shared_starting_monthly_price, 0 ) ); ?></div>
                            <div class="right-block d-flex"><span class="cent-value">.00</span></div>
                        </div>
                        <p class="shared-price-period">/month equivalent</p>
                        <p class="shared-annual-billing">Rs.<?php echo esc_html( $shared_starting_annual_price ); ?> billed annually for 12 months. Offer included.</p>
                        <p class="shared-offer-explanation">Pay for 10 months. Enjoy 12 months of hosting.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing-section pt-80 pb-100 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading text-center mb-4">
                        <h2>Choose Your Plan. Get 2 Months Free.</h2>
                        <p>Get 12 months of hosting for the price of 10 when you choose an annual plan. Every package includes NVMe SSD storage, autoscaling CPU and RAM, free SSL and technical support.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center justify-content-center shared-plan-grid">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="popular-price bg-white pricing-new-wrapper mt-4 shadow-sm border">
                        <div class="pricing-price d-flex justify-content-between align-items-center pb-4">
                            <span class="p-icon">
                            <i class="fa-solid fa-volleyball color-secondary"></i>
                            </span>
                            <div class="h2 mb-0 text-dark"> Rs.<?php echo esc_html( $shared_starting_annual_price ); ?> <span class="price-cycle h5">/year</span>
                            </div>
                        </div>
                        <p class="shared-plan-offer">2 months free included</p>
                        <div class="pricing-info">
                            <h3 class="h4">Starter Cloud</h3>
                            <p class="text-muted">Put your first website, portfolio or blog online with the essentials included.</p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled pricing-feature-list-2 mt-4 mb-3">
                                <li> <i class="far fa-hdd me-2"></i> <p><strong>5GB</strong> NVMe SSD Storage</p> </li>
                                <li> <i class="fas fa-route me-2"></i> <p><strong>20GB</strong> Bandwidth</p> </li>
                                <li> <i class="fas fa-cloud me-2"></i> <p> <strong>2</strong> Websites</p> </li>
                                <li> <i class="fas fa-mail-bulk me-2"> </i> <p><strong>5</strong> Email Accounts </p> </li>
                                <li> <i class="fas fa-globe me-2"></i> <p><strong>No</strong> Domain Name</p> </li>
                                <li> <i class="fas fa-earth me-2"></i> <p><strong>5</strong> Subdomains </p> </li>
                                <li> <i class="fas fa-server me-2"></i> <p><strong>5</strong> MySQL (1 GB Each) </p> </li>
                                <li> <i class="fas fa-lock me-2"></i>
                                    <p><strong>Free</strong> SSL</p> </li>
                                <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                            </ul>

                            <a href="/clientarea/index.php?rp=/store/shared-linux-hosting/shared-starter" class="btn btn-tertiary shared-buy" target="_blank">Buy Now</a>
                            <p class="shared-plan-reassurance">30-day money-back guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="popular-price bg-white pricing-new-wrapper mt-4  shadow-sm border">
                        <div class="pricing-price d-flex justify-content-between align-items-center pb-4">
                            <span class="p-icon">
                            <i class="fa-solid  fa-heart-circle-check color-secondary"></i>
                            </span>
                            <div class="h2 mb-0 text-dark"> Rs.4999 <span class="price-cycle h5">/year</span>
                            </div>
                        </div>
                        <p class="shared-plan-offer">2 months free included</p>
                        <div class="pricing-info">
                            <span class="shared-recommended-badge">Recommended for Business</span>
                            <h3 class="h4">Alpha Cloud</h3>
                            <p class="text-muted">Give your business website and additional projects more storage and room to grow.</p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled pricing-feature-list-2 mt-4 mb-3">
                                <li> <i class="far fa-hdd me-2"></i> <p><strong>20GB</strong> NVMe SSD Storage</p> </li>
                                <li> <i class="fas fa-route me-2"></i> <p><strong>50GB</strong> Bandwidth</p> </li>
                                <li> <i class="fas fa-cloud me-2"></i> <p> <strong>5</strong> Websites</p> </li>
                                <li> <i class="fas fa-mail-bulk me-2"> </i> <p><strong>20</strong> Email Accounts </p> </li>
                                <li> <i class="fas fa-globe me-2"></i> <p><strong>No</strong> Domain Name</p> </li>
                                <li> <i class="fas fa-earth me-2"></i> <p><strong>10</strong> Subdomains </p> </li>
                                <li> <i class="fas fa-server me-2"></i> <p><strong>10</strong> MySQL (1 GB Each) </p> </li>
                                <li> <i class="fas fa-lock me-2"></i>
                                    <p><strong>Free</strong> SSL</p> </li>
                                <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                            </ul>

                            <a href="/clientarea/index.php?rp=/store/shared-linux-hosting/shared-alpha-cloud" class="btn btn-tertiary shared-buy" target="_blank">Buy Now</a>
                            <p class="shared-plan-reassurance">30-day money-back guarantee</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="popular-price bg-white pricing-new-wrapper mt-4  shadow-sm border">
                        <div class="pricing-price d-flex justify-content-between align-items-center pb-4">
                            <span class="p-icon">
                            <i class="fas fa-space-shuttle color-secondary"></i>
                            </span>
                            <div class="h2 mb-0 text-dark"> Rs.9999 <span class="price-cycle h5">/year</span>
                            </div>
                        </div>
                        <p class="shared-plan-offer">2 months free included</p>
                        <div class="pricing-info">
                            <h3 class="h4">Beta Cloud</h3>
                            <p class="text-muted">Bring more websites together with larger allocations for your growing collection of projects.</p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled pricing-feature-list-2 mt-4 mb-3">
                                <li> <i class="far fa-hdd me-2"></i> <p><strong>30GB</strong> NVMe SSD Storage</p> </li>
                                <li> <i class="fas fa-route me-2"></i> <p><strong>Unlimited</strong> Bandwidth</p> </li>
                                <li> <i class="fas fa-cloud me-2"></i> <p> <strong>10</strong> Websites</p> </li>
                                <li> <i class="fas fa-mail-bulk me-2"> </i> <p><strong>Unlimited</strong> Email Accounts </p> </li>
                                <li> <i class="fas fa-globe me-2"></i> <p><strong>Free</strong> Domain (1 year)</p> </li>
                                <li> <i class="fas fa-earth me-2"></i> <p><strong>Unlimited</strong> Subdomains </p> </li>
                                <li> <i class="fas fa-server me-2"></i> <p><strong>40</strong> MySQL (1 GB Each) </p> </li>
                                <li> <i class="fas fa-lock me-2"></i>
                                    <p><strong>Free</strong> SSL</p> </li>
                                <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                            </ul>

                            <a href="/clientarea/index.php?rp=/store/shared-linux-hosting/shared-beta-cloud" class="btn btn-tertiary shared-buy" target="_blank">Buy Now</a>
                            <p class="shared-plan-reassurance">30-day money-back guarantee</p>
                        </div>
                    </div>
                </div>

            </div>
    </section>

    <section class="promo-section ptb-60 ">
        <div class="container">
            <div class="section-heading text-center mb-4">
                <h2>Website Essentials, Included in Every Plan</h2>
            </div>
            <div class="row justify-content-md-center justify-content-sm-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="fas fa-tools icon-size-lg color-primary"></span>
                            </div>
                            <div class="pt-2 pb-3">
                                <h3 class="h5">Your Website and Business Email in One Place</h3>
                                <p class="mb-0">Manage files, MySQL databases and domain email from your hosting control panel. Install supported applications and handle everyday tasks without administering a server.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="fas fa-headset icon-size-lg color-primary"></span>
                            </div>
                            <div class="pt-2 pb-3">
                                <h3 class="h5">Security Built into Your Hosting</h3>
                                <p class="mb-0">Free SSL encrypts visitor connections. DDoS protection helps mitigate traffic floods, while automatic malware scanning identifies suspicious files. IP and country controls help restrict unwanted traffic.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="fas fa-cloud-upload-alt icon-size-lg color-primary"></span>
                            </div>
                            <div class="pt-2 pb-3">
                                <h3 class="h5">Technical Support When You Need It</h3>
                                <p class="mb-0">Get help with hosting setup, email configuration, domain connections and troubleshooting. Our support team is available 24/7, so you have someone to contact as you launch and manage your website.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="feature-tab-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-xl-6 col-lg-7 col-12">
                    <h2>Affordable Hosting with the Technology to Back It Up</h2>
                    <p>Your visitors experience the result of your hosting: pages loading, searches returning and forms responding. Our cloud platform brings processing, storage and content delivery together to support that experience.</p>
                </div>
                <div class="col-xl-5 col-lg-5 col-12">
                    <div class="image-box text-center"><img src="/wp-content/uploads/2024/03/Take-Advantage.svg" style="width: 100%; height: auto;" alt="benefits hosting" class="img-fluid" width="2005" height="1098" /></div>
                </div>
            </div>
            <div class="row g-4 pt-40">
                <div class="col-md-6 col-lg-4">
                    <div class="single-service p-5 rounded border">
                        <h3 class="h5">More CPU and RAM as Demand Grows</h3>
                        <p>Processing and memory capacity scale across multiple backend servers as workloads increase. Your shared account is not restricted by fixed account-wide CloudLinux LVE CPU or RAM caps.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="single-service p-5 rounded border">
                        <h3 class="h5">Load Balancing for Concurrent Visitors</h3>
                        <p>Incoming HTTP/HTTPS requests are distributed across available web servers, helping reduce processing queues. Server health monitoring also allows requests to be directed away from an unavailable backend.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="single-service p-5 rounded border">
                        <h3 class="h5">NVMe SSD Storage for Fast Data Access</h3>
                        <p>NVMe supports parallel read/write operations with low storage overhead. It helps reduce disk waiting time when your application accesses website files and database data.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="single-service p-5 rounded border">
                        <h3 class="h5">A Web Stack Built for PHP Applications</h3>
                        <p>NGINX and Apache support web delivery and application compatibility. PHP-FPM manages the workers executing your PHP code, including the dynamic requests behind WordPress websites.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="single-service p-5 rounded border">
                        <h3 class="h5">OPcache Reduces Repeated PHP Work</h3>
                        <p>OPcache keeps compiled PHP bytecode in memory for reuse. Subsequent requests can avoid repeating that compilation step, reducing processing overhead for your application.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="single-service p-5 rounded border">
                        <h3 class="h5">CDN Delivery and Lighter Pages</h3>
                        <p>Eligible cached content is delivered from edge locations closer to visitors. Image optimisation and CSS/JavaScript minification tools reduce download size, while personalised requests are processed by your application.</p>
                    </div>
                </div>
            </div>
            <div class="shared-section-action">
                <p>Put this platform behind your next website.</p>
                <a href="<?php echo esc_url( home_url( '/shared-web-hosting/#pricing' ) ); ?>" class="btn btn-tertiary">Get Started</a></div>
        </div>
    </section>

    <section class="ptb-80">
        <div class="container">
            <div class="section-heading text-center mb-4">
                <h2 id="resource-comparison-heading">See What Your Hosting Price Really Includes</h2>
                <p>Storage is one part of a hosting plan. The way CPU and RAM are allocated also matters when visitors interact with your website. Compare our autoscaling model with shared hosting that uses fixed CloudLinux LVE account quotas.</p>
            </div>
            <div class="shared-comparison-scroll" role="region" aria-labelledby="resource-comparison-heading" tabindex="0">
                <table class="shared-comparison-table" aria-labelledby="resource-comparison-heading">
                    <thead>
                        <tr>
                            <th scope="col">Resource</th>
                            <th scope="col">Shared hosting with fixed LVE quotas</th>
                            <th scope="col">MWHoster shared cloud</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">CPU</th>
                            <td>A configured limit on account CPU usage.</td>
                            <td>CPU capacity scales without a fixed account-wide LVE quota.</td>
                        </tr>
                        <tr>
                            <th scope="row">RAM</th>
                            <td>A configured account-wide memory limit.</td>
                            <td>Memory capacity scales without a fixed account-wide LVE quota.</td>
                        </tr>
                        <tr>
                            <th scope="row">Reaching resource thresholds</th>
                            <td>CPU limits can throttle processing; memory or process limits can cause request errors.</td>
                            <td>No CloudLinux LVE caps; workloads use an autoscaling, load-balanced platform.</td>
                        </tr>
                        <tr>
                            <th scope="row">Storage</th>
                            <td>Technology and capacity depend on the package.</td>
                            <td>NVMe SSD storage with the allowance shown in your chosen plan.</td>
                        </tr>
                        <tr>
                            <th scope="row">Growing your plan</th>
                            <td>More compute may require a larger allocation or package.</td>
                            <td>Compute scales; choose a larger package for more storage, websites and other plan allocations.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="mt-3">This compares resource models; individual hosting providers and packages differ.</p>
            <div class="shared-section-action">
                <p>Choose affordable hosting with a clear view of the resources behind it.</p>
                <a href="<?php echo esc_url( home_url( '/shared-web-hosting/#pricing' ) ); ?>" class="btn btn-tertiary">View Hosting Plans</a></div>
        </div>
    </section>

    <section id="free-migration" class="feature-tab-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-xl-5 col-lg-5 col-12">
                    <div class="image-box text-center"><img src="/wp-content/uploads/2024/03/Web-Hosting-Migrations.svg" style="width: 100%; height: auto;" alt="Hosting Transfer" class="img-fluid" width="3415" height="3699" /></div>
                </div>
                <div class="col-xl-6 col-lg-7 col-12">
                    <h2>Ready to Switch? Get Free Migration Assistance.</h2>
                    <p>Bring your existing website to MWHoster with help moving the files, databases and email your business relies on. Our team guides transfers from cPanel, Plesk and DirectAdmin, and can review other hosting environments with you.</p>
                    <ul class="disc-style">
                        <li>Assistance transferring your website, databases and email.</li>
                        <li>Guidance with hosting setup and your domain connection.</li>
                        <li>A move coordinated around your website and business needs.</li>
                    </ul>
                    <p>Choose your new hosting with a 30-day money-back guarantee and support for the move.</p>
                    <a href="https://api.whatsapp.com/send/?phone=923180049011&text=Need+Help%3F&type=phone_number&app_absent=0" class="btn btn-outline-primary" target="_blank">Get Free Migration Assistance</a></div>
            </div>
        </div>
    </section>

    <section class="client-section ptb-80">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2>Your Next Website Starts Here</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-4 col-lg-4">
                    <div class="single-service p-5 rounded border gray-light-bg">
                        <h3 class="h5">Business Websites</h3>
                        <p>Give customers a place to discover your services and contact your business. Start with domain email, free SSL and hosting tools in one account.</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="single-service p-5 rounded border gray-light-bg">
                        <h3 class="h5">WordPress and Online Stores</h3>
                        <p>Publish content, display products and serve customer requests on a PHP/MySQL platform with NVMe storage, OPcache and autoscaling CPU and RAM.</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="single-service p-5 rounded border gray-light-bg">
                        <h3 class="h5">Portfolios, Blogs and Client Projects</h3>
                        <p>Put your work online and add websites as your projects grow. Choose a plan with the storage and website allowance your collection needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ptb-60 primary-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-6">
                    <div class="cta-content-wrap text-white">
                        <h2 class="text-white h2">Get Your Website Online with 2 Months Free</h2>
                        <p>Choose annual cloud hosting with NVMe SSD storage, free SSL and technical support. Get 12 months for the price of 10, backed by our 30-day money-back guarantee.</p>
                        <div class="action-btns mt-4 mb-3"><a href="<?php echo esc_url( home_url( '/shared-web-hosting/#pricing' ) ); ?>" class="btn btn-tertiary">Get Started</a><a href="https://api.whatsapp.com/send/?phone=923180049011&text=Need+Help%3F&type=phone_number&app_absent=0" class="shared-question-link" target="_blank">Have a Question?</a></div>
                    </div>
                    <div class="support-action d-inline-flex flex-wrap">
                        <a href="mailto:support@mwhoster.com" class="me-3 text-info"><i class="fas fa-envelope me-1 text-tertiary"></i>
                        <span style="color:#fff">support@mwhoster.com</span></a>
                        <a href="tel:+923180049011" class="mb-0 text-info"><i class="fas fa-phone-alt me-1 text-tertiary"></i>
                        <span style="color:#fff">+92 318 0049011</span></a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 d-none d-lg-block">
                    <div class="cta-img-wrap text-center">
                        <img src="/wp-content/uploads/2024/03/Contact-image.svg" alt="contact us" class="img-fluid" width="250" height="204" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="ptb-100 gray-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-9">
                    <div class="section-heading text-center mb-5">
                        <h2>A Few Answers Before You Get Started</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="accordion faq-wrap" id="accordionExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading0"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer0" aria-expanded="true" aria-controls="sharedAnswer0">Which shared hosting plan should I choose?</button></h3>
                            <div class="accordion-collapse collapse show" id="sharedAnswer0" aria-labelledby="sharedHeading0" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Starter Cloud suits a first website, portfolio or small blog. Alpha Cloud provides more storage and website capacity for business projects. Beta Cloud supports a larger collection of websites. All three include autoscaling CPU and RAM; compare the plan cards for exact allowances.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading1"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer1" aria-expanded="false" aria-controls="sharedAnswer1">How does the two-month free hosting offer work?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer1" aria-labelledby="sharedHeading1" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Choose annual hosting and receive 12 months of service for the price of 10, compared with the plan's standard monthly rate. The displayed annual price already includes this saving and covers the full 12-month term.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading2"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer2" aria-expanded="false" aria-controls="sharedAnswer2">Do you offer a money-back guarantee?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer2" aria-labelledby="sharedHeading2" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Yes. Shared web hosting comes with a 30-day money-back guarantee. Review our <a href="<?php echo esc_url( home_url( '/terms-conditions/' ) ); ?>" class="shared-policy-link">refund terms</a> for eligibility, exclusions and the process for requesting a refund.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading3"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer3" aria-expanded="false" aria-controls="sharedAnswer3">What is included in my hosting plan?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer3" aria-labelledby="sharedHeading3" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Each plan includes NVMe SSD storage, hosted websites, email accounts, MySQL databases, free SSL, a hosting control panel and technical support. CPU/RAM autoscaling, load balancing and DDoS protection support the shared cloud platform. The cards show each package's allowances and domain offer.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading4"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer4" aria-expanded="false" aria-controls="sharedAnswer4">Can you help me move from my current hosting provider?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer4" aria-labelledby="sharedHeading4" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Yes. Free migration assistance includes help transferring website files, databases and email. Our team can guide moves from cPanel, Plesk or DirectAdmin and review other environments. <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact us</a> to plan your move.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading5"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer5" aria-expanded="false" aria-controls="sharedAnswer5">Can I use WordPress and WooCommerce?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer5" aria-labelledby="sharedHeading5" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Yes. The shared platform supports WordPress and WooCommerce through PHP and MySQL. Use the application installer to set up WordPress, then build your site. Choose enough storage and database capacity for your content, products and application.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading6"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer6" aria-expanded="false" aria-controls="sharedAnswer6">Is the advertised monthly price billed monthly?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer6" aria-labelledby="sharedHeading6" data-bs-parent="#accordionExample">
                                <div class="accordion-body">The monthly figure shown here is the equivalent cost of the annual plan, including the two-month saving. You pay the displayed annual total for 12 months of hosting. Check the billing period and order total at checkout.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading7"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer7" aria-expanded="false" aria-controls="sharedAnswer7">How do I purchase and activate my hosting?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer7" aria-labelledby="sharedHeading7" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Select Buy Now on your chosen plan and complete checkout. Follow the payment-verification instructions, including sending a payment screenshot through WhatsApp support or a ticket. Hosting is activated after verification, and access details are sent by email.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading8"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer8" aria-expanded="false" aria-controls="sharedAnswer8">Are CPU and RAM limited on these plans?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer8" aria-labelledby="sharedHeading8" data-bs-parent="#accordionExample">
                                <div class="accordion-body">The shared cloud platform does not impose fixed account-wide CPU or RAM quotas through CloudLinux LVE. Capacity scales with workload across multiple servers. Individual application settings, such as PHP's per-script memory limit and execution time, remain separate.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading9"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer9" aria-expanded="false" aria-controls="sharedAnswer9">Does autoscaling give me unlimited NVMe storage?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer9" aria-labelledby="sharedHeading9" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Autoscaling CPU and RAM does not change your storage allowance. NVMe describes the storage technology; your plan determines the available capacity. Upgrade when you need more space, websites or other package allocations.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading10"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer10" aria-expanded="false" aria-controls="sharedAnswer10">What support is available?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer10" aria-labelledby="sharedHeading10" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Technical support is available 24/7 through support tickets, WhatsApp and <a href="mailto:support@mwhoster.com">support@mwhoster.com</a>. Get help with hosting setup, email configuration, domain connections and troubleshooting.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="sharedHeading11"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer11" aria-expanded="false" aria-controls="sharedAnswer11">Can I upgrade later?</button></h3>
                            <div class="accordion-collapse collapse" id="sharedAnswer11" aria-labelledby="sharedHeading11" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Yes. Contact support when you need a package with more storage, websites, databases, email accounts or data transfer. CPU and RAM autoscaling are already included across the shared cloud plans.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shared-launch-section" aria-labelledby="shared-launch-heading">
        <div class="container">
            <div class="shared-launch-card">

                <span class="shared-offer-badge">Get 2 Months Free with Annual Hosting</span>
                <h2 id="shared-launch-heading">Launch with Confidence. Grow with MWHoster.</h2>
                <p class="shared-launch-copy">Give your website 12 months of cloud hosting for the price of 10. Get NVMe SSD storage, autoscaling CPU and RAM, and support to help you launch or move your website.</p>
                <p class="shared-guarantee">30-Day Money-Back Guarantee · Free SSL · Free Migration Assistance</p>
                <div class="shared-launch-actions"><a href="<?php echo esc_url( home_url( '/shared-web-hosting/#pricing' ) ); ?>" class="btn btn-tertiary">Get Started</a><a href="https://api.whatsapp.com/send/?phone=923180049011&text=Need+Help%3F&type=phone_number&app_absent=0" class="btn shared-launch-secondary" target="_blank">Get Free Migration Assistance</a></div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
