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

        <main class="flex-1 p-8 lg:p-16 overflow-y-auto">
            
            <div class="max-w-7xl mx-auto grid grid-cols-12 gap-8">
                
                <div class="col-span-12 lg:col-span-7 mb-12">
                    <h1 class="text-8xl md:text-9xl font-black italic uppercase tracking-tighter leading-[0.8] mb-10">
                        Get In <br> <span class="text-blue-600">Touch.</span>
                    </h1>
                    <div class="h-1 w-32 bg-[#1B2559]"></div>
                </div>

                <div class="col-span-12 lg:col-span-5 flex flex-col justify-end pb-12">
                    <p class="text-slate-400 font-bold uppercase tracking-[0.3em] text-[10px] mb-4">Emplacement</p>
                    <p class="text-xl font-black italic leading-tight">Hay Matar, Nador<br>Royaume du Maroc</p>
                </div>

                <div class="col-span-12 lg:col-span-8 bg-white rounded-[4rem] p-16 shadow-[0_40px_100px_rgba(0,0,0,0.03)] border border-slate-50 relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-12 opacity-5">
                        <i class="ph ph-envelope-open text-[15rem]"></i>
                    </div>

                    <form class="space-y-12 relative z-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <div class="border-b-2 border-slate-100 focus-within:border-blue-600 transition-all py-4">
                                <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Votre Identité</label>
                                <input type="text" placeholder="NOM COMPLET" class="w-full bg-transparent border-none p-0 focus:ring-0 font-black text-lg placeholder:text-slate-200">
                            </div>
                            <div class="border-b-2 border-slate-100 focus-within:border-blue-600 transition-all py-4">
                                <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Email de Contact</label>
                                <input type="email" placeholder="ADRESSE@MAIL.COM" class="w-full bg-transparent border-none p-0 focus:ring-0 font-black text-lg placeholder:text-slate-200">
                            </div>
                        </div>

                        <div class="border-b-2 border-slate-100 focus-within:border-blue-600 transition-all py-4">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-2">Sujet de discussion</label>
                            <input type="text" placeholder="PARTENARIAT, COMMANDE, CONSEIL..." class="w-full bg-transparent border-none p-0 focus:ring-0 font-black text-lg placeholder:text-slate-200">
                        </div>

                        <div class="pt-8 flex items-center gap-8">
                            <button class="px-12 py-6 bg-[#1B2559] text-white rounded-full font-black uppercase tracking-[0.2em] text-[10px] hover:bg-blue-600 transition-all shadow-2xl">
                                Envoyer le message
                            </button>
                            <span class="text-slate-300 text-[10px] font-bold uppercase tracking-widest">Réponse sous 24h</span>
                        </div>
                    </form>
                </div>

                <div class="col-span-12 lg:col-span-4 space-y-8">
                    <div class="bg-blue-600 p-10 rounded-[3rem] text-white shadow-xl">
                        <i class="ph ph-whatsapp-logo text-4xl mb-6"></i>
                        <h4 class="font-black uppercase text-[10px] tracking-widest mb-2 opacity-80">Support Rapide</h4>
                        <p class="text-xl font-black italic">+212 6 00 00 00 00</p>
                    </div>

                    <div class="bg-[#1B2559] p-10 rounded-[3rem] text-white shadow-xl">
                        <i class="ph ph-clock text-4xl mb-6"></i>
                        <h4 class="font-black uppercase text-[10px] tracking-widest mb-2 opacity-80">Heures d'ouverture</h4>
                        <p class="text-lg font-black italic leading-tight">Lun - Sam<br>09:00 — 20:00</p>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>