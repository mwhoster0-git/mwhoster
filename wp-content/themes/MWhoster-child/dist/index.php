<?php
/* Template Name: Homepage
* Template Post Type: post, page
*/
?>

<?php
// Page-specific SEO uses the existing Yoast filters and canonical handling.
$home_title = 'NVMe Cloud Hosting with Autoscaling CPU & RAM | MWHoster';
$home_description = 'Launch on NVMe cloud hosting with autoscaling CPU and RAM, free SSL, DDoS protection and migration assistance. Explore MWHoster hosting plans.';
foreach ( array( 'wpseo_title', 'wpseo_opengraph_title', 'wpseo_twitter_title', 'pre_get_document_title' ) as $home_filter ) {
    add_filter( $home_filter, static function () use ( $home_title ) { return $home_title; } );
}
foreach ( array( 'wpseo_metadesc', 'wpseo_opengraph_desc', 'wpseo_twitter_description' ) as $home_filter ) {
    add_filter( $home_filter, static function () use ( $home_description ) { return $home_description; } );
}
add_filter( 'wpseo_schema_webpage', static function ( $data ) use ( $home_title, $home_description ) {
    $data['name'] = $home_title;
    $data['description'] = $home_description;
    return $data;
} );
?>

<?php get_header(); ?>

<style>
.mwhoster-home-page .action-btns { display: flex; flex-wrap: wrap; gap: 12px; }
</style>

