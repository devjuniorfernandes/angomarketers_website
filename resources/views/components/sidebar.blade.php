@props(['trendingArticles' => [], 'upcomingEvents' => []])

<aside class="space-y-10">
    <!-- Trending Component -->
    @if(count($trendingArticles) > 0)
        <x-trending :articles="$trendingArticles" />
    @endif

    <!-- Upcoming Events Widget -->
    @if(count($upcomingEvents) > 0)
        <div>
            <div class="flex items-center gap-2 pb-4 mb-5 border-b border-slate-200 dark:border-slate-800">
                <span class="w-2.5 h-2.5 bg-primary rounded-full"></span>
                <h3 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900 dark:text-white">Próximos Eventos</h3>
            </div>
            <div class="space-y-4">
                @foreach($upcomingEvents as $upEvent)
                    <div class="flex gap-3 items-start group">
                        <!-- Date Badge -->
                        <div class="w-10 h-11 bg-primary/10 rounded-lg flex flex-col items-center justify-center text-primary shrink-0">
                            <span class="text-[11px] font-black leading-none">{{ $upEvent->event_date->format('d') }}</span>
                            <span class="text-[8px] font-extrabold uppercase leading-none mt-0.5">{{ $upEvent->event_date->format('M') }}</span>
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-slate-850 dark:text-slate-250 group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                <a href="{{ route('events.show', $upEvent->slug) }}">{{ $upEvent->title }}</a>
                            </h4>
                            <span class="text-[9px] text-slate-400 font-medium block mt-0.5 truncate">{{ $upEvent->location }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Compact Newsletter Box -->
    <x-newsletter-box />

    <!-- Popular Tags Widget -->
    <div>
        <div class="flex items-center gap-2 pb-4 mb-5 border-b border-slate-200 dark:border-slate-800">
            <span class="w-2.5 h-2.5 bg-primary rounded-full"></span>
            <h3 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900 dark:text-white">Tags Populares</h3>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="/search?q=Luanda" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#luanda</a>
            <a href="/search?q=Fintech" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#fintech</a>
            <a href="/search?q=Inovacao" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#inovacao</a>
            <a href="/search?q=Marketing" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#marketing</a>
            <a href="/search?q=IA" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#ia</a>
            <a href="/search?q=Banca" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#banca</a>
            <a href="/search?q=Angola" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#angola</a>
        </div>
    </div>
</aside>
