@extends('frontend.layouts.app')
@section('title', "Indigo - Pakistan's Favorite Grocery Store for Best Prices & Free Delivery")
@section('content')
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <section class="main-slider-three">
       <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories Grid</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #fff;
            margin: 0;
            /* padding: 20px; */
        }

        h2 {
            margin-bottom: 20px;
        }

        .categories-container {
            /* display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1200px;
            margin: auto; */
            margin: 0 auto;
            width: 80%;
            display: grid;
            grid-template-columns: auto auto auto auto auto auto; 
            gap: 10px;
        }

        .category-card {
            width: 100%;
            height: 230px;
            background: #f8f8f8;
            border-radius: 12px;
            padding-top: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .category-card img {
            width: 160px;
            height: 160px;
            object-fit: contain;
            background: white;
            border-radius: 8px;
        }

        .category-card p {
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
            color: #333;
        }

        .see-all {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #f47321;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
        }

        .see-all:hover {
            color: #ffff;
            background: #8a45a1;
        }

        /* Responsive for medium screens */
        @media (max-width: 1200px) {
            .categories-container {
                display: grid;
            grid-template-columns: auto auto auto auto auto ; 
            }
        }
        @media (max-width: 1070px) {
            .categories-container {
                width: 90%;
                /* display: grid;
            grid-template-columns: auto auto auto auto auto ;  */
            }
        }
        @media (max-width: 966px) {
            .categories-container {
                display: grid;
            grid-template-columns: auto auto auto auto ; 
            }
        }
        @media (max-width: 800px) {
            .categories-container {
                display: grid;
            grid-template-columns: auto auto auto  ; 
            }
        }
        @media (max-width: 555px) {
            .categories-container {
                display: grid;
            grid-template-columns: auto auto ; 
            }
        }

        /* Responsive for small screens */
        /* @media (max-width: 768px) {
            .categories-container {
                max-width: 100%;
                gap: 15px;
            }
            .category-card {
                width: 45%;
            }
        }

        @media (max-width: 480px) {
            .category-card {
                width: 90%;
            }
        } */
/* 
        .categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 20px;
    padding: 20px 0;
}

.category-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px 10px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    text-decoration: none;
    border: 1px solid #f0f0f0;
    height: 100%;
}

.category-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    border-color: #f47321;
}

.category-icon {
    width: 50px;
    height: 50px;
    background: #f8f8f8;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
    color: #f47321;
    font-size: 20px;
}

.category-name {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
    text-align: center;
    line-height: 1.3;
}

.product-count {
    font-size: 12px;
    color: #777;
    font-weight: 500;
} */
.search-container {
    position: relative;
    margin: 40px 0;
}

.search-input {
    height: 50px;
    border-radius: 20px;
    padding-left: 35px;
    border: 2px solid #f47321;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.search-icon {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    color: #888;
}
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @include('frontend.partials.slider')

    <h2>Shop by Categories</h2>
    {{-- <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="search-container">
              <input type="text" class="form-control search-input" placeholder="Search Whatever You Want....">
              <i class="fas fa-search search-icon"></i>
            </div>
          </div>
        </div>
      </div> --}}

    <div class="d-flex justify-content-center py-5 " >
        
        <div class="search-popup__content " style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <form action="{{ route('frontend.products') }}" method="GET" style="position: relative;">
                <label for="search" class="sr-only">search here</label>
                <input type="text" id="search" name="search" placeholder="Search Here..." autocomplete="off" />
                
                <div id="live-search-results" style="top: 100%; background: #fff; border: 1px solid #ccc; display: none; z-index: 9999; max-height: 300px; overflow-y: auto; width: 100%"></div>
                
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>                
            </form>
        </div>
    </div>
    <div class="categories-container">
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 1600]) }}">
            <img src="frontend/assets/images/categories/bath-body.webp" alt="Bath & Body">
        </a>
        <p>Bath & Body</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 17]) }}">
            <img src="frontend/assets/images/categories/staples.webp" alt="Staples">
        </a>
        <p>Staples</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 58]) }}">
            <img src="frontend/assets/images/categories/SS.webp" alt="Spices & Seasoning">
        </a>
        <p>Spices & Seasoning</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 1584]) }}">
            <img src="frontend/assets/images/categories/BP.webp" alt="Baking & Desserts">
        </a>
        <p>Baking & Desserts</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 1574]) }}">
            <img src="frontend/assets/images/categories/SC.webp" alt="Skin Care">
        </a>
        <p>Skin Care</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 16]) }}">
            <img src="frontend/assets/images/categories/OG.webp" alt="Oil & Ghee">
        </a>
        <p>Oil & Ghee</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 296]) }}">
            <img src="frontend/assets/images/categories/rozana.webp" alt="Detergents">
        </a>
        <p>Rozana</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 4]) }}">
            <img src="frontend/assets/images/categories/HS.webp" alt="Household Supplies">
        </a>
        <p>Household Supplies</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 14]) }}">
            <img src="frontend/assets/images/categories/Dairy.webp" alt="Dairy Products">
        </a>
        <p>Dairy Products</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 318]) }}">
            <img src="frontend/assets/images/categories/Breakfast.webp" alt="Breakfast Items">
        </a>
        <p>Breakfast Items</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 20]) }}">
            <img src="frontend/assets/images/categories/TC.webp" alt="Tea & Coffee">
        </a>
        <p>Tea & Coffee</p>
    </div>
    <div class="category-card">
        <a href="{{ route('frontend.products', ['category' => 35]) }}">
            <img src="frontend/assets/images/categories/shampoo.webp" alt="Frozen Items">
        </a>
        <p>Shampoo & Conditioner</p>
    </div>

    {{-- @php
    $categoryIcons = [
        'Household Supplies' => 'fa-home',
        'Cleaning & Laundry' => 'fa-broom',
        'Baby Care' => 'fa-baby',
        'Dairy' => 'fa-cheese',
        'Oil & Ghee' => 'fa-oil-can',
        'Staples' => 'fa-wheat-awn',
        'Fruits & Vegetables' => 'fa-apple-whole',
        'Tea & Coffee' => 'fa-mug-hot',
        'Snacks' => 'fa-cookie',
        'Personal Care' => 'fa-user',
        'Shampoo & Conditioner' => 'fa-pump-soap',
        'Hand Wash' => 'fa-hands-bubbles',
        'Spices & Seasoning' => 'fa-mortar-pestle',
        'Noodles & Sauces' => 'fa-noodles',
        'Sauces' => 'fa-jar',
        'Beverages' => 'fa-bottle-water',
        'Cakes & Wafers' => 'fa-cake-candles',
        'Oral Care' => 'fa-tooth',
        'Laundry' => 'fa-shirt',
        'Fruits' => 'fa-apple-whole',
        'Vegetables' => 'fa-carrot',
        'Makeup' => 'fa-paintbrush',
        'Sexual Wellness' => 'fa-heart',
        'Bags' => 'fa-bag-shopping',
        'Rozana' => 'fa-calendar-day',
        'Breakfast' => 'fa-egg',
        'Nicotine Hub' => 'fa-smoking',
        'Beauty Tools' => 'fa-scissors',
        'Home Appliances' => 'fa-plug',
        'Hair Care' => 'fa-spray-can-sparkles',
        'Olper\'s Bazaar' => 'fa-cow',
        'Skin Care' => 'fa-spa',
        'Baking & Desserts' => 'fa-whisk',
        'Health & Wellness' => 'fa-heart-pulse',
        'Bath & Body' => 'fa-bath',
        'Body Lotions' => 'fa-hand-holding-droplet',
        'Tools' => 'fa-screwdriver-wrench',
        'Home & Lifestyle Accessories' => 'fa-couch',
        'Kitchen & Dining' => 'fa-utensils',
        'Toys & Games' => 'fa-gamepad',
        'Fitness' => 'fa-dumbbell',
        'Male Clothing' => 'fa-person',
        'Stationary & Craft' => 'fa-pencil',
        'Stationary Supplies' => 'fa-pen-ruler',
        'Female Clothing' => 'fa-person-dress',
        'Kids Clothing' => 'fa-child',
        'Male Footwear' => 'fa-shoe-prints',
        'Female Footwear' => 'fa-high-heel',
        'Male Accessories' => 'fa-glasses',
        'Female Accessories' => 'fa-gem',
        'Male Watches' => 'fa-clock',
        'Jewellery' => 'fa-ring',
        'Mobiles Accessories' => 'fa-mobile-screen',
        'Chargers' => 'fa-bolt',
        'Data Cables' => 'fa-plug-circle-bolt',
        'Mughal Rice' => 'fa-bowl-rice',
        'Fragrances & Deodorants' => 'fa-wind',
        'Flash Deals' => 'fa-bolt-lightning'
    ];
@endphp

@foreach($categories as $category)
<a href="{{ route('frontend.products', ['category' => $category->id]) }}" class="category-card">
    <div class="category-icon">
        <i class="fas {{ $categoryIcons[$category->name] ?? 'fa-tag' }}"></i>
    </div>
    <h3 class="category-name">{{ $category->name }}</h3>
    <span class="product-count">{{ $category->products_count }} products</span>
</a>
@endforeach --}}
</div>
    <a href="{{ route('frontend.products') }}" class="see-all">See All</a>
