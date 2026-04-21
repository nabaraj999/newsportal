<footer class="bg-gradient-to-b from-gray-900 via-gray-950 to-black text-gray-100">
    <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <!-- About Section -->
            <div class="space-y-4">
                <h3 class="text-2xl font-black text-white mb-4">About Us</h3>
                @if($company && $company->logo)
                    <img src="{{ asset($company->logo) }}" alt="Company Logo" class="h-14 w-auto bg-white p-2 rounded-lg">
                @endif
                <p class="text-gray-400 leading-relaxed text-sm">
                    @if($company)
                        {{ $company->name }} - Your trusted source for quality news, in-depth analysis, and breaking stories from around the world.
                    @else
                        Your trusted source for quality news, in-depth analysis, and breaking stories from around the world.
                    @endif
                </p>
            </div>

            <!-- Quick Links -->
            <div class="space-y-4">
                <h3 class="text-2xl font-black text-white mb-4">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition flex items-center gap-2 group"><i class="fas fa-chevron-right text-blue-500 group-hover:translate-x-1 transition"></i> Home</a></li>
                    @forelse($categories ?? [] as $cat)
                        @if($loop->index < 4)
                        <li><a href="{{ route('category', $cat->slug) }}" class="text-gray-400 hover:text-white transition flex items-center gap-2 group"><i class="fas fa-chevron-right text-blue-500 group-hover:translate-x-1 transition"></i> {{ $cat->title }}</a></li>
                        @endif
                    @empty
                    @endforelse
                    <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition flex items-center gap-2 group"><i class="fas fa-chevron-right text-blue-500 group-hover:translate-x-1 transition"></i> Login</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="space-y-4">
                <h3 class="text-2xl font-black text-white mb-4">Get in Touch</h3>
                <ul class="space-y-4 text-sm">
                    @if($company)
                        <li class="flex items-start gap-3 group">
                            <div class="bg-blue-600 p-2 rounded-lg group-hover:bg-blue-700 transition">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs">Phone</p>
                                <p class="text-gray-300 font-semibold">{{ $company->phone }}</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-3 group">
                            <div class="bg-blue-600 p-2 rounded-lg group-hover:bg-blue-700 transition">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <p class="text-gray-500 text-xs">Email</p>
                                <p class="text-gray-300 font-semibold">{{ $company->email }}</p>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- Follow Us -->
            <div class="space-y-4">
                <h3 class="text-2xl font-black text-white mb-4">Follow Us</h3>
                <div class="flex gap-4 mb-6">
                    @if($company)
                        @if($company->facebook)
                            <a href="{{ $company->facebook }}" target="_blank" class="bg-blue-600 hover:bg-blue-700 text-white p-3 rounded-lg transition-all hover:scale-110">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if($company->instagram)
                            <a href="{{ $company->instagram }}" target="_blank" class="bg-pink-600 hover:bg-pink-700 text-white p-3 rounded-lg transition-all hover:scale-110">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if($company->youtube)
                            <a href="{{ $company->youtube }}" target="_blank" class="bg-red-600 hover:bg-red-700 text-white p-3 rounded-lg transition-all hover:scale-110">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif
                    @endif
                </div>
                <div class="bg-blue-600 bg-opacity-20 border border-blue-600 rounded-lg p-4">
                    <p class="text-sm text-gray-300"><strong>Subscribe:</strong> Get news updates delivered to your inbox</p>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="bg-gray-800 h-0.5 my-8 rounded"></div>

        <!-- Footer Bottom -->
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-400 gap-4">
            <p class="font-semibold">
                &copy; {{ date('Y') }} 
                @if($company)
                    <span class="text-white">{{ $company->name }}</span>.
                @else
                    <span class="text-white">Global News Network</span>.
                @endif
                All rights reserved.
            </p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition font-semibold">Privacy Policy</a>
                <a href="#" class="hover:text-white transition font-semibold">Terms of Service</a>
                <a href="#" class="hover:text-white transition font-semibold">Disclaimer</a>
                <a href="#" class="hover:text-white transition font-semibold">Sitemap</a>
            </div>
        </div>
    </div>
</footer>
