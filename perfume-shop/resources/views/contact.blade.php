<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Luxe Structure</title>
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

        <main class="flex-1 p-6 lg:p-12 overflow-y-auto bg-[#f0f4f8] bg-[radial-gradient(circle_at_top_right,_#e0e7ff_0%,_#f0f4f8_50%)]">
    
    <div class="max-w-6xl mx-auto">
       
        <div class="mb-20 relative">
   
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-blue-200/20 blur-[80px] rounded-full -z-10"></div>

            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-8">
                <div class="max-w-3xl">
                    <div class="flex items-center gap-4 mb-6 group">
                        <div class="h-[1px] w-8 bg-blue-600 transition-all group-hover:w-12"></div>
                        <span class="text-[10px] font-black uppercase tracking-[0.4em] text-blue-600">Contactez-nous</span>
                    </div>
                    <h1 class="text-7xl md:text-[120px] font-black tracking-[-0.04em] text-slate-900 leading-[0.85] uppercase">
                        Parlons <br> 
                        <span class="relative">
                            <span class="font-serif italic font-light lowercase text-blue-600 pr-4">de votre</span> 
                            <span class="relative">
                                Projet
                                <svg class="absolute -bottom-2 left-0 w-full h-3 text-blue-200" viewBox="0 0 300 20" fill="none">
                                    <path d="M5 15C50 5 150 5 295 15" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
                                </svg>
                            </span>
                        </span>
                    </h1>
                </div>
                <div class="lg:max-w-[280px] pb-4">
                    <p class="text-slate-400 text-sm leading-relaxed border-l-2 border-slate-100 pl-6">
                        Nous sommes prêts à transformer vos idées en réalité numérique. <br>
                        <span class="text-slate-900 font-bold">Réponse garantie sous 24h.</span>
                    </p>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-12 gap-8">
            <div class="col-span-12 lg:col-span-8 bg-white/70 backdrop-blur-xl rounded-[2.5rem] p-8 md:p-12 shadow-[0_32px_64px_-16px_rgba(0,0,0,0.05)] border border-white">
                <form class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="group">
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-3 ml-1">Nom Complet</label>
                            <input type="text" placeholder="Ex: Ahmed Bennani" class="w-full bg-white/50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500/20 transition-all text-slate-800 placeholder:text-slate-300 shadow-sm">
                        </div>
                        <div class="group">
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-3 ml-1">Email</label>
                            <input type="email" placeholder="contact@exemple.com" class="w-full bg-white/50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500/20 transition-all text-slate-800 placeholder:text-slate-300 shadow-sm">
                        </div>
                    </div>

                    <div class="group">
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-3 ml-1">Votre Message</label>
                        <textarea rows="4" placeholder="Dites-nous en plus..." class="w-full bg-white/50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-blue-500/20 transition-all text-slate-800 placeholder:text-slate-300 shadow-sm resize-none"></textarea>
                    </div>

                    <button class="w-full md:w-auto px-10 py-4 bg-blue-900 text-white rounded-2xl font-bold hover:bg-blue-600 hover:-translate-y-1 transition-all duration-300 shadow-lg shadow-slate-200">
                        Envoyer le message →
                    </button>
                </form>
            </div>

            <!-- Sidebar Info -->
            <div class="col-span-12 lg:col-span-4 space-y-6">
                <!-- Info Card 1 -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 group hover:border-blue-200 transition-colors">
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="ph ph-map-pin text-blue-600 group-hover:text-white text-xl"></i>
                    </div>
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">Localisation</h4>
                    <p class="text-lg font-medium text-slate-800 leading-tight">Hay Matar, Nador<br>Royaume du Maroc</p>
                </div>

                <!-- Info Card 2 -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100 group hover:border-blue-200 transition-colors">
                    <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-600 transition-colors">
                        <i class="ph ph-whatsapp-logo text-blue-600 group-hover:text-white text-xl"></i>
                    </div>
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">WhatsApp</h4>
                    <p class="text-lg font-medium text-slate-800">+212 6 24 43 99 29</p>
                </div>

                <!-- Hours Card -->
                <div class="bg-slate-900 p-8 rounded-[2.5rem] text-white">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-[10px] font-bold uppercase tracking-widest opacity-60">Ouvert actuellement</span>
                    </div>
                    <p class="text-sm font-light opacity-80 mb-1">Lun - Sam</p>
                    <p class="text-2xl font-light">09:00 — 20:00</p>
                </div>
            </div>
        </div>
    </div>
</main>

    </div>

</body>
</html>