</body>
</html>

    </section>
    <br/>
    <section class="feature-three">
        <div class="container">
            <div class="feature-three__inner">
                <ul class="list-unstyled feature-three__list">
                    <!--feature Two Single Start-->
                    <li>
                        <div class="feature-three__single">
                            <div class="feature-three__icon">
                                <span class="icon-global-shipping"></span>
                            </div>
                            <div class="feature-three__content">
                                <h3 class="feature-three__title">Return Policy</h3>
                                <p class="feature-three__subtitle">Money back guarantee</p>
                            </div>
                        </div>
                    </li>
                    <!--feature Two Single End-->
                    <!--feature Two Single Start-->
                    <li>
                        <div class="feature-three__single">
                            <div class="feature-three__icon">
                                <span class="icon-free-delivery"></span>
                            </div>
                            <div class="feature-three__content">
                                <h3 class="feature-three__title">Free shipping</h3>
                                <p class="feature-three__subtitle">On all orders over RS 60.00</p>
                            </div>
                        </div>
                    </li>
                    <!--feature Two Single End-->
                    <!--feature Two Single Start-->
                    <li>
                        <div class="feature-three__single">
                            <div class="feature-three__icon">
                                <span class="icon-store"></span>
                            </div>
                            <div class="feature-three__content">
                                <h3 class="feature-three__title">Store locator</h3>
                                <p class="feature-three__subtitle">Find your nearest store</p>
                            </div>
                        </div>
                    </li>
                    <!--feature Two Single End-->
                </ul>
            </div>
        </div>
    </section>
    <section class="hot-products-three">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Checkout New Products</span>
                <h2 class="section-title__title">Today's new hotest products
                    <br> available now
                </h2>
            </div>
            <div class="row">
                <!-- Hot Products Two Single Start -->
                @foreach ($products as $product)
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="hot-products__single">
                            <div class="hot-products__single-inner">
                                <div class="hot-products__img-box">
                                    <div class="hot-products__img">
                                        {{-- <img src="uploads/products/1741644374_lux image.webp" alt=""> --}}
                                        <img src="{{ asset('uploads/products2/' . $product->image) }}" alt="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="hot-products__content">
                                    <div class="hot-products__rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <h3 class="hot-products__title"><a
                                            href="{{ route('frontend.products.detail', $product->slug) }}">{{ \Illuminate\Support\Str::limit($product->name, 24) }}</a></h3>
                                    <p class="hot-products__price">RS {{ number_format($product->price, 2) }}</p>
                                    <div class="hot-products__btn-box">
                                        <a href="javascript:void(0);" class="hot-products__btn thm-btn add-to-cart"
                                            data-id="{{ $product->id }}">Add
                                            to cart</a>
                                    </div>
                                </div>
                                <div class="hot-products__icon-boxes">
                                    <a href="javascript:void(0);" class="add-to-wishlist" data-id="{{ $product->id }}" data-auth="{{ auth()->check() ? '1' : '0' }}"><i class="far fa-heart"></i></a>
                                    <a href="#"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Hot Products Two Single End -->
            </div>
        </div>
    </section>
    <section class="banner-three">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="banner-three__left">
                        <div class="banner-three__right-inner">
                            <div class="banner-three__right-shape-1">
                                <img src="frontend/assets/images/shapes/banner-three-right-shape-1.png" alt="">
                            </div>
                            <!--<div class="banner-three__img-3">
                                <img src="frontend/assets/images/resources/banner-three-img-3.webp" alt="">
                            </div>-->
                            <div class="banner-three__right-title-box">
                                <p class="banner-three__right-tagline">Organic Food</p>
                                <h3 class="banner-three__right-title">Fresh <br> Lentils</h3>
                            </div>
                            <div class="banner-three__right-btn-box">
                                <a href="{{ route('frontend.products') }}" class="banner-three__right-btn thm-btn">Shop now</a>
                            </div>
                        </div>
                        {{-- <div class="banner-three__right-inner">
                            <div class="banner-three__inner-bg"
                                style="background-image: url(https://i.ibb.co/XRbz4nw/different-Lentils-Dried1-157526500-770x533-1-jpg.webp);">
                            </div>
                            <div class="banner-three__right-shape-1">
                                <img src="frontend/assets/images/shapes/banner-three-right-shape-1.png" alt="">
                            </div>
                            <p class="banner-three__right-tagline">Organic Food</p>
                            <h3 class="banner-three__right-title">Fresh <br> Lentils</h3>
                            <div class="banner-three__right-btn-box">
                            <a href="{{ route('frontend.products') }}" class="banner-three__btn thm-btn">Shop now</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="banner-three__middle">
                        <div class="banner-three__middle-inner">
                            <!--<div class="banner-three__img-2">
                                <img src="frontend/assets/images/resources/banner-three-img-2.webp" alt="">
                            </div>-->
                            <!--<div class="banner-three__shape-1">
                                <img src="frontend/assets/images/shapes/banner-three-middel-shape-1.png" alt="">
                            </div>-->
                            <!--<div class="banner-three__middle-offer">
                                <p>off</p>
                            </div>-->
                            <div class="banner-three__middle-title-box">
                                <p class="banner-three__middle-tagline">20%</p>
                                <h3 class="banner-three__middle-title">on our 
                                    <br> Products
                                </h3>
                            </div>
                            <div class="banner-three__middle-btn-box">
                                <a href="{{ route('frontend.products') }}" class="banner-three__right-btn_2 thm-btn" 
                                style="border: 2px solid #ffffff">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="banner-three__right">
                        <div class="banner-three__right-inner">
                            <div class="banner-three__right-shape-1">
                                <img src="frontend/assets/images/shapes/banner-three-right-shape-1.png" alt="">
                            </div>
                            <!--<div class="banner-three__img-3">
                                <img src="frontend/assets/images/resources/banner-three-img-3.webp" alt="">
                            </div>-->
                            <div class="banner-three__right-title-box">
                                <p class="banner-three__right-tagline">100% Healthy</p>
                                <h3 class="banner-three__right-title">Healthy <br> Original Food</h3>
                            </div>
                            <div class="banner-three__right-btn-box">
                                <a href="{{ route('frontend.products') }}" class="banner-three__right-btn thm-btn">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="brand-one">
        <div class="container">
            <div class="thm-swiper__slider swiper-container"
                data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 3
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 5
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 5
                }
            }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-1.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-2.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-3.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-4.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-5.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-1.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-2.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-3.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-4.png" alt="">
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <img src="frontend/assets/images/brand/brand-1-5.png" alt="">
                    </div><!-- /.swiper-slide -->
                </div>
            </div>
        </div>
    </section> --}}

    <section class="counter-one mt-5">
        <div class="counter-one__bg"
            style="background-image: url(frontend/assets/images/backgrounds/counter-one-bg-img.png);"></div>
        <div class="container">
            <ul class="counter-one__inner list-unstyled">
                <li class="counter-one__single">
                    <div class="counter-one__icon">
                        <i class="icon-customer-service"></i>
                    </div>
                    <div class="counter-one__content count-box">
                        <h3 class="count-text" data-stop="154" data-speed="1500">00</h3>
                        <p class="counter-one__text">Happy customers</p>
                    </div>
                </li>
                <li class="counter-one__single">
                    <div class="counter-one__icon">
                        <i class="icon-farmer-1"></i>
                    </div>
                    <div class="counter-one__content count-box">
                        <h3 class="count-text" data-stop="163" data-speed="1500">00</h3>
                        <p class="counter-one__text">Expert farmers</p>
                    </div>
                </li>
                <li class="counter-one__single">
                    <div class="counter-one__icon">
                        <i class="icon-agriculture"></i>
                    </div>
                    <div class="counter-one__content count-box">
                        <h3 class="count-text" data-stop="360" data-speed="1500">00</h3>
                        <p class="counter-one__text">New products</p>
                    </div>
                </li>
                <li class="counter-one__single">
                    <div class="counter-one__icon">
                        <i class="icon-trophy"></i>
                    </div>
                    <div class="counter-one__content count-box">
                        <h3 class="count-text" data-stop="22" data-speed="1500">00</h3>
                        <p class="counter-one__text">Awards winning</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="news-two">
        <div class="container">
            {{-- <div class="section-title text-center">
                <span class="section-title__tagline">From the Blog Posts</span>
                <h2 class="section-title__title">Latest news updates
                    <br> & articles
                </h2>
            </div> --}}
        </div>
    </section>
    @include('frontend.partials.subscribe')
@endsection
