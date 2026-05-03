<footer class="bg-slate-950 text-slate-400 py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            <!-- Brand & About -->
            <div class="space-y-6">
                <a href="{{ route('home') }}" class="inline-block">
                    @if($company && $company->logo)
                        <img class="h-12 w-auto brightness-0 invert" src="{{ asset($company->logo) }}" alt="{{ $company->name }}">
                    @else
                        <div class="text-2xl font-black text-white flex items-center gap-2">
                             <i class="fas fa-newspaper text-primary-500"></i>
                             <span class="tracking-tighter uppercase">Global<span class="text-primary-500">News</span></span>
                        </div>
                    @endif
                </a>
                <p class="text-sm leading-relaxed">
                    Connecting you to the stories that matter. Delivering accurate, unbiased, and timely news from around the globe to your fingertips.
                </p>
                <div class="flex gap-4">
                    @if($company && $company->facebook)
                        <a href="{{ $company->facebook }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-primary-600 hover:text-white transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif
                    @if($company && $company->instagram)
                        <a href="{{ $company->instagram }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-pink-600 hover:text-white transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif
                    @if($company && $company->youtube)
                        <a href="{{ $company->youtube }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-900 flex items-center justify-center hover:bg-red-600 hover:text-white transition-all">
                            <i class="fab fa-youtube"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Fast Links -->
            <div>
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-primary-500"></span> Quick Navigation
                </h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="text-sm hover:text-white hover:translate-x-1 inline-block transition-all">Home</a></li>
                    @foreach($categories->take(5) as $cat)
                        <li><a href="{{ route('category', $cat->slug) }}" class="text-sm hover:text-white hover:translate-x-1 inline-block transition-all">{{ $cat->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Categories -->
            <div>
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-primary-500"></span> Popular Topics
                </h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($categories->shuffle()->take(10) as $cat)
                        <a href="{{ route('category', $cat->slug) }}" class="bg-slate-900 hover:bg-primary-600 hover:text-white px-3 py-1.5 rounded text-xs transition-colors">
                            {{ $cat->title }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Newsletter -->
            <div>
                <h4 class="text-white font-black uppercase tracking-widest text-xs mb-8 flex items-center gap-2">
                    <span class="w-8 h-px bg-primary-500"></span> Stay Informed
                </h4>
                <p class="text-sm mb-6">Subscribe to our daily news digest and never miss a headline.</p>
                <form class="space-y-3">
                    <div class="relative">
                        <input type="email" placeholder="Email Address" class="w-full bg-slate-900 border-slate-800 rounded px-4 py-3 text-sm focus:outline-none focus:ring-1 focus:ring-primary-500 transition-all">
                        <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-primary-500 hover:text-primary-400">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="pt-8 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-xs">
                &copy; {{ date('Y') }} {{ $company ? $company->name : 'Global News Network' }}. All rights reserved. 
            </div>
            <div class="flex flex-wrap justify-center gap-6 text-[10px] uppercase font-black tracking-widest">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Cookie Policy</a>
                <a href="#" class="hover:text-white transition-colors">Contact</a>
            </div>
        </div>
    </div>
</footer>
