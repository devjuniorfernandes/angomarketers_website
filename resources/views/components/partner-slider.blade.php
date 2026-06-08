@php
$partners = \App\Domain\Core\Models\Partner::orderBy('order', 'asc')->get();
@endphp

@if($partners->isNotEmpty())
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10 md:py-14 border-t border-b border-slate-100 dark:border-slate-800/80 my-6">
    <div class="text-center mb-8">
        <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">Parceiros Estratégicos & Marcas</h4>
    </div>

    <!-- Swiper Container -->
    <div class="swiper partner-swiper overflow-hidden relative">
        <div class="swiper-wrapper items-center">
            @foreach($partners as $partner)
                <div class="swiper-slide flex justify-center px-4">
                    @if($partner->url)
                        <a href="{{ $partner->url }}" target="_blank" class="block grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition-all duration-300">
                            <img src="{{ $partner->logo_path }}" alt="{{ $partner->name }}" class="h-10 max-w-[120px] object-contain">
                        </a>
                    @else
                        <div class="block grayscale hover:grayscale-0 opacity-60 hover:opacity-100 transition-all duration-300">
                            <img src="{{ $partner->logo_path }}" alt="{{ $partner->name }}" class="h-10 max-w-[120px] object-contain">
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@else
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10 md:py-14 border-t border-b border-slate-100 dark:border-slate-800/80 my-6">
    <div class="text-center mb-8">
        <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500">Parceiros Estratégicos & Marcas</h4>
    </div>

    <!-- Swiper Container -->
    <div class="swiper partner-swiper overflow-hidden relative">
        <div class="swiper-wrapper items-center">
            
            <!-- Logo 1: UNITEL -->
            <div class="swiper-slide flex justify-center px-4">
                <div class="h-10 text-slate-400 hover:text-red-500 dark:text-slate-500 dark:hover:text-red-400 transition-colors flex items-center gap-1 font-heading font-extrabold text-xl tracking-wider select-none">
                    <span class="w-2 h-2 rounded-full bg-primary"></span> UNITEL
                </div>
            </div>

            <!-- Logo 2: Banco BAI -->
            <div class="swiper-slide flex justify-center px-4">
                <div class="h-10 text-slate-400 hover:text-blue-600 dark:text-slate-500 dark:hover:text-blue-400 transition-colors flex items-center gap-1 font-heading font-black text-xl tracking-tight select-none">
                    Banco<span class="text-blue-600 dark:text-blue-400">BAI</span>
                </div>
            </div>

            <!-- Logo 3: EMIS -->
            <div class="swiper-slide flex justify-center px-4">
                <div class="h-10 text-slate-400 hover:text-emerald-500 dark:text-slate-500 dark:hover:text-emerald-400 transition-colors flex items-center font-heading font-bold text-2xl select-none">
                    EMIS<span class="text-xs font-semibold select-none">.ao</span>
                </div>
            </div>

            <!-- Logo 4: TAAG -->
            <div class="swiper-slide flex justify-center px-4">
                <div class="h-10 text-slate-400 hover:text-orange-500 dark:text-slate-500 dark:hover:text-orange-400 transition-colors flex items-center gap-1 font-heading font-extrabold text-xl tracking-widest select-none">
                    TAAG <span class="text-xs text-orange-500 font-bold">&#9650;</span>
                </div>
            </div>

            <!-- Logo 5: Sonangol -->
            <div class="swiper-slide flex justify-center px-4">
                <div class="h-10 text-slate-400 hover:text-yellow-600 dark:text-slate-500 dark:hover:text-yellow-400 transition-colors flex items-center gap-1 font-heading font-extrabold text-lg select-none">
                    Sonangol
                </div>
            </div>

            <!-- Logo 6: Startup Hub -->
            <div class="swiper-slide flex justify-center px-4">
                <div class="h-10 text-slate-400 hover:text-indigo-500 dark:text-slate-500 dark:hover:text-indigo-400 transition-colors flex items-center gap-1 font-heading font-bold text-lg select-none">
                    <span class="text-indigo-500">&#9670;</span> LuandaHub
                </div>
            </div>

            <!-- Logo 7: EMIS Copy (for Swiper loop support) -->
            <div class="swiper-slide flex justify-center px-4">
                <div class="h-10 text-slate-400 hover:text-primary transition-colors flex items-center font-heading font-bold text-2xl select-none">
                    BODIVA
                </div>
            </div>
            
        </div>
    </div>
</section>
@endif

<!-- Swiper Autoplay Initialization -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swiper !== 'undefined') {
            new Swiper('.partner-swiper', {
                slidesPerView: 2,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    480: { slidesPerView: 3, spaceBetween: 30 },
                    768: { slidesPerView: 4, spaceBetween: 40 },
                    1024: { slidesPerView: 5, spaceBetween: 50 },
                    1280: { slidesPerView: 6, spaceBetween: 60 }
                }
            });
        }
    });
</script>
