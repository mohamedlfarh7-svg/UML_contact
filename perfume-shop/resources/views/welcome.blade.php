<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue chez Luxe Parfum</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white font-sans antialiased overflow-hidden">

    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-900/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-indigo-900/20 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center px-6">
        
        <div class="mb-12">
            <h1 class="text-4xl md:text-6xl font-black tracking-tighter text-center">
                LUXE PARFUM<span class="text-blue-600">.</span>
            </h1>
            <div class="h-1 w-24 bg-blue-600 mx-auto mt-4 rounded-full"></div>
        </div>

        <div class="max-w-3xl text-center mb-16">
            <h2 class="text-5xl md:text-7xl font-black leading-none mb-8 tracking-tight">
                L'Art de <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-600">La Fragrance</span>
            </h2>
            <p class="text-slate-400 text-lg md:text-xl font-medium leading-relaxed max-w-xl mx-auto">
                Plongez dans un univers où chaque note raconte une histoire. Découvrez notre collection exclusive de parfums de luxe.
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-6 items-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-12 py-5 bg-blue-600 text-white rounded-full font-black text-sm uppercase tracking-widest hover:bg-blue-700 transition-all shadow-2xl shadow-blue-900/20">
                        Accéder au Dashboard
                    </a>
                    <a href="{{ route('home') }}" class="px-12 py-5 border-2 border-white/10 hover:border-white rounded-full font-black text-sm uppercase tracking-widest transition-all">
                        Explorer la Boutique
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-12 py-5 bg-white text-black rounded-full font-black text-sm uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all shadow-xl">
                        Se Connecter
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-12 py-5 border-2 border-white/10 hover:border-white rounded-full font-black text-sm uppercase tracking-widest transition-all">
                            Créer un Compte
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <div class="absolute bottom-10 left-10 hidden lg:block">
            <div class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-600 vertical-text">
                Established 2026 • Premium Quality
            </div>
        </div>
    </div>

    <style>
        .vertical-text {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }
    </style>

</body>
</html>