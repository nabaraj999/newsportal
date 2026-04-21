<x-frontend-layout :title="'Home'" :description="'Global News Network - Your trusted source for news'" :keywords="'news, latest news, breaking news'">
    <!-- Hero/Featured Section -->
    <section class="bg-gradient-to-b from-blue-50 to-white py-12">
        <div class="container mx-auto px-4">
            @if($latest_articles->count() > 0)
                @php $featured = $latest_articles->first(); @endphp
                <div class="rounded-2xl overflow-hidden shadow-2xl group bg-white">
                    <div class="grid md:grid-cols-3 gap-0">
                        <div class="md:col-span-2 overflow-hidden h-96 md:h-full">
                            <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                 src="{{ asset($featured->image) }}" alt="{{ $featured->title }}">
                        </div>
                        <div class="p-8 md:p-10 flex flex-col justify-between">
                            <div>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach($featured->categories as $cat)
                                        <span class="bg-gradient-to-r from-blue-600 to-blue-700 text-white text-xs font-semibold px-4 py-2 rounded-full shadow-md">
                                            {{ $cat->title }}
                                        </span>
                                    @endforeach
                                </div>
                                <h1 class="text-3xl md:text-4xl font-black text-gray-900 group-hover:text-blue-600 transition mb-4 leading-tight">
                                    {{ $featured->title }}
                                </h1>
                                <p class="text-gray-700 leading-relaxed mb-6 line-clamp-4 text-sm md:text-base">
                                    {!! strip_tags(substr($featured->content, 0, 200)) !!}...
                                </p>
                            </div>
                            <div class="flex gap-4 items-center">
                                <a href="{{ route('article', $featured->id) }}" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg hover:from-blue-700 hover:to-blue-800 transition-all">
                                    Read Story
                                </a>
                                <span class="text-gray-600 font-semibold flex items-center gap-2 bg-gray-100 px-4 py-2 rounded-lg">
                                    <i class="fas fa-eye text-blue-600"></i> {{ number_format($featured->views) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Quick Stats -->
    <section class="bg-white py-6 border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <div class="p-4">
                    <p class="text-3xl font-bold text-blue-600">{{ $latest_articles->count() }}</p>
                    <p class="text-gray-600 text-sm">Total Articles</p>
                </div>
                <div class="p-4">
                    <p class="text-3xl font-bold text-blue-600">{{ $categories->count() }}</p>
                    <p class="text-gray-600 text-sm">Categories</p>
                </div>
                <div class="p-4">
                    <p class="text-3xl font-bold text-blue-600">{{ number_format($latest_articles->sum('views')) }}</p>
                    <p class="text-gray-600 text-sm">Total Views</p>
                </div>
                <div class="p-4">
                    <p class="text-3xl font-bold text-blue-600">{{ now()->format('Y') }}</p>
                    <p class="text-gray-600 text-sm">Since Year</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Articles Grid -->
    <section class="bg-white py-16 border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="mb-12">
                <h2 class="text-4xl font-black text-gray-900 mb-2">Latest News</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-blue-400 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($latest_articles->skip(1)->take(6) as $article)
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 mb-4">
                            <div class="h-64 overflow-hidden">
                                <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
                                     src="{{ asset($article->image) }}" alt="{{ $article->title }}">
                            </div>
                            <div class="absolute top-4 left-4 flex gap-2 flex-wrap">
                                @foreach($article->categories->take(2) as $cat)
                                    <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">{{ $cat->title }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="px-2">
                            <h3 class="text-xl font-black text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition">
                                {{ $article->title }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                                {!! strip_tags(substr($article->content, 0, 100)) !!}
                            </p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('article', $article->id) }}" class="text-blue-600 font-bold hover:text-blue-800 flex items-center gap-2 group/link">
                                    Read More 
                                    <i class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform"></i>
                                </a>
                                <span class="text-gray-500 text-sm font-semibold flex items-center gap-1">
                                    <i class="fas fa-eye text-blue-500"></i> {{ number_format($article->views) }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Category-Wise News Sections -->
    @foreach ($categories as $category)
        <section class="py-16 {{ $loop->even ? 'bg-gray-50' : 'bg-white' }} border-b border-gray-200">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between mb-12">
                    <div>
                        <h2 class="text-4xl font-black text-gray-900">{{ $category->title }}</h2>
                        <div class="w-16 h-1 bg-blue-600 rounded-full mt-2"></div>
                    </div>
                    <a href="{{ route('category', $category->slug) }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all shadow-md hover:shadow-lg">
                        Explore All
                    </a>
                </div>

                @if($category->articles->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @forelse($category->articles->take(4) as $article)
                            <div class="group rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 bg-white">
                                <div class="h-40 overflow-hidden">
                                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" 
                                         src="{{ asset($article->image) }}" alt="{{ $article->title }}">
                                </div>
                                <div class="p-5">
                                    <h4 class="font-bold text-gray-900 line-clamp-2 mb-3 group-hover:text-blue-600 transition">
                                        {{ $article->title }}
                                    </h4>
                                    <a href="{{ route('article', $article->id) }}" class="text-blue-600 text-sm font-bold hover:text-blue-800 flex items-center gap-2 group/link">
                                        Read
                                        <i class="fas fa-arrow-right group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 col-span-full text-center py-8">No articles available</p>
                        @endforelse
                    </div>
                @else
                    <p class="text-gray-500 text-center py-12">No articles in {{ $category->title }} yet</p>
                @endif
            </div>
        </section>
    @endforeach

    <!-- Newsletter Section -->
    <section class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-4xl font-black text-white mb-4">Never Miss Breaking News</h2>
                <p class="text-blue-100 mb-8 text-lg">Subscribe to our newsletter and get the latest news delivered to your inbox daily</p>
                <form class="flex gap-2 flex-col sm:flex-row">
                    <input type="email" placeholder="Enter your email address" required class="flex-1 px-5 py-4 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300 text-gray-900 placeholder-gray-500 font-semibold">
                    <button type="submit" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-bold hover:bg-blue-50 transition-all shadow-lg hover:shadow-xl whitespace-nowrap">
                        Subscribe Now
                    </button>
                </form>
                <p class="text-blue-200 text-sm mt-4">We respect your privacy. No spam, ever.</p>
            </div>
        </div>
    </section>
</x-frontend-layout>
