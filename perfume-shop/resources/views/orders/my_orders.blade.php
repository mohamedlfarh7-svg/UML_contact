<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Commandes | Luxe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#F8F9FD] font-sans antialiased text-[#1B2559]">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-white hidden lg:flex flex-col border-r border-slate-100 sticky top-0 h-screen">
            <div class="p-10 text-2xl font-black tracking-tighter italic uppercase">
                Luxe<span class="text-blue-600">.</span>
            </div>
            
            <nav class="flex-1 px-6 space-y-2">
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
            </div>
        </aside>

        <main class="flex-1 p-6 md:p-12">
            <header class="mb-12">
                <h1 class="text-4xl font-black tracking-tighter italic uppercase text-[#1B2559]">Suivi de commandes</h1>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mt-2">Historique et Statut</p>
            </header>

            <div class="grid gap-6">
                @forelse($orders as $order)
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-50 flex flex-wrap items-center justify-between gap-6 transition-all hover:shadow-md">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50">
                            <img src="{{ asset('storage/' . $order->parfum->image) }}" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h3 class="font-black italic uppercase text-lg leading-none mb-2">{{ $order->parfum->name }}</h3>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Quantité: {{ $order->requested_quantity }} | {{ $order->created_at->format('d M, Y') }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-8">
                        <div class="text-right">
                            <p class="text-[8px] font-black uppercase text-slate-400 tracking-widest mb-1">Total estimé</p>
                            <p class="font-black text-blue-600 italic">{{ $order->requested_quantity * $order->parfum->price }} DH</p>
                        </div>

                        @if($order->status == 'en_attente')
                            <span class="px-6 py-3 bg-amber-100 text-amber-600 rounded-xl text-[9px] font-black uppercase tracking-widest flex items-center gap-2">
                                <i class="ph-fill ph-clock text-base"></i> En attente
                            </span>
                        @elseif($order->status == 'validee')
                            <span class="px-6 py-3 bg-emerald-100 text-emerald-600 rounded-xl text-[9px] font-black uppercase tracking-widest flex items-center gap-2">
                                <i class="ph-fill ph-check-circle text-base"></i> Validée
                            </span>
                        @else
                            <span class="px-6 py-3 bg-red-100 text-red-600 rounded-xl text-[9px] font-black uppercase tracking-widest flex items-center gap-2">
                                <i class="ph-fill ph-x-circle text-base"></i> Annulée
                            </span>
                        @endif
                    </div>
                </div>
                @empty
                <div class="py-32 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-100">
                    <i class="ph ph-shopping-cart text-6xl text-slate-100 mb-4 block mx-auto"></i>
                    <p class="text-slate-400 font-black uppercase tracking-widest italic text-[10px]">Vous n'avez pas encore passé de commande</p>
                    <a href="{{ route('home') }}" class="mt-6 inline-block px-8 py-4 bg-[#1B2559] text-white rounded-2xl text-[10px] font-black uppercase tracking-widest shadow-lg">Boutique</a>
                </div>
                @endforelse
            </div>
        </main>
    </div>

</body>
</html>