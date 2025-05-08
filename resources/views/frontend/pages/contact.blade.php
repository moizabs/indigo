@extends('frontend.layouts.app')
@section('title', 'Contact Us')
@section('content')

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url(frontend/assets/images/backgrounds/new-header-01.jpeg)">
    </div>
    <div class="page-header__ripped-paper"
        style="background-image: url(frontend/assets/images/shapes/page-header-ripped-paper.png);"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Contact</li>
            </ul>
            <h2>Contact</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Write a Message</span>
                    <h2 class="section-title__title">We’re always here to
                        <br> help you</h2>
                </div>
                <div class="contact-page__content">
                    <form action="assets/inc/sendemail.php" class="contact-page__form contact-form-validated"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="contact-page__form-input-box">
                                    <input type="text" placeholder="Your name" name="name">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-page__form-input-box">
                                    <input type="email" placeholder="Email address" name="email">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-page__form-input-box">
                                    <input type="text" placeholder="Subject" name="Subject">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="contact-page__form-input-box">
                                    <input type="text" placeholder="Phone" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-page__form-input-box text-message-box">
                                <textarea name="message" placeholder="Write a massage"></textarea>
                            </div>
                            <div class="contact-page__btn-box">
                                <button type="submit" class="thm-btn contact-page__btn">Send a message</button>
                            </div>
                        </div>
                    </form>
                    <div class="result"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Page End-->

<!--Contact Details Start-->
<section class="contact-details mb-5">
    <div class="container">
        <div class="contact-details__inner">
            <ul class="contact-details__contact-list list-unstyled">
                <li>
                    <div class="icon">
                        <span class="icon-help"></span>
                    </div>
                    <div class="content">
                        <p>Have question?</p>
                        <h4>
                            <a href="tel:+923095320000">+92 (309) 53 - 20000</a>
                        </h4>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <span class="icon-mailbox"></span>
                    </div>
                    <div class="content">
                        <p>Write email</p>
                        <h4>
                            <a href="mailto:info@indigoshopify.com">info@indigoshopify.com</a>
                        </h4>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <span class="icon-maps-and-flags"></span>
                    </div>
                    <div class="content">
                        <p>Visit store</p>
                        <h4>803, Park Avenue, P.E.C.H.S Block-6</h4>
                    </div>
                </li>
            </ul>
            <div class="contact-details__social-box">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</section>
<!--Contact Details End-->

<!--Subscribe One Start-->
@include('frontend.partials.subscribe')
<!--Subscribe One End-->
@endsection