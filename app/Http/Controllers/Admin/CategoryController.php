<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Tüm kategorileri en son eklenenden geriye doğru al
        $categories = Category::latest()->get(); 
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // 1. Gelen verileri doğrula (Validation)
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'slug' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        // 2. Veritabanına kaydet
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'is_active' => $request->is_active ?? true,
        ]);

        // 3. Başarı mesajıyla listeye geri dön
        return redirect()->route('admin.categories.index');
    }
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Doğrulama (Mevcut ID'yi unique kontrolünden hariç tutuyoruz)
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        // Veriyi güncelle
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'is_active' => $request->is_active ?? false,
        ]);

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}