<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'category_id',
        'brand_id',
        'unit_id',
        'featured',
        'short_description',
        'description',
        'exchangeable',
        'refundable',
        'quantity',
        'price',
        'discount',
        'image',
        'visibility',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
