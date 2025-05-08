@extends('frontend.layouts.app')
@section('title', 'Home Page')
@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(frontend/assets/images/backgrounds/new-header-01.jpeg)">
        </div>
        <div class="page-header__ripped-paper"
            style="background-image: url(frontend/assets/images/shapes/page-header-ripped-paper.png)"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li>Shop</li>
                </ul>
                <h2>Wishlist</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Start Cart Page-->
    <section class="wishlist-page">
        <div class="container">
            <div class="table-responsive-box">
                @if ($wishlists->isEmpty())
                    <p class="text-center">Your wishlist is empty.</p>
                @else
                    <table class="wishlist-table">
                        <tbody>
                            @foreach ($wishlists as $item)
                                <tr>
                                    <td>
                                        <div class="product-box">
                                            <div class="img-box">
                                                <img src="{{ asset('uploads/products2/' . $item->product->image) }}"
                                                    alt="{{ $item->product->name }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="product-name-select-box">
                                            <div class="product-name">
                                                <h4>{{ $item->product->name }}</h4>
                                                <p>RS {{ number_format($item->product->price, 2) }}</p>
                                            </div>
                                            <div class="product-select">
                                                <a href="{{ route('frontend.products.detail', $item->product->slug) }}"
                                                    class="thm-btn product-select-btn">View Product</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cross-icon">
                                            <form action="{{ route('wishlist.remove', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="remove-wishlist" style="border: none; background: none;">
                                                    <i class="icon-close remove-icon"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
    <!--End Cart Page-->

    <!--Subscribe One Start-->
    <section class="subscribe-one">
        <div class="container">
            <div class="subscribe-one__inner">
                <div class="subscribe-one__shape-1 float-bob-x">
                    <img src="frontend/assets/images/shapes/subscribe-one-shape-1.png" alt="">
                </div>
                <div class="subscribe-one__shape-2 float-bob-y">
                    <img src="frontend/assets/images/shapes/subscribe-one-shape-2.png" alt="">
                </div>
                <div class="subscribe-one__shape-4 float-bob-y">
                    <img src="frontend/assets/images/shapes/subscribe-one-shape-4.png" alt="">
                </div>
                <div class="subscribe-one__shape-5 zoominout">
                    <img src="frontend/assets/images/shapes/subscribe-one-shape-5.png" alt="">
                </div>
                <div class="subscribe-one__inner-content">
                    <div class="subscribe-one__shape-3 float-bob-x">
                        <img src="frontend/assets/images/shapes/subscribe-one-shape-3.png" alt="">
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="subscribe-one__left">
                                <div class="icon">
                                    <span class="icon-folder"></span>
                                </div>
                                <div class="subscribe-one__title-box">
                                    <span class="subscribe-one__tagline">Quisque vel ortor</span>
                                    <h2 class="subscribe-one__title">Subscribe to newsletter</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="subscribe-one__right">
                                <div class="subscribe-one__shape-6 float-bob-x">
                                    <img src="frontend/assets/images/shapes/subscribe-one-shape-6.png" alt="">
                                </div>
                                <div class="subscribe-one__form-box">
                                    <form class="subscribe-one__form mc-form" data-url="MC_FORM_URL">
                                        <div class="subscribe-one__input-box">
                                            <input type="email" placeholder="Email Address" id="subscriberEmail" name="email">
                                            <button type="submit" class="subscribe-one__btn"><i
                                                    class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                    <div class="mc-form__response"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Subscribe One End-->
@endsection