<div class="main mwhoster-home-page">

    <section class="ptb-20 overflow-hidden primary-bg sm-mt-3">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
                <div class="col-md-12 col-lg-5">
                    <div class="hero-slider-content text-white py-5">

                        <h1 class="text-white">Fast Cloud Hosting with Autoscaling CPU &amp; RAM</h1>
                        <ul>
                            <li><i class="fas fa-check" aria-hidden="true"></i> NVMe SSD storage</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Autoscaling CPU and RAM</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Shared cloud with no fixed LVE CPU or RAM caps</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Free SSL certificates</li>
                            <li><i class="fas fa-check" aria-hidden="true"></i> Free website migration assistance</li>
                        </ul>
                        <p class="lead">Build on NVMe SSD storage and a shared cloud platform that scales processing power and memory with demand. Give your business website, WordPress project or online store capacity for more simultaneous activity, backed by DDoS protection and technical support.</p>

                        <div class="action-btns mt-4">
                            <a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>" class="btn btn-tertiary btn-lg">Compare Hosting Plans</a>
                            <a href="https://api.whatsapp.com/send/?phone=923180049011&text=Need+Help%3F&type=phone_number&app_absent=0" class="btn btn-outline-light btn-lg" target="_blank">Move My Website</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-lg-6">
                    <div class="img-wrap text-end text-sm-center">
                        <picture class="no-lazyload">
                            <source media="(max-width: 767px)" srcset="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMSIgaGVpZ2h0PSIxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjwvc3ZnPg==">
                            <img src="/wp-content/uploads/2024/03/Hero-image.svg" alt="Web Server" class="img-fluid mob-hide mwhoster-eager no-lazyload" loading="eager" fetchpriority="high" width="500" height="553" />
                        </picture>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section id="pricing" class="pricing-section ptb-80 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-9">
                    <div class="section-heading text-center mb-4">
                        <h2>Choose Your Plan. Get the Same Autoscaling Foundation.</h2>
                        <p>Every shared cloud plan includes CPU and RAM autoscaling, NVMe SSD storage and free SSL. Choose the storage, websites, email accounts and data transfer your project needs.</p>
                    </div>
                </div>
            </div>
            <p class="text-center">Included across these plans: autoscaling CPU and RAM without fixed account-wide CloudLinux LVE caps.</p>
            <div class="row align-items-center justify-content-md-center justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="popular-price bg-white pricing-new-wrapper mt-4 shadow-sm border">
                        <div class="pricing-price d-flex justify-content-between align-items-center pb-4">
                            <span class="p-icon">
                            <i class="fa-solid fa-volleyball color-secondary"></i>
                            </span>
                            <div class="h2 mb-0 text-dark"> Rs.2999<span class="price-cycle h5">/year</span>
                            </div>
                        </div>
                        <div class="pricing-info">
                            <h3 class="h4">Starter Cloud</h3>
                            <p class="text-muted">For a personal website, professional portfolio or new blog.</p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled pricing-feature-list-2 mt-4 mb-3">
                                <li> <i class="far fa-hdd me-2"></i> <p><strong>5GB</strong> NVMe SSD Storage</p> </li>
                                <li> <i class="fas fa-route me-2"></i> <p><strong>20GB</strong> Bandwidth</p> </li>
                                <li> <i class="fas fa-cloud me-2"></i> <p> <strong>2</strong> Websites</p> </li>
                                <li> <i class="fas fa-mail-bulk me-2"> </i> <p><strong>5</strong> Email Accounts </p> </li>

                                <li> <i class="fas fa-earth me-2"></i> <p><strong>5</strong> Subdomains </p> </li>
                                <li> <i class="fas fa-server me-2"></i> <p><strong>5</strong> MySQL Databases (1 GB Each)</p> </li>
                                <li> <i class="fas fa-lock me-2"></i>
                                    <p><strong>Free</strong> SSL</p> </li>
                                <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                            </ul>

                            <a href="https://mwhoster.com/clientarea/index.php?rp=/store/shared-linux-hosting/shared-starter" class="btn btn-primary btn-block" target="_blank">Choose Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="popular-price bg-white pricing-new-wrapper mt-4  shadow-sm border">
                        <div class="pricing-price d-flex justify-content-between align-items-center pb-4">
                            <span class="p-icon">
                            <i class="fa-solid  fa-heart-circle-check color-secondary"></i>
                            </span>
                            <div class="h2 mb-0 text-dark"> Rs.4999<span class="price-cycle h5">/year</span>
                            </div>
                        </div>
                        <div class="pricing-info">
                            <h3 class="h4">Alpha Cloud</h3>
                            <p class="text-muted">For business websites and several active projects.</p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled pricing-feature-list-2 mt-4 mb-3">
                                <li> <i class="far fa-hdd me-2"></i> <p><strong>20GB</strong> NVMe SSD Storage</p> </li>
                                <li> <i class="fas fa-route me-2"></i> <p><strong>50GB</strong> Bandwidth</p> </li>
                                <li> <i class="fas fa-cloud me-2"></i> <p> <strong>5</strong> Websites</p> </li>
                                <li> <i class="fas fa-mail-bulk me-2"> </i> <p><strong>20</strong> Email Accounts </p> </li>

                                <li> <i class="fas fa-earth me-2"></i> <p><strong>10</strong> Subdomains </p> </li>
                                <li> <i class="fas fa-server me-2"></i> <p><strong>10</strong> MySQL Databases (1 GB Each)</p> </li>
                                <li> <i class="fas fa-lock me-2"></i>
                                    <p><strong>Free</strong> SSL</p> </li>
                                <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                            </ul>

                            <a href="https://mwhoster.com/clientarea/index.php?rp=/store/shared-linux-hosting/shared-alpha-cloud" class="btn btn-primary btn-block" target="_blank">Choose Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="popular-price bg-white pricing-new-wrapper mt-4  shadow-sm border">
                        <div class="pricing-price d-flex justify-content-between align-items-center pb-4">
                            <span class="p-icon">
                            <i class="fas fa-space-shuttle color-secondary"></i>
                            </span>
                            <div class="h2 mb-0 text-dark"> Rs.9999<span class="price-cycle h5">/year</span>
                            </div>
                        </div>
                        <div class="pricing-info">
                            <h3 class="h4">Beta Cloud</h3>
                            <p class="text-muted">For freelancers and publishers managing a larger collection of websites.</p>
                        </div>
                        <div class="pricing-content">
                            <ul class="list-unstyled pricing-feature-list-2 mt-4 mb-3">
                                <li> <i class="far fa-hdd me-2"></i> <p><strong>30GB</strong> NVMe SSD Storage</p> </li>
                                <li> <i class="fas fa-route me-2"></i> <p><strong>Unlimited</strong> Bandwidth</p> </li>
                                <li> <i class="fas fa-cloud me-2"></i> <p> <strong>10</strong> Websites</p> </li>
                                <li> <i class="fas fa-mail-bulk me-2"> </i> <p><strong>Unlimited</strong> Email Accounts </p> </li>
                                <li> <i class="fas fa-globe me-2"></i> <p><strong>Free</strong> Domain (1 year)</p> </li>
                                <li> <i class="fas fa-earth me-2"></i> <p><strong>Unlimited</strong> Subdomains </p> </li>
                                <li> <i class="fas fa-server me-2"></i> <p><strong>40</strong> MySQL Databases (1 GB Each)</p> </li>
                                <li> <i class="fas fa-lock me-2"></i>
                                    <p><strong>Free</strong> SSL</p> </li>
                                <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                            </ul>

                            <a href="https://mwhoster.com/clientarea/index.php?rp=/store/shared-linux-hosting/shared-beta-cloud" class="btn btn-primary btn-block" target="_blank">Choose Plan</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="support-cta text-center mt-5"><a href="<?php echo esc_url( home_url( '/shared-web-hosting/' ) ); ?>" class="btn btn-primary">Explore Shared Cloud Hosting</a></div>
        </div>
    </section>

    <section class="position-relative zindex-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8 col-12">
                    <div class="domain-search-wrap border gray-light-bg">
                        <h2 class="text-center h3">Find the Domain Your Business Will Be Known For</h2>
                        <form action="https://mwhoster.com/clientarea/domainchecker.php" method="POST" class="domain-search-form my-4">
                            <input type="text" name="domain" id="domain" class="form-control" placeholder="yourdomainname.com" />
                            <div class="select-group">

                                <button type="submit" class="btn btn-primary"><i class="fas fa-search pe-1"></i> Search
                                </button>
                            </div>
                        </form>
                        <div class="domain-list-wrap text-center">
                            <ul class="list-inline domain-search-list">
                                <li class="list-inline-item bg-white border rounded">
                                    <p>.com</p>
                                    <span>$14.99</span>
                                </li>
                                <li class="list-inline-item bg-white border rounded">
                                    <p>.info</p>
                                    <span>$17.99</span>
                                </li>
                                <li class="list-inline-item bg-white border rounded">
                                    <p>.net</p>
                                    <span>$15.00</span>
                                </li>
                                <li class="list-inline-item bg-white border rounded">
                                    <p>.ca</p>
                                    <span>$14.00</span>
                                </li>
                                <li class="list-inline-item bg-white border rounded">
                                    <p>.top</p>
                                    <span>$6.99</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section ptb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-9">
                    <div class="section-heading text-center mb-4">
                        <h2>Match Your Website to the Right Hosting Platform</h2>
                        <p>Start with the environment your application needs. Explore Linux shared hosting, our WordPress hosting range or Windows hosting, all with NVMe SSD storage.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-md-center justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="text-center bg-white single-pricing-pack-2 mt-4 rounded border gray-light-bg">
                        <div class="pricing-icon mob-hide">
                            <img src="<?php echo esc_url( mwhoster_image_url( 'assets/img/optimized/shared-web-hosting-327.webp' ) ); ?>" alt="Shared Website Hosting" width="200" height="86" />
                        </div>
                        <h3 class="package-title h4">Shared Web Hosting</h3>
                        <p class="mb-3">Run business websites, blogs and portfolios on autoscaling Linux cloud hosting. Get MySQL databases, domain email and free SSL, with CPU and RAM capacity that responds to demand.</p>

                        <a href="<?php echo esc_url( home_url( '/shared-web-hosting/' ) ); ?>" class="btn btn-primary mt-3">Explore Shared Hosting</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="popular-price text-center bg-white single-pricing-pack-2 mt-4 rounded border gray-light-bg">
                        <div class="pricing-icon mob-hide">
                            <img src="<?php echo esc_url( mwhoster_image_url( 'assets/img/optimized/wordpress-hosting-327.webp' ) ); ?>" alt="WordPress Website Hosting" width="200" height="86" />
                        </div>
                        <h3 class="package-title h4">WordPress Hosting</h3>
                        <p class="mb-3">Choose a hosting range built around WordPress websites. Bring together NVMe SSD storage, straightforward installation and technical support for your next blog, business website or online store.</p>
                        <a href="<?php echo esc_url( home_url( '/wordpress-web-hosting/' ) ); ?>" class="btn btn-primary mt-3">Explore WordPress Hosting</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="text-center bg-white single-pricing-pack-2 mt-4 rounded border gray-light-bg">
                        <div class="pricing-icon mob-hide">
                            <img src="<?php echo esc_url( mwhoster_image_url( 'assets/img/optimized/window-web-hosting-327.webp' ) ); ?>" alt="Windows Website Hosting" width="200" height="86" />
                        </div>
                        <h3 class="package-title h4">Windows Web Hosting</h3>
                        <p class="mb-3">Host websites and applications that need a Windows server environment. Combine NVMe SSD storage with hosting plans and technical support for your application's requirements.</p>
                        <a href="<?php echo esc_url( home_url( '/windows-web-hosting/' ) ); ?>" class="btn btn-primary mt-3">Explore Windows Hosting</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ptb-60 primary-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-7 col-lg-7">
                    <div class="cta-content-wrap text-white mob-botom">
                        <h2 class="text-white h2">Protection for Your Website, Its Traffic and Your Visitors</h2>
                        <ul>
                            <li><i class="fas fa-circle" aria-hidden="true"></i> <strong>DDoS protection:</strong> Mitigate malicious traffic floods that attempt to overwhelm your hosting and interrupt access.</li>
                            <li><i class="fas fa-circle" aria-hidden="true"></i> <strong>Free SSL/TLS:</strong> Encrypt connections between your website and visitors, including login and contact-form traffic.</li>
                            <li><i class="fas fa-circle" aria-hidden="true"></i> <strong>Automatic malware scanning:</strong> Identify suspicious files and malicious code so threats can be investigated.</li>
                            <li><i class="fas fa-circle" aria-hidden="true"></i> <strong>IP and country blocking:</strong> Restrict traffic from selected addresses or locations through hosting access controls.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="cta-img-wrap text-center">
                        <img src="/wp-content/uploads/2024/03/Your-Security-image.svg" style="width: 100%; height: auto;" alt="Security Servers" class="img-fluid" width="974" height="549" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="promo-section ptb-80 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-heading text-center">
                        <h2>The Technology Behind Faster Website Requests</h2>
                        <p>Website performance depends on processing, storage and content delivery working together. Our shared cloud platform addresses each stage, from executing PHP to delivering cached files.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center justify-content-sm-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="fas fa-tools icon-size-lg color-primary"></span>
                            </div>
                            <div class="pt-2 pb-3">
                                <h3 class="h5">CPU and RAM That Scale</h3>
                                <p class="mb-0">Processing and memory capacity adjust as workloads change. Your shared cloud account can draw on multiple backend servers without fixed account-wide LVE CPU or RAM caps, giving concurrent website activity more room to run.</p>
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
                                <h3 class="h5">NVMe SSD Storage</h3>
                                <p class="mb-0">NVMe supports parallel storage operations with low protocol overhead. Fast access to website files and database data helps reduce the time requests spend waiting on disk, including during content updates and busy browsing sessions.</p>
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
                                <h3 class="h5">Load-Balanced Web Servers</h3>
                                <p class="mb-0">Incoming HTTP and HTTPS requests are distributed across available backend servers. Sharing the workload helps reduce processing queues when more visitors browse, search or interact with your website at the same time.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="fas fa-lock icon-size-lg color-primary"></span>
                            </div>
                            <div class="pt-2 pb-3">
                                <h3 class="h5">PHP-FPM and OPcache</h3>
                                <p class="mb-0">PHP-FPM manages the workers that execute your application. OPcache stores compiled PHP bytecode in memory for reuse, reducing repeated compilation work when WordPress and other PHP applications handle new requests.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="fas fa-money-check-alt icon-size-lg color-primary"></span>
                            </div>
                            <div class="pt-2 pb-3">
                                <h3 class="h5">Global CDN and Edge Caching</h3>
                                <p class="mb-0">Deliver eligible cached pages and assets from edge locations closer to visitors. This reduces the distance content travels and the number of repeat requests that need to reach your origin hosting.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="fas fa-hand-holding-usd icon-size-lg color-primary"></span>
                            </div>
                            <div class="pt-2 pb-3">
                                <h3 class="h5">Website Acceleration Tools</h3>
                                <p class="mb-0">Reduce the amount of data visitors need to download with image optimisation and CSS/JavaScript minification tools. A lighter page complements fast server processing by shortening the work required to load its assets.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="feature-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between pb-40">
                <div class="col-md-7 col-lg-5">
                    <div class="feature-content-wrap">
                        <h2>Start Building with One-Click App Installation</h2>
                        <p>Install WordPress, Joomla, Drupal and other supported applications from your hosting control panel. The installer prepares the application files and database connection, so you can move straight into building your website.</p>
                        <p>Launch a business site, publish your first article or begin setting up your store with hosting, email and databases managed in one place.</p>

                    </div>
                </div>
                <div class="col-md-5 col-lg-6 d-none d-md-block d-lg-block">
                    <div class="feature-img-wrap text-center">
                        <img src="/wp-content/uploads/2024/03/Auto-Script-Installers.svg" alt="1 click install" class="img-fluid" width="550" height="503" />
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between mt-5">
                <div class="col-md-5 col-lg-6 d-none d-md-block d-lg-block">
                    <div class="feature-img-wrap text-center">
                        <img src="/wp-content/uploads/2024/03/Load-Balancing-Server.svg" style="width: 100%; height: auto;" alt="Load Balancing Server" class="img-fluid" width="963" height="488" />
                    </div>
                </div>
                <div class="col-md-7 col-lg-5">
                    <div class="feature-content-wrap">
                        <h2>More Traffic. More Processing Power.</h2>
                        <p>A successful campaign brings more visitors, product searches and checkout requests. Each uncached request needs CPU time and memory. Our shared cloud platform responds by scaling CPU and RAM capacity across multiple backend web servers.</p>
                        <p>Load balancing distributes incoming HTTP and HTTPS requests across the available servers, helping reduce processing queues. Autoscaling supplies additional capacity; load balancing puts that capacity to work. Together, they give your website room to handle more simultaneous activity without fixed account-wide CloudLinux LVE CPU or RAM caps.</p>
                        <p>Server availability is monitored alongside traffic load. If a backend web server becomes unavailable, requests can be directed to healthy servers, adding resilience to the same architecture that handles growing demand.</p>
                        <a href="<?php echo esc_url( home_url( '/shared-web-hosting/' ) ); ?>" class="btn btn-primary mt-3">Explore Shared Cloud Hosting</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ptb-60 primary-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-6">
                    <div class="cta-content-wrap text-white">
                        <h2 class="text-white h2">Talk Hosting with People Who Understand Your Website</h2>
                        <p>Planning a launch, choosing a platform or moving an existing site? Tell our team what you run and where you want to take it. Get help with hosting selection, migration and technical setup.</p>
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
                        <img src="/wp-content/uploads/2024/03/Contact-image.svg" alt="Contact Us" class="img-fluid" width="300" height="245" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service-section-wrap pt-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6">
                    <div class="section-heading text-center mb-5">
                        <h2>Manage Your Website. Keep Control of the Details.</h2>
                        <p>Everyday hosting tasks belong in one accessible dashboard, with technical help available when you need it.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6">
                    <div class="single-service p-5 rounded border gray-light-bg">
                        <div class="service-header d-flex align-items-center justify-content-between">
                            <h3 class="h4">Hosting Control Panel</h3>

                        </div>
                        <p>Manage website files, email accounts, MySQL databases and application installations from one place. Handle routine changes without administering the underlying servers.</p>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="single-service p-5 rounded border gray-light-bg">
                        <div class="service-header d-flex align-items-center justify-content-between">
                            <h3 class="h4">WordPress Setup</h3>

                        </div>
                        <p>Install WordPress through the application installer and connect it to your domain. Start shaping your content and design with hosting essentials already in place.</p>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="single-service p-5 rounded border gray-light-bg">
                        <div class="service-header d-flex align-items-center justify-content-between">
                            <h3 class="h4">Performance Controls</h3>

                        </div>
                        <p>Use the available caching and optimisation tools to manage content delivery and page weight. Adjust how your website's assets are served as you develop and update it.</p>

                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="single-service p-5 rounded border gray-light-bg">
                        <div class="service-header d-flex align-items-center justify-content-between">
                            <h3 class="h4">Free Migration Assistance</h3>

                        </div>
                        <p>Move with help transferring website files, databases and email. Our team guides the transition from your existing provider and helps you connect the transferred website to your domain.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="network-map-section pt-80 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-6">
                    <div class="section-heading text-center mb-3">
                        <h2 class="h2">Deliver Cached Content Closer to Your Audience</h2>
                        <p>Your visitors can be anywhere. Our global CDN serves eligible cached content from edge locations closer to them, reducing the distance images, stylesheets, scripts and cached pages need to travel.</p>
                        <p>Your hosting origin runs the application and processes dynamic requests. CDN edge locations handle cached delivery, giving each part of the infrastructure a clear role.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="network-map-wrap">
                        <img src="/wp-content/uploads/2024/03/map-location.png" srcset="/wp-content/uploads/2024/03/map-location-300x183.png 300w, /wp-content/uploads/2024/03/map-location-768x467.png 768w, /wp-content/uploads/2024/03/map-location-1024x623.png 1024w, /wp-content/uploads/2024/03/map-location.png 1218w" sizes="(min-width: 1280px) 1218px, calc(100vw - 30px)" alt="MW Hoster Map" class="img-fluid" width="1218" height="741" />
                        <p class="text-center">Global CDN coverage supports content delivery; edge locations are separate from your website's hosting origin.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--testimonial section start
    <section class="review-section pt-60 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6">
                    <div class="section-heading text-center">
                        <h3 class="h2">Trusted by Clients All Over the Globe</h3>
                        <p>We take pride in our global reputation for reliability and excellence! See why clients choose MWHoster for their hosting needs in the reviews below. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme client-testimonial-1 dot-bottom-center custom-dot">
                        <div class="item">
                            <div class="border single-review-wrap bg-white p-4 m-3">
                                <div class="review-body">
                                    <p>I've been using MWHoster service for quite a long, and their reliability is impeccable. From uptime to customer service, they excel in every aspect. Whenever I've had an issue, their support team has been quick to get back to me and resolve it, ensuring my website stays online and running smoothly. </p>
                                </div>
                                <div class="review-author d-flex align-items-center">
                                    <div class="review-info">
                                        <h6 class="mb-0">William Clark</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="border single-review-wrap bg-white p-4 m-3">
                                <div class="review-body">
                                    <p>I've tried many web hosting providers, but MWHoster exceeds them all. Their consistency and affordability make them the best choice for me. Not only do they provide web hosting solutions, but their pricing is remarkably reasonable. Choosing them for my website hosting was the perfect decision I made. I highly recommend this platform.</p>
                                </div>
                                <div class="review-author d-flex align-items-center">
                                    <div class="review-info">
                                        <h6 class="mb-0">Hannan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="border single-review-wrap bg-white p-4 m-3">
                                <div class="review-body">
                                    <p>MWHoster has become my go-to company. They genuinely care about their clients and go miles to ensure satisfaction. They not only provided reliability but also exceptional support. If you're in need of a reliable company for domain and hosting in Pakistan, MWHoster is the right pick! </p>
                                </div>
                                <div class="review-author d-flex align-items-center">
                                    <div class="review-info">
                                        <h6 class="mb-0">Wasi</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="border single-review-wrap bg-white p-4 m-3">
                                <div class="review-body">
                                    <p>
