@props(['article', 'layout' => 'standard'])

@if($layout === 'list')
<div class="group flex gap-4 items-start py-4 border-b border-slate-100 last:border-b-0">
    <div class="w-24 h-20 flex-shrink-0 overflow-hidden rounded-lg">
        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
             src="{{ asset($article->image) }}" alt="{{ $article->title }}">
    </div>
    <div class="flex-1">
        <h4 class="text-sm font-bold text-slate-900 group-hover:text-primary-600 transition-colors line-clamp-2 leading-snug mb-1">
            <a href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
        </h4>
        @if($article->categories->isNotEmpty())
            <div class="mb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <span class="inline-flex bg-primary-50 text-primary-700 text-[9px] font-black uppercase tracking-widest px-2 py-1 rounded-full border border-primary-100">
                    {{ $article->categories->first()->title }}
                </span>
            </div>
        @endif
        <div class="flex items-center gap-2 text-[10px] text-slate-500 font-bold uppercase tracking-wider">
            <span>{{ $article->created_at->diffForHumans() }}</span>
        </div>
    </div>
</div>
@else
<div class="group h-full flex flex-col bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-slate-100">
    <div class="relative h-56 overflow-hidden">
        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" 
             src="{{ asset($article->image) }}" alt="{{ $article->title }}">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="absolute top-4 left-4 flex gap-2 opacity-0 -translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
            @foreach($article->categories->take(1) as $cat)
                <span class="bg-primary-600 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1.5 rounded-full shadow-lg">
                    {{ $cat->title }}
                </span>
            @endforeach
        </div>
    </div>
    <div class="p-6 flex-1 flex flex-col">
        <div class="flex items-center gap-3 text-[10px] font-black uppercase tracking-[0.15em] text-slate-400 mb-3">
            <span class="flex items-center gap-1"><i class="far fa-clock"></i> {{ $article->created_at->format('M d, Y') }}</span>
            <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
            <span class="flex items-center gap-1"><i class="far fa-eye"></i> {{ number_format($article->views) }}</span>
        </div>
        <h3 class="text-lg font-black text-slate-900 mb-3 line-clamp-2 leading-tight group-hover:text-primary-600 transition-colors">
            <a href="{{ route('article', $article->id) }}">{{ $article->title }}</a>
        </h3>
        <p class="text-slate-600 text-sm line-clamp-3 mb-6 leading-relaxed">
            {!! strip_tags($article->content) !!}
        </p>
        <div class="mt-auto pt-4 border-t border-slate-50 flex justify-between items-center">
            <a href="{{ route('article', $article->id) }}" class="text-primary-600 text-xs font-black uppercase tracking-widest flex items-center gap-2 group/link">
                Read Full Story
                <i class="fas fa-arrow-right text-[10px] group-hover/link:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</div>
@endif
