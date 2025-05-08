<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\UnitController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Dashboard\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/user-account', [FrontendController::class, 'userAccount'])->name('user.account');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('pages.contact');
Route::get('/my-cart', [FrontendController::class, 'my_cart'])->name('my.cart');

Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/products/detail/{slug}', [FrontendController::class, 'productsdetail'])->name('frontend.products.detail');
Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('frontend.wishlist');

// cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart/add', [CartController::class, 'addToCart'])->middleware('auth')->name('cart.add');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::put('/cart/items/{product_id}', [CartController::class, 'updateCart'])->name('cart.items.update');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
// Route::delete('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

// wishlist
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::post('/subscribe', [SubscriberController::class, 'store'])->name('subscribe.store');

Route::get('/ajax-search-products', [ProductController::class, 'ajaxSearch'])->name('frontend.search.ajax');

// Route::get('/products/filter', [FrontendController::class, 'filter'])->name('frontend.products.filter');

// order
Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store'])->name('place.order');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/orders', [DashboardController::class, 'orders'])->name('orders');
    Route::get('/add-product', [DashboardController::class, 'addProduct'])->name('addProduct');
    Route::post('/orders/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('units', UnitController::class);
    Route::resource('tags', TagController::class);
    Route::resource('products', ProductController::class);
    
    Route::delete('/products/{product}/deleteMainProduct', [ProductController::class, 'destroy']);


    Route::delete('/products/{product}/deleteMainImage', [ProductController::class, 'deleteMainImage']);
    Route::delete('/gallery/{galleryImage}/delete', [ProductController::class, 'deleteGalleryImage']);

    Route::get('/subscribers', [SubscriberController::class, 'index'])->name('all.subscribers');

    Route::get('/customers', [DashboardController::class, 'customers'])->name('all.customers');

    Route::get('/wishlists', [DashboardController::class, 'wishlist'])->name('all.wishlists');

    Route::get('/customer-orders/{id}', [DashboardController::class, 'getCustomerOrders'])->name('customer.orders');
});