In recent days, I've engaged in live chat multiple times and have consistently found the service to be excellent. The level of customer support provided has been truly satisfying.</p>
                                </div>
                                <div class="review-author d-flex align-items-center">
                                    <div class="review-info">
                                        <h6 class="mb-0">Ethan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="border single-review-wrap bg-white p-4 m-3">
                                <div class="review-body">
                                    <p>I reached out to them via the website's chat feature to cancel a migration request from managed WordPress to cPanel, as I successfully completed the task independently. Within minutes, they promptly cancelled the request and refunded the charge.</p>
                                </div>
                                <div class="review-author d-flex align-items-center">
                                    <div class="review-info">
                                        <h6 class="mb-0">Hammad</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="border single-review-wrap bg-white p-4 m-3">
                                <div class="review-body">
                                    <p>The services offered are top-notch, striking a perfect balance between quality and affordability, while their staff and customer support remain highly responsive. I highly recommend their Alpha Cloud web hosting package for its exceptional specifications at a very reasonable price.</p>
                                </div>
                                <div class="review-author d-flex align-items-center">
                                    <div class="review-info">
                                        <h6 class="mb-0">Shane</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="border single-review-wrap bg-white p-4 m-3">
                                <div class="review-body">
                                    <p>I wanted to express my gratitude for the exceptional assistance I received during my recent troubleshooting request, which happened to be my first.Technical team efficiently isolated and resolved the issue with my crashed site much faster than I could have anticipated.</p>
                                </div>
                                <div class="review-author d-flex align-items-center">
                                    <div class="review-info">
                                        <h6 class="mb-0">Faizan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="item">
                            <div class="border single-review-wrap bg-white p-4 m-3">
                                <div class="review-body">
                                    <p>
