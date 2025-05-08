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
                                    <li class="breadcrumb-item active">Categories</li>
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
                                        <h5 class="card-title mb-0">Categories</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap align-items-start gap-2">
                                            <button class="btn btn-danger d-none" id="remove-actions"
                                                onClick="deleteMultiple()">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal"
                                                data-bs-target="#addCategoryModal">
                                                <i class="bi bi-plus-circle align-baseline me-1"></i>
                                                Add Category
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-custom align-middle table-borderless table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Category Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->name }}</td>
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
                                                                            data-id="{{ $category->id }}"
                                                                            data-name="{{ $category->name }}"
                                                                            data-status="{{ $category->status }}"
                                                                            onclick="openEditModal(this)">
                                                                            <i class="ph-pencil align-middle me-1"></i> Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('categories.destroy', $category->id) }}"
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="addCategoryLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="add_category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="add_category_name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('categories.update', ':id') }}" method="POST" id="editCategoryForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit_category_id" name="category_id">
                        <div class="mb-3">
                            <label for="edit_category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="edit_category_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_category_status" class="form-label">Status</label>
                            <select class="form-control" id="edit_category_status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
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
                    var categoryId = this.getAttribute("data-id");
                    var categoryRow = this.closest("tr");
                    var categoryName = categoryRow.querySelector("td:first-child").innerText.trim();

                    // Assuming status is stored as a data attribute in the button
                    var categoryStatus = this.getAttribute("data-status");

                    document.getElementById("edit_category_id").value = categoryId;
                    document.getElementById("edit_category_name").value = categoryName;
                    document.getElementById("edit_category_status").value = categoryStatus;

                    let form = document.getElementById('editCategoryForm');
                    form.action = "{{ route('categories.update', ':id') }}".replace(':id',
                        categoryId);

                    var editModal = new bootstrap.Modal(document.getElementById(
                        "editCategoryModal"));
                    editModal.show();
                });
            });
        });
    </script>
@endsection
