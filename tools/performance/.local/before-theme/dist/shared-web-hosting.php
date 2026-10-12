<?php
/* Template Name: Shared Hosting
 * Template Post Type: post, page
 */
?>

<?php
// Page-specific SEO: retain the existing Yoast output and canonical handling.
$shared_title = 'Shared Web Hosting | NVMe SSD Cloud Hosting | MWHoster';
$shared_description = 'Compare MWHoster shared web hosting plans with NVMe SSD storage, free SSL, DDoS protection and technical support. Find the right plan for your website.';
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
</style>



    <div class="main shared-hosting-page">

        <!--hero section start-->
        <section class="ptb-120 gradient-bg">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-md-6 col-lg-6">
                        <div class="hero-content-wrap text-white">
                            <h1 class="text-white pt-3">Shared Web Hosting with NVMe SSD Performance
</h1>
                            <p class="lead">Affordable web hosting for businesses, freelancers and website owners. Get NVMe SSD storage, free SSL and technical support on a cloud platform built to handle changing demand.
</p>
                      
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-5">
                        <div class="big-price-wrap position-relative">
                            <div class="price-block d-flex justify-content-center text-white">
                                <span class="price-currency">Rs.</span>
                                <div class="offer-price">250</div>
                                <div class="right-block d-flex">
                                    <span class="cent-value">.00</span>
                                    <span class="per-value">/m</span>
                                </div>
                            </div>
<!--                             <span class="d-block text-white regular-price text-center">Regular Price <strong>$10.99</strong> *</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--hero section end-->

		        <!--application hosting promo start-->
        <section class="pt-80 pb-40 gray-light-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-9">
                        <div class="section-heading text-center mb-5">
                            <h2>Shared web hosting for your next website</h2>
<p>Shared web hosting lets multiple websites use managed hosting infrastructure, keeping costs accessible without requiring you to administer a server. MWHoster combines cloud hosting technology with defined plans for business websites, developer projects, blogs and portfolios.</p>
<p>Every plan includes NVMe SSD storage, email accounts, MySQL databases, free SSL and technical support. Choose the website, storage and bandwidth allowances that fit your project, then manage day-to-day tasks through the included hosting control panel.</p>
<p>Slow pages can cost enquiries and leave shoppers abandoning purchases. Our load-balanced, autoscaling platform helps reduce infrastructure bottlenecks, while your website code, content and plan limits also influence performance.</p>
							
							
                        </div>
                    </div>
                </div>

            </div>
        </section> <!--application hosting promo end-->
		        
        <!--pricing section start-->
        <section id="pricing" class="pricing-section pt-80 pb-100 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center mb-4">
                            <h2>Compare shared web hosting plans</h2>
                            <p>Compare the annual prices and allocations below. Choose affordable web hosting based on the number of websites, files, databases and email accounts you need, with room for growth.</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-md-center justify-content-center">
					<div class="col-lg-3 col-md-6 col-sm-8">
                        <div class="popular-price bg-white pricing-new-wrapper mt-4 shadow-sm border">
                            <div class="pricing-price d-flex justify-content-between align-items-center pb-4">
                                <span class="p-icon">
                                   <i class="fa-solid fa-volleyball color-secondary"></i>
                                 </span>
                                <div class="h2 mb-0 text-dark"> Rs.2999 <span class="price-cycle h5">/year</span>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <h3 class="h4">Starter Cloud</h3>
                                <p class="text-muted"> For personal websites, portfolios and small blogs. </p>
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
									<li> <i class="fas fa-lock me-2"></i><p><strong>Free</strong> SSL</p> </li>
                                    <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                                </ul>
<!--                                 <a href="pricing-specifications.html" class="mb-4 d-block read-more-link">Full specifications <i
                    class="fas fa-arrow-right ps-2"></i>
                                </a> -->
                                <a href="/clientarea/cart.php?a=add&pid=1" class="btn btn-primary btn-block" target="_blank">Order Now</a>
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
                            <div class="pricing-info">
                                <h3 class="h4">Alpha Cloud</h3>
                                <p class="text-muted"> For business websites and several small projects. </p>
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
									<li> <i class="fas fa-lock me-2"></i><p><strong>Free</strong> SSL</p> </li>
                                    <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                                </ul>
<!--                                 <a href="pricing-specifications.html" class="mb-4 d-block read-more-link">Full specifications <i
                    class="fas fa-arrow-right ps-2"></i>
                                </a> -->
                                <a href="/clientarea/cart.php?a=add&pid=3" class="btn btn-primary btn-block" target="_blank">Order Now</a>
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
                            <div class="pricing-info">
                                <h3 class="h4">Beta Cloud</h3>
                                <p class="text-muted"> For bloggers and freelancers managing more websites. </p>
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
									<li> <i class="fas fa-lock me-2"></i><p><strong>Free</strong> SSL</p> </li>
                                    <li> <i class="fas fa-headset me-2"></i> <p><strong>Free</strong> Technical Support </p> </li>
                                </ul>
