<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section, opens the <body> tag and adds the site's header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$viewport_content = apply_filters( 'hello_elementor_viewport_content', 'width=device-width, initial-scale=1' );
$enable_skip_link = apply_filters( 'hello_elementor_enable_skip_link', true );
$skip_link_url = apply_filters( 'hello_elementor_skip_link_url', '#content' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="<?php echo esc_attr( $viewport_content ); ?>">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="google-site-verification" content="PbW5CGLu_eW89f2qss6FuqokTXb4ifp3oy_yTtOwIZk" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
	
	


<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "MW Hoster",
  "url": "https://mwhoster.com/",
  "logo": "https://www.mwhoster.com/wp-content/uploads/2024/06/logo-mw.png",
  "sameAs": [
    "https://www.facebook.com/mwhoster/",
    "https://www.instagram.com/mwhoster0/",
    "https://www.linkedin.com/in/mw-hoster-6439b3193/",
    "https://www.pinterest.com/mwhoster/"
  ]
}
</script>	
<?php if ( is_page_template( 'dist/shared-web-hosting.php' ) ) : ?>
<script type="application/ld+json">
<?php echo wp_json_encode( array(
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Shared Web Hosting',
    'serviceType' => 'Shared Web Hosting',
    'description' => 'Shared web hosting with NVMe SSD storage, free SSL, DDoS protection and technical support.',
    'url' => get_permalink(),
    'provider' => array( '@type' => 'Organization', 'name' => 'MWHoster', 'url' => home_url( '/' ) ),
) ); ?>
</script>
<?php else : ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Shared Web Hosting",
  "serviceType": "Web Hosting Services",
  "description": "Affordable and reliable shared hosting with cPanel, 99.9% uptime, and 24/7 support. Ideal for bloggers, startups, and small businesses.",
  "provider": {
    "@type": "Organization",
    "name": "mwhoster",
    "url": "https://www.mwhoster.com",
    "logo": "https://www.mwhoster.com/wp-content/uploads/2024/06/logo-mw.png",
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+92-341-7847612",
      "contactType": "Customer Support",
      "areaServed": "PK",
      "availableLanguage": ["English"]
    }
  },
  "areaServed": {
    "@type": "Country",
    "name": "Pakistan"
  },
  "url": "https://www.mwhoster.com/shared-web-hosting/",
  "offers": {
    "@type": "Offer",
    "priceCurrency": "USD",
    "price": "9.99",
    "priceSpecification": {
      "@type": "UnitPriceSpecification",
      "price": 9.99,
      "priceCurrency": "USD",
      "billingDuration": "1",
      "billingIncrement": "Year"
    },
    "availability": "https://schema.org/InStock",
    "url": "https://www.mwhoster.com/shared-web-hosting/"
  }
}
</script>
<?php endif; ?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

	
	    <!--header section start-->
    <header id="header" class="header-main">
        <!--main header menu start-->
        <div id="logoAndNav" class="main-header-menu-wrap bg-transparent1 fixed-top1">
            <div class="container">
                <nav class="js-mega-menu navbar navbar-expand-md header-nav">
                    <!--logo start-->
                    <a class="navbar-brand pt-0 mw-logo" href="/">
                        <img src="<?php echo esc_url( mwhoster_image_url( 'assets/img/optimized/logo-mw-600.webp' ) ); ?>" alt="logo" class="mwhoster-eager no-lazyload" loading="eager" width="600" height="224" />
                    </a>
