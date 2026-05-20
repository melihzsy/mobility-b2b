<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Veritabanına toplu veri eklemeye izin verdiğimiz sütunlar
    protected $fillable = ['name', 'slug', 'description', 'is_active'];

    // Bire-Çok İlişki: Bir kategorinin birden fazla ürünü olabilir
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}