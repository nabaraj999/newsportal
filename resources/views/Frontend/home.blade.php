<x-frontend-layout :title="$metaTitle" :description="$metaDescription" :keywords="$metaKeywords">
    <!-- Hero Grid Section -->
    <section class="py-8 bg-white border-b border-slate-100">
        <div class="container mx-auto px-4">
            @if($latest_articles->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Main Featured (Left, 2/4 columns on LG) -->
                <div class="lg:col-span-2 group">
                    @php $featured = $latest_articles->first(); @endphp
                    <div class="relative h-[300px] sm:h-[500px] overflow-hidden rounded-2xl shadow-lg">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-1000" 
                             src="{{ asset($featured->image) }}" alt="{{ $featured->title }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-900/40 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 sm:p-10 text-white">
                            <div class="flex gap-2 mb-4">
                                @foreach($featured->categories->take(2) as $cat)
                                    <span class="bg-primary-600 text-white text-[10px] sm:text-xs font-black uppercase tracking-widest px-4 py-2 rounded-full">
                                        {{ $cat->title }}
                                    </span>
                                @endforeach
                            </div>
                            <h1 class="text-2xl sm:text-4xl font-black mb-4 leading-tight group-hover:text-primary-400 transition-colors">
                                <a href="{{ route('article', $featured->id) }}">{{ $featured->title }}</a>
                            </h1>
                            <div class="flex items-center gap-4 text-xs font-bold text-slate-300 uppercase tracking-widest">
                                <span>{{ $featured->created_at->format('M d, Y') }}</span>
                                <span class="w-1 h-1 bg-primary-500 rounded-full"></span>
                                <span><i class="far fa-eye mr-1"></i> {{ number_format($featured->views) }} Views</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Secondary Featured (Right, 2/4 columns on LG) -->
                <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach($latest_articles->skip(1)->take(4) as $article)
                        <div class="group">
                            <div class="relative h-48 sm:h-56 overflow-hidden rounded-xl shadow-md mb-3">
                                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
                                     src="{{ asset($article->image) }}" alt="{{ $article->title }}">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                @if($article->categories->isNotEmpty())
                                    <div class="absolute top-3 left-3 opacity-0 -translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                                        <span class="bg-primary-600 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">
                                            {{ $article->categories->first()->title }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <h3 class="text-base sm:text-lg font-black text-slate-900 group-hover:text-primary-600 transition-colors line-clamp-2 leading-snug">
                                <a href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
                            </h3>
                            <div class="mt-2 text-[10px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-2">
                                <span>{{ $article->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>

    <!-- Main Content & Sidebar -->
    <section class="py-12 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Main News Column -->
                <div class="lg:w-2/3 space-y-16">
                    
                    <!-- Dynamic Category Sections -->
                    @foreach ($categories->take(3) as $category)
                    <div class="space-y-8">
                        <div class="flex items-end justify-between border-b-2 border-slate-200 pb-2">
                            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase tracking-tighter">
                                {{ $category->title }}<span class="text-primary-600">.</span>
                            </h2>
                            <a href="{{ route('category', $category->slug) }}" class="text-xs font-black uppercase tracking-widest text-primary-600 hover:text-primary-800 transition-colors mb-1">
                                View All Category
                            </a>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                            @forelse($category->articles->where('status', 'approved')->take(4) as $article)
                                <x-article-card :article="$article" />
                            @empty
                                <p class="text-slate-500 italic text-sm">No articles in this category yet.</p>
                            @endforelse
                        </div>
                    </div>
                    @endforeach

                    <!-- Newsletter Banner (Professional) -->
                    <div class="bg-primary-900 rounded-3xl p-8 sm:p-12 relative overflow-hidden shadow-2xl">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-primary-800/30 rounded-full -translate-y-32 translate-x-32 blur-3xl"></div>
                        <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                            <div class="flex-1 text-center md:text-left">
                                <h2 class="text-2xl sm:text-4xl font-black text-white mb-4">Never miss a story.</h2>
                                <p class="text-primary-200 text-sm sm:text-lg">Join 25,000+ subscribers for our weekly curated news analysis and deep dives.</p>
                            </div>
                            <form class="w-full md:w-auto flex flex-col sm:flex-row gap-3">
                                <input type="email" placeholder="Email address" class="px-6 py-4 rounded-xl focus:outline-none focus:ring-4 focus:ring-primary-400 bg-white shadow-lg text-slate-900 w-full md:w-64">
                                <button class="bg-primary-600 text-white px-8 py-4 rounded-xl font-bold hover:bg-primary-700 transition shadow-lg hover:shadow-xl whitespace-nowrap">
                                    Join Now
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Additional Categories -->
                    @foreach ($categories->skip(3)->take(3) as $category)
                    <div class="space-y-8">
                        <div class="flex items-end justify-between border-b-2 border-slate-200 pb-2">
                            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 uppercase tracking-tighter">
                                {{ $category->title }}<span class="text-primary-600">.</span>
                            </h2>
                            <a href="{{ route('category', $category->slug) }}" class="text-xs font-black uppercase tracking-widest text-primary-600 hover:text-primary-800 transition-colors mb-1">
                                Explore More
                            </a>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($category->articles->where('status', 'approved')->take(3) as $article)
                                <div class="group">
                                    <div class="relative h-40 overflow-hidden rounded-xl mb-4 shadow-sm">
                                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset($article->image) }}" alt="{{ $article->title }}">
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                        @if($article->categories->isNotEmpty())
                                            <div class="absolute top-3 left-3 opacity-0 -translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                                                <span class="bg-primary-600 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">
                                                    {{ $article->categories->first()->title }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <h4 class="text-sm sm:text-base font-bold text-slate-900 group-hover:text-primary-600 transition-colors line-clamp-2">
                                        <a href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
                                    </h4>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Sidebar (Professional Column) -->
                <div class="lg:w-1/3">
                    <x-frontend-sidebar />
                </div>

            </div>
        </div>
    </section>

    <!-- Professional Background Texture Utility -->
    <style>
        .bg-grid-slate-100 {
            background-image: radial-gradient(#e2e8f0 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</x-frontend-layout>
