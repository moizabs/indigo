<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Add item to cart
     */
    public function addToCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity'   => 'required|integer|min:1'
    ]);

    if (!Session::has('guest_user_id')) {
        do {
            $randomId = random_int(100000000, 999999999);
        } while (
            // User::where('id', $randomId)->exists() || 
            Cart::where('user_id', $randomId)->exists()
        );
        Session::put('guest_user_id', $randomId);
    }
    $userId = Session::get('guest_user_id');
    
    // Step 2: Check and update cart
    $existingCart = Cart::where('user_id', $userId)
        ->where('product_id', $request->product_id)
        ->first();

        try {
            if ($existingCart) {
                $existingCart->quantity += $request->quantity;
                $existingCart->total = $existingCart->price * $existingCart->quantity;
                $existingCart->save();
            } else {
                $product = Product::find($request->product_id);
                Cart::create([
                    'user_id'    => $userId,
                    'product_id' => $request->product_id,
                    'quantity'   => $request->quantity,
                    'price'      => $product->price,
                    'total'      => $product->price * $request->quantity
                ]);
            }
        
            return response()->json([
                'message' => 'Product added to cart successfully'
            ]);
        
        } catch (\Exception $e) {
            \Log::error("Add to cart failed: " . $e->getMessage());
            return response()->json([
                'message' => 'Something went wrong!',
                'error'   => $e->getMessage()
            ], 500);
        }
}

    /**
     * View cart items
     */
    public function viewCart()
    {
        $user = Auth::user();
        $cartItems = $user->carts()->with('product')->get();
        
        return view('cart.view', compact('cartItems'));
    }

    /**
     * Update cart item quantity
     */
    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = session('guest_user_id');

        $cartItem = Cart::where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->update([
            'quantity' => $request->quantity
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully'
        ]);
    }

    /**
     * Remove item from cart
     */
    public function removeFromCart($id)
    {
        $userId = session('guest_user_id');
    
        $cartItem = Cart::where('user_id', $userId)
            ->where('id', $id)
            ->firstOrFail();
    
        $cartItem->delete();
    
        $cartCount = Cart::where('user_id', $userId)->count();
    
        return response()->json([
            'success'    => true,
            'message'    => 'Item removed from cart',
            'cart_count' => $cartCount
        ]);
    }
}