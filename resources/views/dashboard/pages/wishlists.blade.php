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
                                    <li class="breadcrumb-item active">Wishlist</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="wishlistContainer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <div class="mb-2 d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-0">Wishlist</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="table-responsive">
                                        <table class="table table-custom align-middle table-borderless table-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Sr #</th>
                                                    <th>User</th>
                                                    <th>Product</th>
                                                    <th>Image</th>
                                                    <th>Price</th>
                                                    <th>Date Added</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wishlists as $key => $wishlist)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $wishlist->user->name ?? 'N/A' }}</td>
                                                        <td>{{ $wishlist->product->name ?? 'N/A' }}</td>
                                                        <td>
                                                            @if ($wishlist->product && $wishlist->product->image)
                                                                <img src="{{ asset('uploads/products2/' . $wishlist->product->image) }}"
                                                                    alt="{{ $wishlist->product->name }}" width="50">
                                                            @else
                                                                <span>No Image</span>
                                                            @endif
                                                        </td>
                                                        <td>${{ number_format($wishlist->product->price ?? 0, 2) }}</td>
                                                        <td>{{ $wishlist->created_at->format('d M Y, h:i A') }}</td>
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
@endsection
