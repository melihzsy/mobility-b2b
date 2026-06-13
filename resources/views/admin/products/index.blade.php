@extends('layouts.admin')

@section('title', 'Hardware Catalog')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-black text-slate-900">Hardware Catalog</h2>
            <p class="text-slate-500 mt-1">Manage your OEM components, sensors, and mobility parts.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-5 rounded-xl shadow-lg shadow-blue-500/30 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            Add New Component
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 text-sm uppercase tracking-wider">
                        <th class="p-5 font-bold">ID</th>
                        <th class="p-5 font-bold">Component Name</th>
                        <th class="p-5 font-bold">Price</th>
                        <th class="p-5 font-bold">Status</th>
                        <th class="p-5 font-bold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    
                    {{-- Veritabanındaki ürünleri listeleyen döngü --}}
                    @forelse($products as $product)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="p-5 text-slate-500">#{{ $product->id }}</td>
                        <td class="p-5">
                            <div class="font-bold text-slate-900">{{ $product->name }}</div>
                        </td>
                        <td class="p-5 text-slate-900 font-bold">${{ number_format($product->price, 2) }}</td>
                        <td class="p-5">
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">In Stock</span>
                        </td>
                        <td class="p-5 text-right space-x-3 flex justify-end">
                            {{-- Düzenle (Edit) Butonu --}}
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700 font-medium text-sm transition-colors">Edit</a>
                            
                            {{-- Sil (Delete) Butonu --}}
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium text-sm transition-colors" onclick="return confirm('Silmek istediğine emin misin?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-5 text-center text-slate-500">No components found. Add a new one to get started!</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection