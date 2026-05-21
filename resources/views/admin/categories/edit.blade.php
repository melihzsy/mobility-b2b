@extends('layouts.admin')

@section('header', 'Kategori Düzenle')

@section('content')
<div class="max-w-2xl bg-white rounded-xl shadow-sm border border-slate-200 p-8">
    <div class="mb-8">
        <h2 class="text-lg font-semibold text-slate-800">Kategori Güncelleme</h2>
        <p class="text-sm text-slate-500"><b>{{ $category->name }}</b> kategorisinin bilgilerini değiştiriyorsunuz.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-lg shadow-sm">
            <h3 class="font-bold text-sm mb-1">Lütfen aşağıdaki hataları düzeltin:</h3>
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Kategori Adı</label>
            <input type="text" name="name" value="{{ $category->name }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">URL (Slug)</label>
            <input type="text" name="slug" value="{{ $category->slug }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all bg-slate-50">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Açıklama</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all">{{ $category->description }}</textarea>
        </div>

        <div class="flex items-center gap-2">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ $category->is_active ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300">
            <label class="text-sm text-slate-700 font-medium">Bu kategori sistemde aktif olsun mu?</label>
        </div>

        <div class="pt-4 flex justify-end gap-3 border-t border-slate-100">
            <a href="{{ route('admin.categories.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors">İptal</a>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-lg shadow-blue-500/30 transition-all">Değişiklikleri Kaydet</button>
        </div>
    </form>
</div>
@endsection