<!--                                 <a href="pricing-specifications.html" class="mb-4 d-block read-more-link">Full specifications <i
                    class="fas fa-arrow-right ps-2"></i>
                                </a> -->
                                <a href="/clientarea/cart.php?a=add&pid=2" class="btn btn-primary btn-block" target="_blank">Order Now</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section> <!--pricing section end-->

        <!--feature section start-->
        <section id="features" class="feature-tab-section ptb-100 gray-light-bg">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-xl-5 col-lg-5 col-12 order-lg-last align-self-center">
                        <div class="image-box fadein text-xl-right text-center">
                            <img src="/wp-content/uploads/2024/03/Benefits-of-Shared-Web-Hosting.svg" alt="Shared Website Hosting" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-12 order-xl-first">
                        <h2>Practical benefits for everyday hosting</h2>
<p>Keep hosting costs manageable while giving your website a capable technical foundation.</p>
<div class="row pt-2"><div class="col-md-12 col-12"><ul class="disc-style">
<li><strong>Fast access:</strong> NVMe SSD storage supports fast file and database access for page requests and content updates.</li>
<li><strong>Simple management:</strong> Use the hosting control panel for files, email accounts, databases and application installation.</li>
<li><strong>Plan choice:</strong> Start with the allocations you need and discuss an upgrade as your website grows.</li>
<li><strong>Included SSL:</strong> Encrypt traffic between your website and visitors using HTTPS.</li>
<li><strong>Technical help:</strong> Get assistance with hosting setup and troubleshooting so you can focus on your website.</li>
</ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-lg-between mt-5">
                    <div class="col-xl-5 col-lg-5 col-12 order-lg-last align-self-center mob-botom">
                        <div class="image-box fadein text-xl-right text-center ">
                            <img src="/wp-content/uploads/2024/03/Web-Hosting-Migrations.svg" alt="Hosting Transfer" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-12 order-xl-last">
                        <h2>Better Hosting Starts with an Easier Move</h2>
<p>Give your website the speed, security and support it needs—with free migration assistance from MWHoster. Whether you run a business website, WordPress blog or online store, our team helps you transfer your website files, databases and email from your existing provider.</p>
<p>Moving from cPanel, Plesk or DirectAdmin? Get technical guidance through the transfer, website checks and domain connection, so you can make the move with confidence.</p>
<div class="row pt-2"><div class="col-md-12 col-12"><ul class="disc-style">
<li><strong>Free migration assistance</strong> for your website, databases and email.</li>
<li><strong>Expert guidance</strong> from initial assessment through to launch.</li>
<li><strong>A coordinated transition</strong> planned around your website and business needs.</li>
</ul>
                            </div>
                        </div>
                    </div>			
                </div>
				<div class="row align-items-center justify-content-lg-between pt-80">
                    <div class="col-xl-5 col-lg-5 col-12 order-lg-last align-self-center mob-botom">
                        <div class="image-box fadein text-xl-right text-center">
                            <img src="/wp-content/uploads/2024/03/Take-Advantage.svg" alt="benefits hosting" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-12 order-xl-first">
                        <h2>Your Next Traffic Surge Deserves More Server Power</h2>