<!-- 					<a href="/" class="logo-text"><span>MW</span>HOSTER</a> -->
                    <!--logo end-->

                    <!--responsive toggle button start-->
                    <button type="button" class="navbar-toggler btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-label="Open navigation">
                        <span id="hamburgerTrigger">
            <span class="fas fa-bars"></span>
                        </span>
                    </button>
                    <!--responsive toggle button end-->

                    <!--main menu start-->
                    <div id="navBar" class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto main-navbar-nav">
                           
                           <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link" href="/home">
                                    Home
                                </a>
                            </li>
                            <!--hosting start-->
                            <li class="nav-item hs-has-mega-menu custom-nav-item position-relative" data-position="center">
                                <a id="hostingMegaMenu" class="nav-link custom-nav-link main-link-toggle" role="button" tabindex="0" aria-haspopup="true" aria-expanded="false">
                                    Hosting
                                </a>
                                <!-- Demos - Mega Menu -->
                                <div class="hs-mega-menu main-sub-menu" style="width: 715px;" aria-labelledby="hostingMegaMenu">
                                    <div class="row g-0">
                                        <div class="col-md-6">
                                            <div class="menu-item-wrap py-0 p-md-3 p-lg-3">
                                                <!--menu title with subtitle and icon item start-->
                                                <div class="title-with-icon-item">
                                                    <a class="title-with-icon-link" href="/shared-web-hosting/">
                                                        <div class="d-flex align-items-center">
                                                            <div class="menu-item-icon pe-3">
                                                                <i
                                class="fas fa-server rounded-circle primary-bg"
                              ></i>
                                                            </div>
                                                            <div class="media-body">
                                                                <span class="u-header__promo-title">
																	Shared Web Hosting
																</span>
                                                                <small class="u-header__promo-text">
                                                                     Starting from
                                                                    <strong>$9.99/y</strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!--menu title with subtitle and icon item end-->
                                                <!--menu title with subtitle and icon item start-->
                                                <div class="title-with-icon-item">
                                                    <a class="title-with-icon-link" href="/wordpress-web-hosting/">
                                                        <div class="d-flex align-items-center">
                                                            <div class="menu-item-icon pe-3">
                                                                <i class="fab fa-wordpress rounded-circle twitter-bg"></i>
                                                            </div>
                                                            <div class="media-body">
                                                               <span class="u-header__promo-title">Wordpress Hosting</span>
                                                                <small class="u-header__promo-text">
                                                                      Starting from
                                                                    <strong>$49.99/y</strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!--menu title with subtitle and icon item end-->
                                                <!--menu title with subtitle and icon item start-->
                                                <div class="title-with-icon-item">
                                                    <a class="title-with-icon-link" href="/windows-web-hosting/">
                                                        <div class="d-flex align-items-center">
                                                            <div class="menu-item-icon pe-3">
                                                                <i class="fab fa-windows rounded-circle bg-success"></i>
                                                            </div>
                                                            <div class="media-body">
                                                                <span class="u-header__promo-title">Windows Hosting</span>
                                                                <small class="u-header__promo-text">
                                                                      Starting from
                                                                    <strong>$4.99/y</strong>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!--menu title with subtitle and icon item end-->
                                            </div>
                                        </div>
										
<!-- 										 -->
<div class="col-md-6 col-sm-6 gray-light-bg custom-radius-right">
                                            <div class="menu-item-wrap p-4">
<!--                                                 <h6>#1 Web Hosting Company</h6> -->
												<img src="/wp-content/uploads/2024/03/Ensure-Peak-Server.svg" class="img-fluid" width="250" height="244" />
