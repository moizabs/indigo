<header class="main-header-three">
    <div class="main-header-three__wrapper">
        <div class="container">
            <div class="main-header-three__wrapper-inner clearfix">
                <div class="main-header-three__logo">
                    <a href="{{ route('index') }}"><img src="{{ asset('/frontend/assets/images/indigo-logo.jpg') }} "
                            style="width:150px;  margin-left:30px;" alt=""></a>
                </div>
                <div class="main-header-three__right">
                    <div class="main-header-three__top">
                        <div class="main-header-three__top-inner">
                            <div class="main-header-three__top-right">
                                <ul class="list-unstyled main-header-three__contact-list">
                                    
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-mobile"></i>
                                        </div>
                                        <div class="text">
                                            <p><a href="tel:+923095320000">+ 92 ( 309 ) 53 - 20000</a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope-open"></i>
                                        </div>
                                        <div class="text">
                                            <p><a href="mailto:info@indigoshopify.com">info@indigoshopify.com</a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="main-header-three__menu-box">
                                <ul class="list-unstyled main-header-three__menu">
                                    <li><a href="https://wa.me/923450403037" target="_blank">Support</a></li>
                                    <li><a href="{{ route('frontend.wishlist') }}">Wish List</a></li>
                                    <li><a href="{{ route('user.account') }}">My Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="main-header-three__bottom">
                        <nav class="main-menu main-menu-three">
                            <div class="main-menu-three__wrapper">
                                <div class="main-menu-three__wrapper-inner">
                                    <div class="main-menu-three__main-menu-box">
                                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                        <ul class="main-menu__list">
                                            
                                            <li>
                                                <a href="/">Home</a>
                                            </li>
                                            @php
                                                $categories = \App\Models\Category::where('status', 1)->get();
                                            @endphp
                                            <li class="dropdown">
                                                <a href="{{ route('frontend.products') }}">All Categories</a>
                                                <ul class="sub-menu" style="height: 50vh; overflow-y: scroll; text-align: left">
                                                    @foreach ($categories as $item)
                                                        <li><a
                                                                href="{{ route('frontend.products', ['category' => $item->id]) }}">
                                                                {{ $item->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.products') }}">Products</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('frontend.wishlist') }}">Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('pages.contact') }}">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="main-menu-three__right">
                                        @auth
                                            <div class="main-menu-three__login-box">
                                                <div class="main-menu-three__login-icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <ul class="list-unstyled main-menu-three__login-menu">
                                                    <li>
                                                        <form action="{{ route('logout') }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-link p-0">Logout</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        @else
                                            <div class="main-menu-three__login-box">
                                                <div class="main-menu-three__login-icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <ul class="list-unstyled main-menu-three__login-menu">
                                                    <li><a href="{{ route('user.account') }}">Login</a></li>
                                                    <li><span>/</span></li>
                                                    <li><a href="{{ route('user.account') }}">Register</a></li>
                                                </ul>
                                            </div>
                                        @endauth

                                        <div class="main-menu-three__search-cart-box">
                                            {{-- <div class="main-menu-three__search-box">
                                                <a href="#"
                                                    class="main-menu-three__search search-toggler icon-magnifying-glass"></a>
                                            </div> --}}
                                            <div class="main-menu-three__cart-box">
                                                {{-- @auth --}}
                                                    <a href="{{ route('my.cart') }}"
                                                        class="main-menu-three__cart icon-shopping-cart"></a>
                                                {{-- @else
                                                    <a href="{{ route('user.account') }}"
                                                        class="main-menu-three__cart icon-shopping-cart"></a>
                                                @endauth --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="stricky-header stricked-menu main-menu main-menu-three">
    <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->
