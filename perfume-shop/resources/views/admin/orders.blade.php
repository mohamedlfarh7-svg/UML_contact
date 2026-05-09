<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe | Gestion des Commandes</title>
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
            <header class="mb-12 flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-black tracking-tighter italic uppercase text-[#1B2559]">Commandes</h1>
                    <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mt-2">Gestion des validations</p>
                </div>
                
                <div class="flex gap-4">
                    <div class="bg-white px-6 py-4 rounded-2xl shadow-sm border border-slate-50 text-center">
                        <p class="text-[8px] font-black uppercase text-slate-400 tracking-widest mb-1">En attente</p>
                        <p class="text-xl font-black text-blue-600 italic leading-none">{{ $orders->count() }}</p>
                    </div>
                </div>
            </header>

            @if(session('success'))
                <div class="mb-8 p-5 bg-emerald-500 text-white rounded-[1.5rem] font-bold text-xs shadow-lg shadow-emerald-100 flex items-center gap-3">
                    <i class="ph-bold ph-check-circle text-xl"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.02)] border border-slate-50 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th class="p-8 text-[9px] font-black uppercase text-slate-400 tracking-widest">Client / Contact</th>
                            <th class="p-8 text-[9px] font-black uppercase text-slate-400 tracking-widest">Produit</th>
                            <th class="p-8 text-[9px] font-black uppercase text-slate-400 tracking-widest text-center">Quantité</th>
                            <th class="p-8 text-[9px] font-black uppercase text-slate-400 tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($orders as $order)
                        <tr class="hover:bg-slate-50/30 transition-colors group">
                            <td class="p-8">
                                <div class="flex flex-col">
                                    <span class="font-black uppercase text-sm tracking-tighter">{{ $order->user->name }}</span>
                                    <span class="text-slate-400 font-mono text-[10px] mt-1">{{ $order->phone_number }}</span>
                                </div>
                            </td>
                            <td class="p-8">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-slate-100 rounded-xl overflow-hidden border border-slate-50">
                                        <img src="{{ asset('storage/' . $order->parfum->image) }}" class="w-full h-full object-cover">
                                    </div>
                                    <span class="font-black text-blue-600 italic uppercase text-xs">{{ $order->parfum->name }}</span>
                                </div>
                            </td>
                            <td class="p-8">
                                <div class="flex justify-center">
                                    <span class="bg-[#1B2559] text-white px-3 py-1 rounded-lg text-[10px] font-black">x{{ $order->requested_quantity }}</span>
                                </div>
                            </td>
                            <td class="p-8 text-right">
                                <form action="{{ route('orders.validate', $order->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-emerald-600 text-white px-6 py-4 rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-emerald-700 transition-all shadow-lg shadow-emerald-100 active:scale-95">
                                        Valider la vente
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($orders->isEmpty())
                <div class="py-32 text-center">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="ph ph-tray text-3xl text-slate-200"></i>
                    </div>
                    <p class="text-slate-400 font-black uppercase tracking-widest italic text-[10px]">Aucune commande en attente</p>
                </div>
                @endif
            </div>
        </main>
    </div>

</body>
</html>