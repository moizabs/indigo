<!doctype html>
<html lang="en" data-layout="vertical" data-sidebar="dark" data-sidebar-image="img-1" data-sidebar-size="lg"
    data-preloader="disable" data-theme="default" data-topbar="light" data-bs-theme="light" data-theme-color="0">

<head>
    <meta charset="utf-8">
    <title>title | Dosix - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    <!-- Fonts css load -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link id="fontsLink" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Layout config Js -->
    <script src="{{ asset('backend/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    <!-- custom Css-->
    <link href="{{ asset('backend/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="layout-wrapper">
        <div class="vertical-overlay"></div>
        <div class="topbar-wrapper shadow">
            <header id="page-topbar">
                <div class="layout-width">
                    <div class="navbar-header">
                        <div class="d-flex">
                            <!-- LOGO -->
                            <div class="navbar-brand-box horizontal-logo">
                                <a href="{{ route('index') }}" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt=""
                                            height="22">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt=""
                                            height="22">
                                    </span>
                                </a>

                                <a href="{{ route('index') }}" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt=""
                                            height="22">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt=""
                                            height="22">
                                    </span>
                                </a>
                            </div>

                            <div class="header-item flex-shrink-0 me-3 vertical-btn-wrapper">
                                <button type="button"
                                    class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger border hamburger-icon"
                                    id="topnav-hamburger-icon">
                                    <i class='bx bx-chevrons-right arrow-right'></i>
                                    <i class='bx bx-chevrons-left arrow-left'></i>
                                </button>
                            </div>

                            <h4 class="mb-sm-0 header-item page-title lh-base">Customers</h4>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="dropdown d-none d-md-flex topbar-head-dropdown header-item">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="bx bx-search fs-3xl"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-search-dropdown">
                                    <form class="p-3">
                                        <div class="form-group m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..."
                                                    aria-label="Recipient's username">
                                                <button class="btn btn-primary" type="submit"><i
                                                        class="mdi mdi-magnify"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="dropdown ms-1 topbar-head-dropdown header-item">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img id="header-lang-img" src="{{ asset('backend/assets/images/flags/us.svg') }}"
                                        alt="Header Language" height="20" class="rounded">
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item language py-2"
                                        data-lang="en" title="English">
                                        <img src="{{ asset('backend/assets/images/flags/us.svg') }}" alt="user-image"
                                            class="me-2 rounded" height="18">
                                        <span class="align-middle">English</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                        data-lang="sp" title="Spanish">
                                        <img src="{{ asset('backend/assets/images/flags/spain.svg') }}"
                                            alt="user-image" class="me-2 rounded" height="18">
                                        <span class="align-middle">Española</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                        data-lang="gr" title="German">
                                        <img src="{{ asset('backend/assets/images/flags/germany.svg') }}"
                                            alt="user-image" class="me-2 rounded" height="18"> <span
                                            class="align-middle">Deutsche</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                        data-lang="it" title="Italian">
                                        <img src="{{ asset('backend/assets/images/flags/italy.svg') }}"
                                            alt="user-image" class="me-2 rounded" height="18">
                                        <span class="align-middle">Italiana</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                        data-lang="ru" title="Russian">
                                        <img src="{{ asset('backend/assets/images/flags/russia.svg') }}"
                                            alt="user-image" class="me-2 rounded" height="18">
                                        <span class="align-middle">русский</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                        data-lang="ch" title="Chinese">
                                        <img src="{{ asset('backend/assets/images/flags/china.svg') }}"
                                            alt="user-image" class="me-2 rounded" height="18">
                                        <span class="align-middle">中国人</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                        data-lang="fr" title="French">
                                        <img src="{{ asset('backend/assets/images/flags/french.svg') }}"
                                            alt="user-image" class="me-2 rounded" height="18">
                                        <span class="align-middle">français</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item language"
                                        data-lang="ar" title="Arabic">
                                        <img src="{{ asset('backend/assets/images/flags/ae.svg') }}" alt="user-image"
                                            class="me-2 rounded" height="18">
                                        <span class="align-middle">عربي</span>
                                    </a>
                                </div>
                            </div>

                            <div class="dropdown topbar-head-dropdown ms-1 header-item">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                                    id="page-header-cart-dropdown" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-shopping-bag fs-3xl'></i>
                                    <span
                                        class="position-absolute topbar-badge cartitem-badge fs-3xs translate-middle badge rounded-pill bg-info">5</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 product-list"
                                    aria-labelledby="page-header-cart-dropdown">
                                    <div class="p-3 border-bottom">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-lg fw-semibold"> My Cart <span
                                                        class="badge bg-secondary fs-sm cartitem-badge ms-1">7</span>
                                                </h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-simplebar style="max-height: 300px;">
                                        <div class="p-3">
                                            <div class="text-center empty-cart" id="empty-cart">
                                                <div class="avatar-md mx-auto my-3">
                                                    <div
                                                        class="avatar-title bg-info-subtle text-info fs-2 rounded-circle">
                                                        <i class='bx bx-cart'></i>
                                                    </div>
                                                </div>
                                                <h5 class="mb-3">Your Cart is Empty!</h5>
                                                <a href="#!" class="btn btn-success w-md mb-3">Shop Now</a>
                                            </div>

                                            <div class="d-block dropdown-item product text-wrap p-2">
                                                <div class="d-flex">
                                                    <div class="avatar-sm me-3 flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="{{ asset('backend/assets/images/products/32/img-1.png') }}"
                                                                class="avatar-xs" alt="user-pic">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                        <h6 class="mt-0 mb-3 fs-md">
                                                            <a href="#!" class="text-reset">Blive Printed Men
                                                                Round Neck</a>
                                                        </h6>
                                                        <div class="text-muted fw-medium d-none">$<span
                                                                class="product-price">327.49</span></div>
                                                        <div class="input-step">
                                                            <button type="button" class="minus">–</button>
                                                            <input type="number" class="product-quantity"
                                                                value="2" min="0" max="100"
                                                                readonly>
                                                            <button type="button" class="plus">+</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                        <button type="button"
                                                            class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#removeCartModal"><i
                                                                class="ri-close-fill fs-lg"></i></button>
                                                        <h5 class="mb-0">$ <span
                                                                class="product-line-price">654.98</span></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-block dropdown-item product text-wrap p-2">
                                                <div class="d-flex">
                                                    <div class="avatar-sm me-3 flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="{{ asset('backend/assets/images/products/32/img-5.png') }}"
                                                                class="avatar-xs" alt="user-pic">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1 fs-sm text-muted">Sportwear</p>
                                                        <h6 class="mt-0 mb-3 fs-md">
                                                            <a href="#!" class="text-reset">Willage Volleyball
                                                                Ball</a>
                                                        </h6>
                                                        <div class="text-muted fw-medium d-none">$<span
                                                                class="product-price">49.06</span></div>
                                                        <div class="input-step">
                                                            <button type="button" class="minus">–</button>
                                                            <input type="number" class="product-quantity"
                                                                value="3" min="0" max="100"
                                                                readonly>
                                                            <button type="button" class="plus">+</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                        <button type="button"
                                                            class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#removeCartModal"><i
                                                                class="ri-close-fill fs-lg"></i></button>
                                                        <h5 class="mb-0">$ <span
                                                                class="product-line-price">147.18</span></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-block dropdown-item product text-wrap p-2">
                                                <div class="d-flex">
                                                    <div class="avatar-sm me-3 flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="{{ asset('backend/assets/images/products/32/img-10.png') }}"
                                                                class="avatar-xs" alt="user-pic">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                        <h6 class="mt-0 mb-3 fs-md">
                                                            <a href="#!" class="text-reset">Cotton collar tshirts
                                                                for men</a>
                                                        </h6>
                                                        <div class="text-muted fw-medium d-none">$<span
                                                                class="product-price">53.33</span></div>
                                                        <div class="input-step">
                                                            <button type="button" class="minus">–</button>
                                                            <input type="number" class="product-quantity"
                                                                value="3" min="0" max="100"
                                                                readonly>
                                                            <button type="button" class="plus">+</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                        <button type="button"
                                                            class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#removeCartModal"><i
                                                                class="ri-close-fill fs-lg"></i></button>
                                                        <h5 class="mb-0">$ <span
                                                                class="product-line-price">159.99</span></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-block dropdown-item product text-wrap p-2">
                                                <div class="d-flex">
                                                    <div class="avatar-sm me-3 flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="{{ asset('backend/assets/images/products/32/img-11.png') }}"
                                                                class="avatar-xs" alt="user-pic">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                        <h6 class="mt-0 mb-3 fs-md">
                                                            <a href="#!" class="text-reset">Jeans blue men
                                                                boxer</a>
                                                        </h6>
                                                        <div class="text-muted fw-medium d-none">$<span
                                                                class="product-price">164.37</span></div>
                                                        <div class="input-step">
                                                            <button type="button" class="minus">–</button>
                                                            <input type="number" class="product-quantity"
                                                                value="1" min="0" max="100"
                                                                readonly>
                                                            <button type="button" class="plus">+</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                        <button type="button"
                                                            class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#removeCartModal"><i
                                                                class="ri-close-fill fs-lg"></i></button>
                                                        <h5 class="mb-0">$ <span
                                                                class="product-line-price">164.37</span></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-block dropdown-item product text-wrap p-2">
                                                <div class="d-flex">
                                                    <div class="avatar-sm me-3 flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="{{ asset('backend/assets/images/products/32/img-8.png') }}"
                                                                class="avatar-xs" alt="user-pic">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-1 fs-sm text-muted">Fashion</p>
                                                        <h6 class="mt-0 mb-3 fs-md">
                                                            <a href="#!" class="text-reset">Full Sleeve Solid Men
                                                                Sweatshirt</a>
                                                        </h6>
                                                        <div class="text-muted fw-medium d-none">$<span
                                                                class="product-price">180.00</span></div>
                                                        <div class="input-step">
                                                            <button type="button" class="minus">–</button>
                                                            <input type="number" class="product-quantity"
                                                                value="1" min="0" max="100"
                                                                readonly>
                                                            <button type="button" class="plus">+</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="ps-2 d-flex flex-column justify-content-between align-items-end">
                                                        <button type="button"
                                                            class="btn btn-icon btn-sm btn-ghost-primary remove-cart-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#removeCartModal"><i
                                                                class="ri-close-fill fs-lg"></i></button>
                                                        <h5 class="mb-0">$ <span
                                                                class="product-line-price">180.00</span></h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="count-table">
                                                <table class="table table-borderless mb-0  fw-semibold">
                                                    <tbody>
                                                        <tr>
                                                            <td>Sub Total :</td>
                                                            <td class="text-end cart-subtotal">$1306.52</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Discount <span class="text-muted">(DOSIX15)</span>:
                                                            </td>
                                                            <td class="text-end cart-discount">- $195.98</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shipping Charge :</td>
                                                            <td class="text-end cart-shipping">$65.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Estimated Tax (12.5%) : </td>
                                                            <td class="text-end cart-tax">$163.31</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border"
                                        id="checkout-elem">
                                        <div class="d-flex justify-content-between align-items-center pb-3">
                                            <h5 class="m-0 text-muted">Total:</h5>
                                            <div class="px-2">
                                                <h5 class="m-0 cart-total">$1338.86</h5>
                                            </div>
                                        </div>

                                        <a href="apps-ecommerce-checkout.html" class="btn btn-info text-center w-100">
                                            Checkout
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="ms-1 header-item d-none d-sm-flex">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                                    data-toggle="fullscreen">
                                    <i class='bx bx-fullscreen fs-3xl'></i>
                                </button>
                            </div>

                            <div class="dropdown topbar-head-dropdown ms-1 header-item">
                                <button type="button"
                                    class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-sun align-middle fs-3xl"></i>
                                </button>
                                <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                                    <a href="#!" class="dropdown-item" data-mode="light"><i
                                            class="bx bx-sun align-middle me-2"></i> Default (light mode)</a>
                                    <a href="#!" class="dropdown-item" data-mode="dark"><i
                                            class="bx bx-moon align-middle me-2"></i> Dark</a>
                                    <a href="#!" class="dropdown-item" data-mode="auto"><i
                                            class="bx bx-desktop align-middle me-2"></i> Auto (system default)</a>
                                </div>
                            </div>

                            <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                                <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-notification fs-3xl'></i>
                                    <span
                                        class="position-absolute topbar-badge fs-3xs translate-middle badge rounded-pill bg-danger"><span
                                            class="notification-badge">3</span><span class="visually-hidden">unread
                                            messages</span></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-notifications-dropdown">

                                    <div class="dropdown-head rounded-top">
                                        <div class="px-3 py-3">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="mb-0 fs-lg fw-semibold"> Notifications <span
                                                            class="badge bg-danger-subtle text-danger fs-sm notification-badge">
                                                            3</span></h6>
                                                </div>
                                                <div class="col-auto dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                                        class="link-secondary fs-md"><i
                                                            class="bi bi-three-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">All Clear</a></li>
                                                        <li><a class="dropdown-item" href="#">Mark all as
                                                                read</a></li>
                                                        <li><a class="dropdown-item" href="#">Archive All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="pb-2 ps-0" id="notificationItemsTabContent">
                                        <div data-simplebar style="max-height: 300px;" class="pe-0">
                                            <h6 class="text-overflow text-muted fs-sm my-2 notification-title px-3">
                                                Today</h6>

                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative border-dashed border-bottom">
                                                <div class="d-flex">
                                                    <div class="position-relative me-3 flex-shrink-0">
                                                        <img src="{{ asset('backend/assets/images/users/32/avatar-3.jpg') }}"
                                                            class="rounded-circle avatar-xs" alt="user-pic">
                                                        <span
                                                            class="active-badge position-absolute start-100 translate-middle p-1 bg-danger rounded-circle">
                                                            <span class="visually-hidden">Un Active</span>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="fs-md text-muted">
                                                            <p class="mb-1 text-muted"><b>Angela Bernier</b> mentioned
                                                                you in <a href="#!">This Project</a></p>
                                                        </div>
                                                        <p class="mb-0 fs-xs fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 48 min
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-base">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="all-notification-check02">
                                                            <label class="form-check-label"
                                                                for="all-notification-check02"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative border-dashed border-bottom">
                                                <div class="d-flex">
                                                    <div class="position-relative me-3 flex-shrink-0">
                                                        <img src="{{ asset('backend/assets/images/users/32/avatar-2.jpg') }}"
                                                            class="rounded-circle avatar-xs" alt="user-pic">
                                                        <span
                                                            class="active-badge position-absolute start-100 translate-middle p-1 bg-success rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="fs-md text-muted">
                                                            <p class="mb-1">Answered to your comment on the cash flow
                                                                forecast's graph 🔔.</p>
                                                        </div>
                                                        <p class="mb-0 fs-xs fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 1 hrs
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-base">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="all-notification-check02">
                                                            <label class="form-check-label"
                                                                for="all-notification-check02"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h6 class="text-overflow text-muted fs-sm my-3 px-3 notification-title">
                                                Read Before</h6>

                                            <div
                                                class="text-reset notification-item d-block dropdown-item position-relative border-dashed border-bottom">
                                                <div class="d-flex">

                                                    <div class="position-relative me-3 flex-shrink-0">
                                                        <img src="{{ asset('backend/assets/images/users/32/avatar-8.jpg') }}"
                                                            class="rounded-circle avatar-xs" alt="user-pic">
                                                        <span
                                                            class="active-badge position-absolute start-100 translate-middle p-1 bg-warning rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                    </div>

                                                    <div class="flex-grow-1">
                                                        <div class="fs-md text-muted">
                                                            <p class="mb-1">We talked about a project on linkedin.
                                                            </p>
                                                        </div>
                                                        <p class="mb-0 fs-xs fw-medium text-uppercase text-muted">
                                                            <span><i class="mdi mdi-clock-outline"></i> 4 hrs
                                                                ago</span>
                                                        </p>
                                                    </div>
                                                    <div class="px-2 fs-base">
                                                        <div class="form-check notification-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="all-notification-check04">
                                                            <label class="form-check-label"
                                                                for="all-notification-check04"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notification-actions" id="notification-actions">
                                            <div class="d-flex text-muted justify-content-center align-items-center">
                                                Select <div id="select-content" class="text-body fw-semibold px-1">0
                                                </div> Result <button type="button"
                                                    class="btn btn-link link-danger p-0 ms-2" data-bs-toggle="modal"
                                                    data-bs-target="#removeNotificationModal">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown ms-sm-3 header-item topbar-user">
                                <button type="button" class="btn shadow-none" id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center">
                                        <img class="rounded-circle header-profile-user"
                                            src="{{ asset('backend/assets/images/users/32/avatar-1.jpg') }}"
                                            alt="Header Avatar">
                                        <span class="text-start ms-xl-2">
                                            <span
                                                class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Richard
                                                Marshall</span>
                                            <span
                                                class="d-none d-xl-block ms-1 fs-sm user-name-sub-text">Founder</span>
                                        </span>
                                    </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <h6 class="dropdown-header">Welcome Richard!</h6>
                                    <a class="dropdown-item" href="pages-profile.html"><i
                                            class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i>
                                        <span class="align-middle">Profile</span></a>
                                    <a class="dropdown-item" href="apps-chat.html"><i
                                            class="mdi mdi-message-text-outline text-muted fs-lg align-middle me-1"></i>
                                        <span class="align-middle">Messages</span></a>
                                    <a class="dropdown-item" href="apps-tickets-overview.html"><i
                                            class="mdi mdi-calendar-check-outline text-muted fs-lg align-middle me-1"></i>
                                        <span class="align-middle">Taskboard</span></a>
                                    <a class="dropdown-item" href="pages-faqs.html"><i
                                            class="mdi mdi-lifebuoy text-muted fs-lg align-middle me-1"></i> <span
                                            class="align-middle">Help</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="pages-profile.html"><i
                                            class="mdi mdi-wallet text-muted fs-lg align-middle me-1"></i> <span
                                            class="align-middle">Balance : <b>$8451.36</b></span></a>
                                    <a class="dropdown-item" href="pages-profile-settings.html"><span
                                            class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                                            class="mdi mdi-cog-outline text-muted fs-lg align-middle me-1"></i> <span
                                            class="align-middle">Settings</span></a>
                                    <a class="dropdown-item" href="auth-lockscreen.html"><i
                                            class="mdi mdi-lock text-muted fs-lg align-middle me-1"></i> <span
                                            class="align-middle">Lock screen</span></a>
                                    <a class="dropdown-item" href="auth-logout.html"><i
                                            class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i> <span
                                            class="align-middle" data-key="t-logout">Logout</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="NotificationModalbtn-close"></button>
                        </div>
                        <div class="modal-body p-md-5">
                            <div class="text-center">
                                <div class="text-danger">
                                    <i class="bi bi-trash display-4"></i>
                                </div>
                                <div class="mt-4 fs-base">
                                    <h4 class="mb-1">Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes,
                                    Delete It!</button>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div>
            </div>
            <div id="removeCartModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-cartmodal"></button>
                        </div>
                        <div class="modal-body p-md-5">
                            <div class="text-center">
                                <div class="text-danger">
                                    <i class="bi bi-trash display-5"></i>
                                </div>
                                <div class="mt-4">
                                    <h4>Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product ?</p>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                <button type="button" class="btn w-sm btn-light"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn w-sm btn-danger" id="remove-cartproduct">Yes,
                                    Delete It!</button>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <ul class="nav nav-underline menu-tabs flex-nowrap overflow-x-auto" id="menu-tabs">
                <li class="nav-item flex-shrink-0">
                    <a class="nav-link" aria-current="page" href="dashboard-ecommerce.html">Overview</a>
                </li>
                <li class="nav-item flex-shrink-0">
                    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                </li>
                <li class="nav-item flex-shrink-0">
                    <a class="nav-link" href="apps-ecommerce-product-details.html">Product Overview</a>
                </li>
                <li class="nav-item flex-shrink-0">
                    <a class="nav-link" href="{{ route('products.create') }}">Add Product</a>
                </li>
                <li class="nav-item flex-shrink-0">
                    <a class="nav-link" href="apps-ecommerce-cart.html">Shopping Cart</a>
                </li>
                <li class="nav-item flex-shrink-0">
                    <a class="nav-link" href="apps-ecommerce-checkout.html">Checkout</a>
                </li>
                <li class="nav-item flex-shrink-0">
                    <a class="nav-link" href="apps-ecommerce-orders.html">Orders</a>
                </li>
                <li class="nav-item flex-shrink-0">
                    <a class="nav-link" href="apps-ecommerce-customers.html">Customers</a>
                </li>
            </ul>
        </div>
        @include('dashboard.includes.header') <!-- Header Include -->

        {{-- <div class="container"> --}}
        @yield('content') <!-- Dynamic Content -->
        {{-- </div> --}}

        @include('dashboard.includes.footer') <!-- Footer Include -->
        {{-- <div class="main-content">
            <div class="page-content wrapper">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Customers</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center flex-wrap gap-3">
                                        <div class="flex-grow-1">
                                            <h3 class="card-title mb-0">Customers List</h3>
                                        </div>
                                        <div>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="button" class="btn btn-primary add-btn"
                                                    data-bs-toggle="modal" data-bs-target="#showModal"><i
                                                        class="bi bi-plus-circle align-baseline me-1"></i> Add
                                                    Customer</button>
                                                <button type="button" class="btn btn-secondary"><i
                                                        class="ph-cloud-arrow-down align-middle me-1"></i>
                                                    Import</button>
                                                <button type="button" class="btn btn-subtle-info"><i
                                                        class="ph-cloud-arrow-up align-middle me-1"></i>
                                                    Export</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row" id="customer-list">
                        <div class="col-xxl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gy-3">
                                        <div class="col-xl-4">
                                            <div class="search-box">
                                                <input type="text" class="form-control search"
                                                    placeholder="Search customer, email etc...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-4">
                                            <div>
                                                <select class="form-control" id="idStatus" data-choices
                                                    data-choices-search-false>
                                                    <option value="all">All Select</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Unactive">Unactive</option>
                                                    <option value="Block">Block</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-4">
                                            <input type="text" class="form-control" id="datepicker-range"
                                                data-provider="flatpickr" data-date-format="d M, Y"
                                                data-range-date="true" placeholder="Select date">
                                        </div>
                                        <div class="col-xl-2 col-md-4">
                                            <button class="btn btn-subtle-primary w-100" onclick="filterData();"><i
                                                    class="bi bi-funnel align-baseline me-1"></i> Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end card-->
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table align-middle table-nowrap">
                                            <tbody class="list">
                                                <tr>
                                                    <td class="id d-none"><a href="javascript:void(0);"
                                                            class="fw-medium link-primary">01</a></td>
                                                    <td class="customer">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0 me-2">
                                                                <div>
                                                                    <img class="avatar-xs rounded-circle customer-image-elem"
                                                                        alt=""
                                                                        src="backend/assets/images/users/32/avatar-2.jpg">
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-base mb-0"><a href="#"
                                                                        class="text-reset customer-name-elem">Javon
                                                                        Pouros</a></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="email">rashawn@dosix.com</td>
                                                    <td class="contact">+(253) 12345 67890</td>
                                                    <td class="date">28 Feb, 2023</td>
                                                    <td class="status"><span
                                                            class="badge bg-secondary-subtle text-secondary">Unactive</span>
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-subtle-secondary btn-sm dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill align-middle"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item view-item-btn"
                                                                        href="javascript:void(0);"><i
                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>View</a>
                                                                </li>
                                                                <li><a class="dropdown-item edit-item-btn"
                                                                        href="#showModal" data-bs-toggle="modal"><i
                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                        Edit</a></li>
                                                                <li><a class="dropdown-item remove-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        href="#deleteRecordModal"><i
                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                        Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center py-4">
                                            <i class="ph-magnifying-glass fs-1 text-primary"></i>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 150+ customers We did
                                                not find any customers for you search.</p>
                                        </div>
                                    </div>
                                    <div class="align-items-center mt-4 justify-content-between row text-center text-sm-start"
                                        id="pagination-element">
                                        <div class="col-sm">
                                            <div class="text-muted">
                                                Showing <span class="fw-semibold">10</span> of <span
                                                    class="fw-semibold">13</span> Results
                                            </div>
                                        </div>
                                        <div class="col-sm-auto  mt-3 mt-sm-0">
                                            <div class="pagination-wrap hstack gap-2">
                                                <a class="page-item pagination-prev disabled"
                                                    href="javascript:void(0)">Previous</a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next"
                                                    href="javascript:void(0)">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-4">
                            <div class="card" id="overview-card">
                                <div class="card-body">
                                    <div class="d-flex gap-3 align-items-center flex-wrap">
                                        <div class="flex-shirnk-0">
                                            <img src="backend/assets/images/users/48/avatar-5.jpg" alt=""
                                                class="avatar-sm rounded overview-img">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="fs-lg overview-name">Verona Mosciski</h6>
                                            <p class="text-muted mb-0"><a href="#!"
                                                    class="overview-nick-name">@mosciski</a></p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-subtle-primary custom-toggle active"
                                                data-bs-toggle="button">
                                                <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i>
                                                    Follow</span>
                                                <span class="icon-off"><i
                                                        class="ri-user-unfollow-line align-bottom me-1"></i>
                                                    Unfollow</span>
                                            </button>
                                            <button class="btn btn-subtle-danger btn-icon"><i
                                                    class="ph-trash"></i></button>
                                        </div>
                                    </div>
                                    <ul class="d-flex align-items-center gap-2 list-unstyled mt-4">
                                        <li>Social Media:</li>
                                        <li>
                                            <a href="#!" class="btn btn-subtle-success btn-icon btn-sm"><i
                                                    class="bi bi-whatsapp"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!" class="btn btn-subtle-primary btn-icon btn-sm"><i
                                                    class="bi bi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#!" class="btn btn-subtle-secondary btn-icon btn-sm"><i
                                                    class="bi bi-github"></i></a>
                                        </li>
                                    </ul>
                                    <div>
                                        <table class="table table-sm table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th>Email</th>
                                                    <td class="overview-email">vmosciski@dosix.com</td>
                                                </tr>
                                                <tr>
                                                    <th>Contact</th>
                                                    <td class="overview-contact">+(253) 12345 67890</td>
                                                </tr>
                                                <tr>
                                                    <th>Joining Date</th>
                                                    <td class="overview-date">20 Feb, 2023</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td class="overview-status"><span
                                                            class="badge bg-danger-subtle text-danger">Block</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4">
                                        <label class="form-label fs-md">Private Notes</label>
                                        <div class="private-notes"></div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-0">
                                    <h6 class="fs-md px-4 mb-3">Order History</h6>
                                    <div data-simplebar class="px-4" style="max-height: 325px;">
                                        <div class="vstack gap-3">
                                            <div class="p-2 border border-dashed">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="backend/assets/images/products/32/img-1.png"
                                                                alt="" class="avatar-xs">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!">
                                                            <h6 class="fs-md mb-2">Craft Women Black Sling Bag</h6>
                                                        </a>
                                                        <ul
                                                            class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                            <li>
                                                                <i class="ph-star align-baseline"></i> 487
                                                            </li>
                                                            <li>
                                                                <i class="ph-shopping-cart align-baseline"></i> 936
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5 class="fs-md text-primary mb-0">$15.99</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <button class="btn btn-secondary btn-icon btn-sm"><i
                                                                class="ph-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 border border-dashed">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="backend/assets/images/products/32/img-2.png"
                                                                alt="" class="avatar-xs">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!">
                                                            <h6 class="fs-md mb-2">Unique Men's Wrist Watch</h6>
                                                        </a>
                                                        <ul
                                                            class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                            <li>
                                                                <i class="ph-star align-baseline"></i> 452
                                                            </li>
                                                            <li>
                                                                <i class="ph-shopping-cart align-baseline"></i> 1420
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5 class="fs-md text-primary mb-0">$84.99</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <button class="btn btn-secondary btn-icon btn-sm"><i
                                                                class="ph-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 border border-dashed">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="backend/assets/images/products/32/img-3.png"
                                                                alt="" class="avatar-xs">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!">
                                                            <h6 class="fs-md mb-2">Twiala Floral Dress</h6>
                                                        </a>
                                                        <ul
                                                            class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                            <li>
                                                                <i class="ph-star align-baseline"></i> 562
                                                            </li>
                                                            <li>
                                                                <i class="ph-shopping-cart align-baseline"></i> 1348
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5 class="fs-md text-primary mb-0">$149.99</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <button class="btn btn-secondary btn-icon btn-sm"><i
                                                                class="ph-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 border border-dashed">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="backend/assets/images/products/32/img-4.png"
                                                                alt="" class="avatar-xs">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!">
                                                            <h6 class="fs-md mb-2">Tokyo Fancy Bomber Jacket</h6>
                                                        </a>
                                                        <ul
                                                            class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                            <li>
                                                                <i class="ph-star align-baseline"></i> 644
                                                            </li>
                                                            <li>
                                                                <i class="ph-shopping-cart align-baseline"></i> 1540
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5 class="fs-md text-primary mb-0">$245.00</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <button class="btn btn-secondary btn-icon btn-sm"><i
                                                                class="ph-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 border border-dashed">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="backend/assets/images/products/32/img-5.png"
                                                                alt="" class="avatar-xs">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!">
                                                            <h6 class="fs-md mb-2">Aster Dress 2XL / Royal Blue</h6>
                                                        </a>
                                                        <ul
                                                            class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                            <li>
                                                                <i class="ph-star align-baseline"></i> 841
                                                            </li>
                                                            <li>
                                                                <i class="ph-shopping-cart align-baseline"></i> 985
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5 class="fs-md text-primary mb-0">$74.63</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <button class="btn btn-secondary btn-icon btn-sm"><i
                                                                class="ph-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2 border border-dashed">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="backend/assets/images/products/32/img-6.png"
                                                                alt="" class="avatar-xs">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#!">
                                                            <h6 class="fs-md mb-2">Craft Women Black Sling Bag</h6>
                                                        </a>
                                                        <ul
                                                            class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                            <li>
                                                                <i class="ph-star align-baseline"></i> 763
                                                            </li>
                                                            <li>
                                                                <i class="ph-shopping-cart align-baseline"></i> 763
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5 class="fs-md text-primary mb-0">$245.74</h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <button class="btn btn-secondary btn-icon btn-sm"><i
                                                                class="ph-arrow-right"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div> --}}
    </div>
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-ordermodal"></button>
                </div>
                <form class="tablelist-form" novalidate autocomplete="off">
                    <div class="modal-body">
                        <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                        <input type="hidden" id="id-field">

                        <div class="text-center mb-3">
                            <div class="position-relative d-inline-block">
                                <div class="position-absolute top-100 start-100 translate-middle">
                                    <label for="customer-image-input" class="mb-0" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Select customer photo">
                                        <span class="avatar-xs d-inline-block">
                                            <span
                                                class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                <i class="ri-image-fill"></i>
                                            </span>
                                        </span>
                                    </label>
                                    <input class="form-control d-none" id="customer-image-input" type="file"
                                        accept="image/png, image/gif, image/jpeg">
                                </div>
                                <div class="avatar-lg">
                                    <div class="avatar-title bg-light rounded-3">
                                        <img src="{{ asset('backend/assets/images/users/user-dummy-img.jpg') }}"
                                            alt="" id="customer-img"
                                            class="avatar-md h-auto rounded-3 object-fit-cover">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Customer Name</label>
                            <input type="text" id="customername-field" class="form-control"
                                placeholder="Enter customer name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email-field" class="form-label">Email</label>
                            <input type="email" id="email-field" class="form-control" placeholder="Enter email"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="contact-field" class="form-label">Contact no.</label>
                            <input type="text" id="contact-field" class="form-control"
                                placeholder="Enter contact no" required>
                        </div>
                        <div class="mb-3">
                            <label for="date-field" class="form-label">Joining Date</label>
                            <input type="date" id="date-field" class="form-control" required>
                        </div>
                        <div>
                            <label for="status-field" class="form-label">Status</label>
                            <select class="form-control" name="status-field" id="status-field" required>
                                <option value="">Status</option>
                                <option value="Active">Active</option>
                                <option value="Block">Block</option>
                                <option value="Unactive">Unactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="deleteRecordModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-md-5">
                    <div class="text-center">
                        <div class="text-danger">
                            <i class="bi bi-trash display-4"></i>
                        </div>
                        <div class="mt-4">
                            <h3 class="mb-2">Are you sure ?</h3>
                            <p class="text-muted fs-lg mx-3 mb-0">Are you sure you want to remove this record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light btn-hover"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger btn-hover" id="delete-record">Yes,
                            Delete It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <button class="btn btn-dark btn-icon" id="back-to-top">
        <i class="bi bi-caret-up fs-3xl"></i>
    </button>
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <div class="customizer-setting d-none d-md-block">
        <div class="btn btn-info p-2 text-uppercase rounded-end-0 shadow-lg" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class="bi bi-gear mb-1"></i> Customizer
        </div>
    </div>
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center p-3 offcanvas-header border-bottom">
            <div class="me-2">
                <h5 class="mb-1">Admin Builder</h5>
                <p class="text-muted mb-0">Choose your themes & layouts etc.</p>
            </div>

            <button type="button" class="btn-close ms-auto" id="customizerclose-btn" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div data-simplebar class="h-100">
                <div class="p-4">
                    <h6 class="fs-lg mb-1">Layout</h6>
                    <p class="text-muted fs-md">Choose your layout</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                                    class="form-check-input">
                                <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-sm text-center fw-medium mt-2">Vertical</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                                    class="form-check-input">
                                <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                                    <span class="d-flex h-100 flex-column gap-1">
                                        <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                            <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                            <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                            <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                        </span>
                                        <span class="bg-light d-block p-1"></span>
                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-sm text-center fw-medium mt-2">Horizontal</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn"
                                    class="form-check-input">
                                <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1">
                                                <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-sm text-center fw-medium mt-2">Two Column</h5>
                        </div>
                        <!-- end col -->
                    </div>

                    <h6 class="mt-4 fs-lg mb-1">Color Scheme</h6>
                    <p class="text-muted fs-md">Choose Light or Dark Scheme.</p>

                    <div class="colorscheme-cardradio">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-bs-theme"
                                        id="layout-mode-light" value="light">
                                    <label class="form-check-label p-0 bg-transparent" for="layout-mode-light">
                                        <img src="{{ asset('backend/assets/images/custom-theme/light-mode.png') }}"
                                            alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Light</h5>
                            </div>

                            <div class="col-6">
                                <div class="form-check card-radio dark">
                                    <input class="form-check-input" type="radio" name="data-bs-theme"
                                        id="layout-mode-dark" value="dark">
                                    <label class="form-check-label p-0 bg-transparent" for="layout-mode-dark">
                                        <img src="{{ asset('backend/assets/images/custom-theme/dark-mode.png') }}"
                                            alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Dark</h5>
                            </div>
                        </div>
                    </div>

                    <div id="layout-width">
                        <h6 class="mt-4 fs-lg mb-1">Layout Width</h6>
                        <p class="text-muted fs-md">Choose Fluid or Boxed layout.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-width"
                                        id="layout-width-fluid" value="fluid">
                                    <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Fluid</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-width"
                                        id="layout-width-boxed" value="boxed">
                                    <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
                                        <span class="d-flex gap-1 h-100 border-start border-end">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Boxed</h5>
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-4 fs-lg mb-1">Topbar Color</h6>
                    <p class="text-muted fs-md">Choose Light or Dark Topbar Color.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-topbar"
                                    id="topbar-color-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-sm text-center fw-medium mt-2">Light</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-topbar"
                                    id="topbar-color-dark" value="dark">
                                <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-primary d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <h5 class="fs-sm text-center fw-medium mt-2">Dark</h5>
                        </div>
                    </div>

                    <div id="sidebar-size">
                        <h6 class="mt-4 fs-lg mb-1">Sidebar Size</h6>
                        <p class="text-muted fs-md">Choose a size of Sidebar.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-size"
                                        id="sidebar-size-default" value="lg">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Default</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-size"
                                        id="sidebar-size-compact" value="md">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Compact</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-size"
                                        id="sidebar-size-small" value="sm">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Small (Icon View)</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar-size"
                                        id="sidebar-size-small-hover" value="sm-hover">
                                    <label class="form-check-label p-0 avatar-md w-100"
                                        for="sidebar-size-small-hover">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Small Hover View</h5>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-view">
                        <h6 class="mt-4 fs-lg mb-1">Sidebar View</h6>
                        <p class="text-muted fs-md">Choose Default or Detached Sidebar view.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-style"
                                        id="sidebar-view-default" value="default">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Default</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-layout-style"
                                        id="sidebar-view-detached" value="detached">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                            </span>
                                            <span class="d-flex gap-1 h-100 p-1 px-2">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Detached</h5>
                            </div>
                        </div>
                    </div>
                    <div id="sidebar-color">
                        <h6 class="mt-4 fs-lg mb-1">Sidebar Color</h6>
                        <p class="text-muted fs-md">Choose a color of Sidebar.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse"
                                    data-bs-target="#collapseBgGradient.show">
                                    <input class="form-check-input" type="radio" name="data-sidebar"
                                        id="sidebar-color-light" value="light">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Light</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse"
                                    data-bs-target="#collapseBgGradient.show">
                                    <input class="form-check-input" type="radio" name="data-sidebar"
                                        id="sidebar-color-dark" value="dark">
                                    <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Dark</h5>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient"
                                    aria-expanded="false" aria-controls="collapseBgGradient">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                                </button>
                                <h5 class="fs-sm text-center fw-medium mt-2">Gradient</h5>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="collapse" id="collapseBgGradient">
                            <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">

                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar"
                                        id="sidebar-color-gradient" value="gradient">
                                    <label class="form-check-label p-0 avatar-xs rounded-circle"
                                        for="sidebar-color-gradient">
                                        <span class="avatar-title rounded-circle bg-vertical-gradient"></span>
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar"
                                        id="sidebar-color-gradient-2" value="gradient-2">
                                    <label class="form-check-label p-0 avatar-xs rounded-circle"
                                        for="sidebar-color-gradient-2">
                                        <span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar"
                                        id="sidebar-color-gradient-3" value="gradient-3">
                                    <label class="form-check-label p-0 avatar-xs rounded-circle"
                                        for="sidebar-color-gradient-3">
                                        <span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                                    </label>
                                </div>
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-sidebar"
                                        id="sidebar-color-gradient-4" value="gradient-4">
                                    <label class="form-check-label p-0 avatar-xs rounded-circle"
                                        for="sidebar-color-gradient-4">
                                        <span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sidebar-img">
                        <h6 class="mt-4 fw-semibold fs-base">Sidebar Images</h6>
                        <p class="text-muted fs-md">Choose a image of Sidebar.</p>

                        <div class="d-flex gap-2 flex-wrap img-switch">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-image"
                                    id="sidebarimg-none" value="none">
                                <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
                                    <span
                                        class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                        <i class="ri-close-fill fs-3xl"></i>
                                    </span>
                                </label>
                            </div>

                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-image"
                                    id="sidebarimg-01" value="img-1">
                                <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
                                    <img src="{{ asset('backend/assets/images/sidebar/img-sm-1.jpg') }}"
                                        alt="" class="avatar-md w-auto object-cover">
                                </label>
                            </div>

                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-image"
                                    id="sidebarimg-02" value="img-2">
                                <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
                                    <img src="{{ asset('backend/assets/images/sidebar/img-sm-2.jpg') }}"
                                        alt="" class="avatar-md w-auto object-cover">
                                </label>
                            </div>
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-image"
                                    id="sidebarimg-03" value="img-3">
                                <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
                                    <img src="{{ asset('backend/assets/images/sidebar/img-sm-3.jpg') }}"
                                        alt="" class="avatar-md w-auto object-cover">
                                </label>
                            </div>
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-image"
                                    id="sidebarimg-04" value="img-4">
                                <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
                                    <img src="{{ asset('backend/assets/images/sidebar/img-sm-4.jpg') }}"
                                        alt="" class="avatar-md w-auto object-cover">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="preloader-menu">
                        <h6 class="mt-4 fw-semibold fs-base">Preloader</h6>
                        <p class="text-muted fs-md">Choose a preloader.</p>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-preloader"
                                        id="preloader-view-custom" value="enable">
                                    <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-custom">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                        <!-- <div id="preloader"> -->
                                        <span class="d-flex align-items-center justify-content-center">
                                            <span class="spinner-border text-primary avatar-xxs m-auto"
                                                role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </span>
                                        </span>
                                        <!-- </div> -->
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Enable</h5>
                            </div>
                            <div class="col-4">
                                <div class="form-check sidebar-setting card-radio">
                                    <input class="form-check-input" type="radio" name="data-preloader"
                                        id="preloader-view-none" value="disable">
                                    <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-none">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    </label>
                                </div>
                                <h5 class="fs-sm text-center fw-medium mt-2">Disable</h5>
                            </div>
                        </div>

                    </div><!-- end preloader-menu -->
                </div>
            </div>

        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                {{-- <div class="col-6">
                    <a href="#!" target="_blank" class="btn btn-primary w-100">Buy Now</a>
                </div> --}}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('extra_script')
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/list.js/dist/list.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/list.pagination.js/dist/list.pagination.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/ecommerce-customer.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/echarts/dist/echarts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ asset('assets/libs/dropzone/dist/dropzone-min.js') }}"></script>
</body>

</html>
