@extends('layouts.admin')

@section('header', 'Category Management')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-lg font-semibold text-slate-800">System Categories</h2>
            <p class="text-sm text-slate-500">Manage all parts and sensor categories for the B2B portal.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-all shadow-lg shadow-blue-500/30">
            + Add New Category
        </a>
    </div>
    
    @if($categories->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-500 text-sm border-b border-slate-200">
                        <th class="py-3 px-4 font-medium">ID</th>
                        <th class="py-3 px-4 font-medium">Category Name</th>
                        <th class="py-3 px-4 font-medium">URL (Slug)</th>
                        <th class="py-3 px-4 font-medium">Status</th>
                        <th class="py-3 px-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($categories as $category)
                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors">
                        <td class="py-3 px-4 text-slate-500">#{{ $category->id }}</td>
                        <td class="py-3 px-4 font-medium text-slate-800">{{ $category->name }}</td>
                        <td class="py-3 px-4 text-slate-500">{{ $category->slug }}</td>
                        <td class="py-3 px-4">
                            @if($category->is_active)
                                <span class="px-2.5 py-1 bg-green-100 text-green-700 rounded-full text-xs font-medium">Active</span>
                            @else
                                <span class="px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-xs font-medium">Inactive</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-right flex justify-end items-center gap-3">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-10 bg-slate-50 rounded-lg border border-dashed border-slate-300">
            <p class="text-slate-500">No categories found.</p>
        </div>
    @endif
</div>
@endsection