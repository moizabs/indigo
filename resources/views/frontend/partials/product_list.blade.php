<div class="tab-pane fade show active" id="product-grid" role="tabpanel" aria-labelledby="product-grid">
    <div class="product__all" id="product__all">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="product__all-single">
                        <div class="product__all-single-inner">
                            <div class="product__all-img">
                                
                        <img src="{{ asset('uploads/products2/' . $product->image) }}" alt="Product Image">

                                {{-- <input type="text" value="{{ $product->image }}"/> --}}
                            </div>
                            <div class="product__all-content">
                                <div class="product__all-review">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <h4 class="product__all-title"><a
                                        href="{{ route('frontend.products.detail', $product->slug) }}">{{ $product->name }}</a>
                                </h4>
                                <p class="product__all-price">RS
                                    {{ number_format($product->price, 2) }}</p>
                                <div class="product__all-btn-box">
                                    {{-- <a href="cart.html" class="thm-btn product__all-btn">Add
                                        to
                                        cart</a> --}}
                                        <a href="javascript:void(0);" class="thm-btn product__all-btn product-list__btn add-to-cart" data-id="{{ $product->id }}"
                                            data-auth="{{ auth()->check() ? '1' : '0' }}">Add
                                            to cart</a>
                                </div>
                            </div>
                            <div class="products__all-icon-boxes">
                                <a href="javascript:void(0);" class="add-to-wishlist" data-id="{{ $product->id }}" data-auth="{{ auth()->check() ? '1' : '0' }}"><i class="far fa-heart"></i></a>
                                <a href="#"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="shop-page__pagination">
                <ul class="pg-pagination list-unstyled" id="pagination">
                    {{ $products->links('vendor.pagination.bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade " id="product-list" role="tabpanel" aria-labelledby="product-list">
    <div class="product-list__inner">
        @foreach ($products as $product)
            <div class="product-list__single">
                <div class="product-list__single-inner">
                    <div class="product-list__img-box">
                        <div class="product-list__img">
                            <img src="{{ asset('uploads/products2/' . $product->image) }}" alt="">
                        </div>
                        <div class="product-list__icon-boxes">
                            <a href="#"><i class="far fa-heart"></i></a>
                            <a href="#"><i class="fas fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="product-list__content">
                        <div class="product-list__review">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <h4 class="product-list__title"><a
                                href="{{ route('frontend.products.detail', $product->slug) }}">{{ $product->name }}</a>
                        </h4>
                        <p class="product-list__price">RS
                            {{ number_format($product->price, 2) }}</p>
                        <p class="product-list__text">{{ $product->short_description }}</p>
                        <div class="product-list__btn-box">
                            <a href="javascript:void(0);" class="thm-btn product-list__btn add-to-cart" data-id="{{ $product->id }}"
                                >Add
                                to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="shop-page__pagination">
                <ul class="pg-pagination list-unstyled" id="pagination">
                    {{ $products->links('vendor.pagination.bootstrap-4') }}
                </ul>
            </div>
        </div>
    </div>
</div>
