<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Luxe Parfum</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans antialiased text-slate-900">

    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-[500px]">
            
            <div class="flex justify-center mb-10">
                <div class="relative w-72 h-72 bg-blue-50/50 rounded-full flex items-center justify-center overflow-hidden">
                    <img src="https://img.freepik.com/vecteurs-premium/design-du-logo-lettre-m-parfum-elegant-parfum-luxe-logo-initial_680355-1109.jpg?semt=ais_hybrid&w=740&q=80" 
                         alt="Illustration" 
                         class="w-full h-full object-contain scale-110">
                </div>
            </div>

            <div class="text-center mb-10">
                <h1 class="text-4xl font-bold text-[#0A1D37] mb-3">Sign In</h1>
                <p class="text-slate-400 font-medium">Enter valid user name & password to continue</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <input id="email" name="email" type="email" :value="old('email')" required autofocus
                        class="w-full pl-14 pr-6 py-5 border border-slate-100 rounded-2xl bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all text-lg shadow-sm placeholder:text-slate-300"
                        placeholder="User name">
                </div>

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input id="password" name="password" type="password" required
                        class="w-full pl-14 pr-14 py-5 border border-slate-100 rounded-2xl bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all text-lg shadow-sm placeholder:text-slate-300"
                        placeholder="Password">
                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center cursor-pointer text-slate-300 hover:text-slate-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                </div>

                <div class="flex justify-end pr-2">
                    <a href="{{ route('password.request') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors">Forget password</a>
                </div>

                <button type="submit" class="w-full py-5 bg-[#0066FF] text-white rounded-2xl font-bold text-xl shadow-2xl shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 active:scale-95 transition-all duration-300 mt-4">
                    Login
                </button>
            </form>

            <div class="relative my-12 text-center">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-100"></div></div>
                <span class="relative bg-white px-6 text-sm font-semibold text-slate-400">Or Continue with</span>
            </div>

            <div class="grid grid-cols-2 gap-5 mb-12">
                <button class="flex items-center justify-center gap-3 py-4 border border-slate-100 rounded-2xl bg-slate-50/50 hover:bg-white hover:shadow-md transition-all font-bold text-slate-600">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6" alt="Google"> Google
                </button>
                <button class="flex items-center justify-center gap-3 py-4 border border-slate-100 rounded-2xl bg-slate-50/50 hover:bg-white hover:shadow-md transition-all font-bold text-slate-600">
                    <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-6 h-6" alt="Facebook"> Facebook
                </button>
            </div>

            <div class="text-center">
                <p class="text-slate-500 font-medium">
                    Haven't any account? <a href="{{ route('register') }}" class="text-blue-600 font-extrabold hover:underline ml-1">Sign up</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>