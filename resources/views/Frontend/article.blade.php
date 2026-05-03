<x-frontend-layout :title="$article->title" :description="$article->meta_description" :keywords="$article->meta_keywords">
    
    <!-- Article Header -->
    <section class="bg-white border-b border-slate-100 py-12 sm:py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="flex gap-2 mb-6">
                    @foreach($article->categories as $cat)
                        <a href="{{ route('category', $cat->slug) }}" class="bg-primary-50 text-primary-700 text-[10px] sm:text-xs font-black uppercase tracking-widest px-4 py-2 rounded-full border border-primary-100 hover:bg-primary-600 hover:text-white transition-all">
                            {{ $cat->title }}
                        </a>
                    @endforeach
                </div>
                <h1 class="text-3xl sm:text-5xl font-black text-slate-900 leading-[1.1] mb-8 tracking-tight">
                    {{ $article->title }}
                </h1>
                <div class="flex flex-wrap items-center gap-6 text-sm text-slate-500 font-bold border-y border-slate-50 py-6">
                   <div class="flex items-center gap-3">
                       <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600">
                           <i class="fas fa-user-edit"></i>
                       </div>
                       <div>
                           <span class="block text-slate-900 text-xs uppercase tracking-widest">Published By</span>
                           <span class="text-primary-600">Editorial Team</span>
                       </div>
                   </div>
                   <div class="flex items-center gap-3">
                       <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600">
                           <i class="far fa-calendar-alt"></i>
                       </div>
                       <div>
                           <span class="block text-slate-900 text-xs uppercase tracking-widest">Last Updated</span>
                           <span>{{ $article->created_at->format('M d, Y') }}</span>
                       </div>
                   </div>
                   <div class="flex items-center gap-3">
                       <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-600">
                           <i class="far fa-eye"></i>
                       </div>
                       <div>
                           <span class="block text-slate-900 text-xs uppercase tracking-widest">Article Views</span>
                           <span>{{ number_format($article->views) }} Views</span>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-12 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Article Body -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-100">
                        <!-- Featured Image -->
                        <div class="aspect-video w-full overflow-hidden">
                            <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8 sm:p-12">
                            <div class="prose prose-slate prose-lg lg:prose-xl max-w-none prose-headings:font-black prose-headings:text-slate-900 prose-a:text-primary-600 prose-img:rounded-2xl">
                                {!! $article->content !!}
                            </div>
                            
                            <!-- Engagement/Share -->
                            <div class="mt-16 pt-8 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-6">
                                <div class="flex items-center gap-4">
                                    <span class="text-xs font-black uppercase tracking-widest text-slate-400">Share this story</span>
                                    <div class="flex gap-2">
                                        <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                            <i class="fab fa-facebook-f text-sm"></i>
                                        </a>
                                        <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-sky-500 hover:text-white transition-all shadow-sm">
                                            <i class="fab fa-twitter text-sm"></i>
                                        </a>
                                        <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-600 hover:bg-green-600 hover:text-white transition-all shadow-sm">
                                            <i class="fab fa-whatsapp text-sm"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    @foreach($article->categories as $cat)
                                        <span class="text-[10px] font-bold bg-slate-100 text-slate-600 px-3 py-1.5 rounded uppercase tracking-wider">#{{ $cat->slug }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Stories -->
                    @php 
                        $related = \App\Models\Article::where('id', '!=', $article->id)
                            ->where('status', 'approved')
                            ->take(3)
                            ->get();
                    @endphp
                    @if($related->count() > 0)
                    <div class="mt-16 space-y-8">
                        <div class="flex items-end justify-between border-b-2 border-slate-200 pb-2">
                            <h2 class="text-2xl font-black text-slate-900 uppercase tracking-tighter">
                                Related Stories<span class="text-primary-600">.</span>
                            </h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($related as $rel)
                                <div class="group">
                                    <div class="h-40 overflow-hidden rounded-xl mb-4 shadow-sm">
                                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ asset($rel->image) }}" alt="{{ $rel->title }}">
                                    </div>
                                    <h4 class="text-sm font-bold text-slate-900 group-hover:text-primary-600 transition-colors line-clamp-2 leading-snug">
                                        <a href="{{ route('article', $rel->id) }}">{{ $rel->title }}</a>
                                    </h4>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:w-1/3">
                    <x-frontend-sidebar />
                </div>

            </div>
        </div>
    </section>
</x-frontend-layout>
