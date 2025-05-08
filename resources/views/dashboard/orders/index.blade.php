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
                                    <li class="breadcrumb-item active">Orders</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

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
                                                    <th>Prices</th> <!-- Single product prices in format 00.00 -->
                                                    <th>Quantities</th>
                                                    <th>Subtotals</th>
                                                    <!-- Single product price * quantity in format 00.00 -->
                                                    <th>Total Price</th> <!-- Order total -->
                                                    <th>User</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                    <th>Action</th> <!-- Added Action Column -->
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
                                                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                                        <td>{{ $order->status }}</td>
                                                        <td>
                                                            <!-- Dropdown -->
                                                            <div class="dropdown">
                                                                <button class="btn btn-link text-muted p-0" type="button"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="ph ph-dots-three-vertical"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <button class="dropdown-item" data-bs-toggle="modal"
                                                                            data-bs-target="#statusModal"
                                                                            onclick="setOrderId({{ $order->id }})">
                                                                            <i class="ph ph-pencil-simple me-2"></i> Change
                                                                            Status
                                                                        </button>
                                                                    </li>
                                                                    {{-- <li>
                                                                        <form
                                                                            action="{{ route('orders.destroy', $order->id) }}"
                                                                            method="POST"
                                                                            onsubmit="return confirm('Are you sure?')">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item text-danger">
                                                                                <i class="ph ph-trash me-2"></i> Delete
                                                                            </button>
                                                                        </form>
                                                                    </li> --}}
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <!-- Change Status Modal -->
                                        <div class="modal fade" id="statusModal" tabindex="-1"
                                            aria-labelledby="statusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="statusModalLabel">Change Order Status
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form id="statusForm" action="{{ route('orders.updateStatus') }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="order_id" id="order_id">
                                                            <label for="status" class="form-label">Select Status</label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option value="confirmed" class="text-success">✅ Confirmed
                                                                </option>
                                                                <option value="completed" class="text-success">✅ Completed
                                                                </option>
                                                                <option value="pending" class="text-warning">⏳ Pending
                                                                </option>
                                                                <option value="shipped" class="text-primary">🚚 Shipped
                                                                </option>
                                                                <option value="delivered" class="text-info">📦 Delivered
                                                                </option>
                                                                <option value="canceled" class="text-danger">❌ Canceled
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Status</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                                                We've searched more than 150+ orders but did not find any matching your
                                                criteria.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end noresult -->

                                    <div class="row mb-4 align-items-center" id="pagination-element">
                                        <div class="col-sm">
                                            <div class="text-muted text-center text-sm-start">
                                                Showing <span class="fw-semibold">{{ $orders->count() }}</span> of
                                                <span class="fw-semibold">{{ $orders->total() }}</span> Results
                                            </div>
                                        </div>
                                        <div class="col-sm-auto mt-3 mt-sm-0">
                                            <div class="pagination-wrap hstack gap-2 justify-content-center">
                                                {{ $orders->links() }}
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
@section('extra_script')
    <script>
        function setOrderId(orderId) {
            document.getElementById('order_id').value = orderId;
        }

        $(document).ready(function() {
            $('#statusForm').submit(function(e) {
                e.preventDefault();

                let orderId = $('#order_id').val();
                let status = $('#status').val();
                let formData = {
                    _token: '{{ csrf_token() }}',
                    order_id: orderId,
                    status: status
                };

                $.post("{{ route('orders.updateStatus') }}", formData, function(response) {
                    alert(response.message);
                    location.reload();
                }).fail(function(xhr) {
                    alert(xhr.responseJSON.message);
                });
            });
        });
    </script>
@endsection
