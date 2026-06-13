<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Mobility B2B</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800 h-screen flex flex-col">

    <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10 shadow-sm">
        <div class="flex items-center gap-2">
            <div class="h-10 w-10 flex items-center justify-center rounded-lg bg-slate-900 text-white font-black text-xl">M</div>
            <h1 class="text-xl font-bold text-slate-800">Mobility.Admin</h1>
        </div>
        <a href="/" class="flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 px-4 py-2 rounded-xl text-sm font-bold transition-colors shadow-sm">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Go to Customer Storefront
        </a>
    </header>

    <div class="flex flex-1 overflow-hidden">
        <aside class="w-64 bg-slate-900 text-white flex flex-col shadow-2xl">
            <nav class="flex-1 px-4 py-6 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 hover:text-white hover:bg-slate-800 px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                    Overview
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 hover:text-white hover:bg-slate-800 px-4 py-3 rounded-lg text-sm font-medium transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                    Hardware Catalog
                </a>
            </nav>
            <div class="p-4 border-t border-slate-800 text-sm text-slate-500 font-medium">Mobility B2B Admin v1.0</div>
        </aside>

        <main class="flex-1 overflow-y-auto p-8 lg:p-12">
            @yield('content')
        </main>
    </div>

</body>
</html>