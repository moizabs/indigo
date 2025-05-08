<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Category;
use App\Models\ProductGallery;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $units = Unit::all();
        return view('dashboard.products.create', compact('categories', 'brands', 'units'));
    }

    public function store(Request $request)
{
    dd($request->image, $request->gallery);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'short_description' => 'required|string',
        'description' => 'required|string',
        'category' => 'required', 
        'brand' => 'required',
        'unit' => 'required',
        'price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'quantity' => 'required|integer|min:0',
        'image' => 'required|image|max:2048',
        'gallery.*' => 'nullable|image|max:2048',
        'exchangeable' => 'nullable|boolean',
        'refundable' => 'nullable|boolean',
        'visibility' => 'required|boolean',
    ]);

    $image = $request->file('image');
    $imagePath = 'uploads/products/' . $image->getClientOriginalName();
    $image->move(public_path('uploads/products'), $imagePath);

    $galleryPaths = [];
    if ($request->hasFile('gallery')) {
        foreach ($request->file('gallery') as $image) {
            $galleryPath = 'uploads/product_gallery/' . $image->getClientOriginalName();
            $image->move(public_path('uploads/product_gallery'), $galleryPath);
            $galleryPaths[] = $galleryPath;
        }
    }

    $slug = Str::slug($validated['name']);
    
    $count = Product::where('slug', $slug)->count();
    if ($count > 0) {
        $slug = $slug . '-' . time();
    }

    $status = $validated['visibility'] ? 1 : 0;

    $product = Product::create([
        'user_id' => auth()->id(),
        'name' => $validated['name'],
        'slug' => $slug,
        'short_description' => $validated['short_description'],
        'description' => $validated['description'],
        'category_id' => $validated['category'],
        'brand_id' => $validated['brand'],
        'unit_id' => $validated['unit'],
        'price' => $validated['price'],
        'discount' => $validated['discount'] ?? 0,
        'quantity' => $validated['quantity'],
        'image' => $imagePath,
        'exchangeable' => $request->has('exchangeable'),
        'refundable' => $request->has('refundable'),
        'visibility' => $validated['visibility'],
        'status' => $status,
        'featured' => 0, 
    ]);

    if (!empty($request->tags)) {
        foreach ($request->tags as $tagName) {
            // Create the tag with the associated product_id
            Tag::create([
                'product_id' => $product->id,
                'name' => $tagName,
            ]);
        }
    }

    if (!empty($galleryPaths)) {
        foreach ($galleryPaths as $path) {
            ProductGallery::create([
                'product_id' => $product->id,
                'image' => $path,
            ]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Product created successfully');
}

    public function edit(Product $product)
    {
        $product->load(['tags', 'gallery']);
        $categories = Category::all();
        $brands = Brand::all(); 
        $units = Unit::all();  
        return view('dashboard.products.edit', compact('product', 'categories', 'brands', 'units'));
    }

    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'short_description' => 'required|string',
        'description' => 'required|string',
        'category' => 'required',
        'brand' => 'required',
        'unit' => 'required',
        'price' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|max:2048',
        'gallery.*' => 'nullable|image|max:2048',
        'exchangeable' => 'nullable|boolean',
        'refundable' => 'nullable|boolean',
        'visibility' => 'required|boolean',
    ]);

    if ($product->name !== $validated['name']) {
        $slug = Str::slug($validated['name']);
        $count = Product::where('slug', $slug)->where('id', '!=', $product->id)->where('user_id', auth()-id)->count();
        if ($count > 0) {
            $slug .= '-' . time();
        }
        $product->slug = $slug;
    }

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = 'uploads/products/' . $image->getClientOriginalName();
        $image->move(public_path('uploads/products'), $imagePath);
        $product->image = $imagePath;
        }
    
        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPath = 'uploads/product_gallery/' . $image->getClientOriginalName();
                $image->move(public_path('uploads/product_gallery'), $galleryPath);
                $galleryPaths[] = $galleryPath;
            }
        }

    $product->update([
        'name' => $validated['name'],
        'short_description' => $validated['short_description'],
        'description' => $validated['description'],
        'category_id' => $validated['category'],
        'brand_id' => $validated['brand'],
        'unit_id' => $validated['unit'],
        'price' => $validated['price'],
        'discount' => $validated['discount'] ?? 0,
        'quantity' => $validated['quantity'],
        'exchangeable' => $request->has('exchangeable'),
        'refundable' => $request->has('refundable'),
        'visibility' => $validated['visibility'],
        'status' => $validated['visibility'] ? 1 : 0,
    ]);

    if (!empty($request->tags)) {
        $product->tags()->delete();
    
        // Then, create new tags
        foreach ($request->tags as $tagName) {
            Tag::create([
                'product_id' => $product->id,
                'name' => $tagName,
            ]);
        }
    } else {
        $product->tags()->delete();
    }

    if (!empty($galleryPaths)) {
        foreach ($galleryPaths as $path) {
            ProductGallery::create([
                'product_id' => $product->id,
                'image' => $path,
            ]);
        }
    }

    return redirect()->route('products.index')->with('success', 'Product updated successfully');
}

    public function destroy(Product $product)
{
    $imagePath = public_path($product->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    foreach ($product->gallery as $galleryImage) {
        $galleryImagePath = public_path($galleryImage->image);
        if (file_exists($galleryImagePath)) {
            unlink($galleryImagePath);
        }
        $galleryImage->delete();
    }

    Tag::where('product_id', $product->id)->delete();

    $product->delete();

    return response()->json(['success' => true, 'message' => 'Product deleted successfully.']);
}

public function deleteMainImage($productId)
{
    $product = Product::findOrFail($productId);

    $imagePath = public_path('uploads/' . $product->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $product->update(['image' => null]);

    return response()->json(['success' => true, 'message' => 'Product image deleted successfully.']);
}

public function deleteGalleryImage($galleryImageId)
{
    $galleryImage = ProductGallery::findOrFail($galleryImageId);

    $imagePath = public_path('uploads/' . $galleryImage->image);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $galleryImage->delete();

    return response()->json(['success' => true, 'message' => 'Gallery image deleted successfully.']);
}

public function ajaxSearch(Request $request)
{
    $query = $request->get('query');

    $products = Product::where('name', 'like', '%' . $query . '%')
        ->select('id', 'name', 'price', 'image', 'slug')
        ->limit(8)
        ->get();

    $products->transform(function ($product) {
        $product->image_url = asset('uploads/products2/' . $product->image);
        return $product;
    });

    return response()->json($products);
}

}