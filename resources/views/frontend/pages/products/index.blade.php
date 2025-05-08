@extends('frontend.layouts.app')
@section('title', 'Shop All Products - Indigo Grocery Store')
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
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li>Shop</li>
                </ul>
                <h2>Products list</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Product List Start-->
    <section class="product-list">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="product__sidebar">
                        <div class="shop-search product__sidebar-single">
                            <form action="#">
                                <input type="text" id="search" placeholder="Search">
                            </form>
                        </div>
                        {{-- <div class="d-flex justify-content-center pb-4 " >
        
                            <div class="search-popup__content  " style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                <form action="{{ route('frontend.products') }}" method="GET" style="position: relative;">
                                    <label for="search" class="sr-only">search here</label>
                                    <input type="text" id="search" name="search" placeholder="Search Here..." autocomplete="off" />
                                    
                                    <div id="live-search-results" style="top: 100%; background: #fff; border: 1px solid #ccc; display: none; z-index: 9999; max-height: 300px; overflow-y: auto; width: 100%"></div>
                                    
                                    <button type="submit" aria-label="search submit" class="thm-btn">
                                        <i class="icon-magnifying-glass"></i>
                                    </button>                
                                </form>
                            </div>
                        </div> --}}
                        <div class="product__price-ranger product__sidebar-single">
                            <h3 class="product__sidebar-title">Price</h3>
                            <div class="price-ranger">
                                <div id="slider-range"></div>
                                <div class="ranger-min-max-block">
                                    <div class="ranger-min-max-block-box">
                                        <input type="text" id="min_price" class="min">
                                        <span>-</span>
                                        <input type="text" id="max_price" class="max">
                                    </div>
                                    <div class="product__price-ranger-filter">
                                        <input type="submit" value="Filter">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-category product__sidebar-single" style="height: 82vh; overflow-y: scroll;">
                            <h3 class="product__sidebar-title">Categories</h3>
                            <ul class="list-unstyled">
                                <li class="{{ !request('category') || request('category') == 'all' ? 'active' : '' }}">
                                    <a href="{{ route('frontend.products', request()->except('category', 'page')) }}"
                                       class="category-filter"
                                       data-category="all">
                                        All Categories <span>({{ $totalProductsCount }})</span>
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                    @if($category->products_count == 0)
                                        @continue
                                    @endif
                                    <li class="{{ request('category') == $category->id ? 'active' : '' }}">
                                        <a href="{{ route('frontend.products', ['category' => $category->id] + request()->except('category', 'page')) }}"
                                           class="category-filter"
                                           data-category="{{ $category->id }}">
                                            {{ $category->name }} <span>({{ $category->products_count }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9">
                    <div class="product-list__right">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="product__showing-result">
                                    <div class="product__showing-text-box">
                                        <p class="product__showing-text">
                                            Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of
                                            {{ $products->total() }} Results
                                        </p>
                                    </div>
                                    <div class="product__menu-showing-sort">
                                        <ul class="nav nav-tabs product__list-grid-tabs" id="productListGridTab"
                                            role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="product-grid-tab" data-bs-toggle="tab"
                                                    data-bs-target="#product-grid" type="button" role="tab"
                                                    aria-controls="product-grid" aria-selected="true"><span
                                                        class="icon-menu"></span></button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="product-list-tab" data-bs-toggle="tab"
                                                    data-bs-target="#product-list" type="button" role="tab"
                                                    aria-controls="product-list" aria-selected="false"><span
                                                        class="icon-list"></span></button>
                                            </li>
                                        </ul>
                                        <div class="product__showing-sort">
                                            <div class="select-box">
                                                <select class="wide" id="sort_by">
                                                    <option value="latest">Latest</option>
                                                    <option value="price_low_high">Price: Low to High</option>
                                                    <option value="price_high_low">Price: High to Low</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content" id="productListGridTabContent">
                            @include('frontend.partials.product_list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Product List End-->

    <!--Subscribe One Start-->
    @include('frontend.partials.subscribe')
    <!--Subscribe One End-->

@endsection
@section('script')
<script>
    $(document).ready(function() {
    // Track current filters and AJAX request
    let currentFilters = {
        category: "{{ request('category') }}",
        search: "{{ request('search') }}",
        min_price: "{{ request('min_price') }}",
        max_price: "{{ request('max_price') }}",
        sort_by: "{{ request('sort_by') || 'latest' }}",
        page: "{{ request('page') || 1 }}"
    };
    let activeAjaxRequest = null;

    // Initialize UI elements
    if (currentFilters.sort_by) {
        $('#sort_by').val(currentFilters.sort_by);
    }
    if (currentFilters.min_price) {
        $('#min_price').val(currentFilters.min_price);
    }
    if (currentFilters.max_price) {
        $('#max_price').val(currentFilters.max_price);
    }

    // Main function to fetch filtered data
    function fetchFilteredData(page = 1) {
        // Cancel any pending request
        if (activeAjaxRequest) {
            activeAjaxRequest.abort();
        }
        
        // Update current page
        currentFilters.page = page;
        
        // Show loading indicator
        $('#productListGridTabContent').html('<div class="text-center py-5"><i class="fa fa-spinner fa-spin fa-3x"></i></div>');
        
        // Make AJAX request
        activeAjaxRequest = $.ajax({
            url: "{{ route('frontend.products') }}",
            method: "GET",
            data: currentFilters,
            dataType: 'json', // Expect JSON response
            success: function(response) {
                if (response && response.html) {
                    $('#productListGridTabContent').html(response.html);
                    updateActiveCategory(currentFilters.category);
                    
                    // Update URL without reload
                    let newUrl = new URL(window.location.href);
                    newUrl.searchParams.set('category', currentFilters.category || 'all');
                    newUrl.searchParams.set('page', currentFilters.page);
                    history.pushState(currentFilters, "", newUrl.toString());
                }
            },
            error: function(xhr) {
                if (xhr.statusText !== "abort") {
                    console.error("Error loading products");
                    $('#productListGridTabContent').html('<div class="text-center py-5">Error loading products. Please try again.</div>');
                }
            },
            complete: function() {
                activeAjaxRequest = null;
            }
        });
    }

    // Update active category in UI
    function updateActiveCategory(activeCategory) {
        $('.shop-category ul li').removeClass('active');
        if (activeCategory) {
            $(`.shop-category ul li a[data-category="${activeCategory}"]`).parent().addClass('active');
        } else {
            $('.shop-category ul li a[data-category="all"]').parent().addClass('active');
        }
    }

    // Price filter handler
    $("#min_price, #max_price").on("input change", function(e) {
        e.preventDefault();
        currentFilters.min_price = $("#min_price").val().trim();
        currentFilters.max_price = $("#max_price").val().trim();
        currentFilters.page = 1;
        fetchFilteredData();
    });

    // Search input handler (with debounce)
    let searchTimer;
    $("#search").on("keyup", function() {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function() {
            currentFilters.search = $("#search").val();
            currentFilters.page = 1;
            fetchFilteredData();
        }, 500);
    });

    // Sort by handler
    $("#sort_by").on("change", function() {
        currentFilters.sort_by = $(this).val();
        currentFilters.page = 1;
        fetchFilteredData();
    });

    // Category filter handler
    $(document).on("click", ".category-filter", function(e) {
        e.preventDefault();
        currentFilters.category = $(this).data('category') === 'all' ? null : $(this).data('category');
        currentFilters.page = 1;
        fetchFilteredData();
    });

    // Pagination handler
    $(document).on("click", ".pagination a", function(e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        fetchFilteredData(page);
    });

    // Handle browser back/forward
    window.addEventListener('popstate', function(event) {
        if (event.state) {
            currentFilters = event.state;
            fetchFilteredData(currentFilters.page);
        }
    });

    // Initial load if coming from a filtered state
    if (currentFilters.category || currentFilters.search || currentFilters.min_price || currentFilters.max_price) {
        fetchFilteredData();
    }
});
</script>
@endsection
