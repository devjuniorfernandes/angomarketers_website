<?php $__env->startSection('title', 'AngoMarketers | O Portal de Notícias, Eventos e Formações em Angola'); ?>

<?php $__env->startSection('content'); ?>

<!-- SECTION 1: DYNAMIC HERO SLIDER (100% Width Editorial Carousel) -->
<section class="w-full relative overflow-hidden bg-slate-950 border-b border-slate-250 dark:border-slate-850">
    <div class="swiper hero-swiper w-full">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $sliderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide relative w-full min-h-[500px] md:min-h-[550px] lg:min-h-[600px] flex items-center">
                    <!-- Slide Background Image with Opacity & Gradient Overlays -->
                    <div class="absolute inset-0 z-0">
                        <img src="<?php echo e($item->image_path); ?>" 
                             alt="<?php echo e($item->title); ?>" 
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
                                <span class="px-3 py-1.5 <?php echo e($item->badge_color); ?> text-white text-[10px] font-black uppercase tracking-widest rounded-none shadow-sm">
                                    <?php echo e($item->badge); ?>

                                </span>
                                <?php if($item->date): ?>
                                    <span class="text-xs font-semibold text-slate-300 tracking-wider">
                                        <?php echo e($item->date); ?>

                                    </span>
                                <?php endif; ?>
                            </div>

                            <!-- Title -->
                            <h2 class="font-heading font-black text-2xl sm:text-4xl md:text-5xl lg:text-6xl leading-tight tracking-tight mb-5 text-white drop-shadow-sm">
                                <a href="<?php echo e($item->url); ?>" class="hover:text-primary transition-colors">
                                    <?php echo e($item->title); ?>

                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <p class="text-slate-300 text-sm sm:text-base md:text-lg leading-relaxed mb-8 line-clamp-3 max-w-2xl">
                                <?php echo e($item->subtitle); ?>

                            </p>

                            <!-- CTA Actions -->
                            <div class="flex flex-wrap items-center gap-6">
                                <a href="<?php echo e($item->url); ?>" class="inline-flex items-center justify-center px-6 py-3.5 bg-primary hover:bg-primary/95 text-white font-bold text-xs uppercase tracking-widest rounded-none transition-all shadow-md">
                                    <?php if($item->type == 'article'): ?>
                                        Ler Notícia
                                    <?php elseif($item->type == 'event'): ?>
                                        Inscrever no Evento
                                    <?php elseif($item->type == 'training'): ?>
                                        Conhecer Formação
                                    <?php else: ?>
                                        Saber Mais
                                    <?php endif; ?>
                                </a>
                                
                                <?php if($item->extra || $item->author != 'AngoMarketers'): ?>
                                    <div class="flex flex-col text-xs text-slate-400">
                                        <span class="font-bold text-slate-200">
                                            <?php if($item->type == 'article'): ?>
                                                Por: <?php echo e($item->author); ?>

                                            <?php elseif($item->type == 'event'): ?>
                                                Organizador: <?php echo e($item->author); ?>

                                            <?php elseif($item->type == 'training'): ?>
                                                Entidade: <?php echo e($item->author); ?>

                                            <?php else: ?>
                                                <?php echo e($item->author); ?>

                                            <?php endif; ?>
                                        </span>
                                        <?php if($item->extra): ?>
                                            <span class="mt-0.5 text-slate-400 font-semibold"><?php echo e($item->extra); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Slider Pagination Indicators -->
        <div class="swiper-pagination !bottom-8"></div>

        <!-- Slider Navigation Arrows -->
        <button class="swiper-button-next !text-white hover:!text-primary !w-12 !h-12 bg-slate-950/40 hover:bg-slate-950/80 backdrop-blur-xs rounded-none after:!text-lg hidden md:flex transition-colors"></button>
        <button class="swiper-button-prev !text-white hover:!text-primary !w-12 !h-12 bg-slate-950/40 hover:bg-slate-950/80 backdrop-blur-xs rounded-none after:!text-lg hidden md:flex transition-colors"></button>
    </div>
</section>

