<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe | Finaliser la commande</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

            

        <main class="flex-1 p-6 md:p-12 flex items-center justify-center">
            <div class="max-w-4xl w-full grid grid-cols-1 md:grid-cols-2 bg-white rounded-[3rem] shadow-[0_40px_80px_rgba(0,0,0,0.05)] border border-slate-50 overflow-hidden">
                
                <div class="bg-[#1B2559] p-12 text-white flex flex-col justify-between relative overflow-hidden">
                    <div class="relative z-10">
                        <h2 class="text-3xl font-black italic uppercase leading-none tracking-tighter mb-4">
                            Votre <br> <span class="text-blue-400">Sélection</span>
                        </h2>
                    </div>

                    <div class="relative z-10 mt-8">
                        <div class="aspect-square w-full rounded-[2rem] overflow-hidden border border-white/10 shadow-2xl mb-6">
                            <img src="{{ asset('storage/' . $parfum->image) }}" class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-xl font-black italic uppercase tracking-tighter">{{ $parfum->name }}</h3>
                        <p class="text-blue-400 font-black text-lg italic mt-1">{{ $parfum->price }} DH</p>
                    </div>
                </div>

                <div class="p-12 md:p-16 flex flex-col justify-center">
                    <div class="mb-10">
                        <h1 class="text-2xl font-black italic uppercase tracking-tighter text-[#1B2559]">Validation</h1>
                        <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest mt-2">Détails de livraison</p>
                    </div>

                    <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="parfum_id" value="{{ $parfum->id }}">

                        <div class="space-y-2">
                            <label class="text-[9px] font-black uppercase tracking-widest text-slate-400 ml-2">Quantité</label>
                            <input type="number" name="requested_quantity" min="1" max="{{ $parfum->quantity }}" value="1" 
                                class="w-full px-6 py-5 bg-slate-50 border-none rounded-[1.5rem] focus:ring-2 focus:ring-blue-600/10 transition-all font-bold text-sm" required>
                            <p class="text-[9px] font-bold text-emerald-600 ml-2 italic uppercase">Stock disponible: {{ $parfum->quantity }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[9px] font-black uppercase tracking-widest text-slate-400 ml-2">Téléphone</label>
                            <input type="tel" name="phone_number" placeholder="06..." 
                                class="w-full px-6 py-5 bg-slate-50 border-none rounded-[1.5rem] focus:ring-2 focus:ring-blue-600/10 transition-all font-bold text-sm" required>
                        </div>

                        <button type="submit" class="w-full py-5 bg-[#1B2559] text-white rounded-[1.5rem] text-[10px] font-black uppercase tracking-[0.2em] hover:bg-blue-600 transition-all shadow-2xl">
                            Confirmer la commande
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>

</body>
</html>