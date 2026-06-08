<!-- SECTION 7: VIDEO SECTION (Highly premium UI) -->
<section class="bg-slate-950 text-white rounded-3xl p-6 sm:p-8 border border-slate-900 shadow-xl overflow-hidden relative mb-12">
    <!-- Glowing ambient background lights -->
    <div class="absolute -top-32 -left-32 w-80 h-80 bg-red-600/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-80 h-80 bg-orange-600/15 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10">
        <!-- Section Header -->
        <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-900">
            <div class="flex items-center gap-3">
                <span class="w-3.5 h-3.5 bg-primary rounded-xs"></span>
                <h2 class="font-heading font-black text-xl sm:text-2xl text-white uppercase tracking-tight">AngoTV Inovação</h2>
            </div>
            <span class="text-xs font-bold text-red-500 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span> LIVE
            </span>
        </div>

        <!-- Video Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
            <!-- Featured Video Player Card (7 Cols) -->
            <div class="md:col-span-7 group relative rounded-2xl overflow-hidden aspect-video shadow-2xl bg-slate-900">
                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=600" alt="Video Principal" class="w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-500" />
                
                <!-- Play overlay -->
                <div class="absolute inset-0 bg-slate-950/40 backdrop-blur-2px flex items-center justify-center transition-all duration-300 group-hover:bg-slate-950/20">
                    <button class="w-16 h-16 rounded-full bg-primary hover:bg-primary/95 text-white flex items-center justify-center shadow-lg transition-transform duration-300 hover:scale-110">
                        <!-- Play Icon SVG -->
                        <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </button>
                </div>
                
                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 to-transparent p-4 sm:p-6">
                    <span class="text-[10px] font-extrabold uppercase tracking-widest text-primary">Painel de Debate</span>
                    <h3 class="text-base sm:text-lg font-bold text-white leading-tight mt-1">Como Internacionalizar a Sua Startup Angolana: Lições de Casos de Sucesso</h3>
                </div>
            </div>

            <!-- Sidebar Video Stack (5 Cols) -->
            <div class="md:col-span-5 space-y-4">
                <h4 class="text-xs font-bold uppercase tracking-widest text-slate-500">Próximos Episódios</h4>
                
                <div class="space-y-3.5">
                    <div class="flex gap-3 group cursor-pointer">
                        <div class="relative w-24 h-16 rounded-lg overflow-hidden bg-slate-900 shrink-0">
                            <img src="https://images.unsplash.com/photo-1556761175-b81465842c39?q=80&w=200" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                        <div>
                            <h5 class="text-xs font-bold text-slate-200 group-hover:text-primary transition-colors leading-snug line-clamp-2">Entrevista: O Plano da DStv para apoiar Criadores de Conteúdo Locais</h5>
                            <span class="text-[9px] text-slate-500 font-semibold block mt-1">8:25 mins</span>
                        </div>
                    </div>

                    <div class="flex gap-3 group cursor-pointer">
                        <div class="relative w-24 h-16 rounded-lg overflow-hidden bg-slate-900 shrink-0">
                            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=200" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center">
                                <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                        </div>
                        <div>
                            <h5 class="text-xs font-bold text-slate-200 group-hover:text-primary transition-colors leading-snug line-clamp-2">O Estado das Criptomoedas e do Blockchain no Banco Nacional de Angola</h5>
                            <span class="text-[9px] text-slate-500 font-semibold block mt-1">12:40 mins</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 8: PODCAST SECTION (Swiper-based episode listings) -->
