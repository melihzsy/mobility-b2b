@extends('layouts.admin')

@section('header', 'Add New OEM Part')

@section('content')
<div class="max-w-3xl bg-white rounded-xl shadow-sm border border-slate-200 p-8">
    <div class="mb-8">
        <h2 class="text-lg font-semibold text-slate-800">Product / Part Details</h2>
        <p class="text-sm text-slate-500">Add a new spare part or hardware to the catalog.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-lg shadow-sm">
            <h3 class="font-bold text-sm mb-1">Please fix the following errors:</h3>
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-slate-700 mb-1">Part / Product Name</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="E.g., LiDAR Sensor V2">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Assigned Category</label>
                <select name="category_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-white">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">OEM Number</label>
                <input type="text" name="oem_number" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="E.g., OEM-90210">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Unit Price ($)</label>
                <input type="number" step="0.01" name="price" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="0.00">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Stock Quantity</label>
                <input type="number" name="stock_quantity" value="0" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Technical Description</label>
            <textarea name="description" rows="4" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all" placeholder="Technical specs, compatible vehicle models, etc..."></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Product Image</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50">
        </div>

        <div class="flex items-center gap-2">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 text-blue-600 rounded border-slate-300">
            <label class="text-sm text-slate-700 font-medium">Set as active and visible?</label>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-slate-100">
            <a href="{{ route('admin.products.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors">Cancel</a>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-lg shadow-blue-500/30 transition-all">Save Product</button>
        </div>
    </form>
</div>
@endsection