<?php $__env->startSection('title', 'Eventos de Marketing, Tecnologia e Inovação em Angola | AngoMarketers'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <!-- Page Header -->
    <div class="text-center max-w-3xl mx-auto mb-16">
        <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-extrabold uppercase tracking-widest rounded-full">Comunidade & Conexão</span>
        <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl text-slate-900 dark:text-white mt-4 tracking-tight leading-tight">
            Eventos que Moldam o Futuro do Marketing
        </h1>
        <p class="text-slate-500 dark:text-slate-400 mt-4 text-base sm:text-lg">
            Participe nos principais fóruns, conferências e debates em Angola. Conecte-se com líderes do setor e expanda o seu networking profissional.
        </p>
    </div>

    <!-- SECTION 1: UPCOMING EVENTS -->
    <section class="mb-20">
        <div class="flex items-center gap-3 pb-4 mb-8 border-b border-slate-200 dark:border-slate-800">
            <span class="w-3.5 h-3.5 bg-primary rounded-xs"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">Próximos Eventos</h2>
        </div>

        <?php if(count($upcomingEvents) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/60 dark:border-slate-800 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col h-full overflow-hidden group">
                        <!-- Event Banner -->
                        <div class="relative aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden">
                            <img src="<?php echo e($event->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=600'); ?>" 
                                 alt="<?php echo e($event->title); ?>" 
                                 class="w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-500" />
                            <div class="absolute top-4 left-4 bg-primary text-white text-[10px] font-black uppercase tracking-wider px-3 py-1.5 rounded-lg shadow-sm">
                                Confirmado
                            </div>
                        </div>

                        <!-- Event Details -->
                        <div class="p-6 flex-grow flex flex-col justify-between">
                            <div>
                                <!-- Date & Location Badge -->
                                <div class="flex items-center gap-4 text-xs font-semibold text-slate-400 dark:text-slate-500 mb-3">
                                    <span class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                        <?php echo e($event->event_date->format('d/m/Y H:i')); ?>

                                    </span>
                                    <span class="flex items-center gap-1 truncate max-w-[150px]">
                                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                        <?php echo e($event->location); ?>

                                    </span>
                                </div>

                                <h3 class="font-heading font-bold text-lg text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                    <a href="<?php echo e(route('events.show', $event->slug)); ?>"><?php echo e($event->title); ?></a>
                                </h3>

                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-3 leading-relaxed">
                                    <?php echo e($event->description); ?>

                                </p>
                            </div>

                            <div class="mt-6 pt-5 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                                <a href="<?php echo e(route('events.show', $event->slug)); ?>" class="text-xs font-extrabold uppercase text-slate-900 dark:text-white hover:text-primary transition-colors flex items-center gap-1">
                                    Saber Mais &rarr;
                                </a>
                                <?php if($event->registration_link): ?>
                                    <a href="<?php echo e($event->registration_link); ?>" target="_blank" class="px-4 py-2 bg-primary hover:bg-primary/95 text-white text-xs font-bold rounded-xl shadow-md transition-all">
                                        Inscrever-se
                                    </a>
                                <?php else: ?>
                                    <span class="text-[10px] font-bold text-slate-400">Inscrições Brevemente</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="bg-slate-50 dark:bg-slate-900/40 rounded-3xl p-12 text-center border border-dashed border-slate-200 dark:border-slate-800">
                <p class="text-slate-400 dark:text-slate-500">Nenhum evento agendado para os próximos dias. Fique atento!</p>
            </div>
        <?php endif; ?>
    </section>

    <!-- SECTION 2: PAST EVENTS (Storytelling Gallery Layout) -->
    <section>
        <div class="flex items-center gap-3 pb-4 mb-8 border-b border-slate-200 dark:border-slate-800">
            <span class="w-3.5 h-3.5 bg-primary rounded-xs"></span>
            <h2 class="font-heading font-black text-xl sm:text-2xl text-slate-900 dark:text-white uppercase tracking-tight">O que já Aconteceu (Eventos Passados)</h2>
        </div>

        <?php if(count($pastEvents) > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php $__currentLoopData = $pastEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-slate-50 dark:bg-slate-900/60 rounded-3xl border border-slate-100 dark:border-slate-800/80 p-6 flex flex-col sm:flex-row gap-6 shadow-xs hover:shadow-md transition-shadow group">
                        <!-- Cover and Video badge icon -->
                        <div class="relative w-full sm:w-48 h-36 rounded-2xl overflow-hidden shrink-0 bg-slate-200">
                            <img src="<?php echo e($event->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=300'); ?>" 
                                 class="w-full h-full object-cover" />
                            <?php if($event->video_url): ?>
                                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                    <span class="w-10 h-10 rounded-full bg-white text-primary flex items-center justify-center shadow-lg"><svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Storytelling description -->
                        <div class="flex-grow flex flex-col justify-between">
                            <div>
                                <span class="text-[9px] font-extrabold uppercase tracking-widest text-slate-400 dark:text-slate-500">Resumo do Evento • <?php echo e($event->event_date->format('d/m/Y')); ?></span>
                                <h3 class="font-heading font-bold text-base text-slate-900 dark:text-white mt-1 group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                    <a href="<?php echo e(route('events.show', $event->slug)); ?>"><?php echo e($event->title); ?></a>
                                </h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-3 leading-relaxed">
                                    <?php echo e($event->description); ?>

                                </p>
                            </div>

                            <div class="mt-4 flex items-center gap-4">
                                <a href="<?php echo e(route('events.show', $event->slug)); ?>" class="text-xs font-bold text-primary hover:underline flex items-center gap-1">
                                    Ver Galeria & Resumos &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                <?php echo e($pastEvents->links()); ?>

            </div>
        <?php else: ?>
            <div class="bg-slate-50 dark:bg-slate-900/40 rounded-3xl p-12 text-center border border-dashed border-slate-200 dark:border-slate-800">
                <p class="text-slate-400 dark:text-slate-500">Ainda não registamos nenhum evento concluído no sistema.</p>
            </div>
        <?php endif; ?>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/events/index.blade.php ENDPATH**/ ?>