@extends('layouts.app')

@section('title', 'AngoMarketers | O Portal de Notícias, Eventos e Formações em Angola')

@section('content')

<!-- SECTION 1: DYNAMIC HERO SLIDER (100% Width Editorial Carousel) -->
<section class="w-full relative overflow-hidden bg-slate-950 border-b border-slate-250 dark:border-slate-850">
    <div class="swiper hero-swiper w-full">
        <div class="swiper-wrapper">
            @foreach($sliderItems as $item)
                <div class="swiper-slide relative w-full min-h-[500px] md:min-h-[550px] lg:min-h-[600px] flex items-center">
                    <!-- Slide Background Image with Opacity & Gradient Overlays -->
                    <div class="absolute inset-0 z-0">
                        <img src="{{ $item->image_path }}" 
                             alt="{{ $item->title }}" 
                             class="w-full h-full object-cover opacity-60 dark:opacity-40" 
                             onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');" />
                        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 hidden"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/70 to-transparent"></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent"></div>
                    </div>

                    <!-- Slide Content Content (Aligned with max-w-7xl) -->
                    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 md:px-8 py-20 text-white flex flex-col justify-center">
                        <div class="max-w-3xl">
                            <!-- Category Badge & Date -->
                            <div class="flex items-center gap-3 mb-6">
                                <span class="px-3 py-1.5 {{ $item->badge_color }} text-white text-[10px] font-black uppercase tracking-widest rounded-none shadow-sm">
                                    {{ $item->badge }}
                                </span>
                                @if($item->date)
                                    <span class="text-xs font-semibold text-slate-300 tracking-wider">
                                        {{ $item->date }}
                                    </span>
                                @endif
                            </div>

                            <!-- Title -->
                            <h2 class="font-heading font-black text-2xl sm:text-4xl md:text-5xl lg:text-6xl leading-tight tracking-tight mb-5 text-white drop-shadow-sm">
                                <a href="{{ $item->url }}" class="hover:text-primary transition-colors">
                                    {{ $item->title }}
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <p class="text-slate-300 text-sm sm:text-base md:text-lg leading-relaxed mb-8 line-clamp-3 max-w-2xl">
                                {{ $item->subtitle }}
                            </p>

                            <!-- CTA Actions -->
                            <div class="flex flex-wrap items-center gap-6">
                                <a href="{{ $item->url }}" class="inline-flex items-center justify-center px-6 py-3.5 bg-primary hover:bg-primary/95 text-white font-bold text-xs uppercase tracking-widest rounded-none transition-all shadow-md">
                                    @if($item->type == 'article')
                                        Ler Notícia
                                    @elseif($item->type == 'event')
                                        Inscrever no Evento
                                    @elseif($item->type == 'training')
                                        Conhecer Formação
                                    @else
                                        Saber Mais
                                    @endif
                                </a>
                                
                                @if($item->extra || $item->author != 'AngoMarketers')
                                    <div class="flex flex-col text-xs text-slate-400">
                                        <span class="font-bold text-slate-200">
                                            @if($item->type == 'article')
                                                Por: {{ $item->author }}
                                            @elseif($item->type == 'event')
                                                Organizador: {{ $item->author }}
                                            @elseif($item->type == 'training')
                                                Entidade: {{ $item->author }}
                                            @else
                                                {{ $item->author }}
                                            @endif
                                        </span>
                                        @if($item->extra)
                                            <span class="mt-0.5 text-slate-400 font-semibold">{{ $item->extra }}</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Slider Pagination Indicators -->
        <div class="swiper-pagination !bottom-8"></div>

        <!-- Slider Navigation Arrows -->
        <button class="swiper-button-next !text-white hover:!text-primary !w-12 !h-12 bg-slate-950/40 hover:bg-slate-950/80 backdrop-blur-xs rounded-none after:!text-lg hidden md:flex transition-colors"></button>
        <button class="swiper-button-prev !text-white hover:!text-primary !w-12 !h-12 bg-slate-950/40 hover:bg-slate-950/80 backdrop-blur-xs rounded-none after:!text-lg hidden md:flex transition-colors"></button>
    </div>
</section>

