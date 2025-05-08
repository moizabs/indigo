@extends('frontend.layouts.app')
@section('title', 'My cart')
@section('content')

    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(frontend/assets/images/backgrounds/new-header-01.jpeg)">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><span>/</span></li>
                    <li>Shop</li>
                </ul>
                <h2>Cart</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <!--Start Cart Page-->
    <section class="cart-page">
        <div class="container">
            <div class="table-responsive">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr data-id="{{ $item->id }}" data-price="{{ $item->product->price }}">
                                <td>
                                    <div class="product-box">
                                        <div class="img-box">
                                            <img src="{{ 'uploads/products2/' . $item->product->image }}" alt="">
                                        </div>
                                        <h3><a
                                                href="{{ route('frontend.products.detail', $item->product->slug) }}">{{ $item->product->name }}</a>
                                        </h3>
                                    </div>
                                </td>
                                <td>RS {{ number_format($item->product->price, 2) }}</td>
                                <td>
                                    <div class="quantity-box">
                                        <button type="button" class="sub"><i class="fa fa-minus"></i></button>
                                        <input type="number" class="product-qty" value="{{ $item->quantity }}"
                                            min="1" />
                                        <button type="button" class="add"><i class="fa fa-plus"></i></button>
                                    </div>
                                </td>
                                <td class="total-price">
                                    RS {{ number_format($item->product->price * $item->quantity, 2) }}
                                </td>
                                <td>
                                    <div class="cross-icon">
                                        <i class="icon-close remove-icon"></i>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <form action="#" class="default-form cart-cupon__form">
                        <input type="text" placeholder="Enter coupon code" class="cart-cupon__input">
                        <button class="thm-btn" type="submit">
                            <span>Apply coupon</span>
                        </button>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <ul class="cart-total list-unstyled">
                        <li>
                            <span>Subtotal</span>
                            <span class="cart-subtotal">RS
                                {{ number_format(
                                    $cartItems->sum(function ($item) {
                                        return $item->product->price * $item->quantity;
                                    }),
                                    2,
                                ) }}</span>
                        </li>
                        <li>
                            <span>Shipping cost</span>
                            <span>RS 0.00</span>
                        </li>
                        <li>
                            <span>Total</span>
                            <span class="cart-total-amount">
                                RS
                                {{ number_format(
                                    $cartItems->sum(function ($item) {
                                        return $item->product->price * $item->quantity;
                                    }),
                                    2,
                                ) }}
                            </span>
                        </li>
                    </ul>
                    <div class="cart-page__buttons">
                        <div class="cart-page__buttons-2">
                            <a href="" class="thm-btn">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmLabel"
            >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to remove this item from your cart?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--End Cart Page-->
    @include('frontend.partials.subscribe')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            
            $(".add, .sub").click(function() {
                let input = $(this).siblings(".product-qty");
                let newQty = parseInt(input.val());
                let row = $(this).closest("tr");
                let cartId = row.data("id");

                $.ajax({
                    url: "{{ url('cart/update') }}/" + cartId,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        quantity: newQty
                    },
                    success: function(response) {
                        updateTotal();
                    }
                });
            });

            $(".product-qty").on("input", function() {
                let newQty = Math.max(1, parseInt($(this).val()) || 1);
                $(this).val(newQty);

                let row = $(this).closest("tr");
                let cartId = row.data("id");

                $.ajax({
                    url: "{{ url('cart/update') }}/" + cartId,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        quantity: newQty
                    },
                    success: function(response) {
                        updateTotal();
                    }
                });
            });

            let deleteRow, deleteCartId;

            $(".remove-icon").click(function() {
                deleteRow = $(this).closest("tr");
                deleteCartId = deleteRow.data("id");

                $("#deleteConfirmModal").modal("show");
            });

            $("#confirmDelete").click(function() {
                if (deleteCartId) {
                    $.ajax({
                        url: "{{ url('cart/remove') }}/" + deleteCartId,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            var modal = bootstrap.Modal.getInstance(document.getElementById(
                                'deleteConfirmModal'));
                            modal.hide();
                            deleteRow.remove();
                            updateTotal();
                            location.reload();
                        },
                        error: function(xhr) {
                            console.error("Delete error:", xhr.responseText);
                            var modal = bootstrap.Modal.getInstance(document.getElementById(
                                'deleteConfirmModal'));
                            modal.hide();
                        }
                    });
                }
            });

            function updateTotal() {
                let subtotal = 0;
                $(".cart-table tbody tr").each(function() {
                    let price = parseFloat($(this).data("price"));
                    let qty = parseInt($(this).find(".product-qty").val());
                    let total = price * qty;
                    $(this).find(".total-price").text("RS " + total.toFixed(2));
                    subtotal += total;
                });

                $(".cart-subtotal, .cart-total-amount").text("RS " + subtotal.toFixed(2));
            }

            $(".cart-page__buttons-2 .thm-btn").click(function(e) {
                e.preventDefault();

                let userId = "{{ auth()->id() }}";

                $.ajax({
                    url: "{{ route('place.order') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: userId
                    },
                    success: function(response) {
                        if (response.success) {
                            // Create modal HTML
                            var modalHTML = `
                            <div class="order-confirmation-modal" style="
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background-color: rgba(0,0,0,0.7);
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                z-index: 9999;
                            ">
                                <div style="
                                    background: white;
                                    padding: 30px;
                                    border-radius: 10px;
                                    max-width: 500px;
                                    width: 90%;
                                    text-align: center;
                                    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                                    position: relative;
                                ">
                                                
                                                
                                    <h2 style="color: #f47321; margin-top: 0;">Order Confirmed!</h2>
                                    <div style="font-size: 60px; color: #f47321; margin: 20px 0;">✓</div>
                                    <p style="font-size: 16px; margin-bottom: 20px;">${response.whatsapp_message} <br/> WhatsApp: 0345 0403 037</p>
                                                
                                    <p style="margin-bottom: 25px; font-size: 15px;">
                                        Further Queries? Contact us on WhatsApp:
                                    </p>
                                    
                                    <a href="https://wa.me/923450403037" target="_blank" style="
                                        display: inline-block;
                                        background-color: #25D366;
                                        color: white;
                                        padding: 12px 25px;
                                        border-radius: 5px;
                                        text-decoration: none;
                                        font-weight: bold;
                                        margin-bottom: 20px;
                                        transition: background-color 0.3s;
                                    " onmouseover="this.style.backgroundColor='#128C7E'" onmouseout="this.style.backgroundColor='#25D366'">
                                        <i class="fab fa-whatsapp" style="margin-right: 8px;"></i> Chat on WhatsApp
                                    </a>
                                    
                                    <div style="margin-top: 20px;">
                                        <a href="{{ route('my.cart') }}" style="
                                            color: #f47321;
                                            text-decoration: none;
                                            font-weight: 500;
                                            transition: color 0.3s;
                                            border-bottom: 1px solid #f47321;
                                            padding-bottom: 2px;
                                        " onmouseover="this.style.color='#e0651a'" onmouseout="this.style.color='#f47321'">
                                            ← Back to Cart
                                        </a>
                                    </div>
                                </div>
                            </div>`;

                            // Add modal to body
                            document.body.insertAdjacentHTML('beforeend', modalHTML);

                            // Close when clicking outside modal content
                            document.querySelector('.order-confirmation-modal')
                                .addEventListener('click', function(e) {
                                    if (e.target === this) {
                                        this.remove();
                                    }
                                });

                        } else {
                            window.location.href = "{{ route('user.account') }}";
                            // alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        alert("Something went wrong. Please try again.");
                    }
                });
            });
        });
    </script>
@endsection
