<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Product;

class OrderController extends Controller
{

    public function store(Request $request)
{
    try {
        
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated.'
            ]);
        }

        // $cartItems = $user->cart()->with('product')->get();
            
        $cartItems = Cart::where('user_id', session('guest_user_id'))
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Cart is empty.'
            ]);
        }

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $order = Order::create([
            'user_id' => $user->id,
            'total_price' => $totalPrice,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        Cart::where('user_id', session('guest_user_id'))->delete();

        // $user->cart()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully.',
            'whatsapp_message' => 'Order Confirmed! Please contact us on'
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage(), // Show exact error
        ], 500);
    }
}


    public function updateStatus(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->update(['status' => $request->status]);
        
        return back()->with('success', 'Order status updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return back()->with('success', 'Order deleted successfully');
    }
}