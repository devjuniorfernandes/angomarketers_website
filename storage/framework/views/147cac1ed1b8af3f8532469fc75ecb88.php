<?php $__env->startSection('title', $event->title . ' | Eventos AngoMarketers'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 md:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="flex text-xs font-semibold text-slate-400 dark:text-slate-500 mb-6 uppercase tracking-wider" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
                <a href="/" class="hover:text-primary">Home</a>
            </li>
            <li>
                <div class="flex items-center">
                    <span class="mx-1.5 md:mx-2.5">/</span>
                    <a href="<?php echo e(route('events.index')); ?>" class="hover:text-primary">Eventos</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <span class="mx-1.5 md:mx-2.5">/</span>
                    <span class="text-slate-600 dark:text-slate-300 truncate max-w-[200px] md:max-w-xs"><?php echo e($event->title); ?></span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Hero Header Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center mb-12">
        <!-- Hero Details (5 Cols) -->
        <div class="lg:col-span-5 space-y-6">
            <span class="px-3.5 py-1.5 bg-primary/10 text-primary text-[10px] font-black uppercase tracking-widest rounded-full inline-block">
                <?php echo e($event->isPast() ? 'Evento Realizado' : 'Próximo Evento'); ?>

            </span>
            <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl text-slate-900 dark:text-white leading-tight tracking-tight">
                <?php echo e($event->title); ?>

            </h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed">
                <?php echo e($event->description); ?>

            </p>

            <div class="space-y-3 pt-2">
                <div class="flex items-center gap-3 text-xs font-semibold text-slate-600 dark:text-slate-300">
                    <span class="w-8 h-8 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-primary font-bold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                    </span>
                    <div>
                        <span class="block text-[10px] text-slate-400 font-bold uppercase">Data & Hora</span>
                        <?php echo e($event->event_date->format('d \d\e F \d\e Y \à\s H:i')); ?>

                    </div>
                </div>

                <div class="flex items-center gap-3 text-xs font-semibold text-slate-600 dark:text-slate-300">
                    <span class="w-8 h-8 rounded-lg bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-primary font-bold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </span>
                    <div>
                        <span class="block text-[10px] text-slate-400 font-bold uppercase">Localização</span>
                        <?php echo e($event->location); ?>

                    </div>
                </div>
            </div>

            <div class="pt-4 flex flex-wrap gap-4">
                <?php if(!$event->isPast()): ?>
                    <?php if($event->registration_link): ?>
                        <a href="<?php echo e($event->registration_link); ?>" target="_blank" class="px-6 py-3 bg-primary hover:bg-primary/95 text-white text-xs font-extrabold uppercase tracking-wider rounded-xl shadow-lg transition-all">
                            Reservar o Meu Lugar
                        </a>
                    <?php else: ?>
                        <span class="px-5 py-3 bg-slate-100 dark:bg-slate-800 text-slate-400 text-xs font-bold rounded-xl">Inscrições Indisponíveis</span>
                    <?php endif; ?>
                <?php else: ?>
                    <span class="px-5 py-3 bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-xs font-bold rounded-xl flex items-center gap-2">
                        <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full"></span> Finalizado
                    </span>
                <?php endif; ?>
            </div>
        </div>

        <!-- Banner Cover (7 Cols) -->
        <div class="lg:col-span-7 bg-slate-900 rounded-3xl overflow-hidden shadow-2xl aspect-video border border-slate-200/40 dark:border-slate-800">
            <img src="<?php echo e($event->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1200'); ?>" 
                 alt="<?php echo e($event->title); ?>" 
                 class="w-full h-full object-cover" />
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        <!-- Event Body Details (8 Cols) -->
        <div class="lg:col-span-8 space-y-12">
            <!-- Details / Description -->
            <article class="prose prose-slate dark:prose-invert max-w-none prose-p:leading-relaxed prose-headings:font-heading prose-headings:font-black prose-a:text-primary">
                <?php echo nl2br(e($event->body)); ?>

            </article>

            <!-- Video Section for Past Events -->
            <?php if($event->isPast() && $event->video_url): ?>
                <?php
                    // Parse YouTube video ID if possible
                    $videoId = null;
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $event->video_url, $match)) {
                        $videoId = $match[1];
                    }
                ?>
                
                <section class="bg-slate-950 text-white rounded-3xl p-6 sm:p-8 border border-slate-900 shadow-xl overflow-hidden relative">
                    <div class="absolute -top-32 -left-32 w-80 h-80 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="relative z-10">
                        <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-900">
                            <span class="w-3.5 h-3.5 bg-primary rounded-xs"></span>
                            <h2 class="font-heading font-black text-xl text-white uppercase tracking-tight">Vídeo de Cobertura</h2>
                        </div>
                        
                        <?php if($videoId): ?>
                            <div class="aspect-video rounded-2xl overflow-hidden shadow-2xl bg-black">
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/<?php echo e($videoId); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        <?php else: ?>
                            <div class="aspect-video bg-slate-900 rounded-2xl flex items-center justify-center border border-slate-800">
                                <a href="<?php echo e($event->video_url); ?>" target="_blank" class="text-sm font-bold text-primary hover:underline flex items-center gap-2">
                                    <svg class="w-6 h-6 fill-primary" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg> Assista à Cobertura no Link Externo
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Photos Gallery Section for Past Events -->
            <?php if($event->isPast() && count($event->photos) > 0): ?>
                <section class="bg-slate-50 dark:bg-slate-900/60 rounded-3xl p-6 sm:p-8 border border-slate-200/60 dark:border-slate-800 shadow-xs">
                    <div class="flex items-center gap-3 pb-4 mb-6 border-b border-slate-200 dark:border-slate-800">
                        <span class="w-3.5 h-3.5 bg-primary rounded-xs"></span>
                        <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white uppercase tracking-tight">Galeria de Fotos</h2>
                    </div>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4" x-data="{ openImage: null }">
                        <?php $__currentLoopData = $event->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="aspect-square bg-slate-100 dark:bg-slate-800 rounded-2xl overflow-hidden cursor-pointer shadow-xs border border-slate-200/40 dark:border-slate-800 group"
                                 x-on:click="openImage = '<?php echo e($photo->image_path); ?>'">
                                <img src="<?php echo e($photo->image_path); ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300" />
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!-- Image Lightbox Modal -->
                        <div x-show="openImage !== null" 
                             class="fixed inset-0 z-50 overflow-hidden flex items-center justify-center p-4 bg-slate-900/80 dark:bg-black/90 backdrop-blur-sm"
                             style="display: none;"
                             x-on:keydown.escape.window="openImage = null">
                            <div class="relative w-full max-w-4xl max-h-[85vh] overflow-hidden rounded-2xl bg-white dark:bg-slate-900" x-on:click.away="openImage = null">
                                <button class="absolute top-4 right-4 bg-slate-900/40 text-white rounded-full p-2 hover:bg-slate-900/60 focus:outline-none" x-on:click="openImage = null">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                                </button>
                                <img :src="openImage" class="w-full h-auto max-h-[80vh] object-contain mx-auto" />
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>

        <!-- Sidebar Layout (4 Cols) -->
        <div class="lg:col-span-4">
            <!-- Sidebar component container -->
            <div class="space-y-8 lg:sticky lg:top-28">
                <!-- Upcoming Events List -->
                <?php if(count($upcomingEvents) > 0): ?>
                    <div class="bg-white dark:bg-slate-900 border border-slate-200/60 dark:border-slate-800 rounded-3xl p-6 shadow-xs">
                        <h3 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900 dark:text-white pb-3 border-b border-slate-100 dark:border-slate-800 mb-4">Outros Eventos</h3>
                        <div class="space-y-4">
                            <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex gap-3 items-start group">
                                    <!-- Date badge widget -->
                                    <div class="w-11 h-12 bg-primary/10 rounded-lg flex flex-col items-center justify-center text-primary shrink-0">
                                        <span class="text-xs font-black leading-none"><?php echo e($upEvent->event_date->format('d')); ?></span>
                                        <span class="text-[8px] font-extrabold uppercase leading-none mt-1"><?php echo e($upEvent->event_date->format('M')); ?></span>
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200 group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                            <a href="<?php echo e(route('events.show', $upEvent->slug)); ?>"><?php echo e($upEvent->title); ?></a>
                                        </h4>
                                        <span class="text-[9px] text-slate-400 font-semibold block mt-1"><?php echo e($upEvent->location); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Normal Sidebar components (Trending list, newsletter) -->
                <?php if (isset($component)) { $__componentOriginal2880b66d47486b4bfeaf519598a469d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2880b66d47486b4bfeaf519598a469d6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar','data' => ['trendingArticles' => $trendingArticles]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['trendingArticles' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trendingArticles)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $attributes = $__attributesOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $component = $__componentOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__componentOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/events/show.blade.php ENDPATH**/ ?>