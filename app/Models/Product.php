<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'oem_number', 
        'description', 'price', 'stock_quantity', 'image', 'is_active'
    ];

    // Bire-Çok İlişki: Bir ürün yalnızca bir kategoriye ait olabilir
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}