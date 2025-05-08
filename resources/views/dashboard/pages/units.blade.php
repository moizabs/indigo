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
                                    <li class="breadcrumb-item active">Units</li>
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
                                        <h5 class="card-title mb-0">Units</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-wrap align-items-start gap-2">
                                            <button class="btn btn-danger d-none" id="remove-actions"
                                                onClick="deleteMultiple()">
                                                <i class="ri-delete-bin-2-line"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal"
                                                data-bs-target="#addUnitModal">
                                                <i class="bi bi-plus-circle align-baseline me-1"></i>
                                                Add Unit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-custom align-middle table-borderless table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Unit Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($units as $unit)
                                                    <tr>
                                                        <td>{{ $unit->name }}</td>
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
                                                                            data-id="{{ $unit->id }}"
                                                                            data-name="{{ $unit->name }}"
                                                                            data-status="{{ $unit->status }}"
                                                                            onclick="openEditModal(this)">
                                                                            <i class="ph-pencil align-middle me-1"></i> Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <form
                                                                            action="{{ route('units.destroy', $unit->id) }}"
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

    <!-- Add Unit Modal -->
    <div class="modal fade" id="addUnitModal" tabindex="-1" aria-labelledby="addUnitLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="addUnitLabel">Add Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('units.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="add_unit_name" class="form-label">Unit Name</label>
                            <input type="text" class="form-control" id="add_unit_name" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Unit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Unit Modal -->
    <div class="modal fade" id="editUnitModal" tabindex="-1" aria-labelledby="editUnitLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="editUnitLabel">Edit Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('units.update', ':id') }}" method="POST" id="editUnitForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit_unit_id" name="unit_id">
                        <div class="mb-3">
                            <label for="edit_unit_name" class="form-label">Unit Name</label>
                            <input type="text" class="form-control" id="edit_unit_name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_unit_status" class="form-label">Status</label>
                            <select class="form-control" id="edit_unit_status" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Unit</button>
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
                    var unitId = this.getAttribute("data-id");
                    var unitRow = this.closest("tr");
                    var unitName = unitRow.querySelector("td:first-child").innerText.trim();

                    // Assuming status is stored as a data attribute in the button
                    var unitStatus = this.getAttribute("data-status");

                    document.getElementById("edit_unit_id").value = unitId;
                    document.getElementById("edit_unit_name").value = unitName;
                    document.getElementById("edit_unit_status").value = unitStatus;

                    let form = document.getElementById('editUnitForm');
                    form.action = "{{ route('units.update', ':id') }}".replace(':id',
                        unitId);

                    var editModal = new bootstrap.Modal(document.getElementById(
                        "editUnitModal"));
                    editModal.show();
                });
            });
        });
    </script>
@endsection
