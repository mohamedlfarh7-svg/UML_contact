<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Dashboard | Nouveautés</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body class="bg-[#F8F9FD] font-sans antialiased text-[#1B2559]">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-white hidden lg:flex flex-col border-r border-slate-100 sticky top-0 h-screen">
            <div class="p-10 text-2xl font-black tracking-tighter italic uppercase">
                Elegy<span class="text-blue-600">.</span>
            </div>
            
            <nav class="flex-1 px-6 space-y-2">
                <a href="{{ route('welcome') }}" 
                    class="flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('welcome') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-400 hover:text-blue-600 hover:bg-slate-50' }}">
                    <i class="ph ph-house-line text-xl"></i>
                    Accueil
                </a>
                <a href="{{ route('dashboard') }}" 
                    class="flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-400 hover:text-blue-600 hover:bg-slate-50' }}">
                    <i class="ph ph-sparkle text-xl"></i>
                    Nouveautés
                </a>

                <a href="{{ route('home') }}" 
                class="flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('home') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-400 hover:text-blue-600 hover:bg-slate-50' }}">
                    <i class="ph-fill ph-shopping-bag text-xl"></i>
                    Boutique
                </a>

                @auth
                <a href="{{ route('orders.my') }}" 
                class="flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('orders.my') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-400 hover:text-blue-600 hover:bg-slate-50' }}">
                    <i class="ph ph-package text-xl"></i>
                    Mes Commandes
                </a>
                @endauth

                @if(auth()->check() && auth()->user()->is_admin == 1)
                @php
                    $pendingCount = \App\Models\Order::where('status', 'en_attente')->count();
                @endphp
                <a href="{{ route('admin.orders') }}" 
                class="relative flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('admin.orders') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-400 hover:text-blue-600 hover:bg-slate-50' }}">
                    <i class="ph ph-clipboard-text text-xl"></i>
                    Commandes
                    @if($pendingCount > 0)
                        <span class="absolute right-4 bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full shadow-sm">{{ $pendingCount }}</span>
                    @endif
                </a>
                @endif

                <div class="my-4 border-t border-slate-50 mx-6"></div>

                <a href="{{route('about')}}" class="flex items-center gap-4 px-6 py-4 text-slate-400 hover:text-blue-600 hover:bg-slate-50 rounded-2xl transition-all font-bold">
                    <i class="ph ph-info text-xl"></i>
                    About
                </a>

                <a href="{{route('contact')}}" class="flex items-center gap-4 px-6 py-4 text-slate-400 hover:text-blue-600 hover:bg-slate-50 rounded-2xl transition-all font-bold">
                    <i class="ph ph-envelope-simple text-xl"></i>
                    Contact
                </a>
            </nav>

            <div class="p-6 mt-auto border-t border-slate-50">
                @auth
                <div class="flex items-center gap-3 bg-slate-50 p-3 rounded-2xl">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xs">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <p class="text-[10px] font-black uppercase truncate">{{ Auth::user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-[9px] text-red-500 font-bold uppercase tracking-widest hover:underline">Déconnexion</button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </aside>

        <main class="flex-1 p-6 md:p-12">
            <header class="mb-16 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                <div>
                    <span class="text-blue-600 font-black text-[10px] uppercase tracking-[0.3em]">Exposition Exclusive</span>
                    <h1 class="text-5xl font-black tracking-tighter italic uppercase mt-2 text-[#1B2559]">Dernières Arrivées</h1>
                    <div class="h-1.5 w-20 bg-blue-600 rounded-full mt-4"></div>
                </div>
                
                <a href="{{ route('home') }}" class="group flex items-center gap-4 bg-white px-8 py-4 rounded-2xl shadow-sm border border-slate-100 hover:bg-slate-900 hover:text-white transition-all duration-500">
                    <span class="text-xs font-black uppercase tracking-widest">Voir toute la collection</span>
                    <i class="ph ph-arrow-right font-bold group-hover:translate-x-2 transition-transform"></i>
                </a>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @forelse($parfums as $parfum)
                <div class="group relative bg-white rounded-[3rem] p-8 shadow-[0_20px_50px_rgba(0,0,0,0.02)] border border-slate-50 transition-all duration-700 hover:shadow-2xl hover:-translate-y-3">
                    <div class="aspect-[4/5] bg-slate-50 rounded-[2rem] overflow-hidden mb-8 relative">
                        <img src="{{ asset('storage/' . $parfum->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" alt="{{ $parfum->name }}">
                        <div class="absolute top-6 left-6">
                            <span class="bg-white/90 backdrop-blur-md px-4 py-2 rounded-xl text-[9px] font-black uppercase tracking-widest text-slate-900 shadow-sm italic">
                                {{ $parfum->category }}
                            </span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-start">
                            <h3 class="text-2xl font-black text-[#1B2559] tracking-tighter italic uppercase leading-none">{{ $parfum->name }}</h3>
                            <p class="text-blue-600 font-black text-lg italic tracking-tighter">{{ number_format($parfum->price, 0) }} DH</p>
                        </div>
                        
                        <p class="text-slate-400 text-sm font-medium leading-relaxed line-clamp-3">
                            {{ $parfum->description ?? 'Une fragrance rare qui définit l\'élégance et le caractère de la collection Luxe Parfum.' }}
                        </p>

                        <div class="pt-4 flex items-center gap-2 text-slate-300 font-black text-[9px] uppercase tracking-widest">
                            <i class="ph ph-clock"></i>
                            <span>Ajouté récemment</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-32 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-100">
                    <i class="ph ph-package text-6xl text-slate-200 mb-6 block mx-auto"></i>
                    <p class="text-slate-400 font-black uppercase tracking-widest italic text-sm">Le catalogue est actuellement vide</p>
                </div>
                @endforelse
            </div>

            <div class="mt-20 p-12 bg-slate-900 rounded-[3rem] relative overflow-hidden shadow-2xl shadow-slate-200">
                <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-8 text-center md:text-left">
                    <div>
                        <h2 class="text-white text-3xl font-black italic tracking-tighter uppercase mb-2">Besoin de plus de choix ?</h2>
                        <p class="text-slate-400 font-bold text-sm uppercase tracking-widest">Explorez plus de {{ \App\Models\Parfum::count() }} fragrances exclusives</p>
                    </div>
                    <a href="{{ route('home') }}" class="bg-white text-slate-900 px-10 py-5 rounded-2xl text-[10px] font-black uppercase tracking-[0.3em] hover:bg-blue-600 hover:text-white transition-all">
                        Explorer tout
                    </a>
                </div>
                <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-blue-600/10 rounded-full blur-3xl"></div>
            </div>
        </main>
    </div>

</body>
</html>