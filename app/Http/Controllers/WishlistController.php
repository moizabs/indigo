<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Show all wishlist items for the logged-in user.
     */
    public function index()
    {
        // if (!Auth::check()) {
        //     return redirect()->route('user.account')->with('error', 'Please log in to access your wishlist.');
        // }

        $userId = session('guest_user_id');

        $wishlistItems = Wishlist::where('user_id', $userId)->with('product')->get();

        return view('frontend.pages.wishlist', compact('wishlistItems'));
    }

    /**
     * Add a product to the wishlist.
     */
    public function addToWishlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        if (!Session::has('guest_user_id')) {
            do {
                $randomId = random_int(100000000, 999999999);
            } while (
                Wishlist::where('user_id', $randomId)->exists()
            );
            Session::put('guest_user_id', $randomId);
        }
        $user = Session::get('guest_user_id');

        $productId = $request->product_id;

        $existingWishlist = Wishlist::where('user_id', $user)
            ->where('product_id', $productId)
            ->first();

        if ($existingWishlist) {
            return response()->json(['message' => 'Product is already in your wishlist.'], 200);
        }

        Wishlist::create([
            'user_id' => $user,
            'product_id' => $productId
        ]);

        return response()->json(['message' => 'Product added to wishlist successfully!'], 200);
    }

    /**
     * Remove an item from the wishlist.
     */
    public function removeFromWishlist($id)
    {
        // if (!Auth::check()) {
        //     return response()->json(['message' => 'Unauthorized.'], 401);
        // }

        $userId = session('guest_user_id');

        $wishlistItem = Wishlist::where('user_id', $userId)->where('id', $id)->first();

        if (!$wishlistItem) {
            return redirect()->back();
        }

        $wishlistItem->delete();

        return redirect()->back()->with('message', 'Product removed from wishlist.');
    }

    /**
     * Clear all items from the wishlist.
     */
    public function clearWishlist()
    {
        // if (!Auth::check()) {
        //     return response()->json(['message' => 'Unauthorized.'], 401);
        // }

        $userId = session('guest_user_id');
        Wishlist::where('user_id', $userId)->delete();

        return response()->json(['message' => 'Wishlist cleared successfully.'], 200);
    }
}
