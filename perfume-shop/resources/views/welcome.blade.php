<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe | L'Art du Parfum</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        /* إضافة سكرول ناعم */
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-white font-sans antialiased text-slate-900 selection:bg-blue-600 selection:text-white">

    <div class="flex min-h-screen">
        
        <aside class="w-72 bg-white hidden lg:flex flex-col border-r border-slate-100 sticky top-0 h-screen z-50">
            <div class="p-10 text-2xl font-black tracking-tighter italic uppercase text-blue-900">
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
                    <i class="ph ph-shopping-bag text-xl"></i>
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
                @php $pendingCount = \App\Models\Order::where('status', 'en_attente')->count(); @endphp
                <a href="{{ route('admin.orders') }}" 
                   class="relative flex items-center gap-4 px-6 py-4 rounded-2xl font-bold transition-all {{ request()->routeIs('admin.orders') ? 'bg-blue-600 text-white shadow-lg shadow-blue-100' : 'text-slate-400 hover:text-blue-600 hover:bg-slate-50' }}">
                    <i class="ph ph-clipboard-text text-xl"></i>
                    Admin Panel
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

            <div class="p-6 mt-auto">
                @auth
                <div class="flex items-center gap-3 bg-slate-50 p-3 rounded-2xl border border-slate-100">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-bold text-xs">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <p class="text-[10px] font-black uppercase truncate text-blue-900">{{ Auth::user()->name }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-[9px] text-red-500 font-bold uppercase tracking-widest hover:underline">Déconnexion</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="flex items-center justify-center gap-3 w-full bg-blue-900 text-white py-4 rounded-2xl font-bold hover:bg-blue-800 transition-all">
                    <i class="ph ph-user text-xl"></i>
                    <span>Connexion</span>
                </a>
                @endauth
            </div>
        </aside>

        <main class="flex-1">
             <section class="relative h-screen flex flex-col lg:flex-row items-stretch overflow-hidden bg-white">
                <div class="w-full lg:w-1/2 flex items-center justify-center p-12 lg:p-24 z-20 bg-white">
                    <div class="max-w-xl">
                        <div class="flex items-center gap-3 mb-8">
                            <span class="w-12 h-[1px] bg-blue-600"></span>
                            <span class="text-blue-600 text-[10px] font-black uppercase tracking-[0.4em]">Édition Limitée 2026</span>
                        </div>

                        <h1 class="text-6xl md:text-[90px] font-black uppercase tracking-tighter leading-[0.9] mb-8 text-blue-950">
                            Pure <br> 
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-400 italic font-light lowercase">Essence.</span>
                        </h1>

                        <p class="text-slate-500 text-lg md:text-xl mb-12 font-medium leading-relaxed italic border-l-2 border-blue-50 pl-6">
                            "Le parfum est l'ombre invisible de la personnalité." <br>
                            <span class="text-sm font-normal not-italic text-slate-400">— Redéfinissez votre sillage avec nos notes de cèdre et d'ambre.</span>
                        </p>

                        <div class="flex flex-col sm:flex-row gap-8 items-start sm:items-center">
                            <a href="{{ route('home') }}" class="group relative px-14 py-6 bg-blue-950 text-white rounded-2xl font-black uppercase text-[11px] tracking-[0.3em] overflow-hidden transition-all duration-500 hover:shadow-2xl hover:shadow-blue-950/40 hover:-translate-y-1 text-center">
                                <span class="relative z-10">Boutique</span>
                                <div class="absolute inset-0 bg-blue-600 translate-y-[100%] group-hover:translate-y-0 transition-transform duration-500"></div>
                            </a>

                            @guest
                            <a href="{{ route('login') }}" class="group flex items-center gap-3 text-blue-950 font-black uppercase text-[11px] tracking-[0.3em] hover:text-blue-600 transition-all">
                                S'identifier
                                <i class="ph ph-arrow-right text-lg group-hover:translate-x-3 transition-transform"></i>
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 relative h-[50vh] lg:h-auto overflow-hidden bg-slate-900">
                    <img src="https://i.pinimg.com/736x/6b/8f/62/6b8f629e1081aa68557cabee42044221.jpg" 
                         alt="Homme Parfum" 
                         class="w-full h-full object-cover object-center grayscale-[10%] group-hover:grayscale-0 transition-all duration-[5s] hover:scale-110">
                    
                    <div class="absolute inset-0 bg-gradient-to-r from-white via-transparent to-transparent hidden lg:block"></div>
                    
                    <div class="absolute top-1/2 left-12 -translate-y-1/2 p-8 glass-card rounded-[32px] text-white hidden xl:block shadow-2xl animate-float">
                        <p class="text-[9px] uppercase tracking-[0.4em] font-black mb-3 text-blue-400">Signature</p>
                        <h3 class="text-3xl font-black italic mb-6 leading-tight">Bleu <br> Marocain</h3>
                        <div class="flex items-center gap-4 text-[10px] font-bold tracking-widest uppercase">
                            <span>Oud</span>
                            <span class="w-1 h-1 bg-white/30 rounded-full"></span>
                            <span>Marin</span>
                        </div>
                    </div>
                </div>
            </section>
    

            <section class="py-32 px-8 bg-white">
                <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-16">
                    <div class="text-center space-y-6 group">
                        <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto group-hover:bg-blue-600 transition-all duration-500 border border-blue-100 rotate-3 group-hover:rotate-0">
                            <i class="ph ph-drop text-3xl text-blue-600 group-hover:text-white transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-black italic uppercase tracking-tighter text-blue-900">Notes Marines</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Une fraîcheur aquatique qui réveille vos sens dès la première vaporisation.</p>
                    </div>
                    <div class="text-center space-y-6 group">
                        <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto group-hover:bg-blue-600 transition-all duration-500 border border-blue-100 -rotate-3 group-hover:rotate-0">
                            <i class="ph ph-sparkle text-3xl text-blue-600 group-hover:text-white transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-black italic uppercase tracking-tighter text-blue-900">Cristal Pur</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Des flacons conçus comme des bijoux, reflets de notre savoir-faire unique.</p>
                    </div>
                    <div class="text-center space-y-6 group">
                        <div class="w-20 h-20 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto group-hover:bg-blue-600 transition-all duration-500 border border-blue-100 rotate-6 group-hover:rotate-0">
                            <i class="ph ph-seal-check text-3xl text-blue-600 group-hover:text-white transition-colors"></i>
                        </div>
                        <h3 class="text-xl font-black italic uppercase tracking-tighter text-blue-900">Authenticité</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Chaque parfum est certifié et numéroté pour garantir son origine.</p>
                    </div>
                </div>
            </section>

           <section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black uppercase tracking-[0.3em] text-blue-950">Nos Collections</h2>
            <div class="h-1 w-12 bg-blue-600 mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-5xl mx-auto">
            
            <a href="{{ route('home') }}" class="group relative block">
                <div class="relative aspect-[4/5] overflow-hidden rounded-[40px] bg-slate-100 shadow-sm transition-all duration-500 group-hover:shadow-2xl group-hover:shadow-blue-900/10 group-hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1557170334-a9632e77c6e4?auto=format&fit=crop&q=80" 
                         class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="absolute inset-0 flex flex-col items-center justify-end pb-12 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em] mb-2">Série Noire</span>
                        <h3 class="text-white text-2xl font-black italic uppercase">L'Homme</h3>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <span class="text-blue-950 font-black uppercase text-[11px] tracking-widest border-b-2 border-transparent group-hover:border-blue-600 transition-all pb-1">Découvrir l'homme</span>
                </div>
            </a>

            <a href="{{ route('home') }}" class="group relative block">
                <div class="relative aspect-[4/5] overflow-hidden rounded-[40px] bg-slate-100 shadow-sm transition-all duration-500 group-hover:shadow-2xl group-hover:shadow-blue-900/10 group-hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?auto=format&fit=crop&q=80" 
                         class="w-full h-full object-cover transition-transform duration-[1.5s] group-hover:scale-110">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-950/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                    <div class="absolute inset-0 flex flex-col items-center justify-end pb-12 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.4em] mb-2">Éclat Floral</span>
                        <h3 class="text-white text-2xl font-black italic uppercase">La Femme</h3>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <span class="text-blue-950 font-black uppercase text-[11px] tracking-widest border-b-2 border-transparent group-hover:border-blue-600 transition-all pb-1">Découvrir la femme</span>
                </div>
            </a>

        </div>
    </div>