<section class="bg-slate-50 dark:bg-slate-900/60 rounded-3xl p-6 sm:p-8 border border-slate-200/60 dark:border-slate-800 shadow-xs">
    <!-- Section Header -->
    <div class="flex items-center justify-between pb-4 mb-6 border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <span class="w-3.5 h-3.5 bg-primary rounded-xs"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">AngoTalks Podcast</h2>
        </div>
        <span class="text-xs font-semibold text-slate-400 dark:text-slate-500">Ouça no Spotify / Apple Podcasts</span>
    </div>

    <!-- Featured Podcast Episode -->
    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl p-5 mb-8 flex flex-col md:flex-row gap-5 items-center">
        <div class="relative w-32 h-32 rounded-xl overflow-hidden shadow-md shrink-0 bg-primary/10">
            <img src="https://images.unsplash.com/photo-1590602847861-f357a9332bbc?q=80&w=200" class="w-full h-full object-cover" />
            <!-- Play bubble -->
            <div class="absolute inset-0 bg-primary/25 flex items-center justify-center">
                <span class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-lg"><svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></span>
            </div>
        </div>
        
        <div class="flex-grow text-center md:text-left">
            <span class="text-[9px] font-extrabold uppercase tracking-widest text-primary">Último Episódio (#48)</span>
            <h3 class="text-base sm:text-lg font-bold text-slate-950 dark:text-white mt-1 leading-snug">Inovação Tecnológica e Conectividade Submarina no Ecossistema Digital Angolano</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 max-w-xl">Neste episódio conversamos com diretores de telecomunicações sobre os desafios da internet em fibra óptica nacional e o cabo transatlântico de dados.</p>
            
            <div class="mt-4 flex items-center justify-center md:justify-start gap-4">
                <span class="text-xs font-semibold text-slate-400">45 minutos de áudio</span>
                <span class="text-xs font-bold text-primary hover:underline cursor-pointer">Ouvir no Site &rarr;</span>
            </div>
        </div>
    </div>

    <!-- Swiper Podcast Carousel -->
    <div class="relative">
        <div class="swiper podcast-swiper overflow-hidden">
            <div class="swiper-wrapper">
                
                <!-- Slide 1 -->
                <div class="swiper-slide p-1">
                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl p-4 flex flex-col h-full shadow-xs hover:shadow-md transition-shadow">
                        <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?q=80&w=200" class="w-full h-24 object-cover rounded-xl mb-3" />
                        <h4 class="text-xs font-bold text-slate-900 dark:text-white line-clamp-2 leading-snug flex-grow">Ep #47: O Crescimento das Fintechs no Mercado Informal</h4>
                        <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-2 font-semibold">32 min • Há 5 dias</span>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide p-1">
                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl p-4 flex flex-col h-full shadow-xs hover:shadow-md transition-shadow">
                        <img src="https://images.unsplash.com/photo-1478737270239-2f02b77fc618?q=80&w=200" class="w-full h-24 object-cover rounded-xl mb-3" />
                        <h4 class="text-xs font-bold text-slate-900 dark:text-white line-clamp-2 leading-snug flex-grow">Ep #46: Tendências de Marketing de Influência em Luanda</h4>
                        <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-2 font-semibold">28 min • Há 2 semanas</span>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide p-1">
                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl p-4 flex flex-col h-full shadow-xs hover:shadow-md transition-shadow">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=200" class="w-full h-24 object-cover rounded-xl mb-3" />
                        <h4 class="text-xs font-bold text-slate-900 dark:text-white line-clamp-2 leading-snug flex-grow">Ep #45: Inteligência Artificial nos Escritórios Nacionais</h4>
                        <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-2 font-semibold">38 min • Há 3 semanas</span>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide p-1">
                    <div class="bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-2xl p-4 flex flex-col h-full shadow-xs hover:shadow-md transition-shadow">
                        <img src="https://images.unsplash.com/photo-1593642632823-8f785ba67e45?q=80&w=200" class="w-full h-24 object-cover rounded-xl mb-3" />
                        <h4 class="text-xs font-bold text-slate-900 dark:text-white line-clamp-2 leading-snug flex-grow">Ep #44: O Futuro da Educação Híbrida e Escolas Digitais</h4>
                        <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-2 font-semibold">41 min • Há 1 mês</span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

<!-- Script to initialize swiper after lazy loading -->
<script>
    if (typeof Swiper !== 'undefined') {
        new Swiper('.podcast-swiper', {
            slidesPerView: 1.5,
            spaceBetween: 16,
            loop: false,
            breakpoints: {
                480: { slidesPerView: 2.2, spaceBetween: 20 },
                640: { slidesPerView: 3, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 20 }
            }
        });
    }
</script>
