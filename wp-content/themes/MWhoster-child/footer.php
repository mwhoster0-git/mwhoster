<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */
?>
 
    <footer class="footer-1 ptb-60 gradient-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                    <a class="navbar-brand pt-0 mw-logo" href="/">
                        <img src="<?php echo esc_url( mwhoster_image_url( 'assets/img/optimized/logo-mw-600.webp' ) ); ?>" alt="logo" width="600" height="224" />
                    </a>
<!-- 					<a href="/" class="logo-text"><span>MW</span>HOSTER</a> -->
                    <br />
                    <p class="pt-3">We're a web hosting provider committed to empowering individuals and businesses online. With cutting-edge server technology with expert cutomer support.
                    </p>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="row mt-0">
                        <div class="col-sm-6 col-md-4 col-lg-4 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                            <h6 class="font-weight-normal">Our Products</h6>
                            <ul>
                                <li>
                                    <a href="/shared-web-hosting/">Shared Hosting</a>
                                </li>
                                <li>
                                    <a href="/wordpress-web-hosting/">Wordpress Hosting</a>
                                </li>
                                <li>
                                    <a href="/windows-web-hosting/">Windows Hosting</a>
                                </li>
								<li>
                                    <a href="/domain-registration">Domain Registration</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                            <h6 class="font-weight-normal">Company</h6>
                            <ul>
                                <li>
                                    <a href="/contact/">Contact</a>
                                </li>
								<li>
                                    <a  href="/privacy-policy/">Privacy Policy</a>
                                </li>
								<li>
                                   <a  href="/terms-conditions/">Terms & Condition</a>
                                </li>
								
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                            <h6 class="font-weight-normal">Contact info</h6>
                            <ul>
                                <li>
                                    <a href="tel:+923180049011"><i class="fas fa-phone me-2"></i> +92 318 0049011 </a>
                                </li>
                                <li>
									<a href="mailto:support@mwhoster.com"><i class="fas fa-envelope me-2"></i> support@mwhoster.com</a>
                                </li>
                            </ul>
							
						   <ul class="list-inline social-list-default background-color social-hover-2 mt-3">
								<li class="list-inline-item">
									<a class="facebook" href="https://www.facebook.com/mwhoster/" aria-label="Facebook page"><i class="fab fa-facebook"></i></a>
								</li>
								<li class="list-inline-item">
									<a class="instagram" href="https://www.instagram.com/mwhoster0/" aria-label="Instagram page"><i class="fab fa-instagram"></i></a>
								</li>
								<li class="list-inline-item">
									<a class="linkedin" href="https://www.linkedin.com/in/mw-hoster-6439b3193/" aria-label="Linkedin page"><i class="fab fa-linkedin-in"></i></a>
								</li>
							</ul>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end of container-->
    </footer>

    <!--footer bottom copyright start-->
    <div class="footer-bottom py-3 gray-light-bg">
        <div class="container">
            <div class="row payment">
                <div class="col-md-6 col-lg-7 c1" >
                    <div class="copyright-wrap small-text">
                        <p class="mb-0">
                            &copy; 2024 MWHoster - All rights reserved.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="text-lg-end text-md-end text-start">
                        <img src="/wp-content/uploads/2024/03/PaymentMethods.webp" alt="payment" class="img-fluid" width="300" height="30" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer bottom copyright end-->
    <!--footer section end-->


<!--scroll bottom to top button start-->
    <div class="scroll-top scroll-to-target primary-bg text-white" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </div>
    <!--scroll bottom to top button end-->


<?php wp_footer(); ?>




</body>
</html>
