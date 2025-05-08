<footer class="site-footer" style="text-align: left">
    <div class="site-footer__bg" style="background-image: url(frontend/assets/images/backgrounds/site-footer-bg-img.png);"></div>
    <div class="site-footer__ripped-paper"
        style="background-image: url(frontend/assets/images/shapes/site-footer-ripped-paper.png);"></div>
    <div class="container">
        <div class="site-footer__top">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <a href="{{ route('index') }}"><img src="assets/images/resources/footer-logo.png"
                                    alt=""></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text">We’re Providing Everyday Fresh <br> and
                                Quality
                                Products.</p>
                        </div>
                        <div class="footer-widget__social-box">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__explore">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Explore</h3>
                        </div>
                        <div class="footer-widget__explore-list-box">
                            <ul class="footer-widget__explore-list list-unstyled">
                                <li><a href="about.html">About Company</a></li>
                                <li><a href="services.html">Our Services</a></li>
                                {{-- <li><a href="pricing.html">Become a Seller</a></li> --}}
                                <li><a href="{{ route('frontend.products') }}">New Products</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__contact">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Contact</h3>
                        </div>
                        <p class="footer-widget__contact-text">803, Park Avenue, P.E.C.H.S Block-6</p>
                        <ul class="list-unstyled footer-widget__contact-list">
                            <li>
                                <div class="text">
                                    <p><a href="tel:923095320000">+92 (309) 53 - 20000</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="text">
                                    <p><a href="mailto: info@indigoshopify.com">info@indigoshopify.com</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__gallery">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Gallery</h3>
                        </div>
                        <ul class="footer-widget__gallery-list list-unstyled clearfix">
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-1.jpg" alt="">
                                    <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-2.jpg" alt="">
                                    <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-3.jpg" alt="">
                                    <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-4.jpg" alt="">
                                    <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-5.jpg" alt="">
                                    <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                            <li>
                                <div class="footer-widget__gallery-img">
                                    <img src="assets/images/resources/footer-widget-gallery-img-6.jpg" alt="">
                                    <a href="portfolio-details.html"><span class="fa fa-link"></span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <div class="site-footer__bottom-left">
                            <p class="site-footer__bottom-text">© Copyright 2025 by <a href="/">Company.com</a>
                            </p>
                        </div>
                        <div class="site-footer__bottom-right">
                            <ul class="list-unstyled site-footer__bottom-menu">
                                {{-- <li><a href="about.html">Terms & Conditions</a></li>
                                <li><span>/</span></li>
                                <li><a href="about.html">Privacy Policy</a></li>
                                <li><span>/</span></li>
                                <li><a href="about.html">Privacy Policy</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
