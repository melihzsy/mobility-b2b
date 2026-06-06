<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B2B Mobility Partner Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])
</head>
<body class="bg-slate-900 text-slate-200 antialiased h-screen flex items-center justify-center">
    
    <div class="max-w-4xl w-full flex rounded-2xl shadow-2xl overflow-hidden bg-slate-800 border border-slate-700">
        
        <div class="w-1/2 p-12 bg-slate-800 flex flex-col justify-between hidden md:flex border-r border-slate-700">
            <div>
                <h1 class="text-3xl font-bold text-white tracking-wider">MOBILITY<span class="text-blue-500">.B2B</span></h1>
                <p class="mt-4 text-slate-400 text-sm leading-relaxed">
                    Advanced OEM Components & Supply Chain Platform. 
                    Manage your automotive parts, track component history, and streamline your B2B orders globally.
                </p>
            </div>
            <div class="text-xs text-slate-500">
                &copy; {{ date('Y') }} Mobility Solutions Inc. <br> Secure Partner Access Only.
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 sm:p-12 bg-slate-900">
            <h2 class="text-2xl font-semibold text-white mb-2">Partner Login</h2>
            <p class="text-sm text-slate-400 mb-8">Please enter your credentials to access the portal.</p>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/50 text-red-400 p-3 rounded-lg text-sm mb-6">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-slate-400 mb-1">Corporate Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-slate-500 transition-colors"
                        placeholder="admin@mysite.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-400 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 bg-slate-800 border border-slate-700 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-white placeholder-slate-500 transition-colors"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-600 text-blue-500 focus:ring-blue-500 bg-slate-700">
                        <span class="text-sm text-slate-400">Remember session</span>
                    </label>
                    <a href="#" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">Forgot Password?</a>
                </div>

                <button type="submit" 
                    class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-lg shadow-blue-500/30 transition-all duration-200">
                    Authorize Access
                </button>
            </form>
        </div>

    </div>

</body>
</html>