<p>A successful campaign brings visitors ready to explore, enquire and buy. Give them a website that can handle the attention with NVMe SSD storage, intelligent load balancing and autoscaling cloud resources.</p>
<p>Our platform distributes incoming requests across multiple web servers and adjusts processing capacity as demand increases. This helps reduce server bottlenecks and slow responses when product launches, promotions or growing search traffic bring more customers to your website.</p>
<div class="row pt-2">
    <div class="col-md-12 col-12">
        <ul class="disc-style">
            <li><strong>NVMe SSD Performance:</strong> Fast access to website files and databases supports responsive browsing.</li>
            <li><strong>Intelligent Load Balancing:</strong> Distribute visitor requests across web servers to reduce congestion.</li>
            <li><strong>Autoscaling Cloud Resources:</strong> Adapt processing capacity to changing workloads and traffic spikes.</li>
            <li><strong>Layered Website Security:</strong> Combine DDoS protection, free SSL and automatic malware scanning.</li>
            <li><strong>Straightforward Hosting Management:</strong> Control website files, MySQL databases and email from one dashboard.</li>
            <li><strong>Expert Technical Support:</strong> Get help with setup, migration and everyday hosting questions.</li>
        </ul>
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--feature section end-->

       <!--promo section start-->
        <section class="promo-section ptb-100 ">
            <div class="container">
                <div class="row justify-content-md-center justify-content-sm-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                            <div class="card-body">
                                <div class="pb-2">
                                    <span class="fas fa-tools icon-size-lg color-primary"></span>
                                </div>
                                <div class="pt-2 pb-3">
                                    <h3 class="h5">Reliable Infrastructure</h3>
                                    <p class="mb-0">
                                       Load balancing spreads requests across available web servers, reducing reliance on a single server to process every visit. This supports resilience, but does not mean uninterrupted service or a guaranteed uptime percentage.
                                    </p>
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
                                    <h3 class="h5">Tools for website owners</h3>
                                    <p class="mb-0">
                                        Manage files, email and MySQL databases from the hosting control panel. Use the application installer to set up a CMS such as WordPress, then configure your website without managing the underlying servers.</p>

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
                                    <h3 class="h5">Security with a clear purpose</h3>
                                    <p class="mb-0">
                                      DDoS protection helps defend against traffic floods that disrupt availability. Automatic malware scanning helps identify suspicious files, while IP or country access controls let you restrict unwanted visitors. Keep your applications updated and protect your account credentials too.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--promo section end-->

        <!--call to action start-->
        <section class="ptb-60 primary-bg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-lg-6">
                        <div class="cta-content-wrap text-white">
                            <h2 class="text-white h2">
                               Talk to our hosting team
                            </h2>
                            <p>
                                Get help matching your website to a plan, checking application requirements or planning a migration. <a href="#pricing" class="text-white">Compare plans</a> or contact our team to discuss your setup.

                            </p>
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
                            <img src="/wp-content/uploads/2024/03/Contact-image.svg" alt="contact us" width="250" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--call to action end-->
        
        <!-- content paragrap-->
        <section class="client-section pt-80 pb-30 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="section-heading  mb-5">
                            <h2 class="text-center mb-4">Choose the best web hosting for your requirements</h2>
