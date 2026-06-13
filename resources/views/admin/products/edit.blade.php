@extends('layouts.admin')

@section('title', 'Edit Component')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-black text-slate-900">Edit Component</h2>
        <p class="text-slate-500 mt-1">Update the details of {{ $product->name }}.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden max-w-3xl">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="p-8 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Component Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Price ($)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" required>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-blue-500/30 transition-colors">
                    Update Component
                </button>
                <a href="{{ route('admin.products.index') }}" class="text-slate-500 hover:text-slate-700 font-bold py-3 px-6 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection