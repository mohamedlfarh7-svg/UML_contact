<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Luxe Parfum</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white font-sans antialiased text-slate-900">

    <div class="min-h-screen flex items-center justify-center p-6 py-12">
        <div class="w-full max-w-[500px]">
            
            <div class="flex justify-center mb-8">
                <div class="relative w-64 h-64 bg-blue-50/50 rounded-full flex items-center justify-center overflow-hidden">
                    <img src="https://img.freepik.com/vecteurs-premium/design-du-logo-lettre-m-parfum-elegant-parfum-luxe-logo-initial_680355-1109.jpg?semt=ais_hybrid&w=740&q=80" 
                         alt="Illustration Register" 
                         class="w-full h-full object-contain scale-110">
                </div>
            </div>

            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-[#0A1D37] mb-3">Sign Up</h1>
                <p class="text-slate-400 font-medium">Create a new account to join Luxe Parfum</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <input id="name" name="name" type="text" :value="old('name')" required autofocus
                        class="w-full pl-14 pr-6 py-5 border border-slate-100 rounded-2xl bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all text-lg shadow-sm placeholder:text-slate-300"
                        placeholder="Full Name">
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <input id="email" name="email" type="email" :value="old('email')" required
                        class="w-full pl-14 pr-6 py-5 border border-slate-100 rounded-2xl bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all text-lg shadow-sm placeholder:text-slate-300"
                        placeholder="Email Address">
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input id="password" name="password" type="password" required
                        class="w-full pl-14 pr-6 py-5 border border-slate-100 rounded-2xl bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all text-lg shadow-sm placeholder:text-slate-300"
                        placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-300 group-focus-within:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full pl-14 pr-6 py-5 border border-slate-100 rounded-2xl bg-slate-50/50 focus:bg-white focus:ring-2 focus:ring-blue-600/20 focus:border-blue-600 outline-none transition-all text-lg shadow-sm placeholder:text-slate-300"
                        placeholder="Confirm Password">
                </div>

                <button type="submit" class="w-full py-5 bg-[#0066FF] text-white rounded-2xl font-bold text-xl shadow-2xl shadow-blue-100 hover:bg-blue-700 hover:-translate-y-1 active:scale-95 transition-all duration-300 mt-6 uppercase tracking-wider">
                    Sign Up
                </button>
            </form>

            <div class="relative my-10 text-center">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-100"></div></div>
                <span class="relative bg-white px-6 text-sm font-semibold text-slate-400 font-serif italic">Or</span>
            </div>

            <div class="grid grid-cols-2 gap-5 mb-10">
                <button class="flex items-center justify-center gap-3 py-4 border border-slate-100 rounded-2xl bg-slate-50/50 hover:bg-white hover:shadow-md transition-all font-bold text-slate-600">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6" alt="Google"> Google
                </button>
                <button class="flex items-center justify-center gap-3 py-4 border border-slate-100 rounded-2xl bg-slate-50/50 hover:bg-white hover:shadow-md transition-all font-bold text-slate-600">
                    <img src="https://www.svgrepo.com/show/475647/facebook-color.svg" class="w-6 h-6" alt="Facebook"> Facebook
                </button>
            </div>

            <div class="text-center">
                <p class="text-slate-500 font-medium">
                    Already have an account? <a href="{{ route('login') }}" class="text-blue-600 font-extrabold hover:underline ml-1">Sign in</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>