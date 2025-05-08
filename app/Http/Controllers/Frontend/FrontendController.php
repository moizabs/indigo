<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::take(4)->orderBy('id', 'DESC')->get();
        $categories = Category::where('status', 1)
        ->withCount(['products' => function($query) {
            $query->where('status', 1)->where('visibility', 1);
        }])
        ->take(12)->get();
        // $categories = Category::where('status', 1)->get();
        return view('frontend.pages.index', compact('products', 'categories'));
    }
    public function userAccount()
    {
        return view('frontend.pages.user-account.index');
    }
    public function contactUs()
    {
        return view('frontend.pages.contact');
    }
    public function wishlist()
    {
        $userId = session('guest_user_id');
        $wishlists = Wishlist::where('user_id', $userId)->with('product')->get();
        return view('frontend.pages.wishlist', compact('wishlists'));
        // return view('frontend.pages.wishlist');
    }
    // public function products(Request $request)
    // {
    //     $query = Product::query();

    //     // Apply search filter
    //     if ($request->filled('search')) {
    //         $query->where('name', 'like', '%' . $request->search . '%');
    //     }

    //     // Apply price range filter
    //     if ($request->filled('min_price')) {
    //         $query->where('price', '>=', $request->min_price);
    //     }
    //     if ($request->filled('max_price')) {
    //         $query->where('price', '<=', $request->max_price);
    //     }

    //     // Apply category filter
    //     if ($request->filled('category')) {
    //         $query->whereHas('category', function ($q) use ($request) {
    //             $q->where('id', $request->category);
    //         });
    //     }

    //     // Apply sorting
    //     if ($request->filled('sort_by')) {
    //         if ($request->sort_by == 'price_low_high') {
    //             $query->orderBy('price', 'asc');
    //         } elseif ($request->sort_by == 'price_high_low') {
    //             $query->orderBy('price', 'desc');
    //         } else {
    //             $query->latest(); // Default to latest products
    //         }
    //     } else {
    //         $query->latest();
    //     }

    //     $products = $query->paginate(9);
    //     $categories = Category::where('status', 1)->withCount('products')->get();
    //     $totalProducts = Product::where('status', 1)
    //         ->where('visibility', 1)
    //         ->get();

    //     // dd($products->toArray());

    //     if ($request->ajax()) {
    //         return view('frontend.partials.product_list', compact('products'));
    //     } else {
    //         return view('frontend.pages.products.index', compact('products', 'categories', 'totalProducts'));
    //     }
    // }

    public function products(Request $request)
{
    $categories = Category::where('status', 1)
        ->withCount(['products' => function($query) {
            $query->where('status', 1)->where('visibility', 1);
        }])
        ->get();

    $baseQuery = Product::where('status', 1)->where('visibility', 1);
    $totalProductsCount = (clone $baseQuery)->count();

    $products = $this->buildProductQuery($request, $baseQuery)
        ->paginate($request->input('per_page', 9));

    if ($request->ajax()) {
        // Return JSON with both HTML and filter data
        return response()->json([
            'html' => view('frontend.partials.product_list', compact('products'))->render(),
            'filters' => [
                'category' => $request->category,
                'search' => $request->search,
                'min_price' => $request->min_price,
                'max_price' => $request->max_price,
                'sort_by' => $request->sort_by
            ]
        ]);
    }

    return view('frontend.pages.products.index', [
        'products' => $products,
        'categories' => $categories,
        'totalProductsCount' => $totalProductsCount
    ]);
}

    protected function buildProductQuery(Request $request)
    {
        return Product::query()
            ->where('status', 1)
            ->where('visibility', 1)
            ->when($request->filled('search'), function($query) use ($request) {
                $query->where('name', 'like', '%'.$request->search.'%');
            })
            ->when($request->filled('min_price'), function($query) use ($request) {
                $query->where('price', '>=', $request->min_price);
            })
            ->when($request->filled('max_price'), function($query) use ($request) {
                $query->where('price', '<=', $request->max_price);
            })
            ->when($request->filled('category') && $request->category !== 'all', function($query) use ($request) {
                $query->whereHas('category', function($q) use ($request) {
                    $q->where('id', $request->category);
                });
            })
            ->when($request->filled('sort_by'), function($query) use ($request) {
                $this->applySorting($query, $request->sort_by);
            }, function($query) {
                $query->latest();
            });
    }

protected function applySorting($query, $sortBy)
{
    switch ($sortBy) {
        case 'price_low_high':
            return $query->orderBy('price', 'asc');
        case 'price_high_low':
            return $query->orderBy('price', 'desc');
        default:
            return $query->latest();
    }
}

protected function getTotalProductsCount()
{
    return Product::where('status', 1)
        ->where('visibility', 1)
        ->count();
}

    public function productsdetail($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('frontend.pages.products.product-detail', compact('product'));
    }

    public function my_cart()
{
    $userId = session('guest_user_id');
    
    $cartItems = Cart::where('user_id', $userId)
        ->with('product')
        ->get();

    return view('frontend.pages.cart', compact('cartItems'));
}

    // public function my_cart()
    // {
    //     $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();
    //     return view('frontend.pages.cart', compact('cartItems'));
    // }

//     public function filter(Request $request)
// {
//     $categoryId = $request->input('category');
//     // dd($categoryId);
//     $products = Product::when($categoryId && $categoryId !== 'all', function($query) use ($categoryId) {
//             return $query->where('category_id', $categoryId);
//         })
//         ->with('category')
//         ->paginate(12);
    
//     return view('frontend.partials.product_list', compact('products'));
// }
}
