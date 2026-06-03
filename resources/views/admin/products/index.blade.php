@extends('layouts.admin')

@section('header', 'OEM Parts Management')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-lg font-semibold text-slate-800">Product Catalog</h2>
            <p class="text-sm text-slate-500">Manage all OEM parts, sensors, and hardware components.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-all shadow-lg shadow-blue-500/30">
            + Add New Part
        </a>
    </div>

    @if($products->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                        <th class="py-3 px-4 font-medium">Image</th>
                        <th class="py-3 px-4 font-medium">Product Name</th>
                        <th class="py-3 px-4 font-medium">Category</th>
                        <th class="py-3 px-4 font-medium">Price</th>
                        <th class="py-3 px-4 font-medium">Stock</th>
                        <th class="py-3 px-4 font-medium">Status</th>
                        <th class="py-3 px-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($products as $product)
                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-lg border border-slate-200 shadow-sm">
                            @else
                                <div class="w-12 h-12 bg-slate-100 rounded-lg flex items-center justify-center text-slate-400 text-xs border border-slate-200">No Img</div>
                            @endif
                        </td>
                        <td class="py-3 px-4 font-medium text-slate-800">
                            {{ $product->name }}
                            <div class="text-xs text-slate-500 font-normal mt-0.5">OEM: {{ $product->oem_number ?? 'N/A' }}</div>
                        </td>
                        <td class="py-3 px-4 text-slate-600">{{ $product->category->name ?? 'Uncategorized' }}</td>
                        <td class="py-3 px-4 font-medium text-slate-800">${{ number_format($product->price, 2) }}</td>
                        <td class="py-3 px-4">
                            @if($product->stock_quantity > 10)
                                <span class="text-green-600 font-medium">{{ $product->stock_quantity }} in stock</span>
                            @elseif($product->stock_quantity > 0)
                                <span class="text-orange-500 font-medium">{{ $product->stock_quantity }} low stock</span>
                            @else
                                <span class="text-red-500 font-medium">Out of stock</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @if($product->is_active)
                                <span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                            @else
                                <span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Inactive</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-right">
                            <div class="flex justify-end items-center gap-3">
                                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-800 font-medium">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-10 bg-slate-50 rounded-lg border border-dashed border-slate-300">
            <p class="text-slate-500">No OEM parts found in the catalog.</p>
        </div>
    @endif
</div>
@endsection