<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobility B2B - Storefront</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="bg-slate-50 antialiased">
    <header class="bg-slate-900 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold tracking-wider">
                MOBILITY<span class="text-blue-500">.B2B</span>
            </div>
            <nav class="space-x-6">
                <a href="{{ route('about') }}">About</a>
                <a href="/login" class="text-slate-300 hover:text-white">Admin Login</a>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">OEM Parts Catalog</h1>
            <p class="text-slate-500 mt-2">Browse our high-quality sensors and blockchain mobility solutions.</p>
        </div>
        
        <div id="react-product-list"></div>
    </main>

</body>
</html>