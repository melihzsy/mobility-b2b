<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mobility B2B</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-slate-900 font-sans antialiased min-h-screen flex items-center justify-center p-6">

    <div class="max-w-4xl w-full flex bg-slate-800/50 rounded-3xl shadow-2xl border border-slate-700 overflow-hidden">
        
        <div class="hidden md:flex flex-col w-1/2 p-12 border-r border-slate-700/50 justify-center">
            <h1 class="text-3xl font-black text-white mb-4">MOBILITY<span class="text-blue-500">.B2B</span></h1>
            <p class="text-slate-400 leading-relaxed text-sm">
                Advanced OEM Components & Supply Chain Platform. Manage your automotive parts, track component history, and streamline your B2B orders globally.
            </p>
            <div class="mt-auto pt-8">
                <p class="text-xs text-slate-500">&copy; 2026 Mobility Solutions Inc.<br>Secure Partner Access Only.</p>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-12">
            <h2 class="text-2xl font-bold text-white mb-2">Partner Login</h2>
            <p class="text-slate-400 text-sm mb-8">Please enter your credentials to access the portal.</p>

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

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-slate-400 gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-slate-700 bg-slate-800 text-blue-500 focus:ring-blue-500">
                        Remember session
                    </label>
                    <a href="#" class="text-blue-500 hover:text-blue-400 font-medium">Forgot Password?</a>
                </div>

                @if ($errors->any())
                    <div class="text-red-500 text-sm font-medium bg-red-500/10 border border-red-500/20 rounded-lg p-3">
                        {{ $errors->first() }}
                    </div>
                @endif

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-4 rounded-lg transition-colors shadow-lg shadow-blue-500/30 tracking-wide">
                    Authorize Access
                </button>
            </form>
        </div>
    </div>

</body>
</html>