<!--                                                 <ul class="list-unstyled tech-feature-list">
                                                    <li class="py-1">
                                                        <a href="/pk">
															<small>
																<span class="fas fa-check-circle text-success me-2"></span>
																Web Hosting in Pakistan
															</small>
														</a>  
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#">
															<small>
																<span class="fas fa-check-circle text-success me-2"></span>
																Web Hosting in USA
															</small>
														</a>  
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#">
															<small>
																<span class="fas fa-check-circle text-success me-2"></span>
																Web Hosting in Canada
															</small>
														</a>  
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#">
															<small>
																<span class="fas fa-check-circle text-success me-2"></span>
																Web Hosting in UK
															</small>
														</a>  
                                                    </li>
                                                </ul>
                                                <a class="btn btn-tertiary btn-block mt-3" href="#">
                                                    Learn More
                                                    <span class="fas fa-angle-right ms-2"></span>
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!--application hosting start-->
                                    <div class="application-hosting text-white">
                                        <span
                    class="sub-menu-title text-lg-center text-md-center text-white mb-3"
                  >
                    Application For Hosting
                  </span>
                                        <ul class="application-hosting-list">
                                            <li>
                                                <a href="/wordpress-web-hosting/">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/wordpress-icon-color.svg" alt="icon" />
                                                    WordPress Hosting
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/shared-web-hosting/">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/joomla-icon-color.svg" alt="icon" />
                                                    Joomla Hosting
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/shared-web-hosting/">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/magento-icon-color.svg" alt="icon" />
                                                    Magento Hosting
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/shared-web-hosting/">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/opencart-icon-color.svg" alt="icon" />
                                                    Opencart Hosting
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/shared-web-hosting/">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/prestashop-icon-color.svg" alt="icon" />
                                                    Prestashop Hosting
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/shared-web-hosting/">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/icons/drupal-icon-color.svg" alt="icon" />
                                                    Drupal Hosting
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--application hosting end-->
                                </div>
                                <!-- End Demos - Mega Menu -->
                            </li>
                            <!--hosting end-->
                            <!--domain start-->
                            <li class="nav-item hs-has-mega-menu custom-nav-item position-relative" data-position="center">
                                <a id="domainMegaMenu" class="nav-link custom-nav-link main-link-toggle" role="button" tabindex="0" aria-haspopup="true" aria-expanded="false">
                                    Domain
                                </a>
                                <!-- Demos - Mega Menu -->
                                <div class="hs-mega-menu main-sub-menu" style="width: 660px;" aria-labelledby="domainMegaMenu">
                                    <div class="row g-0">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="menu-item-wrap p-3">
                                                <!--menu title with subtitle and icon item start-->
                                                <div class="title-with-icon-item">
                                                    <a class="title-with-icon-link" href="/domain-registration">
                                                        <div class="d-flex align-items-center pb-1">
                                                            <i class="fas fa-globe me-2 color-primary"></i>
                                                            <span class="u-header__promo-title">
                                                                 Domain Registration
                                                             </span>
                                                        </div>
                                                        <small class="u-header__promo-text">
                                                            Find the perfect domain for your business
                                                        </small>
                                                    </a>
                                                </div>
                                                <!--menu title with subtitle and icon item end-->
                                                <!--menu title with subtitle and icon item start-->
<!--                                                 <div class="title-with-icon-item">
                                                    <a class="title-with-icon-link" href="/domain-transfer/">
                                                        <div class="d-flex align-items-center pb-1">
                                                            <i
                              class="fas fa-exchange-alt me-2 color-accent"
                            ></i>
                                                            <span class="u-header__promo-title">
															  Domain Transfer
															</span>
                                                        </div>
                                                        <small class="u-header__promo-text">
                                                            Transfer your domain easily
                                                        </small>
                                                    </a>
                                                </div> -->
                                                <!--menu title with subtitle and icon item end-->
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 gray-light-bg custom-radius-right">
                                            <div class="menu-item-wrap p-4">
                                                <h6>#1 Web Hosting Company</h6>
                                                <ul class="list-unstyled tech-feature-list">
                                                    <li class="py-1">
                                                        <small>
                                                            <span
                              class="fas fa-check-circle text-success me-2"
                            ></span>
                                                            <strong>Flexible</strong>
                                                            Easy to Use Control Panel
                                                        </small>
                                                    </li>
                                                    <li class="py-1">
                                                        <small>
                                                            <span
                              class="fas fa-check-circle text-success me-2"
                            ></span>
                                                            <strong>99%</strong>
                                                            Uptime Guarantee
                                                        </small>
                                                    </li>
                                                    <li class="py-1">
                                                        <small>
                                                            <span
                              class="fas fa-check-circle text-success me-2"
                            ></span>
                                                            <strong>45-Day</strong>
                                                            Money-Back Guarantee
                                                        </small>
                                                    </li>
                                                    <li class="py-1">
                                                        <small>
                                                            <span
                              class="fas fa-check-circle text-success me-2"
                            ></span>
                                                            <strong>Free SSL</strong>
                                                            Certificate Included
                                                        </small>
                                                    </li>
                                                </ul>
