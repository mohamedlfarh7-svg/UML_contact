<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Univers Luxe | Notre Maison</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
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

        <main class="flex-1 overflow-y-auto">
            
            <section class="relative h-[60vh] flex items-center justify-center text-center px-6 overflow-hidden">
                <div class="absolute inset-0 bg-[#1B2559] opacity-[0.03] -z-10"></div>
                <div class="space-y-4">
                    <span class="text-[10px] font-black uppercase tracking-[0.5em] text-blue-600">Maison de Haute Parfumerie</span>
                    <h1 class="text-7xl md:text-8xl font-black italic uppercase tracking-tighter leading-none">
                        L'art du <br> <span class="text-blue-600">Prestige.</span>
                    </h1>
                    <p class="max-w-xl mx-auto text-slate-500 font-medium text-lg pt-4">Plus qu'une fragrance, une signature invisible qui définit qui vous êtes.</p>
                </div>
            </section>

            <section class="py-24 px-12 bg-white rounded-[4rem] mx-6 shadow-sm border border-slate-50">
                <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
                    <div class="relative">
                        <div class="aspect-[4/5] bg-slate-100 rounded-[3rem] overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1592945403244-b3fbafd7f539?auto=format&fit=crop&q=80" class="w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-700">
                        </div>
                        <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-blue-600 rounded-[3rem] p-8 flex flex-col justify-end text-white shadow-2xl">
                            <span class="text-4xl font-black italic">100%</span>
                            <p class="text-[10px] font-bold uppercase tracking-widest opacity-80">Authenticité Garantie</p>
                        </div>
                    </div>
                    
                    <div class="space-y-8">
                        <h2 class="text-4xl font-black uppercase italic tracking-tighter">Notre <br> Philosophie<span class="text-blue-600">.</span></h2>
                        <div class="space-y-4 text-slate-600 leading-relaxed text-lg">
                            <p>Depuis notre création en <span class="text-[#1B2559] font-bold">2025</span> au cœur du Maroc, la Maison <span class="text-[#1B2559] font-bold uppercase">Luxe</span> s'est imposée comme le sanctuaire des essences rares.</p>
                            <p>Nous croyons que chaque flacon renferme une émotion, un souvenir et une ambition. C'est pourquoi nous ne collaborons qu'avec les plus grandes maisons de création internationales (Dior, Chanel, Tom Ford...) pour garantir une excellence sans compromis.</p>
                        </div>
                        <div class="flex gap-10 pt-6 border-t border-slate-50">
                            <div>
                                <span class="block text-2xl font-black italic text-blue-600">500+</span>
                                <span class="text-[10px] font-black uppercase text-slate-400">Références</span>
                            </div>
                            <div>
                                <span class="block text-2xl font-black italic text-blue-600">12k</span>
                                <span class="text-[10px] font-black uppercase text-slate-400">Clients Satisfaits</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-32 px-12">
                <div class="max-w-6xl mx-auto">
                    <div class="text-center mb-20">
                        <h2 class="text-4xl font-black uppercase italic tracking-tighter">Pourquoi nous choisir ?</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white p-12 rounded-[3rem] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 border border-slate-50">
                            <i class="ph ph-crown text-5xl text-blue-600 mb-8"></i>
                            <h3 class="text-xl font-black uppercase italic mb-4">Exclusivité</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Accédez à des éditions limitées et des parfums de niche introuvables ailleurs sur le marché marocain.</p>
                        </div>

                        <div class="bg-[#1B2559] p-12 rounded-[3rem] shadow-xl text-white hover:-translate-y-2 transition-all duration-500">
                            <i class="ph ph-shield-check text-5xl text-blue-400 mb-8"></i>
                            <h3 class="text-xl font-black uppercase italic mb-4">Confiance</h3>
                            <p class="text-slate-300 text-sm leading-relaxed">Chaque produit est livré avec son certificat d'origine. La contrefaçon n'a pas sa place dans notre maison.</p>
                        </div>

                        <div class="bg-white p-12 rounded-[3rem] shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-500 border border-slate-50">
                            <i class="ph ph-truck text-5xl text-blue-600 mb-8"></i>
                            <h3 class="text-xl font-black uppercase italic mb-4">Vitesse Luxe</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">Une logistique optimisée pour une livraison en 24/48h dans toutes les villes du Royaume.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-24 bg-[#1B2559] text-white text-center rounded-t-[5rem]">
                <div class="max-w-3xl mx-auto space-y-8">
                    <h2 class="text-5xl font-black italic uppercase tracking-tighter">Prêt à trouver votre sillage ?</h2>
                    <p class="text-slate-400 font-medium">Explorez notre collection de fragrances iconiques et laissez votre empreinte.</p>
                    <a href="{{ route('home') }}" class="inline-block px-12 py-6 bg-white text-[#1B2559] rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-blue-600 hover:text-white transition-all shadow-2xl">
                        Découvrir la Boutique
                    </a>
                </div>
            </section>
        </main>
    </div>
</body>
</html>