<!-- SECTION 2: TRENDING WEEKLY (Mais Vistos) -->
@if(count($trendingArticles) > 0)
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <span class="w-3.5 h-3.5 bg-primary"></span>
            <h2 class="font-heading font-black text-lg sm:text-xl text-slate-900 dark:text-white uppercase tracking-tight">Mais Vistos da Semana</h2>
        </div>
        <span class="text-xs font-bold text-slate-400">Popularidade Semanal</span>
    </div>
    
    <!-- Horizontal scroll for trending list -->
    <div class="flex gap-4 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-slate-200 dark:scrollbar-thumb-slate-800">
        @foreach($trendingArticles->take(5) as $index => $article)
            <div class="min-w-[280px] sm:min-w-[320px] bg-slate-50 dark:bg-slate-900/40 rounded-2xl p-4 border border-slate-100 dark:border-slate-800 flex gap-3.5 items-start shrink-0 group">
                <span class="font-heading font-black text-3xl sm:text-4xl text-slate-250 dark:text-slate-800 select-none">#0{{ $index + 1 }}</span>
                <div class="min-w-0">
                    <span class="text-[9px] font-black uppercase text-primary tracking-widest">{{ $article->category->name ?? 'Geral' }}</span>
                    <h3 class="font-heading font-bold text-xs sm:text-sm text-slate-900 dark:text-white mt-1 group-hover:text-primary transition-colors leading-snug line-clamp-2">
                        <a href="{{ route('article', $article->slug) }}">{{ $article->title }}</a>
                    </h3>
                    <span class="text-[9px] text-slate-400 mt-2 block">{{ $article->published_at ? $article->published_at->format('d/m/Y') : '' }}</span>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

<!-- SECTION 3: LATEST NEWS GRID -->
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <div class="flex items-center justify-between pb-4 mb-8 border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <span class="w-3.5 h-3.5 bg-primary"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">Últimas Notícias</h2>
        </div>
        <a href="{{ route('news.index') }}" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">Ver Todas as Notícias &rarr;</a>
    </div>
    <x-article-grid :articles="$latestArticles" />
</section>


<!-- SECTION 4: EVENTS IN COMMUNITY -->
@if(count($upcomingEvents) > 0)
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10 mb-10">
    <div class="flex items-center justify-between pb-4 mb-8 border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <span class="w-3.5 h-3.5 bg-primary"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">Próximos Eventos</h2>
        </div>
        <a href="{{ route('events.index') }}" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">Ver Todos os Eventos &rarr;</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($upcomingEvents as $event)
            <div class="bg-emerald-50/20 dark:bg-emerald-950/10 border border-emerald-100/80 dark:border-emerald-900/30 rounded-2xl overflow-hidden flex flex-col h-full shadow-xs group transition-all duration-300 hover:shadow-md hover:border-emerald-250 dark:hover:border-emerald-850">
                <div class="relative aspect-video overflow-hidden">
                    <img src="{{ $event->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=600' }}" 
                         class="w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-500" />
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] text-primary font-black uppercase tracking-widest block mb-2">{{ $event->event_date->format('d/m/Y H:i') }} • {{ $event->location }}</span>
                        <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white leading-snug group-hover:text-primary transition-colors">
                            <a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">{{ $event->description }}</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800/80 flex justify-between items-center">
                        <a href="{{ route('events.show', $event->slug) }}" class="text-xs font-bold text-slate-900 dark:text-white hover:text-primary transition-colors">Detalhes</a>
                        @if($event->registration_link)
                            <a href="{{ $event->registration_link }}" target="_blank" class="px-3.5 py-1.5 bg-primary hover:bg-primary/95 text-white text-xs font-bold rounded-lg shadow-sm">Inscrever</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

@if($ad_slim_leaderboard['show'] && $ad_slim_leaderboard['image'])
<!-- SECTION 4b: SLIM LEADERBOARD ADVERTISING BANNER -->
<section class="max-w-7xl mx-auto px-4 md:px-8 py-6">
    <a href="{{ $ad_slim_leaderboard['url'] ?: '#' }}" target="_blank" class="block relative w-full h-[120px] bg-slate-900 border border-slate-200/50 dark:border-slate-800 flex items-center justify-between p-6 md:p-8 overflow-hidden group">
        
        <!-- Background: Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $ad_slim_leaderboard['image'] }}" class="w-full h-full object-cover opacity-45 group-hover:scale-102 transition-transform duration-500" />
            <div class="absolute inset-0 bg-slate-950/65"></div>
        </div>

        <!-- Content Split Left -->
        <div class="relative z-10 flex flex-col justify-center text-white">
            <div class="flex items-center gap-2 mb-1.5">
                <span class="px-2 py-0.5 bg-primary text-white text-[8px] font-black uppercase tracking-wider">Patrocinado</span>
            </div>
            <h4 class="font-heading font-black text-sm sm:text-base text-white uppercase tracking-tight leading-none">
                AngoMarketers Publicidade
            </h4>
        </div>

        <!-- Content Split Right (CTA) -->
        <div class="relative z-10 flex items-center gap-4 shrink-0">
            <span class="px-4 py-2 bg-white hover:bg-slate-100 text-slate-900 font-bold text-[10px] uppercase tracking-widest transition-all">
                Saber Mais
            </span>
        </div>
    </a>
</section>
@endif

