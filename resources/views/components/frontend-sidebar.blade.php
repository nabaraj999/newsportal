<div class="sticky top-28 space-y-12">
    <!-- Trending Section -->
    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
        <h3 class="text-xl font-black text-slate-900 mb-8 border-l-4 border-primary-600 pl-4 uppercase tracking-wider">
            Trending News
        </h3>
        <div class="space-y-6">
            @foreach($trending_news->take(5) as $index => $article)
                <div class="group flex gap-4">
                    <div class="text-3xl font-black text-slate-100 group-hover:text-primary-100 transition-colors w-8 flex-shrink-0">
                        0{{ $index + 1 }}
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 group-hover:text-primary-600 transition-colors line-clamp-2 leading-snug mb-2">
                            <a href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
                        </h4>
                        <div class="flex items-center gap-2 text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                            <span>{{ $article->created_at->diffForHumans() }}</span>
                            <span class="w-1 h-1 bg-slate-200 rounded-full"></span>
                            <span>{{ number_format($article->views) }} Views</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Ad Placeholder or Static Banner -->
    <div class="bg-slate-900 rounded-2xl p-8 h-80 flex flex-col justify-center items-center text-center relative overflow-hidden group border border-slate-800">
         <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
         <div class="relative z-10">
             <span class="text-primary-500 font-black text-xs uppercase tracking-[0.3em] mb-4 block">Advertisement</span>
             <h3 class="text-white text-xl font-black mb-6">Promote Your Business with Us</h3>
             <a href="#" class="bg-white text-slate-900 px-6 py-3 rounded-full text-xs font-black uppercase tracking-widest hover:bg-primary-600 hover:text-white transition-all shadow-lg">Contact Sales</a>
         </div>
    </div>

    <!-- Topics/Categories Cloud -->
    <div class="bg-white rounded-2xl p-8 border border-slate-100 shadow-sm">
        <h3 class="text-xl font-black text-slate-900 mb-8 border-l-4 border-primary-600 pl-4 uppercase tracking-wider">
            Explore Topics
        </h3>
        <div class="flex flex-wrap gap-2">
            @foreach($categories as $cat)
                <a href="{{ route('category', $cat->slug) }}" class="bg-slate-50 hover:bg-primary-600 hover:text-white text-slate-700 px-4 py-2 rounded-lg text-xs font-bold transition-all border border-slate-100 uppercase tracking-wider">
                    {{ $cat->title }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Social Stats -->
    <div class="grid grid-cols-2 gap-4">
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white rounded-2xl p-6 flex flex-col items-center justify-center transition shadow-lg">
            <i class="fab fa-facebook-f text-2xl mb-2"></i>
            <span class="text-[10px] font-black uppercase tracking-widest">50k+ Followers</span>
        </a>
        <a href="#" class="bg-sky-500 hover:bg-sky-600 text-white rounded-2xl p-6 flex flex-col items-center justify-center transition shadow-lg">
            <i class="fab fa-twitter text-2xl mb-2"></i>
            <span class="text-[10px] font-black uppercase tracking-widest">12k+ Followers</span>
        </a>
    </div>
</div>