<!--                                                 <a class="btn btn-tertiary btn-block mt-3" href="#">
                                                    Learn More
                                                    <span class="fas fa-angle-right ms-2"></span>
                                                </a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Demos - Mega Menu -->
                            </li>
                            <!--domain end-->
							<li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link" href="/blog">
                                    Blog
                                </a>
                            </li>
							
							<li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link" href="/guide/">
                                    Guide
                                </a>
                            </li>

                            <!--button start-->
                            <li class="nav-item header-nav-last-item d-flex align-items-center">
                                <a class="btn btn-tertiary animated-btn" href="https://webmail.mwhoster.com/" target="_blank">
                                    <span class="fa fa-envelope pe-2"></span>
                                    WebMail
                                </a>
                            </li>
							<li class="nav-item header-nav-last-item d-flex align-items-center">
                                <a class="btn btn-tertiary animated-btn" href="https://mwhoster.com/clientarea/clientarea.php" target="_blank">
                                    <span class="fa fa-user pe-2"></span>
                                    Login
                                </a>
                            </li>
                            <!--button end-->
                        </ul>
                    </div>
                    <!--main menu end-->
                </nav>
            </div>
        </div>
        <!--main header menu end-->

        <!--offcanvas menu start-->
        <div class="offcanvas offcanvas-start" id="offcanvasLeft" tabindex="-1">
            <div class="offcanvas-header border-bottom">
<!--                 <a class="navbar-brand" href="index.html">
                    <img src="<?php// echo get_stylesheet_directory_uri(); ?>/assets/img/logo-color.png" alt="logo" class="img-fluid" />
                </a> -->
				<a href="/" class="mw-menu-text">MWHOSTER</a>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body offcanvas-menu-wrap">
                <!--offcanvas menu list start-->
                <ul class="navbar-nav">
                    
					        <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link" href="/">
                                    Home
                                </a>
                            </li>
                    <!--hosting item start-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Hosting
                        </a>
                        <div class="dropdown-menu p-0">
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="menu-item-wrap py-0 p-md-3 p-lg-3">
                                        <!--menu title with subtitle and icon item start-->
                                        <div class="title-with-icon-item">
                                            <a class="title-with-icon-link" href="/shared-web-hosting/">
                                                <div class="d-flex align-items-center">
                                                    <div class="menu-item-icon pe-3">
                                                        <i class="fas fa-server rounded-circle primary-bg"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="u-header__promo-title">Shared Web Hosting</span>
                                                        <small class="u-header__promo-text">
                                                            Starting from
                                                            <strong>$9.99/y</strong>
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--menu title with subtitle and icon item end-->
                                        <!--menu title with subtitle and icon item start-->
                                        <div class="title-with-icon-item">
                                            <a class="title-with-icon-link" href="/wordpress-web-hosting/">
                                                <div class="d-flex align-items-center">
                                                    <div class="menu-item-icon pe-3">
                                                        <i class="fab fa-wordpress rounded-circle twitter-bg"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="u-header__promo-title">Wordpress Hosting</span>
                                                        <small class="u-header__promo-text">
                                                            Starting from
                                                            <strong>$49.99/y</strong>
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--menu title with subtitle and icon item end-->
                                        <!--menu title with subtitle and icon item start-->
                                        <div class="title-with-icon-item">
                                            <a class="title-with-icon-link" href="/windows-web-hosting/">
                                                <div class="d-flex align-items-center">
                                                    <div class="menu-item-icon pe-3">
                                                        <i class="fab fa-windows rounded-circle bg-success"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <span class="u-header__promo-title"> Windows Hosting</span>
                                                        <small class="u-header__promo-text">
                                                             Starting from
                                                            <strong>$4.99/y</strong>
                                                        </small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!--menu title with subtitle and icon item end-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link custom-nav-link web-hosting-offer" href="/starter-offer">
                            Web Hosting Offer
                        </a>
                    </li>
                    <!--hosting item end-->

                    <!--domain item start-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Domain
                        </a>
                        <div class="dropdown-menu p-0">
                            <div class="row g-0">
                                <div class="">
                                    <div class="menu-item-wrap p-3">
                                        <!--menu title with subtitle and icon item start-->
                                        <div class="title-with-icon-item">
                                            <a class="title-with-icon-link" href="/domain-registration">
                                                <div class="d-flex align-items-center pb-1">
                                                    <i class="fas fa-globe me-2 color-primary"></i>
                                                    <span class="u-header__promo-title">Domain Registration</span>
                                                </div>
                                                <small class="u-header__promo-text">
                                                    Find the perfect domain for your business
                                                </small>
                                            </a>
                                        </div>
                                        <!--menu title with subtitle and icon item end-->
                                        <!--menu title with subtitle and icon item start-->
