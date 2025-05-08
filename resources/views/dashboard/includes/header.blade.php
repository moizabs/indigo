<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="22">
            </span>
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="22">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
        <div class="vertical-menu-btn-wrapper header-item vertical-icon">
            <button type="button"
                class="btn btn-sm px-0 fs-xl vertical-menu-btn topnav-hamburger shadow hamburger-icon"
                id="topnav-hamburger-icon">
                <i class='bx bx-chevrons-right'></i>
                <i class='bx bx-chevrons-left'></i>
            </button>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                {{-- <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarEcommerce" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarEcommerce">
                        <i class="bx bx-cart-alt"></i> <span data-key="t-ecommerce">My Storess</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarEcommerce">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link" data-key="t-dashboard"> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products.index') }}" class="nav-link" data-key="t-products"> Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products.create') }}" class="nav-link" data-key="t-add-product"> Add
                                    Product </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-ecommerce-cart.html" class="nav-link" data-key="t-shopping-cart"> Shopping
                                    Cart </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-ecommerce-checkout.html" class="nav-link" data-key="t-checkout"> Checkout
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-ecommerce-orders.html" class="nav-link" data-key="t-orders"> Orders </a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-ecommerce-customers.html" class="nav-link" data-key="t-customers">
                                    Customers </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link menu-link"> <i class="bx bx-category"></i>
                        <span data-key="t-calendar">Dashboard</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link menu-link"> <i class="bx bx-category"></i>
                        <span data-key="t-calendar">Categories</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('units.index') }}" class="nav-link menu-link"> <i class="bx bx-grid"></i> <span
                            data-key="t-calendar">Unit</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brands.index') }}" class="nav-link menu-link"> <i class="bx bx-store"></i> <span
                            data-key="t-calendar">Brands</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link menu-link"> <i class="bx bx-store"></i> <span
                            data-key="t-calendar">Products</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('orders') }}" class="nav-link menu-link"> <i class="bx bx-store"></i> <span
                            data-key="t-calendar">Orders</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all.subscribers') }}" class="nav-link menu-link"> <i class="bx bx-store"></i> <span
                            data-key="t-calendar">Subscribers</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all.wishlists') }}" class="nav-link menu-link"> <i class="bx bx-store"></i> <span
                            data-key="t-calendar">Wishlists</span> </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('all.customers') }}" class="nav-link menu-link"> <i class="bx bx-store"></i> <span
                            data-key="t-calendar">Customers</span> </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('tags.index') }}" class="nav-link menu-link"> <i class="bx bx-tag"></i> <span
                            data-key="t-calendar">Tags</span> </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="apps-chat.html" class="nav-link menu-link"> <i class="bx bx-chat"></i> <span
                            data-key="t-chat">Chat</span> </a>
                </li>
                <li class="nav-item">
                    <a href="apps-email.html" class="nav-link menu-link"> <i class="bx bx-envelope"></i> <span
                            data-key="t-email">Email</span> </a>
                </li>
                <li class="nav-item">
                    <a href="#sidebarInvoices" class="nav-link menu-link collapsed" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarInvoices">
                        <i class="bx bx-file"></i> <span data-key="t-invoices">Invoices</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarInvoices">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="apps-invoices-list.html" class="nav-link" data-key="t-list-view">List
                                    View</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-invoices-overview.html" class="nav-link"
                                    data-key="t-overview">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a href="apps-invoices-create.html" class="nav-link"
                                    data-key="t-create-invoice">Create Invoice</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
    {{-- <div class="dropdown sidebar-user mt-4">
        <button type="button" class="btn sidebar-user-button shadow-none w-100" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center overflow-hidden">
                <img class="rounded-circle header-profile-user"
                    src="{{ asset('backend/assets/images/users/32/avatar-1.jpg') }}" alt="Header Avatar">
                <span class="text-start ms-xl-2 overflow-hidden flex-grow-1 sideba-user-content">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text text-truncate mb-0"
                        data-key="t-dixie-allen">Admin</span>
                    <span class="d-none d-xl-block ms-1 fs-sm user-name-sub-text" data-key="t-founder">Founder</span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <h6 class="dropdown-header">Welcome Admin!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-account-circle text-muted fs-lg align-middle me-1"></i> <span
                    class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i
                    class="mdi mdi-message-text-outline text-muted fs-lg align-middle me-1"></i> <span
                    class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-tickets-overview.html"><i
                    class="mdi mdi-calendar-check-outline text-muted fs-lg align-middle me-1"></i> <span
                    class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i
                    class="mdi mdi-lifebuoy text-muted fs-lg align-middle me-1"></i> <span
                    class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i
                    class="mdi mdi-wallet text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Balance
                    : <b>$8451.36</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span
                    class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                    class="mdi mdi-cog-outline text-muted fs-lg align-middle me-1"></i> <span
                    class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen.html"><i
                    class="mdi mdi-lock text-muted fs-lg align-middle me-1"></i> <span class="align-middle">Lock
                    screen</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout text-muted fs-lg align-middle me-1"></i>
                <span class="align-middle" data-key="t-logout">Logout</span>
            </a>
        </div>
    </div> --}}
    <div class="sidebar-background"></div>
</div>
