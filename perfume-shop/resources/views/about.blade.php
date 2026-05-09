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

        <main class="flex-1 overflow-y-auto">
            
            <section class="relative py-24 lg:py-40 bg-[#fff] overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-24">
            
            <!-- 1. Visual Side: Image with floating element -->
            <div class="w-full lg:w-1/2 relative group">
                <!-- Decorative Gold Frame -->
                <div class="absolute -top-6 -left-6 w-32 h-32 border-t-2 border-l-2 border-amber-500/30 z-0"></div>
                
                <!-- Main High-Quality Image -->
                <div class="relative z-10 w-full aspect-[4/5] overflow-hidden shadow-[30px_30px_80px_rgba(0,0,0,0.1)]">
                    <img src="https://mir-s3-cdn-cf.behance.net/projects/404/44a9fa214739275.Y3JvcCwyMTYwLDE2ODksMCwzODQ.png" 
                         alt="Dior Craftsmanship" 
                         class="w-full h-full object-cover transition-transform duration-[5s] group-hover:scale-110">
                    
                    <!-- Text Overlay on Image -->
                    <div class="absolute bottom-10 left-10 text-white/90">
                        <p class="text-[10px] font-black uppercase tracking-[0.5em] mb-2">Heritage</p>
                        <p class="text-3xl font-serif italic italic text-blue-400">Depuis 1947</p>
                    </div>
                </div>

                <!-- Floating Product Detail Image -->
                <div class="absolute -bottom-10 -right-8 w-1/2 aspect-square hidden md:block border-[15px] border-white shadow-2xl z-20 overflow-hidden">
                    <img src="https://www.dior.com/dw/image/v2/BGXS_PRD/on/demandware.static/-/Sites-master_dior/default/dwa6685d14/Y0997147/Y0997147_C099700674_E02_RHC.jpg?sw=800" 
                         alt="Dior Bottle Detail" 
                         class="w-full h-full object-cover">
                </div>
            </div>

            <!-- 2. Content Side -->
            <div class="w-full lg:w-1/2 space-y-12">
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <span class="h-[1px] w-12 bg-blue-500"></span>
                        <span class="text-blue-600 text-[11px] font-black uppercase tracking-[0.6em]">L'Essence de l'Exception</span>
                    </div>
                    
                    <h2 class="text-5xl md:text-7xl font-serif text-slate-900 leading-[1.1] tracking-tight">
                        Une Signature <br> 
                        <span class="italic font-light text-slate-400">Sans Compromis.</span>
                    </h2>
                </div>

                <div class="space-y-8">
                    <p class="text-slate-500 text-lg md:text-xl font-light leading-relaxed max-w-lg">
                        Plus qu’un parfum, Dior Homme Intense est une déclaration d’élégance. Un mélange noble d’<span class="text-slate-900 font-bold">Iris</span>, de bois de cèdre et de vétiver qui capture l'esprit du luxe moderne.
                    </p>

                    <!-- Quote Block -->
                    <blockquote class="border-l-4 border-blue-500 pl-8 py-2">
                        <p class="text-slate-900 font-serif italic text-2xl leading-relaxed">
                            "Le parfum est le complément indispensable de la personnalité féminine, c’est la touche finale d’une robe."
                        </p>
                        <cite class="text-[10px] uppercase tracking-widest text-slate-400 mt-4 block font-bold">— Christian Dior</cite>
                    </blockquote>
                </div>

                <!-- Stats / Features -->
                <div class="grid grid-cols-2 gap-12 pt-12 border-t border-slate-100">
                    <div>
                        <span class="text-3xl font-serif text-slate-900">Rare</span>
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 mt-2 font-black">Ingrédients Nobles</p>
                    </div>
                    <div>
                        <span class="text-3xl font-serif text-slate-900">Intense</span>
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 mt-2 font-black">Sillage Inoubliable</p>
                    </div>
                </div>

                <!-- Modern Link -->
                <div class="pt-6">
                    <a href="#" class="group inline-flex items-center gap-6 text-[11px] font-black uppercase tracking-[0.4em] text-slate-900">
                        Explorer l'Histoire
                        <span class="relative w-12 h-[1px] bg-slate-900 transition-all duration-500 group-hover:w-24 overflow-hidden">
                             <span class="absolute inset-0 bg-blue-500 translate-x-[-100%] group-hover:translate-x-0 transition-transform duration-500"></span>
                        </span>
                    </a>
                </div>
            </div>

        </div>
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

            
        </main>
    </div>
</body>
</html>