Their services are of the highest quality, achieving an ideal harmony between excellence and affordability. Coupled with their attentive and responsive staff and customer support, I enthusiastically endorse their Alpha Cloud web hosting package for its outstanding features offered at an exceptionally reasonable price.</p>
                                </div>
                                <div class="review-author d-flex align-items-center">
                                    <div class="review-info">
                                        <h6 class="mb-0">Arham</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    testimonial section end-->

    <section class="client-section  pt-80 pb-40 gray-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="section-heading  mb-5">
                        <h2 class="text-center mb-4">Launch with Confidence. Grow on Autoscaling Cloud Hosting.</h2>
                        <p>Give your next website a technical foundation for real visitors and real transactions: NVMe SSD storage, scalable CPU and RAM, free SSL and technical support. Choose a shared cloud plan for a new project, or bring your existing website over with free migration assistance.</p>
                        <div class="action-btns mt-4"><a href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>" class="btn btn-primary">Compare Hosting Plans</a> <a href="https://api.whatsapp.com/send/?phone=923180049011&text=Need+Help%3F&type=phone_number&app_absent=0" class="btn btn-outline-primary" target="_blank">Move My Website</a></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section id="faq" class="ptb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-9">
                    <div class="section-heading text-center mb-5">
                        <h2>Web Hosting Questions, Answered</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="accordion faq-wrap" id="accordionExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="homeHeading0"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#homeAnswer0" aria-expanded="true" aria-controls="homeAnswer0">Which MWHoster hosting service should I choose?</button></h3>
                            <div class="accordion-collapse collapse show" id="homeAnswer0" aria-labelledby="homeHeading0" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Choose <a href="<?php echo esc_url( home_url( '/shared-web-hosting/' ) ); ?>">shared cloud hosting</a> for business websites, portfolios, blogs and PHP/MySQL projects. Explore our <a href="<?php echo esc_url( home_url( '/wordpress-web-hosting/' ) ); ?>">WordPress hosting</a> range for WordPress-focused requirements, or <a href="<?php echo esc_url( home_url( '/windows-web-hosting/' ) ); ?>">Windows hosting</a> for applications that need a Windows server environment. Each product page shows its available plans.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="homeHeading1"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#homeAnswer1" aria-expanded="false" aria-controls="homeAnswer1">What makes your shared cloud hosting scalable?</button></h3>
                            <div class="accordion-collapse collapse" id="homeAnswer1" aria-labelledby="homeHeading1" data-bs-parent="#accordionExample">
                                <div class="accordion-body">CPU and RAM capacity scale with demand across multiple backend web servers. Load balancing distributes incoming requests across that capacity. Your shared cloud account is not assigned a fixed CPU or RAM quota through CloudLinux LVE, the system some hosts use to set account resource limits.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="homeHeading2"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#homeAnswer2" aria-expanded="false" aria-controls="homeAnswer2">Is NVMe SSD storage included?</button></h3>
                            <div class="accordion-collapse collapse" id="homeAnswer2" aria-labelledby="homeHeading2" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Yes. Our hosting plans use NVMe SSD storage. NVMe is designed for fast, parallel storage operations; the plan you choose determines how much storage space is included.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="homeHeading3"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#homeAnswer3" aria-expanded="false" aria-controls="homeAnswer3">Can you help me move from another hosting provider?</button></h3>
                            <div class="accordion-collapse collapse" id="homeAnswer3" aria-labelledby="homeHeading3" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Yes. Free migration assistance covers help transferring website files, databases and email. Our team can guide a move from cPanel, Plesk or DirectAdmin hosting and review other environments with you. <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact us</a> to start planning your transfer.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="homeHeading4"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#homeAnswer4" aria-expanded="false" aria-controls="homeAnswer4">Can I install WordPress and manage hosting myself?</button></h3>
                            <div class="accordion-collapse collapse" id="homeAnswer4" aria-labelledby="homeHeading4" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Yes. The hosting control panel includes an application installer for WordPress and other supported applications. You can also manage website files, MySQL databases and email accounts from the dashboard, without managing the servers.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="homeHeading5"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#homeAnswer5" aria-expanded="false" aria-controls="homeAnswer5">How do I contact technical support?</button></h3>
                            <div class="accordion-collapse collapse" id="homeAnswer5" aria-labelledby="homeHeading5" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Contact our support team through a ticket, WhatsApp or <a href="mailto:support@mwhoster.com">support@mwhoster.com</a>. Technical support is available 24/7 for hosting setup, account questions and troubleshooting.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="homeHeading6"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#homeAnswer6" aria-expanded="false" aria-controls="homeAnswer6">How do I order and activate my hosting?</button></h3>
                            <div class="accordion-collapse collapse" id="homeAnswer6" aria-labelledby="homeHeading6" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Choose a plan, complete checkout and follow the payment-verification instructions. The current process requires a payment screenshot through WhatsApp support or a ticket. Hosting is activated after payment verification, and access details are sent by email.</div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="homeHeading7"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#homeAnswer7" aria-expanded="false" aria-controls="homeAnswer7">When would I need to upgrade my plan?</button></h3>
                            <div class="accordion-collapse collapse" id="homeAnswer7" aria-labelledby="homeHeading7" data-bs-parent="#accordionExample">
                                <div class="accordion-body">Upgrade when you need more storage, websites, email accounts, databases or data transfer than your current package includes. CPU and RAM autoscaling are part of the shared cloud platform; the plan cards show the commercial allocations available at each level.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
