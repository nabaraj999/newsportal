<header class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <!-- Top Bar: Breaking News Ticker & Socials -->
    <div class="bg-slate-900 text-white text-[11px] sm:text-xs py-2">
        <div class="container mx-auto px-4 flex justify-between items-center h-8">
            <div class="flex items-center gap-4 flex-1 overflow-hidden">
                <span class="bg-primary-600 text-white px-2 py-0.5 rounded font-bold uppercase tracking-wider whitespace-nowrap animate-pulse">
                    Breaking
                </span>
                <div class="overflow-hidden relative flex-1 h-full flex items-center">
                    <div class="animate-marquee whitespace-nowrap flex gap-12 items-center">
                        @foreach($latest_news as $news)
                            <a href="{{ route('article', $news->id) }}" class="hover:text-primary-400 transition-colors font-medium">
                                {{ $news->title }}
                            </a>
                        @endforeach
                        <!-- Duplicate for seamless loop if content is short -->
                        @foreach($latest_news as $news)
                            <a href="{{ route('article', $news->id) }}" class="hover:text-primary-400 transition-colors font-medium">
                                {{ $news->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="hidden md:flex gap-4 items-center pl-6 border-l border-slate-700 ml-4">
                <span class="text-slate-400 font-medium">
                    <i class="far fa-calendar-alt mr-1"></i> {{ nepalidate(now()) }}
                </span>
                <div class="flex gap-3">
                    @if($company && $company->facebook)
                        <a href="{{ $company->facebook }}" target="_blank" class="hover:text-primary-400 transition"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($company && $company->instagram)
                        <a href="{{ $company->instagram }}" target="_blank" class="hover:text-pink-400 transition"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($company && $company->youtube)
                        <a href="{{ $company->youtube }}" target="_blank" class="hover:text-red-500 transition"><i class="fab fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header: Logo & Search -->
    <div class="bg-white py-4 sm:py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 transition-transform hover:scale-105">
                    @if($company && $company->logo)
                        <img class="h-12 sm:h-16 w-auto object-contain" src="{{ asset($company->logo) }}" alt="{{ $company->name }}">
                    @else
                        <div class="text-3xl font-black text-primary-600 flex items-center gap-2">
                             <i class="fas fa-newspaper"></i>
                             <span class="tracking-tighter">GLOBAL<span class="text-slate-900 border-b-4 border-primary-600">NEWS</span></span>
                        </div>
                    @endif
                    <div class="hidden sm:block">
                        @if($company)
                            <h1 class="text-xl font-black text-slate-900 leading-none">{{ $company->name }}</h1>
                            <p class="text-[10px] text-slate-500 uppercase tracking-[0.2em] mt-1 font-bold">Excellence in Journalism</p>
                        @endif
                    </div>
                </a>

                <!-- Search & Auth -->
                <div class="flex items-center gap-4 w-full md:w-auto">
                    <form method="GET" action="{{ route('home') }}" class="relative flex-1 md:w-72 lg:w-96 group">
                        <input type="search" name="q" placeholder="Search news articles..." 
                               class="w-full bg-slate-50 border-slate-200 border rounded-full px-5 py-2.5 sm:py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-100 focus:border-primary-500 transition-all font-medium">
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 bg-primary-600 text-white w-8 sm:w-10 h-8 sm:h-10 rounded-full flex items-center justify-center hover:bg-primary-700 transition shadow-sm">
                            <i class="fas fa-search text-xs sm:text-sm"></i>
                        </button>
                    </form>
                    <div class="hidden lg:flex items-center gap-2">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-slate-900 font-bold text-sm bg-slate-100 px-4 py-2.5 rounded-full hover:bg-slate-200 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-slate-900 font-bold text-sm hover:text-primary-600 transition">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-primary-600 text-white px-5 py-2.5 rounded-full text-sm font-bold shadow-md hover:bg-primary-700 hover:shadow-lg transition">Subscribe</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="border-t border-slate-100 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <ul class="flex items-center overflow-x-auto no-scrollbar py-1">
                    <li class="mr-2">
                        <a href="{{ route('home') }}" class="flex items-center gap-2 px-4 py-3 sm:py-4 text-sm font-black uppercase tracking-wider {{ request()->routeIs('home') ? 'text-primary-600 border-b-2 border-primary-600' : 'text-slate-700 hover:text-primary-600' }} transition-all">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    @foreach ($categories ?? [] as $index => $cat)
                        @if ($index < 7)
                        <li class="mr-1">
                            <a href="{{ route('category', $cat->slug) }}" class="block px-4 py-3 sm:py-4 text-sm font-bold uppercase tracking-widest whitespace-nowrap {{ request()->is('category/'.$cat->slug) ? 'text-primary-600 border-b-2 border-primary-600' : 'text-slate-700 hover:text-primary-600' }} transition-all">
                                {{ $cat->title }}
                            </a>
                        </li>
                        @endif
                    @endforeach
                    
                    @if (isset($categories) && count($categories) > 7)
                    <li class="relative group">
                        <button class="flex items-center gap-2 px-4 py-3 sm:py-4 text-sm font-bold uppercase tracking-widest text-slate-700 hover:text-primary-600 transition-all">
                            MORE <i class="fas fa-chevron-down text-[10px]"></i>
                        </button>
                        <div class="invisible group-hover:visible opacity-0 group-hover:opacity-100 absolute left-0 top-full bg-white shadow-2xl min-w-[200px] border-t-2 border-primary-600 transition-all duration-300 z-[60] py-2">
                            @foreach ($categories as $index => $cat)
                                @if ($index >= 7)
                                <a href="{{ route('category', $cat->slug) }}" class="block px-6 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50 hover:text-primary-600 transition-colors uppercase tracking-wider">
                                    {{ $cat->title }}
                                </a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                    @endif
                </ul>
                
                <!-- Live Indicator (Optional Design Touch) -->
                <div class="hidden sm:flex items-center gap-2 text-[10px] font-black uppercase tracking-[0.2em] text-red-600 bg-red-50 px-3 py-1.5 rounded-full border border-red-100">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-red-600"></span>
                    </span>
                    Live Updates
                </div>
            </div>
        </div>
    </nav>
</header>
