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
                                        <a href="javascript: void(0);">Home</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="card product-card-grid-menu">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="product-card-hrid-border">
                                    <p class="text-muted">Total Products</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <h4 class="mb-0">
                                            <span class="counter-value" data-target="{{ count($products) }}">0</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-card-hrid-border">
                                    <p class="text-muted">Total Orders</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <h4 class="mb-0">
                                            <span class="counter-value" data-target="{{ count($ordersTotal) }}">0</span>
                                        </h4>
                                        {{-- <p class="mb-0 text-muted">
                                            <span class="flex-shrink-0 badge bg-success-subtle text-success rounded-pill"><i
                                                    class="ph ph-trend-up align-middle me-1"></i>
                                                1.5%</span>
                                        </p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-card-hrid-border">
                                    <p class="text-muted">Total Stock</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <h4 class="mb-0">
                                            RS <span class="counter-value" data-target="{{ $totalStockValue }}">0</span>
                                        </h4>
                                        {{-- <p class="mb-0 text-muted">
                                            <span class="flex-shrink-0 badge bg-danger-subtle text-danger rounded-pill"><i
                                                    class="ph ph-trend-up align-middle me-1"></i>
                                                0.8%</span>
                                        </p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-card-hrid-border">
                                    <p class="text-muted">Total Sale</p>
                                    <div class="d-flex align-items-center gap-2">
                                        <h4 class="mb-0">
                                            RS <span class="counter-value" data-target="{{ $totalSale }}">0</span>
                                        </h4>
                                        {{-- <p class="mb-0 text-muted">
                                            <span class="flex-shrink-0 badge bg-success-subtle text-success rounded-pill"><i
                                                    class="ph ph-trend-up align-middle me-1"></i>
                                                2.4%</span>
                                        </p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="productList">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="mb-2 d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Orders</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap align-items-start gap-2">
                                            <button class="btn btn-danger d-none" id="remove-actions"
                                                onClick="deleteMultiple()">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-custom align-middle table-borderless table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Sr #.</th>
                                                    <th>Products</th>
                                                    <th>Prices</th>
                                                    <th>Quantities</th>
                                                    <th>Subtotals</th>
                                                    <th>Total Price</th>
                                                    <th>User</th>
                                                    <th>Created At</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                @foreach ($orders as $key => $order)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>
                                                            @foreach ($order->orderItems as $item)
                                                                <div>{{ $item->product->name ?? 'Unknown Product' }}</div>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($order->orderItems as $item)
                                                                <div>${{ number_format($item->price, 2) }}</div>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($order->orderItems as $item)
                                                                <div>{{ $item->quantity }}</div>
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach ($order->orderItems as $item)
                                                                <div>${{ number_format($item->price * $item->quantity, 2) }}
                                                                </div>
                                                            @endforeach
                                                        </td>
                                                        <td>${{ number_format(
                                                            $order->orderItems->sum(function ($item) {
                                                                return $item->price * $item->quantity;
                                                            }),
                                                            2,
                                                        ) }}
                                                        </td>
                                                        </td>
                                                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end table-responsive-->
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