</section>



            <footer class="py-20 bg-slate-50 text-center border-t border-blue-100">
                <div class="text-3xl font-black tracking-tighter italic uppercase text-blue-900 mb-8">
                    Elegy<span class="text-blue-600">.</span>
                </div>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.3em] mb-12">Oujda • Nador • Casablanca</p>
                <div class="flex justify-center gap-10 mb-12 text-blue-900/30">
                    <i class="ph ph-instagram-logo text-2xl hover:text-blue-600 transition-colors cursor-pointer"></i>
                    <i class="ph ph-twitter-logo text-2xl hover:text-blue-600 transition-colors cursor-pointer"></i>
                    <i class="ph ph-facebook-logo text-2xl hover:text-blue-600 transition-colors cursor-pointer"></i>
                </div>
                <p class="text-slate-400 text-[9px] font-bold uppercase tracking-widest">© 2026 Designed for Excellence. All Rights Reserved.</p>
            </footer>
        </main>
    </div>
<style>
    
    .glass-card {
        background: rgba(255, 255, 255, 0.04);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    .animate-bounce-subtle { animation: bounce-subtle 3s ease-in-out infinite; }
    
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob { animation: blob 7s infinite; }
    .animation-delay-2000 { animation-delay: 2s; }
</style>
</body>
</html>