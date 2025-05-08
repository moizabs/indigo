@extends('dashboard.layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Brands</li>
                                </ol>
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
                                        <h5 class="card-title mb-0">Brands</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap align-items-start gap-2">
                                            <button class="btn btn-danger d-none" id="remove-actions"
                                                onClick="deleteMultiple()">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal"
                                                data-bs-target="#addBrandModal">
                                                <i class="bi bi-plus-circle align-baseline me-1"></i>
                                                Add Brand
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-custom align-middle table-borderless table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Brand Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($brands as $brand)
                                                    <tr>
                                                        <td>{{ $brand->name }}</td>
                                                        <td>
                                                            <div class="dropdown position-static">
                                                                <button class="btn btn-subtle-secondary btn-sm btn-icon"
                                                                    role="button" data-bs-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li>
                                                                        <a class="dropdown-item edit-item-btn"
                                                                            href="javascript:void(0);"
                                                                            data-id="{{ $brand->id }}"
                                                                            data-name="{{ $brand->name }}"
                                                                            data-status="{{ $brand->status }}"
                                                                            onclick="openEditModal(this)">
                                                                            <i class="ph-pencil align-middle me-1"></i> Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('brands.destroy', $brand->id) }}"
                                                                            method="POST" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="dropdown-item remove-item-btn">
                                                                                <i class="ph-trash align-middle me-1"></i>
                                                                                Remove
                                                                            </button>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Brand Modal -->
    <div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="addBrandLabel">Add Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('brands.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="add_brand_name" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="add_brand_name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Brand Modal -->
    <div class="modal fade" id="editBrandModal" tabindex="-1" aria-labelledby="editBrandLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="editBrandLabel">Edit Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('brands.update', ':id') }}" method="POST" id="editBrandForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit_brand_id" name="brand_id">
                        <div class="mb-3">
                            <label for="edit_brand_name" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" id="edit_brand_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_brand_status" class="form-label">Status</label>
                            <select class="form-control" id="edit_brand_status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('extra_script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Attach click event to all Edit buttons
            document.querySelectorAll(".edit-item-btn").forEach(button => {
                button.addEventListener("click", function() {
                    var brandId = this.getAttribute("data-id");
                    var brandRow = this.closest("tr");
                    var brandName = brandRow.querySelector("td:first-child").innerText.trim();

                    // Assuming status is stored as a data attribute in the button
                    var brandStatus = this.getAttribute("data-status");

                    document.getElementById("edit_brand_id").value = brandId;
                    document.getElementById("edit_brand_name").value = brandName;
                    document.getElementById("edit_brand_status").value = brandStatus;

                    let form = document.getElementById('editBrandForm');
                    form.action = "{{ route('brands.update', ':id') }}".replace(':id',
                        brandId);

                    var editModal = new bootstrap.Modal(document.getElementById(
                        "editBrandModal"));
                    editModal.show();
                });
            });
        });
    </script>
@endsection
