@extends('frontend.layouts.app')
@section('title', 'Shop All Products - Indigo Grocery Store')
{{-- @section('title', isset($product) ? "{$product->name} - Buy Now | Indigo Grocery Store" : 'Product Details | Indigo') --}}
@section('content')

    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ asset('frontend/assets/images/backgrounds/new-header-01.jpeg') }}">
        </div>
        <div class="page-header__ripped-paper"
            style="background-image: url(frontend/assets/images/shapes/page-header-ripped-paper.png);"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li>Shop</li>
                </ul>
                <h2>Product details</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Product Details Start-->
    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__img">
                        <img src="{{ asset('uploads/products2/' . $product->image) }}" alt="" style="width: 70%"/>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__top">
                        <h3 class="product-details__title">{{ $product->name }} <span>RS
                                {{ number_format($product->price, 2) }}</span> </h3>
                    </div>
                    {{-- <div class="product-details__reveiw">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span>2 Customer reviews</span>
                </div> --}}
                    <div class="product-details__content">
                        <p class="product-details__content-text1">{!! $product->short_description !!}</p>
                        {{-- <p class="product-details__content-text2">REF. 4231/406 <br>
                        Available in store</p> --}}
                        @if ($product->quantity > 0)
                            <p class="product-details__content-text2 text-success">Available in store</p>
                        @else
                            <p class="product-details__content-text2 text-danger">Out of stock</p>
                        @endif
                    </div>

                    @if ($product->quantity > 0)
                        <div class="product-details__quantity">
                            <h3 class="product-details__quantity-title">Choose quantity</h3>
                            <div class="quantity-box">
                                <button type="button" class="sub"><i class="fa fa-minus"></i></button>
                                <input type="number" class="quantity-input" value="1" min="1"
                                    max="{{ $product->quantity }}" />
                                <button type="button" class="add"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    @endif

                    <div class="product-details__buttons">
                        <div class="product-details__buttons-1">
                            <a href="javascript:void(0);" class="thm-btn add-to-wishlist"
                                data-id="{{ $product->id }}">
                                Add to wishlist
                            </a>
                        </div>

                        @if ($product->quantity > 0)
                            <div class="product-details__buttons-2">
                                <a href="javascript:void(0);" class="thm-btn add-to-cart"
                                    data-id="{{ $product->id }}">Add
                                    to cart</a>
                            </div>
                        @endif
                    </div>
                    <div class="product-details__social">
                        <div class="title">
                            <h3>Share with friends</h3>
                        </div>
                        <div class="product-details__social-link">
                            <a href="#"><span class="fab fa-twitter"></span></a>
                            <a href="#"><span class="fab fa-facebook"></span></a>
                            <a href="#"><span class="fab fa-pinterest-p"></span></a>
                            <a href="#"><span class="fab fa-instagram"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product Details End-->

    <!--Product Description Start-->
    <section class="product-description">
        <div class="container">
            <h3 class="product-description__title">Description</h3>
            <p class="product-description__text1">{!! $product->description !!}</p>
            {{-- <div class="product-description__list">
                <ul class="list-unstyled">
                    <li>
                        <p><span class="icon-right-arrow"></span> Nam at elit nec neque suscipit gravida.</p>
                    </li>
                    <li>
                        <p><span class="icon-right-arrow"></span> Aenean egestas orci eu maximus tincidunt.</p>
                    </li>
                    <li>
                        <p><span class="icon-right-arrow"></span> Curabitur vel turpis id tellus cursus laoreet.
                        </p>
                    </li>
                </ul>
            </div>
            <p class="product-description__tex2">All the Lorem Ipsum generators on the Internet tend to repeat
                predefined chunks as necessary, making this the first true generator on the Internet. It uses a
                dictionary of over 200 Latin words, combined with a handful of model sentence structures, to
                generate Lorem Ipsum which looks reasonable. </p> --}}
        </div>
    </section>
    <!--Product Description End-->

    <!--Review One Start-->
    {{-- <section class="review-one">
        <div class="container">
            <div class="comments-area">
                <div class="review-one__title">
                    <h3>2 Reviews</h3>
                </div>
                <!--Start Comment Box-->
                <div class="comment-box">
                    <div class="comment">
                        <div class="author-thumb">
                            <figure class="thumb"><img src="frontend/assets/images/shop/review-1-1.jpg" alt="">
                            </figure>
                        </div>

                        <div class="review-one__content">
                            <div class="review-one__content-top">
                                <div class="info">
                                    <h2>Kevin martin <span>20 Oct, 2023 . 4:00 pm</span></h2>
                                </div>
                                <div class="reply-btn">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>

                            <div class="review-one__content-bottom">
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting unchanged. It was popularised in the sheets containing lorem ipsum
                                    is simply free text. Class aptent taciti sociosqu ad litora torquent per conubia
                                    nostra, per inceptos himenaeos. Vestibulum sollicitudin varius mauris non
                                    dignissim.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Comment Box-->

                <!--Start Comment Box-->
                <div class="comment-box">
                    <div class="comment">
                        <div class="author-thumb">
                            <figure class="thumb"><img src="frontend/assets/images/shop/review-1-2.jpg" alt="">
                            </figure>
                        </div>

                        <div class="review-one__content">
                            <div class="review-one__content-top">
                                <div class="info">
                                    <h2>Sarah albert <span>20 Oct, 2023 . 4:00 pm</span></h2>
                                </div>
                                <div class="reply-btn">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>

                            <div class="review-one__content-bottom">
                                <p>It has survived not only five centuries, but also the leap into electronic
                                    typesetting unchanged. It was popularised in the sheets containing lorem ipsum
                                    is simply free text. Class aptent taciti sociosqu ad litora torquent per conubia
                                    nostra, per inceptos himenaeos. Vestibulum sollicitudin varius mauris non
                                    dignissim.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Comment Box-->
            </div>
        </div>
    </section> --}}
    <!--Review One End-->

    <!--Start Review Form-->
    <section class="review-form-one">
        <div class="container">
            <div class="review-form-one__inner">
                <h3 class="review-form-one__title">Add a review</h3>
                <div class="review-form-one__rate-box">
                    <p class="review-form-one__rate-text">Rate this product?</p>
                    <div class="review-form-one__rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <form action="assets/inc/sendemail.php" class="review-form-one__form contact-form-validated"
                    novalidate="novalidate">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="review-form-one__input-box text-message-box">
                                <textarea name="message" placeholder="Write a comment"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="review-form-one__input-box">
                                <input type="text" placeholder="Your name" name="name">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="review-form-one__input-box">
                                <input type="email" placeholder="Email address" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <button type="submit" class="thm-btn review-form-one__btn">Submit a review</button>
                        </div>
                    </div>
                </form>
                <div class="result"></div>
            </div>
        </div>
    </section>
    <!--End Review Form-->

    <!--Subscribe One Start-->
    @include('frontend.partials.subscribe')
    <!--Subscribe One End-->
@endsection