<!--                                         <div class="title-with-icon-item">
                                            <a class="title-with-icon-link" href="/domain-transfer/">
                                                <div class="d-flex align-items-center pb-1">
                                                    <i class="fas fa-exchange-alt me-2 color-accent"></i>
                                                    <span class="u-header__promo-title"> Domain Transfer</span>
                                                </div>
                                                <small class="u-header__promo-text">
                                                    Transfer your domain easily
                                                </small>
                                            </a>
                                        </div> -->
                                        <!--menu title with subtitle and icon item end-->
                                    </div>
                                </div>
                                <div class="gray-light-bg">
                                    <div class="menu-item-wrap p-4">
                                        <h6>#1 Web Hosting Company</h6>
                                        <ul class="list-unstyled tech-feature-list">
                                            <li class="py-1">
                                                <small>
                                                    <span
                          class="fas fa-check-circle text-success me-2"
                        ></span>
                                                    <strong>Flexible</strong>
                                                    Easy to Use Control Panel
                                                </small>
                                            </li>
                                            <li class="py-1">
                                                <small>
                                                    <span
                          class="fas fa-check-circle text-success me-2"
                        ></span>
                                                    <strong>99%</strong>
                                                    Uptime Guarantee
                                                </small>
                                            </li>
                                            <li class="py-1">
                                                <small>
                                                    <span
                          class="fas fa-check-circle text-success me-2"
                        ></span>
                                                    <strong>45-Day</strong>
                                                    Money-Back Guarantee
                                                </small>
                                            </li>
                                            <li class="py-1">
                                                <small>
                                                    <span
                          class="fas fa-check-circle text-success me-2"
                        ></span>
                                                    <strong>Free SSL</strong>
                                                    Certificate Included
                                                </small>
                                            </li>
                                        </ul>
<!--                                         <a class="btn btn-tertiary btn-block mt-3" href="#">
                                            Learn More
                                            <span class="fas fa-angle-right ms-2"></span>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!--domain item end-->

                    <!--affiliate item end-->
                           	<li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link" href="/blog">
                                    Blog
                                </a>
                            </li>
					
					        <li class="nav-item custom-nav-item">
                                <a class="nav-link custom-nav-link" href="/guide/">
                                    Guide
                                </a>
                            </li>

                    <!--button start-->
                    <li class="nav-item header-nav-last-item d-flex align-items-center mt-3">
                        <a style="margin-right:10px;" class="btn btn-tertiary animated-btn" href="https://mwhoster.com/clientarea/clientarea.php" target="_blank">
                            <span class="fa fa-user pe-2"></span>
                            Login
                        </a>
						  <a class="btn btn-tertiary animated-btn" href="https://webmail.mwhoster.com/" target="_blank">
                            <span class="fa fa-envelope pe-2"></span>
                            WebMail
                        </a>
                    </li>
                    <!--button end-->
                </ul>
                <!--offcanvas menu list end-->
            </div>
        </div>
        <!--offcanvas menu end-->
    </header>
    <!--header section end-->
