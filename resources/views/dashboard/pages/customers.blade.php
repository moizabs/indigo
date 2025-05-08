@extends('dashboard.layouts.app')
@section('title', 'Dashboard')
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
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row" id="customer-list">
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table class="table align-middle table-nowrap">
                                        <tbody class="list">
                                            @foreach ($customers as $key => $row)
                                                <tr>
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    <td class="id d-none"><a href="javascript:void(0);"
                                                            class="fw-medium link-primary">{{ $key + 1 }}</a></td>
                                                    <td class="customer">
                                                        <div class="d-flex align-items-center">
                                                            {{-- <div class="flex-shrink-0 me-2">
                                                                <div>
                                                                    <img class="avatar-xs rounded-circle customer-image-elem"
                                                                        alt=""
                                                                        src="backend/assets/images/users/32/avatar-2.jpg">
                                                                </div>
                                                            </div> --}}
                                                            <div class="flex-grow-1">
                                                                <h5 class="fs-base mb-0"><a href="#"
                                                                        class="text-reset customer-name-elem">{{ $row->name }}</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="email">{{ $row->email }}</td>
                                                    {{-- <td class="contact">+(253) 12345 67890</td> --}}
                                                    <td class="date">{{ $row->created_at->format('d M, Y') }}</td>
                                                    {{-- <td class="status"><span
                                                        class="badge bg-secondary-subtle text-secondary">Unactive</span>
                                                </td> --}}
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
                                                                <li><a class="dropdown-item edit-item-btn" href="#showModal"
                                                                        data-bs-toggle="modal"><i
                                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                                        Edit</a></li>
                                                                <li><a class="dropdown-item remove-item-btn"
                                                                        data-bs-toggle="modal" href="#deleteRecordModal"><i
                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                        Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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
                                            <a class="page-item pagination-next" href="javascript:void(0)">Next</a>
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
                                    {{-- <div class="flex-shirnk-0">
                                        <img src="backend/assets/images/users/48/avatar-5.jpg" alt=""
                                            class="avatar-sm rounded overview-img">
                                    </div> --}}
                                    {{-- <div class="flex-grow-1">
                                        <h6 class="fs-lg overview-name"></h6>
                                        <p class="text-muted mb-0"><a href="#!"
                                                class="overview-nick-name">@mosciski</a></p>
                                    </div> --}}
                                    <div class="flex-shrink-0">
                                        {{-- <button type="button" class="btn btn-subtle-primary custom-toggle active"
                                            data-bs-toggle="button">
                                            <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i>
                                                Follow</span>
                                            <span class="icon-off"><i class="ri-user-unfollow-line align-bottom me-1"></i>
                                                Unfollow</span>
                                        </button> --}}
                                        {{-- <button class="btn btn-subtle-danger btn-icon"><i class="ph-trash"></i></button> --}}
                                    </div>
                                </div>
                                {{-- <ul class="d-flex align-items-center gap-2 list-unstyled mt-4">
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
                                </ul> --}}
                                <div>
                                    <table class="table table-sm table-borderless">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <td class="overview-name"></td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td class="overview-email"></td>
                                            </tr>
                                            {{-- <tr>
                                                <th>Contact</th>
                                                <td class="overview-contact">+(253) 12345 67890</td>
                                            </tr> --}}
                                            <tr>
                                                <th>Joining Date</th>
                                                <td class="overview-date"></td>
                                            </tr>
                                            {{-- <tr>
                                                <th>Status</th>
                                                <td class="overview-status"><span
                                                        class="badge bg-danger-subtle text-danger">Block</span>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0">
                                <h6 class="fs-md px-4 mb-3">Order History <span class="order-count"></span></h6>
                                <div data-simplebar class="px-4" style="max-height: 325px;">
                                    <div class="vstack gap-3">
                                        {{-- <div class="p-2 border border-dashed">
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
                                                    <ul class="hstack list-unstyled gap-2 mb-0 fs-sm fw-medium text-muted">
                                                        <li>
                                                            <i class="ph-star align-baseline"></i> 487
                                                        </li>
                                                        <li>
                                                            <i class="ph-shopping-cart align-baseline"></i> 936
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="text-end">
                                                    <h5 class="fs-md text-primary mb-0">RS 15.99</h5>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <button class="btn btn-secondary btn-icon btn-sm"><i
                                                            class="ph-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div> --}}
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
    </div>
@endsection
@section('extra_script')
    <script>
        $(document).ready(function() {
            $(".view-item-btn").on("click", function() {
                // Find the closest table row
                var row = $(this).closest("tr");

                // Get customer details from the row
                var customerName = row.find(".customer-name-elem").text();
                var customerEmail = row.find(".email").text();
                var customerDate = row.find(".date").text();
                var customerImage = row.find(".customer-image-elem").attr("src");
                var customerId = row.find(".id").text(); // Assuming ID is stored here

                // Update the right-side card
                $(".overview-name").text(customerName);
                $(".overview-email").text(customerEmail);
                $(".overview-date").text(customerDate);
                $(".overview-img").attr("src", customerImage);

                // Fetch order history dynamically using AJAX
                $.ajax({
                    url: "{{ route('customer.orders', ':id') }}".replace(':id', customerId),
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            var ordersHtml = "";
                            $.each(response.orders, function(index, order) {
                                console.log('ordersss', order);
                                ordersHtml += `
                            <div class="p-2 border border-dashed">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar-sm flex-shrink-0">
                                        <div class="avatar-title bg-light rounded">
                                            <img src="${order.image}" alt="" class="avatar-xs">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <a href="#!">
                                            <h6 class="fs-md mb-2">${order.product_name}</h6>
                                            <p>${order.product_name}</p>
                                        </a>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="fs-md text-primary mb-0">RS ${order.price}</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button class="btn btn-secondary btn-icon btn-sm"><i
                                                class="ph-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        `;
                            });

                            // Update order history
                            $(".order-count").html('(' + response.orders.length + ')');
                            $(".vstack").html(ordersHtml);
                        }
                    }
                });
            });
        });
    </script>
@endsection
