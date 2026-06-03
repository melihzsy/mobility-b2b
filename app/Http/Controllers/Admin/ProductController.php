<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch products along with their categories (Eager Loading to prevent N+1 query issue)
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Sadece aktif olan kategorileri listeye çekiyoruz
        $categories = Category::where('is_active', true)->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        // 1. Gelen verileri doğrula (Görsel için format ve boyut sınırları koyduk)
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'oem_number' => 'nullable|string|max:255|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimum 2MB
        ]);

        // 2. Fotoğraf Yükleme İşlemi
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Fotoğrafı 'storage/app/public/products' klasörüne kaydet
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // 3. Veritabanına Kaydet (URL için slug'ı otomatik oluşturuyoruz)
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name), // "LiDAR Sensör" -> "lidar-sensor"
            'oem_number' => $request->oem_number,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'image' => $imagePath,
            'is_active' => $request->is_active ?? true,
        ]);

        // 4. Listeye geri dön
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
