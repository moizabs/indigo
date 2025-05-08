<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $products = Product::get();
        $ordersTotal = Order::get();
        $totalStockValue = Product::sum('price');
        $totalSale = Order::sum('total_price');
        $orders = Order::latest()->take(10)->get();

        return view('dashboard.pages.index', compact(
            'products',
            'ordersTotal',
            'totalStockValue',
            'totalSale',
            'orders'
        ));
    }

    public function orders()
    {
        $orders = Order::with(['user', 'orderItems.product'])->latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }

    public function addProduct()
    {
        return view('products.index');
    }

    public function customers()
    {
        $customers = User::where('role', 'customer')->latest()->paginate(10);
        return view('dashboard.pages.customers', compact('customers'));
    }

    public function wishlist()
    {
        $wishlists = Wishlist::with(['user', 'product'])->latest()->paginate(10);
        return view('dashboard.pages.wishlists', compact('wishlists'));
    }

    public function getCustomerOrders($id)
    {
        $customer = User::findOrFail($id);
        $orders = Order::where('user_id', $id)->latest()->paginate(10);
        return view('admin.customers.orders', compact('customer', 'orders'));
    }
}