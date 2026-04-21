<header class="bg-white shadow-lg border-b-4 border-blue-600 sticky top-0 z-50">
    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-white text-xs py-3">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="flex gap-6 items-center">
                <span class="font-semibold">{{ nepalidate(now()) }}</span>
                @if($company)
                    <span class="flex items-center gap-2">
                        <i class="fas fa-envelope text-blue-400"></i>
                        {{ $company->email }}
                    </span>
                @endif
            </div>
            <div class="flex gap-4 items-center">
                @if($company)
                    @if($company->facebook)
                        <a href="{{ $company->facebook }}" target="_blank" class="hover:text-blue-400 transition"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($company->instagram)
                        <a href="{{ $company->instagram }}" target="_blank" class="hover:text-pink-400 transition"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($company->youtube)
                        <a href="{{ $company->youtube }}" target="_blank" class="hover:text-red-500 transition"><i class="fab fa-youtube"></i></a>
                    @endif
                @endif
                <a href="{{ route('login') }}" class="hover:text-yellow-400 font-semibold transition">Login</a>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="container mx-auto px-4 py-5">
        <div class="flex justify-between items-center gap-6">
            <div class="flex items-center gap-3 flex-shrink-0">
                @if($company && $company->logo)
                    <img class="h-16 w-auto" src="{{ asset($company->logo) }}" alt="Logo">
                @else
                    <div class="text-3xl font-black text-blue-600">📰</div>
                @endif
                <div>
                    @if($company)
                        <h1 class="text-2xl font-black text-gray-900">{{ $company->name }}</h1>
                        <p class="text-xs text-gray-600">Your Trusted News Source</p>
                    @else
                        <h1 class="text-2xl font-black text-gray-900">Global News</h1>
                    @endif
                </div>
            </div>
            <div class="flex-1 hidden lg:block">
                <form method="GET" action="{{ route('home') }}" class="flex gap-2">
                    <input type="search" name="q" placeholder="Search articles..." class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-200 transition font-semibold">
                    <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg hover:shadow-lg transition-all font-semibold"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="bg-gradient-to-r from-blue-600 via-blue-700 to-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <ul class="flex items-center overflow-x-auto">
                <li class="px-4 py-4 hover:bg-blue-900 cursor-pointer transition border-b-4 border-transparent hover:border-white">
                    <a href="{{ route('home') }}" class="font-bold flex items-center gap-2 whitespace-nowrap">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                @foreach ($categories ?? [] as $index => $cat)
                    @if ($index < 6)
                    <li class="px-4 py-4 hover:bg-blue-900 cursor-pointer transition border-b-4 border-transparent hover:border-white">
                        <a href="{{ route('category', $cat->slug) }}" class="font-bold whitespace-nowrap">{{ $cat->title }}</a>
                    </li>
                    @endif
                @endforeach
                @if ((count($categories ?? []) ?? 0) > 6)
                <li class="px-4 py-4 hover:bg-blue-900 cursor-pointer transition border-b-4 border-transparent hover:border-white relative group">
                    <button class="font-bold flex items-center gap-2 whitespace-nowrap">
                        <i class="fas fa-ellipsis-h"></i> More
                    </button>
                    <div class="hidden group-hover:block absolute left-0 top-full bg-white text-gray-800 shadow-2xl min-w-max border-t-4 border-blue-600">
                        @foreach ($categories ?? [] as $index => $cat)
                            @if ($index >= 6)
                            <a href="{{ route('category', $cat->slug) }}" class="block px-6 py-3 hover:bg-blue-50 font-semibold transition border-b border-gray-100 last:border-b-0">
                                {{ $cat->title }}
                            </a>
                            @endif
                        @endforeach
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