<!-- SECTION 5: FEATURED TRAININGS (Formações em Destaque) -->
@if(count($featuredTrainings) > 0)
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10 mb-10">
    <div class="flex items-center justify-between pb-4 mb-8  dark:border-slate-800">
        <div class="flex items-center gap-3">
            <span class="w-3.5 h-3.5 bg-primary"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">Formações em Destaque</h2>
        </div>
        <a href="{{ route('trainings.index') }}" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">Ver Todas as Formações &rarr;</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($featuredTrainings as $training)
            <div class="bg-white dark:bg-slate-900 border border-slate-200/50 dark:border-slate-800/80 rounded-2xl overflow-hidden flex flex-col h-full shadow-xs group">
                <div class="relative aspect-video overflow-hidden">
                    <img src="{{ $training->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600' }}" 
                         class="w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-500" />
                    <div class="absolute top-3 left-3 bg-slate-950/80 text-white text-[9px] font-black uppercase tracking-wider px-2.5 py-1 rounded">
                        {{ ucfirst($training->mode) }}
                    </div>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest block mb-2">{{ $training->institution }}</span>
                        <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white leading-snug group-hover:text-primary transition-colors">
                            <a href="{{ route('trainings.show', $training->slug) }}">{{ $training->title }}</a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed">{{ $training->excerpt }}</p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center text-xs font-bold">
                        <span class="text-slate-500">{{ $training->duration }}</span>
                        <span class="text-primary">
                            @if($training->price > 0)
                                {{ number_format($training->price, 2, ',', '.') }} AOA
                            @else
                                Gratuito
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

@if($ad_super_billboard['show'] && $ad_super_billboard['image'])
<!-- SECTION 6: ADVERTISING BILLBOARD BANNER (Super Billboard) -->
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <a href="{{ $ad_super_billboard['url'] ?: '#' }}" target="_blank" class="block relative w-full h-[280px] bg-slate-900 border border-slate-250 dark:border-slate-850 overflow-hidden flex flex-col justify-between p-8 sm:p-12 group transition-all duration-300">
        
        <!-- Background: Image Ad -->
        <div class="absolute inset-0 z-0">
            <img src="{{ $ad_super_billboard['image'] }}" alt="Publicidade AngoMarketers" class="w-full h-full object-cover opacity-60 dark:opacity-40 group-hover:scale-102 transition-transform duration-500" />
            <div class="absolute inset-0 bg-slate-950/75"></div>
        </div>

        <!-- Header: Controls -->
        <div class="relative z-10 flex items-center justify-between">
            <span class="px-2.5 py-1 bg-primary text-white text-[9px] font-black uppercase tracking-wider">Patrocinado</span>
        </div>

        <!-- Content Details -->
        <div class="relative z-10 max-w-2xl text-white mt-auto mb-6">
            <h3 class="font-heading font-black text-xl sm:text-2xl md:text-3xl text-white uppercase tracking-tight leading-none mb-3">
                AngoMarketers Publicidade
            </h3>
        </div>

        <!-- CTA Action Footer -->
        <div class="relative z-10 flex items-center justify-between pt-4 border-t border-slate-800/60 w-full">
            <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-450">Saber Mais</span>
            <span class="px-5 py-2 bg-white hover:bg-slate-100 text-slate-900 font-bold text-xs uppercase tracking-widest transition-all shadow-sm">
                Saber Mais &rarr;
            </span>
        </div>
    </a>
</section>
@endif

<!-- SECTION 7: FEATURED VIDEO SHOWCASE -->
@if(!empty($homepage_video_url))
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <div class="w-full aspect-video rounded-3xl overflow-hidden border border-slate-200/60 dark:border-slate-800/80 shadow-2xl bg-black">
        <iframe class="w-full h-full" 
                src="{{ $homepage_video_url }}" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen>
        </iframe>
    </div>
</section>
@endif

<!-- SECTION 8: PARTNERS LOGO CAROUSEL -->
<x-partner-slider />

@endsection

@section('styles')
<style>
    .hero-swiper .swiper-pagination-bullet {
        background: rgba(255, 255, 255, 0.4);
        opacity: 1;
        width: 8px;
        height: 8px;
        border-radius: 0px;
        transition: all 0.3s ease;
    }
    .hero-swiper .swiper-pagination-bullet-active {
        background: #E53935 !important;
        width: 24px;
    }
    .hero-swiper .swiper-button-next::after,
    .hero-swiper .swiper-button-prev::after {
        font-size: 1.25rem !important;
        font-weight: 900;
    }
</style>
@endsection

@section('scripts')
<script>
    window.addEventListener('lazy-sections-loaded', function() {
        console.log('Heavy sections loaded successfully.');
    });

    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.hero-swiper', {
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        });
    });
</script>
@endsection
