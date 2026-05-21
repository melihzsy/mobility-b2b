<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B2B Mobility - Admin Portal</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 font-sans antialiased flex h-screen overflow-hidden">
    
    <aside class="w-64 bg-slate-900 text-white flex flex-col h-full shadow-2xl z-20">
        <div class="h-16 flex items-center px-6 border-b border-slate-800 font-bold text-xl tracking-wider">
            MOBILITY<span class="text-blue-500">.B2B</span>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('admin.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300 hover:text-white transition-colors">Dashboard</a>
            <a href="{{ route('admin.categories.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300 hover:text-white transition-colors">Kategori Yönetimi</a>
            <a href="{{ route('admin.products.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300 hover:text-white transition-colors">OEM Yedek Parçalar</a>
        </nav>
        <div class="p-4 border-t border-slate-800">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-red-400 hover:bg-slate-800 hover:text-red-300 rounded-lg transition-colors font-medium">
                    Sistemden Çıkış
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-full relative overflow-y-auto">
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-8 z-10 border-b border-slate-200">
            <h1 class="text-xl font-semibold text-slate-800">@yield('header', 'Admin Portal')</h1>
            <div class="text-sm text-slate-500 flex items-center gap-2">
                <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </span>
                <span class="font-medium text-slate-700">{{ auth()->user()->name ?? 'Sistem Yöneticisi' }}</span>
            </div>
        </header>
        
        <div class="p-8">
            @yield('content')
        </div>
    </main>

</body>
</html>