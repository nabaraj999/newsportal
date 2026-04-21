<x-frontend-layout :title="'Home'" :description="'This is home page'" :keywords="'Jawaaf News, Jawaaf, Jawaaf.com'">
    <section class="bg-white">
        <div class="container mx-auto py-12 grid md:grid-cols-3 gap-8">
            <!-- Featured Section -->
            <div class="md:col-span-2 space-y-8">
                @foreach ($latest_articles as $index => $article)
                    @if ($index == 0)
                        <div class="rounded-2xl overflow-hidden shadow-lg group transition">
                            <img class="w-full h-80 object-cover transition-transform group-hover:scale-105 duration-300" src="{{ asset($article->image) }}" alt="{{ $article->title }}">
                            <div class="p-6 bg-white space-y-3">
                                <h1 class="text-3xl font-bold text-gray-900 group-hover:text-[var(--primary)] transition">
                                    {{ $article->title }}
                                </h1>
                                <p class="text-gray-600 line-clamp-3 text-lg leading-relaxed">
                                    {!! $article->content !!}
                                </p>
                            </div>
                        </div>
                    @endif
                @endforeach

                <!-- Recent Articles Grid -->
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach ($latest_articles as $index => $article)
                        @if ($index !== 0)
                            <x-article-card :article="$article" />
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Trending Sidebar -->
            <aside>
                <h2 class="text-xl font-semibold text-[var(--primary)] border-l-4 border-[var(--primary)] bg-[var(--light-primary)] pl-4 py-3 rounded">
                    ट्रेन्डिङ
                </h2>
                <div class="space-y-6 mt-6">
                    @foreach ($trending_articles as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>
            </aside>
        </div>
    </section>

    <!-- Category-Wise News Section -->
    <section class="bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto py-14 space-y-16">
            @foreach ($categories as $category)
                <div>
                    <h2 class="text-xl font-semibold text-[var(--primary)] border-l-4 border-[var(--primary)] bg-[var(--light-primary)] pl-4 py-3 mb-6 rounded">
                        {{ $category->title }}
                    </h2>
                    <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
                        @foreach ($category->articles as $article)
                            <x-article-card :article="$article" />
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-frontend-layout>
