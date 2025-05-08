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
                                    <li class="breadcrumb-item active">Tags</li>
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
                                        <h5 class="card-title mb-0">Tags</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap align-items-start gap-2">
                                            <button class="btn btn-danger d-none" id="remove-actions"
                                                onClick="deleteMultiple()">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal"
                                                data-bs-target="#addTagModal">
                                                <i class="bi bi-plus-circle align-baseline me-1"></i>
                                                Add Tag
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-custom align-middle table-borderless table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Tag Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tags as $tag)
                                                    <tr>
                                                        <td>{{ $tag->name }}</td>
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
                                                                            data-id="{{ $tag->id }}"
                                                                            data-name="{{ $tag->name }}"
                                                                            data-status="{{ $tag->status }}"
                                                                            onclick="openEditModal(this)">
                                                                            <i class="ph-pencil align-middle me-1"></i> Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('tags.destroy', $tag->id) }}"
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

    <!-- Add Tag Modal -->
    <div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="addTagLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="addTagLabel">Add Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="add_tag_name" class="form-label">Tag Name</label>
                            <input type="text" class="form-control" id="add_tag_name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Tag</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Tag Modal -->
    <div class="modal fade" id="editTagModal" tabindex="-1" aria-labelledby="editTagLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="editTagLabel">Edit Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tags.update', ':id') }}" method="POST" id="editTagForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit_tag_id" name="tag_id">
                        <div class="mb-3">
                            <label for="edit_tag_name" class="form-label">Tag Name</label>
                            <input type="text" class="form-control" id="edit_tag_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tag_status" class="form-label">Status</label>
                            <select class="form-control" id="edit_tag_status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Tag</button>
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
                    var tagId = this.getAttribute("data-id");
                    var tagRow = this.closest("tr");
                    var tagName = tagRow.querySelector("td:first-child").innerText.trim();

                    // Assuming status is stored as a data attribute in the button
                    var tagStatus = this.getAttribute("data-status");

                    document.getElementById("edit_tag_id").value = tagId;
                    document.getElementById("edit_tag_name").value = tagName;
                    document.getElementById("edit_tag_status").value = tagStatus;

                    let form = document.getElementById('editTagForm');
                    form.action = "{{ route('tags.update', ':id') }}".replace(':id',
                        tagId);

                    var editModal = new bootstrap.Modal(document.getElementById(
                        "editTagModal"));
                    editModal.show();
                });
            });
        });
    </script>
@endsection
