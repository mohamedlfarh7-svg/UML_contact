<!DOCTYPE html>
<html lang="fr" x-data="{ 
    search: '', 
    category: 'tous',
    parfums: [
        @foreach(collect($parfumsHommes)->merge($parfumsFemmes) as $p)
        { 
            id: {{ $p->id }}, 
            name: '{{ addslashes($p->name) }}', 
            price: {{ $p->price }}, 
            quantity: {{ $p->quantity }},
            cat: '{{ $p->category }}', 
            img: '{{ asset('storage/' . $p->image) }}',
            desc: '{{ addslashes($p->description ?? 'Une fragrance exceptionnelle.') }}'
        },
        @endforeach
    ],
    get filteredParfums() {
        return this.parfums.filter(p => {
            let matchSearch = p.name.toLowerCase().includes(this.search.toLowerCase());
            let matchCat = this.category === 'tous' || p.cat === this.category;
            return matchSearch && matchCat;
        });
    }
}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Parfum | Boutique</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style> [x-cloak] { display: none !important; } </style>
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
            <header class="mb-12 flex flex-col xl:flex-row justify-between items-start xl:items-center gap-8">
                <div>
                    <h1 class="text-4xl font-black tracking-tighter italic uppercase text-[#1B2559]">La Collection</h1>
                    <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mt-2">Explorez nos fragrances d'élite</p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-4 w-full xl:w-auto">
                    @if(auth()->check() && auth()->user()->is_admin == 1)
                    <a href="{{ route('parfums.create') }}" class="flex items-center gap-3 bg-emerald-600 text-white px-6 py-4 rounded-2xl shadow-lg shadow-emerald-100 hover:bg-emerald-700 transition-all group shrink-0">
                        <i class="ph-bold ph-plus text-lg group-hover:rotate-90 transition-transform duration-300"></i>
                        <span class="text-[10px] font-black uppercase tracking-widest">Ajouter</span>
                    </a>
                    @endif

                    <div class="relative w-full sm:w-64 group">
                        <i class="ph ph-magnifying-glass absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-blue-600 transition-colors"></i>
                        <input x-model="search" type="text" placeholder="Rechercher..." 
                            class="w-full pl-14 pr-6 py-4 bg-white border-none rounded-2xl shadow-sm focus:ring-2 focus:ring-blue-600/10 transition-all font-bold text-sm">
                    </div>

                    <div class="flex bg-white p-1.5 rounded-2xl shadow-sm border border-slate-50">
                        <button @click="category = 'tous'" :class="category === 'tous' ? 'bg-[#1B2559] text-white' : 'text-slate-400'" class="px-6 py-3 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all">Tous</button>
                        <button @click="category = 'homme'" :class="category === 'homme' ? 'bg-[#1B2559] text-white' : 'text-slate-400'" class="px-6 py-3 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all">Hommes</button>
                        <button @click="category = 'femme'" :class="category === 'femme' ? 'bg-[#1B2559] text-white' : 'text-slate-400'" class="px-6 py-3 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all">Femmes</button>
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
                <template x-for="parfum in filteredParfums" :key="parfum.id">
                    <div class="group bg-white rounded-[2.5rem] p-7 shadow-[0_20px_50px_rgba(0,0,0,0.02)] border border-slate-50 transition-all duration-500 hover:shadow-2xl hover:-translate-y-2">
                        <div class="aspect-[4/5] bg-[#F8F9FD] rounded-[2rem] overflow-hidden mb-6 relative border border-slate-50">
                            <img :src="parfum.img" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000">
                            <div class="absolute top-5 left-5 flex flex-col gap-2">
                                <span class="bg-white/90 backdrop-blur-md px-4 py-2 rounded-xl text-[8px] font-black uppercase tracking-widest italic shadow-sm text-[#1B2559]" x-text="parfum.cat"></span>
                                <span class="bg-slate-900 text-white px-4 py-2 rounded-xl text-[8px] font-black uppercase tracking-widest shadow-sm" x-text="'Stock: ' + parfum.quantity"></span>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between items-start">
                                <h3 class="text-xl font-black tracking-tighter italic uppercase leading-none text-[#1B2559]" x-text="parfum.name"></h3>
                                <span class="text-blue-600 font-black text-lg italic tracking-tighter" x-text="parfum.price + ' DH'"></span>
                            </div>
                            
                            <p class="text-slate-400 text-xs font-medium leading-relaxed line-clamp-2" x-text="parfum.desc"></p>

                            <div class="pt-4 flex gap-3">
                                @if(!(auth()->check() && auth()->user()->is_admin == 1))
                                    <a :href="'{{ route('orders.confirm', ':id') }}'.replace(':id', parfum.id)" 
                                       class="flex-1 py-4 bg-[#1B2559] text-white rounded-xl text-[9px] font-black text-center uppercase tracking-widest hover:bg-blue-600 transition-all shadow-lg shadow-slate-100">
                                        Commander
                                    </a>
                                @else
                                    <a :href="'{{ route('parfums.edit', ':id') }}'.replace(':id', parfum.id)" 
                                       class="flex-1 py-4 bg-amber-500 text-white rounded-xl text-[9px] font-black text-center uppercase tracking-widest hover:bg-amber-600 transition-all shadow-lg shadow-amber-100">
                                        Modifier
                                    </a>
                                @endif

                                <button class="w-12 h-12 flex items-center justify-center bg-slate-50 text-[#1B2559] rounded-xl hover:bg-white hover:border border-slate-100 transition-all">
                                    <i class="ph ph-shopping-cart-simple text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div x-show="filteredParfums.length === 0" x-cloak class="py-32 text-center bg-white rounded-[3rem] border-2 border-dashed border-slate-100 mt-10">
                <i class="ph ph-magnifying-glass text-6xl text-slate-100 mb-4 block mx-auto"></i>
                <p class="text-slate-400 font-black uppercase tracking-widest italic text-[10px]">Aucune fragrance trouvée</p>
            </div>
        </main>
    </div>

</body>
</html>