<p>Cheap web hosting is useful when it covers what your website actually needs. Compare storage, bandwidth, database capacity and support alongside the price. NVMe SSD hosting provides fast storage access, but efficient themes, optimised images and well-configured caching also matter for page speed.</p>
<p>Shared hosting suits portfolios, blogs and many small business websites. If your application needs dedicated resources or persistent server processes, discuss its requirements with our team before ordering.</p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        
		
        <!--services section start-->
        <section class="service-section-wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6">
                        <div class="section-heading text-center mb-5">
                            <h2>Hosting expertise for your website</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-4 col-lg-4">
                        <div class="single-service p-5 rounded border gray-light-bg">
                            <div class="service-header d-flex align-items-center justify-content-between">
                                <h3 class="h5">Privacy and Security</h3>
                            </div>
                            <p>Free SSL protects data in transit. DDoS protection and malware scanning address different threats; neither replaces secure website code, updates or independent backups.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="single-service p-5 rounded border gray-light-bg">
                            <div class="service-header d-flex align-items-center justify-content-between">
                                <h3 class="h5">Hosting that fits your application</h3>
                            </div>
                            <p>Choose shared hosting for general website projects, or explore <a href="/wordpress-web-hosting/">WordPress hosting</a> and <a href="/windows-web-hosting/">Windows hosting</a> for other requirements. Ask our team to check compatibility before you switch.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="single-service p-5 rounded border gray-light-bg">
                            <div class="service-header d-flex align-items-center justify-content-between">
                                <h3 class="h5">Dedicated Customer Support</h3>
                            </div>
                            <p>Technical support is included with each plan. Contact our team for hosting configuration and troubleshooting, and provide the affected domain and error details to help us investigate.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--services section end-->		
		
        <!-- content paragrap-->
        <section class="shared-launch-section" aria-labelledby="shared-launch-heading">
            <div class="container">
                <div class="shared-launch-card">
                    <span class="shared-launch-label">Your next step</span>
                    <h2 id="shared-launch-heading">Ready to launch or move your website?</h2>
                    <p class="shared-launch-copy">Choose a shared web hosting plan with the allocations your project needs. MWHoster brings together NVMe SSD storage, cloud platform capacity and technical support to make setup and everyday management easier.</p>
                    <div class="shared-launch-actions">
                        <a href="#pricing" class="btn btn-primary">Choose your hosting plan <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
                        <a href="/contact/" class="btn shared-launch-secondary">Ask a hosting question</a>
                    </div>
                </div>
            </div>
        </section>		
        
        <!--faq start-->
  <section id="faq" class="ptb-100 gray-light-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-6">
                        <div class="section-heading text-center mb-5">
                            <h2>Shared web hosting FAQs</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <div class="accordion faq-wrap" id="accordionExample">
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading0"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer0" aria-expanded="true" aria-controls="sharedAnswer0">Who is shared web hosting suitable for?</button></h3><div class="accordion-collapse collapse show" id="sharedAnswer0" aria-labelledby="sharedHeading0" data-bs-parent="#accordionExample"><div class="accordion-body">Shared web hosting suits business websites, freelancer portfolios, blogs and developer projects that fit the plan allocations. Check application requirements with support if you need dedicated resources or persistent server processes.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading1"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer1" aria-expanded="false" aria-controls="sharedAnswer1">What is included with each plan?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer1" aria-labelledby="sharedHeading1" data-bs-parent="#accordionExample"><div class="accordion-body">Each plan includes NVMe SSD storage, website hosting, email accounts, MySQL databases, free SSL, a hosting control panel and technical support. The plan cards show the allocations. Starter Cloud and Alpha Cloud do not include a domain; Beta Cloud lists a free domain for one year.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading2"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer2" aria-expanded="false" aria-controls="sharedAnswer2">Does autoscaling remove my plan limits?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer2" aria-labelledby="sharedHeading2" data-bs-parent="#accordionExample"><div class="accordion-body">No. Autoscaling adjusts processing capacity on the hosting platform as demand changes. Your purchased storage, website, database and bandwidth limits still apply. Items listed as unlimited do not mean unlimited processing power or storage; review the <a href="/terms-conditions/">service terms</a> and discuss sustained high usage with support.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading3"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer3" aria-expanded="false" aria-controls="sharedAnswer3">Can you help migrate my existing website?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer3" aria-labelledby="sharedHeading3" data-bs-parent="#accordionExample"><div class="accordion-body">Yes. Free migration assistance is available. Contact support with your current hosting details to confirm eligibility, scope and timing. Keep a backup and test the transferred website, databases and email before changing DNS. A website migration does not require a domain registration transfer.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading4"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer4" aria-expanded="false" aria-controls="sharedAnswer4">How is my website protected?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer4" aria-labelledby="sharedHeading4" data-bs-parent="#accordionExample"><div class="accordion-body">MWHoster offers DDoS protection to help mitigate disruptive traffic floods. Free SSL encrypts website traffic, automatic malware scanning helps identify suspicious files, and IP or country blocking restricts unwanted access. You remain responsible for secure passwords and application updates.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading5"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer5" aria-expanded="false" aria-controls="sharedAnswer5">Is a hosting control panel included?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer5" aria-labelledby="sharedHeading5" data-bs-parent="#accordionExample"><div class="accordion-body">Yes. The included hosting control panel provides tools to manage files, email accounts and databases, install applications and review hosting usage. Ask support if you need a particular control-panel feature.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading6"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer6" aria-expanded="false" aria-controls="sharedAnswer6">Can I install WordPress?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer6" aria-labelledby="sharedHeading6" data-bs-parent="#accordionExample"><div class="accordion-body">Yes. Use the hosting control panel’s application installer to set up WordPress. After installation, choose a theme, configure SSL and keep WordPress, themes and plugins updated. You can also compare our <a href="/wordpress-web-hosting/">WordPress hosting plans</a>.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading7"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer7" aria-expanded="false" aria-controls="sharedAnswer7">Can I upgrade as my website grows?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer7" aria-labelledby="sharedHeading7" data-bs-parent="#accordionExample"><div class="accordion-body">Contact support to arrange a plan upgrade when you need larger allocations or more websites. Confirm the price, billing adjustment and any migration requirements before proceeding.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading8"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer8" aria-expanded="false" aria-controls="sharedAnswer8">What support is included?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer8" aria-labelledby="sharedHeading8" data-bs-parent="#accordionExample"><div class="accordion-body">Free technical support is included with every listed plan for hosting setup and troubleshooting. Contact <a href="mailto:support@mwhoster.com">support@mwhoster.com</a> or use the <a href="/contact/">contact page</a>. Include your domain, the issue and any relevant error message.</div></div></div>
<div class="accordion-item"><h3 class="accordion-header" id="sharedHeading9"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sharedAnswer9" aria-expanded="false" aria-controls="sharedAnswer9">How do I order and activate hosting?</button></h3><div class="accordion-collapse collapse" id="sharedAnswer9" aria-labelledby="sharedHeading9" data-bs-parent="#accordionExample"><div class="accordion-body">Select Order Now on your chosen plan and complete checkout. Activation follows payment verification, and account access details are sent by email. The existing payment process requires a payment screenshot through chat support or a ticket; follow the instructions for your payment method and contact support if access details have not arrived.</div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

<?php get_footer(); ?>   