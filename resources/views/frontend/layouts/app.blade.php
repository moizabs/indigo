<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('frontend/assets/images/favicons/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('frontend/assets/images/favicons/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('frontend/assets/images/favicons/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('frontend/assets/images/favicons/site.webmanifest') }}" />
    <meta name="description" content="ogenix HTML 5 Template " />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/ogenix-icons/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/reey-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('frontend/assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/vegas/vegas.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/timepicker/timePicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/nice-select/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ogenix.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/ogenix-responsive.css') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="assets/images/favicons/site.webmanifest" />
    <meta name="description" content="ogenix HTML 5 Template " />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500&family=Manrope:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        /* Base Button Style */
        .whatsapp-contact-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #25D366;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 15px 25px 15px 20px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
            z-index: 99;
            display: flex;
            align-items: center;
            gap: 10px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .whatsapp-contact-btn .btn-text {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .whatsapp-contact-btn:hover {
            background-color: #128C7E;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.4);
        }

        .whatsapp-contact-btn:hover .btn-text {
            transform: translateX(3px);
        }

        .whatsapp-contact-btn i {
            font-size: 20px;
            transition: transform 0.3s ease;
        }

        .whatsapp-contact-btn:hover i {
            transform: scale(1.1);
        }

        /* Pulse Animation */
        .pulse-effect {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50px;
            top: 0;
            left: 0;
            transform: scale(0);
            opacity: 0;
            animation: pulse 2.5s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            70% {
                transform: scale(1.2);
                opacity: 0;
            }

            100% {
                transform: scale(0.8);
                opacity: 0;
            }
        }

        /* Modal Styles with Animations */
        .whatsapp-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-content2 {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 380px;
            text-align: center;
            position: relative;
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .modal-show .modal-content2 {
            transform: translateY(0);
            opacity: 1;
        }

        .modal-show {
            display: flex;
            opacity: 1;
        }

        .modal-icon {
            background: #25D366;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            animation: bounceIn 0.6s ease;
        }

        .modal-icon i {
            color: white;
            font-size: 30px;
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            60% {
                transform: scale(1.1);
                opacity: 1;
            }

            100% {
                transform: scale(1);
            }
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #888;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .close-btn:hover {
            color: #333;
            transform: rotate(90deg);
        }

        .whatsapp-direct-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #25D366;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
            transition: all 0.3s ease;
            transform: scale(1);
        }

        .whatsapp-direct-btn:hover {
            background-color: #128C7E;
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(18, 140, 126, 0.3);
        }

        /* Typing Indicator Animation */
        .typing-indicator {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin: 15px 0;
        }

        .dot {
            width: 8px;
            height: 8px;
            background-color: #999;
            border-radius: 50%;
            animation: typingAnimation 1.4s infinite ease-in-out;
        }

        .dot:nth-child(1) {
            animation-delay: 0s;
        }

        .dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typingAnimation {

            0%,
            60%,
            100% {
                transform: translateY(0);
            }

            30% {
                transform: translateY(-5px);
            }
        }

        .modal-footer {
            font-size: 14px;
            color: #666;
            margin-top: 20px;
            opacity: 0;
            animation: fadeIn 0.5s ease 0.4s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        h3 {
            margin-bottom: 15px;
            color: #333;
            animation: fadeIn 0.5s ease 0.2s forwards;
            opacity: 0;
        }

        p {
            color: #555;
            margin-bottom: 5px;
            animation: fadeIn 0.5s ease 0.3s forwards;
            opacity: 0;
        }

    </style>
</head>

<body class="custom-cursor">
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>
    <div class="page-wrapper">
        @include('frontend.includes.header')
        <main>
            @yield('content')
        </main>
        @include('frontend.includes.footer')
    </div>
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ route('index') }}" aria-label="logo image"><img
                        src="{{ asset('/frontend/assets/images/logo.png') }}" width="104" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@indigoshopify.com">info@indigoshopify.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+923095320000">+ 92 ( 309 ) 53 - 20000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    {{-- <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form action="{{ route('frontend.products') }}" method="GET">
                <label for="search" class="sr-only">search here</label>
                <input type="text" id="search" name="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
    </div> --}}
{{-- 
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form action="{{ route('frontend.products') }}" method="GET" style="position: relative;">
                <label for="search" class="sr-only">search here</label>
                <input type="text" id="search" name="search" placeholder="Search Here..." autocomplete="off" />
                
                <div id="live-search-results" style="top: 100%; background: #fff; border: 1px solid #ccc; display: none; z-index: 9999; max-height: 300px; overflow-y: auto;"></div>
                
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>                
            </form>
        </div>
    </div> --}}
    

    {{-- <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-up-arrow"></i></a> --}}

    <!-- WhatsApp Contact Button with Animated Modal -->
    <button class="whatsapp-contact-btn" onclick="openWhatsAppModal()">
        <i class="fab fa-whatsapp"></i>
        <span class="btn-text">Contact Us</span>
        <span class="pulse-effect"></span>
    </button>

    <!-- WhatsApp Modal/Popup -->
    <div id="whatsappModal" class="whatsapp-modal">
        <div class="modal-content2">
            <span class="close-btn" onclick="closeWhatsAppModal()">&times;</span>
            <div class="modal-icon">
                <i class="fab fa-whatsapp"></i>
            </div>
            <h3>Contact Us via WhatsApp</h3>
            <p>Click below to start a conversation with our team:</p>
            <a href="https://wa.me/923450403037" class="whatsapp-direct-btn" target="_blank">
                <i class="fab fa-whatsapp"></i> Open WhatsApp
            </a>
            <div class="typing-indicator">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <p class="modal-footer">We typically respond within 24 hours</p>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                let query = $(this).val();
                
                if (query.length >= 2) {
                    $.ajax({
                        url: '{{ route("frontend.search.ajax") }}',
                        type: 'GET',
                        data: { query: query },
                        success: function (products) {
                            let dropdown = $('#live-search-results');
                            dropdown.empty();
        
                            if (products.length > 0) {
                                products.forEach(product => {
                                    dropdown.append(`
                                        <div onclick="window.location.href='products/detail/${product.slug}'" style="display: flex; align-items: center; padding: 10px; border-bottom: 1px solid #eee; cursor: pointer;">
                                            <img src="${product.image_url}" alt="${product.name}" style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px; border-radius: 5px;">
                                            <div>
                                                <strong>${product.name}</strong><br>
                                                <span style="color: #888;">Rs. ${product.price}</span>
                                            </div>
                                        </div>
                                    `);
                                });
                                dropdown.show();
                            } else {
                                dropdown.html('<div style="padding: 10px;">No products found</div>').show();
                            }
                        }
                    });
                } else {
                    $('#live-search-results').hide();
                }
            });
        
            $(document).click(function (e) {
                if (!$(e.target).closest('#search, #live-search-results').length) {
                    $('#live-search-results').hide();
                }
            });
        });
        </script>


    <script>
        $(document).ready(function() {
            $(document).on("click", ".add-to-cart", function(e) {
                e.preventDefault();

                // var isAuthenticated = $(this).data('auth');
                let productId = $(this).data("id");
                let quantity = $(this).closest(".product-details__buttons")
                    .prev(".product-details__quantity")
                    .find(".quantity-input").val();

                quantity = quantity && !isNaN(quantity) && quantity > 0 ? parseInt(quantity, 10) : 1;

                // if (isAuthenticated == 0) {
                //     window.location.href = "{{ route('user.account') }}";
                //     return false;
                // }

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    method: "POST",
                    data: {
                        product_id: productId,
                        quantity: quantity,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content")
                    },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert("Error adding to cart. Please try again.");
                    }
                });
            });

            $(document).on("click", ".add-to-wishlist", function(e) {
                e.preventDefault();

                // var isAuthenticated = $(this).data('auth');
                let productId = $(this).data("id");

                // if (isAuthenticated == 0) {
                //     window.location.href = "{{ route('user.account') }}";
                //     return false;
                // }

                $.ajax({
                    url: "{{ route('wishlist.add') }}",
                    type: "POST",
                    data: {
                        product_id: productId
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content")
                    },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert("Error.");
                    }
                });
            });

            $(document).on('click', '.shop-category ul li a', function() {
                $('.shop-category ul li').removeClass('active');
                $(this).parent().addClass('active');
            });

            $(".subscribe-one__form").submit(function(e) {
                e.preventDefault();

                let form = $(this);
                let email = $("#subscriberEmail").val();
                let responseBox = form.closest(".subscribe-one__form-box").find(".mc-form__response");

                responseBox.html("");

                $.ajax({
                    url: "{{ route('subscribe.store') }}",
                    method: "POST",
                    data: {
                        email: email,
                    },
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content")
                    },
                    beforeSend: function() {
                        responseBox.html('<span style="color: blue;">Processing...</span>');
                    },
                    success: function(response) {
                        responseBox.html('<span style="color: green;">' + response.message +
                            '</span>');
                        form.trigger("reset"); // Reset form
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON?.errors;
                        let errorMessage = errors ? errors.email[0] : "Something went wrong!";
                        responseBox.html('<span style="color: red;">' + errorMessage +
                            '</span>');
                    }
                });
            });

            $(document).on('click', '.category-filter', function() {
                const categoryId = $(this).data('category');
                const url = $(this).data('url');

                // Add loading indicator
                $('#productListGridTabContent').html(
                    '<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-2x"></i></div>');

                // Update active state
                $('.category-filter').parent().removeClass('active');
                $(this).parent().addClass('active');

                // Make AJAX request
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: {
                        category: categoryId
                    },
                    success: function(response) {
                        $('#productListGridTabContent').html(response);
                    },
                    error: function(xhr) {
                        $('#productListGridTabContent').html(
                            '<div class="alert alert-danger">Error loading products</div>');
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>

    <script>
        function openWhatsAppModal() {
            const modal = document.getElementById('whatsappModal');
            modal.style.display = 'flex';
            setTimeout(() => {
                modal.classList.add('modal-show');
            }, 10);
            document.body.style.overflow = 'hidden';
        }

        function closeWhatsAppModal() {
            const modal = document.getElementById('whatsappModal');
            modal.classList.remove('modal-show');
            document.body.style.overflow = '';

            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }

        window.onclick = function(event) {
            const modal = document.getElementById('whatsappModal');
            if (event.target == modal) {
                closeWhatsAppModal();
            }
        }
    </script>
    @yield('script')
    <script src="{{ asset('frontend/assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/circleType/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <!-- template js -->
    <script src="{{ asset('frontend/assets/js/ogenix.js') }}"></script>
</body>

</html>