<!-- SECTION 2: TRENDING WEEKLY (Mais Vistos) -->
<?php if(count($trendingArticles) > 0): ?>
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
        <?php $__currentLoopData = $trendingArticles->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="min-w-[280px] sm:min-w-[320px] bg-slate-50 dark:bg-slate-900/40 rounded-2xl p-4 border border-slate-100 dark:border-slate-800 flex gap-3.5 items-start shrink-0 group">
                <span class="font-heading font-black text-3xl sm:text-4xl text-slate-250 dark:text-slate-800 select-none">#0<?php echo e($index + 1); ?></span>
                <div class="min-w-0">
                    <span class="text-[9px] font-black uppercase text-primary tracking-widest"><?php echo e($article->category->name ?? 'Geral'); ?></span>
                    <h3 class="font-heading font-bold text-xs sm:text-sm text-slate-900 dark:text-white mt-1 group-hover:text-primary transition-colors leading-snug line-clamp-2">
                        <a href="<?php echo e(route('article', $article->slug)); ?>"><?php echo e($article->title); ?></a>
                    </h3>
                    <span class="text-[9px] text-slate-400 mt-2 block"><?php echo e($article->published_at ? $article->published_at->format('d/m/Y') : ''); ?></span>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php endif; ?>

<!-- SECTION 3: LATEST NEWS GRID -->
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <div class="flex items-center justify-between pb-4 mb-8 border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <span class="w-3.5 h-3.5 bg-primary"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">Últimas Notícias</h2>
        </div>
        <a href="<?php echo e(route('news.index')); ?>" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">Ver Todas as Notícias &rarr;</a>
    </div>
    <?php if (isset($component)) { $__componentOriginala5085180aaab7798630a109eac221718 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala5085180aaab7798630a109eac221718 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.article-grid','data' => ['articles' => $latestArticles]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('article-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['articles' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($latestArticles)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala5085180aaab7798630a109eac221718)): ?>
<?php $attributes = $__attributesOriginala5085180aaab7798630a109eac221718; ?>
<?php unset($__attributesOriginala5085180aaab7798630a109eac221718); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5085180aaab7798630a109eac221718)): ?>
<?php $component = $__componentOriginala5085180aaab7798630a109eac221718; ?>
<?php unset($__componentOriginala5085180aaab7798630a109eac221718); ?>
<?php endif; ?>
</section>


<!-- SECTION 4: EVENTS IN COMMUNITY -->
<?php if(count($upcomingEvents) > 0): ?>
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10 mb-10">
    <div class="flex items-center justify-between pb-4 mb-8 border-b border-slate-200 dark:border-slate-800">
        <div class="flex items-center gap-3">
            <span class="w-3.5 h-3.5 bg-primary"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">Próximos Eventos</h2>
        </div>
        <a href="<?php echo e(route('events.index')); ?>" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">Ver Todos os Eventos &rarr;</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-emerald-50/20 dark:bg-emerald-950/10 border border-emerald-100/80 dark:border-emerald-900/30 rounded-2xl overflow-hidden flex flex-col h-full shadow-xs group transition-all duration-300 hover:shadow-md hover:border-emerald-250 dark:hover:border-emerald-850">
                <div class="relative aspect-video overflow-hidden">
                    <img src="<?php echo e($event->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=600'); ?>" 
                         class="w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-500" />
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] text-primary font-black uppercase tracking-widest block mb-2"><?php echo e($event->event_date->format('d/m/Y H:i')); ?> • <?php echo e($event->location); ?></span>
                        <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white leading-snug group-hover:text-primary transition-colors">
                            <a href="<?php echo e(route('events.show', $event->slug)); ?>"><?php echo e($event->title); ?></a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed"><?php echo e($event->description); ?></p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800/80 flex justify-between items-center">
                        <a href="<?php echo e(route('events.show', $event->slug)); ?>" class="text-xs font-bold text-slate-900 dark:text-white hover:text-primary transition-colors">Detalhes</a>
                        <?php if($event->registration_link): ?>
                            <a href="<?php echo e($event->registration_link); ?>" target="_blank" class="px-3.5 py-1.5 bg-primary hover:bg-primary/95 text-white text-xs font-bold rounded-lg shadow-sm">Inscrever</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php endif; ?>

<?php if($ad_slim_leaderboard['show'] && $ad_slim_leaderboard['image']): ?>
<!-- SECTION 4b: SLIM LEADERBOARD ADVERTISING BANNER -->
<section class="max-w-7xl mx-auto px-4 md:px-8 py-6">
    <a href="<?php echo e($ad_slim_leaderboard['url'] ?: '#'); ?>" target="_blank" class="block relative w-full h-[120px] bg-slate-900 border border-slate-200/50 dark:border-slate-800 flex items-center justify-between p-6 md:p-8 overflow-hidden group">
        
        <!-- Background: Image -->
        <div class="absolute inset-0 z-0">
            <img src="<?php echo e($ad_slim_leaderboard['image']); ?>" class="w-full h-full object-cover opacity-45 group-hover:scale-102 transition-transform duration-500" />
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
<?php endif; ?>

