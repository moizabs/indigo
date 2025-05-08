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
                                    <li class="breadcrumb-item active">Edit Product</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <h5 class="card-title mb-3">Product Information</h5>
                                            <p class="text-muted">
                                                Product Information refers to any information held by
                                                an organisation about the products it produces, buys,
                                                sells or distributes.
                                            </p>
                                        </div>
                                        <div class="col-xxl-8">
                                            <div class="mb-3">
                                                <label for="productTitle" class="form-label">Product Title
                                                    <span class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ $product->name }}"
                                                    class="form-control" id="productTitle" placeholder="Enter product title"
                                                    required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Categories
                                                    <span class="text-danger">*</span></label>
                                                <select class="form-control" data-choices name="category" id="category">
                                                    <option value="">Select categories</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($category->id == $product->category_id) selected @endif>
                                                            {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="shortDecs" class="form-label">Short Description
                                                    <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="shortDecs" name="short_description"
                                                    placeholder="Must enter minimum of a 100 characters" rows="3">{{ $product->short_description }}</textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="productBrand" class="form-label">Brand
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" data-choices name="brand"
                                                            id="productUnit">
                                                            <option value="">Select Brand</option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    @if ($brand->id == $product->brand_id) selected @endif>
                                                                    {{ $brand->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="productUnit" class="form-label">Unit
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-control" data-choices name="unit"
                                                            id="productUnit">
                                                            <option value="">Select Unit</option>
                                                            @foreach ($units as $unit)
                                                                <option value="{{ $unit->id }}"
                                                                    @if ($unit->id == $product->unit_id) selected @endif>
                                                                    {{ $unit->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div id="hash_tags" class="mb-3">
                                                    <label for="tags">Tags</label><br>
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <input type="text" id="tagInput" class="form-control"
                                                                placeholder="Add a new tag...">
                                                        </div>
                                                        <div class="col-4">
                                                            <button type="button" id="addTagBtn"
                                                                class="btn btn-primary mt-2">Add Tag</button>
                                                        </div>
                                                    </div>
                                                    <div id="tagList">
                                                        @foreach ($product->tags as $tag)
                                                            <span class="badge badge-primary tag badge-lg me-2"
                                                                data-id="tag_{{ $tag->id }}"
                                                                style="color: red; font-size: 1.25em; cursor: pointer;">
                                                                #{{ $tag->name }}
                                                                <span class="remove-tag"
                                                                    style="cursor: pointer; color: white; margin-left: 5px;">×</span>
                                                            </span>
                                                            <input type="hidden" name="tags[]"
                                                                value="{{ $tag->name }}">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" name="exchangeable" value="1"
                                                            type="checkbox" role="switch" id="exchangeableInput"
                                                            {{ $product->exchangeable ? 'checked' : '' }} />
                                                        <label class="form-check-label"
                                                            for="exchangeableInput">Exchangeable</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" name="refundable" value="1"
                                                            type="checkbox" role="switch" id="refundableInput"
                                                            {{ $product->refundable ? 'checked' : '' }} />
                                                        <label class="form-check-label"
                                                            for="refundableInput">Refundable</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <h5 class="card-title mb-3">Description</h5>
                                            <p class="text-muted">
                                                Product Information refers to any information held by
                                                an organization about the products it produces, buys,
                                                sells or distributes.
                                            </p>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-8">
                                            <div>
                                                <label class="form-label">Product Description
                                                    <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5">{{ $product->description }}</textarea>
                                                {{-- <div class="ckeditor-classic"></div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <h5 class="card-title mb-3">Images</h5>
                                            <p class="text-muted">
                                                Product Information refers to any information held by
                                                an organization about the products it produces, buys,
                                                sells or distributes.
                                            </p>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-8">
                                            <!-- Product Image Section -->
                                            <div class="mb-3">
                                                <label class="form-label">Product Image
                                                    <span class="text-danger">*</span></label>
                                                <div class="dropzone text-center">
                                                    <div class="fallback">
                                                        <input name="image" type="file" accept="image/*" />
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                        </div>
                                                        <h4>
                                                            Drop product images here or click to upload.
                                                        </h4>
                                                    </div>
                                                </div>

                                                <!-- Existing Product Image Preview -->
                                                @if ($product->image)
                                                    <div class="border rounded mt-3" id="product-image-container">
                                                        <div class="d-flex p-2">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded">
                                                                    <img class="img-fluid rounded d-block"
                                                                        src="{{ asset('uploads/products/' . $product->image) }}"
                                                                        alt="Product Image" />
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <div class="pt-1">
                                                                    <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove class="btn btn-sm btn-danger"
                                                                    id="delete-product-image"
                                                                    data-product-id="{{ $product->id }}">
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Gallery Images Section -->
                                            <div class="mb-3">
                                                <label class="form-label">Gallery Images
                                                    <span class="text-danger">*</span></label>
                                                <div class="dropzone text-center" id="dropzone">
                                                    <div class="fallback">
                                                        <input name="gallery[]" type="file" accept="image/*"
                                                            multiple="multiple" />
                                                    </div>
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                        </div>
                                                        <h4>
                                                            Drop gallery images here or click to upload.
                                                        </h4>
                                                    </div>
                                                </div>

                                                <!-- Existing Gallery Images -->
                                                <ul class="list-unstyled mb-0" id="dropzone-preview2">
                                                    @foreach ($product->gallery as $galleryImage)
                                                        <li class="mt-2" id="gallery-image-{{ $galleryImage->id }}">
                                                            <div class="border rounded">
                                                                <div class="d-flex p-2">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-sm bg-light rounded">
                                                                            <img class="img-fluid rounded d-block"
                                                                                src="{{ asset($galleryImage->image) }}"
                                                                                alt="Gallery Image" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <div class="pt-1">
                                                                            <h5 class="fs-md mb-1" data-dz-name>&nbsp;</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-3">
                                                                        <button data-dz-remove
                                                                            class="btn btn-sm btn-danger"
                                                                            id="delete-gallery-image"
                                                                            data-gallery-id="{{ $galleryImage->id }}">
                                                                            Delete
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-4">
                                            <h5 class="card-title mb-3">General Info</h5>
                                            <p class="text-muted mb-0">
                                                An informational product can be a digital book (or
                                                e-book), a digital report, a white paper, a piece of
                                                software, audio or video files, a website, an e-zine
                                                or a newsletter.
                                            </p>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-8">
                                            <div class="row gy-3">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label for="productStocks" class="form-label">Stocks (Quantity)
                                                            <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="quantity"
                                                            value="{{ $product->quantity }}" id="productStocks"
                                                            placeholder="Stocks" required />
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label class="form-label" for="product-price-input">Price</label>
                                                        <div class="input-group has-validation">
                                                            <span class="input-group-text"
                                                                id="product-price-addon">$</span>
                                                            <input type="number" name="price" class="form-control"
                                                                value="{{ $product->price }}" id="product-price-input"
                                                                placeholder="Enter price" aria-label="Price"
                                                                aria-describedby="product-price-addon" required="" />
                                                            <div class="invalid-feedback">
                                                                Please Enter a product price.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label class="form-label"
                                                            for="product-discount-input">Discount</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"
                                                                id="product-discount-addon">%</span>
                                                            <input type="number" name="discount"
                                                                value="{{ $product->discount }}" class="form-control"
                                                                id="product-discount-input" placeholder="Enter discount"
                                                                aria-label="discount"
                                                                aria-describedby="product-discount-addon" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div>
                                                        <label for="choices-publish-visibility-input"
                                                            class="form-label">Visibility</label>
                                                        <select class="form-select" name="visibility"
                                                            id="choices-publish-visibility-input" data-choices
                                                            data-choices-search-false>
                                                            <option value="1"
                                                                @if ($product->visibility == 1) selected @endif>Public
                                                            </option>
                                                            <option value="0"
                                                                @if ($product->visibility == 0) selected @endif>Hidden
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="hstack gap-2 justify-content-end mb-3">
                        <button class="btn btn-danger">
                            <i class="ph-x align-middle"></i> Cancel
                        </button>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
@section('extra_script')
    <script>
        $(document).ready(function() {
            // Functionality to add a new tag when clicking "Add Tag" button
            $('#addTagBtn').click(function() {
                var newTagName = $('#tagInput').val().trim();
                if (newTagName) {
                    // Generate a unique ID for the new tag
                    var newTagId = 'random_' + Math.floor(Math.random() * 1000000);

                    // Create the new tag
                    var newTag = $('<span class="badge badge-primary tag badge-lg me-2" data-id="' +
                        newTagId +
                        '" style="color: red; font-size: 1.25em; cursor: pointer;">#' + newTagName +
                        '</span>');

                    // Create a hidden input field for the new tag
                    var newInput = $('<input type="hidden" name="tags[]" value="' + newTagName + '">');

                    // Append the new tag and hidden input field
                    $('#hash_tags').append(newTag).append(newInput);

                    // Clear the input field
                    $('#tagInput').val('');
                }
            });

            // Allow selecting or deselecting options by clicking on tags
            $(document).on('click', '.tag', function() {
                var tagInput = $(this).next('input[name="tags[]"]');
                if (tagInput.length) {
                    // Remove the hidden input field for the tag
                    tagInput.remove();
                }
                $(this).remove(); // Remove the tag from the UI
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#delete-product-image').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('product-id');

                $.ajax({
                    url: '/admin/products/' + productId + '/deleteMainImage',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        console.log(response); // Debugging line
                        $('#product-image-container').remove();
                        alert('Product image deleted successfully!');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Log the response from server
                        alert('An error occurred while deleting the image!');
                    }
                });
            });

            $('#delete-gallery-image').click(function(e) {
                e.preventDefault();
                var galleryImageId = $(this).data('gallery-id');
                var productId = $(this).data('product-id');

                $.ajax({
                    url: '/admin/gallery/' + galleryImageId + '/delete',
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        console.log(response);
                        $('#gallery-image-' + galleryImageId).remove();
                        alert('Gallery image deleted successfully!');
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        alert('An error occurred while deleting the image!');
                    }
                });
            });
        });
    </script>
@endsection
