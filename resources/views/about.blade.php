<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Mobility B2B</title>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="bg-slate-50 font-sans antialiased text-slate-800">

    <header class="bg-slate-900 text-white p-6 flex justify-between items-center">
        <div class="font-black text-xl tracking-wider">MOBILITY<span class="text-blue-500">.B2B</span></div>
        <nav class="flex gap-6">
            <a href="/" class="hover:text-blue-400">Catalog</a>
            <a href="{{ route('about') }}" class="text-blue-500 font-bold">About</a>
            <a href="{{ route('login') }}" class="hover:text-blue-400">Admin Login</a>
        </nav>
    </header>

    <div id="react-about-page"></div>

</body>
</html>