<!-- SECTION 5: FEATURED TRAININGS (Formações em Destaque) -->
<?php if(count($featuredTrainings) > 0): ?>
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10 mb-10">
    <div class="flex items-center justify-between pb-4 mb-8  dark:border-slate-800">
        <div class="flex items-center gap-3">
            <span class="w-3.5 h-3.5 bg-primary"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">Formações em Destaque</h2>
        </div>
        <a href="<?php echo e(route('trainings.index')); ?>" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">Ver Todas as Formações &rarr;</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__currentLoopData = $featuredTrainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white dark:bg-slate-900 border border-slate-200/50 dark:border-slate-800/80 rounded-2xl overflow-hidden flex flex-col h-full shadow-xs group">
                <div class="relative aspect-video overflow-hidden">
                    <img src="<?php echo e($training->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600'); ?>" 
                         class="w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-500" />
                    <div class="absolute top-3 left-3 bg-slate-950/80 text-white text-[9px] font-black uppercase tracking-wider px-2.5 py-1 rounded">
                        <?php echo e(ucfirst($training->mode)); ?>

                    </div>
                </div>
                <div class="p-5 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest block mb-2"><?php echo e($training->institution); ?></span>
                        <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white leading-snug group-hover:text-primary transition-colors">
                            <a href="<?php echo e(route('trainings.show', $training->slug)); ?>"><?php echo e($training->title); ?></a>
                        </h3>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-2 leading-relaxed"><?php echo e($training->excerpt); ?></p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 flex justify-between items-center text-xs font-bold">
                        <span class="text-slate-500"><?php echo e($training->duration); ?></span>
                        <span class="text-primary">
                            <?php if($training->price > 0): ?>
                                <?php echo e(number_format($training->price, 2, ',', '.')); ?> AOA
                            <?php else: ?>
                                Gratuito
                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php endif; ?>

<?php if($ad_super_billboard['show'] && $ad_super_billboard['image']): ?>
<!-- SECTION 6: ADVERTISING BILLBOARD BANNER (Super Billboard) -->
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <a href="<?php echo e($ad_super_billboard['url'] ?: '#'); ?>" target="_blank" class="block relative w-full h-[280px] bg-slate-900 border border-slate-250 dark:border-slate-850 overflow-hidden flex flex-col justify-between p-8 sm:p-12 group transition-all duration-300">
        
        <!-- Background: Image Ad -->
        <div class="absolute inset-0 z-0">
            <img src="<?php echo e($ad_super_billboard['image']); ?>" alt="Publicidade AngoMarketers" class="w-full h-full object-cover opacity-60 dark:opacity-40 group-hover:scale-102 transition-transform duration-500" />
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
<?php endif; ?>

<!-- SECTION 7: FEATURED VIDEO SHOWCASE -->
<?php if(!empty($homepage_video_url)): ?>
<section class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <div class="w-full aspect-video rounded-3xl overflow-hidden border border-slate-200/60 dark:border-slate-800/80 shadow-2xl bg-black">
        <iframe class="w-full h-full" 
                src="<?php echo e($homepage_video_url); ?>" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen>
        </iframe>
    </div>
</section>
<?php endif; ?>

<!-- SECTION 8: PARTNERS LOGO CAROUSEL -->
<?php if (isset($component)) { $__componentOriginal9b2ae05b4eb2865c096f869959a60591 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9b2ae05b4eb2865c096f869959a60591 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partner-slider','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partner-slider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9b2ae05b4eb2865c096f869959a60591)): ?>
<?php $attributes = $__attributesOriginal9b2ae05b4eb2865c096f869959a60591; ?>
<?php unset($__attributesOriginal9b2ae05b4eb2865c096f869959a60591); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9b2ae05b4eb2865c096f869959a60591)): ?>
<?php $component = $__componentOriginal9b2ae05b4eb2865c096f869959a60591; ?>
<?php unset($__componentOriginal9b2ae05b4eb2865c096f869959a60591); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/home.blade.php ENDPATH**/ ?>