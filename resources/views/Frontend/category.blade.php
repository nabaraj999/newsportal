<x-frontend-layout :title="$category->title" :description="'News articles in ' . $category->title" :keywords="$category->title . ', news, articles'">
    
    <!-- Category Header -->
    <section class="bg-white border-b border-slate-100 py-12 sm:py-20 bg-grid-slate-100">
        <div class="container mx-auto px-4 text-center">
            <span class="bg-primary-600 text-white text-[10px] font-black uppercase tracking-[0.3em] px-5 py-2 rounded-full mb-6 inline-block shadow-lg shadow-primary-200">
                Category Archive
            </span>
            <h1 class="text-4xl sm:text-6xl font-black text-slate-900 leading-tight tracking-tighter uppercase mb-4">
                {{ $category->title }}<span class="text-primary-600">.</span>
            </h1>
            <p class="text-slate-500 font-bold text-sm sm:text-base uppercase tracking-widest">
                Discover the latest stories and deep dives in {{ $category->title }}
            </p>
        </div>
    </section>

    <!-- Category Content Section -->
    <section class="py-12 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Articles Grid -->
                <div class="lg:w-2/3">
                    @if($articles->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mb-12">
                            @foreach($articles as $article)
                                <x-article-card :article="$article" />
                            @endforeach
                        </div>
                        
                        <!-- Professional Pagination -->
                        <div class="mt-16 pt-8 border-t border-slate-200">
                            {{ $articles->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-3xl p-16 text-center shadow-sm border border-slate-100">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                                <i class="fas fa-newspaper text-3xl"></i>
                            </div>
                            <h3 class="text-xl font-black text-slate-900 mb-2">No Articles Found</h3>
                            <p class="text-slate-500">We couldn't find any articles in this category at the moment. Please check back later.</p>
                            <a href="{{ route('home') }}" class="mt-8 inline-block bg-primary-600 text-white px-8 py-3 rounded-full font-bold hover:bg-primary-700 transition shadow-lg">
                                Return Home
                            </a>
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

    <!-- Custom Pagination Styles (if using default laravel tailwind pagination) -->
    <style>
        .pagination { @apply flex gap-2 justify-center; }
        .page-item { @apply w-10 h-10 flex items-center justify-center rounded-lg bg-white border border-slate-200 text-slate-600 font-bold transition-all; }
        .page-item.active { @apply bg-primary-600 border-primary-600 text-white shadow-lg shadow-primary-200; }
        .page-item:hover:not(.active) { @apply bg-slate-50 border-slate-300 text-primary-600; }
    </style>
</x-frontend-layout>
