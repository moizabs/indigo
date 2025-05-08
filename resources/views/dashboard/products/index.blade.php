@extends('dashboard.layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content wrapper">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">
                                        <a href="javascript: void(0);">Ecommerce</a>
                                    </li>
                                    <li class="breadcrumb-item active">Products</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div id="productList">
                    {{-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-xxl">
                                            <div class="search-box">
                                                <input type="text" class="form-control search"
                                                    placeholder="Search products, price etc..." />
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl col-sm-6">
                                            <div>
                                                <select class="form-control" data-choices data-choices-search-false
                                                    data-choices-removeItem multiple data-choices-limit="Required Limit"
                                                    data-choices-text-unique-true>
                                                    <option value="">Select Brands</option>
                                                    <option value="Adidas">Adidas</option>
                                                    <option value="Boat" selected>Boat</option>
                                                    <option value="Puma" selected>Puma</option>
                                                    <option value="Realme">Realme</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl col-sm-6">
                                            <div>
                                                <select class="form-control" id="idCategory" data-choices
                                                    data-choices-search-false data-choices-removeItem>
                                                    <option value="all">Select Category</option>
                                                    <option value="Appliances">Appliances</option>
                                                    <option value="Automotive Accessories">
                                                        Automotive Accessories
                                                    </option>
                                                    <option value="Electronics">Electronics</option>
                                                    <option value="Fashion">Fashion</option>
                                                    <option value="Furniture">Furniture</option>
                                                    <option value="Grocery">Grocery</option>
                                                    <option value="Headphones">Headphones</option>
                                                    <option value="Kids">Kids</option>
                                                    <option value="Luggage">Luggage</option>
                                                    <option value="Sports">Sports</option>
                                                    <option value="Watches">Watches</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-2 col-sm-6">
                                            <div>
                                                <select class="form-control" id="idDiscount" data-choices
                                                    data-choices-search-false data-choices-removeItem>
                                                    <option value="all">Select All Discount</option>
                                                    <option value="50">50% or more</option>
                                                    <option value="40">40% or more</option>
                                                    <option value="30">30% or more</option>
                                                    <option value="20">20% or more</option>
                                                    <option value="10">10% or more</option>
                                                    <option value="0">Less than 10%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-auto col-sm-6">
                                            <button type="button" class="btn btn-secondary w-md"
                                                onclick="filterData();">
                                                <i class="bi bi-funnel align-baseline me-1"></i>
                                                Filters
                                            </button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div> --}}
                    <!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="mb-2 d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Products</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap align-items-start gap-2">
                                            <button class="btn btn-danger d-none" id="remove-actions"
                                                onClick="deleteMultiple()">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                            <a class="btn btn-primary add-btn" href="{{ route('products.create') }}">
                                                <i class="bi bi-plus-circle align-baseline me-1"></i>
                                                Add Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-custom align-middle table-borderless table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="sort cursor-pointer" data-sort="products">
                                                        Products
                                                    </th>
                                                    <th class="sort cursor-pointer" data-sort="category">
                                                        Category
                                                    </th>
                                                    <th class="sort cursor-pointer" data-sort="stock">
                                                        Stock
                                                    </th>
                                                    <th class="sort cursor-pointer" data-sort="price">
                                                        Price
                                                    </th>
                                                    <th class="sort cursor-pointer" data-sort="orders">
                                                        Orders
                                                    </th>
                                                    <th class="sort cursor-pointer" data-sort="rating">
                                                        Rating
                                                    </th>
                                                    <th class="sort cursor-pointer" data-sort="published">
                                                        Published
                                                    </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($products as $item)
                                                    <tr>
                                                        <td class="id" style="display: none">
                                                            <a href="javascript:void(0);"
                                                                class="fw-medium link-primary">#TB01</a>
                                                        </td>
                                                        <td class="products">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-xs bg-light rounded p-1 me-2">
                                                                    <img src="{{ asset('uploads/products2/' . $item->image) }}"
                                                                        alt="" class="img-fluid d-block" />
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-0">
                                                                        <a href="{{ route('frontend.products.detail', $item->slug) }}"
                                                                            class="text-reset products">{{ $item->name }}</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="discount d-none">Fashion</td>
                                                        <td class="category">{{ $item->category->name }}</td>
                                                        <td class="stock">{{ $item->quantity }}</td>
                                                        <td class="price">${{ $item->price }}</td>
                                                        <td class="orders">48</td>
                                                        <td class="rating">
                                                            <span class="badge bg-warning-subtle text-warning"><i
                                                                    class="bi bi-star-fill align-baseline me-1"></i>
                                                                4.9</span>
                                                        </td>
                                                        <td class="published">{{ $item->created_at->format('d M, Y') }}
                                                        </td>
                                                        <td>
                                                            <div class="dropdown position-static">
                                                                <button class="btn btn-subtle-secondary btn-sm btn-icon"
                                                                    role="button" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>

                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    {{-- <li>
                                                                    <a class="dropdown-item"
                                                                        href="apps-ecommerce-product-details.html"><i
                                                                            class="ph-eye align-middle me-1"></i>
                                                                        View</a>
                                                                </li> --}}
                                                                    <li>
                                                                        <a class="dropdown-item edit-item-btn"
                                                                            href="{{ route('products.edit', $item->id) }}"><i
                                                                                class="ph-pencil align-middle me-1"></i>
                                                                            Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item remove-item-btn"
                                                                           data-id="{{ $item->id }}"
                                                                           data-bs-toggle="modal"
                                                                           href="#deleteRecordModal">
                                                                           <i class="ph-trash align-middle me-1"></i> Remove
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end table-responsive-->

                                    <div class="noresult" style="display: none">
                                        <div class="text-center py-4">
                                            <div class="avatar-md mx-auto mb-4">
                                                <div class="avatar-title bg-light text-primary rounded-circle fs-4xl">
                                                    <i class="bi bi-search"></i>
                                                </div>
                                            </div>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">
                                                We've searched more than 150+ products We did not
                                                find any products for you search.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end noresult -->

                                    <div class="row mb-4 align-items-center" id="pagination-element">
                                        <div class="col-sm">
                                            <div class="text-muted text-center text-sm-start">
                                                Showing <span class="fw-semibold">10</span> of
                                                <span class="fw-semibold">35</span> Results
                                            </div>
                                        </div>

                                        <div class="col-sm-auto mt-3 mt-sm-0">
                                            <div class="pagination-wrap hstack gap-2 justify-content-center">
                                                <a class="page-item pagination-prev disabled" href="#">
                                                    <i class="mdi mdi-chevron-left align-middle"></i>
                                                </a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next" href="#">
                                                    <i class="mdi mdi-chevron-right align-middle"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end pagination-element -->
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        © Dosix.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    
@endsection
