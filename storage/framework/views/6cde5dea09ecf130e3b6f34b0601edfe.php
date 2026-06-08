<?php $__env->startSection('title', $training->meta_title ?: $training->title . ' | AngoMarketers'); ?>
<?php $__env->startSection('meta_description', $training->meta_description ?: $training->excerpt); ?>
<?php $__env->startSection('og_image', $training->cover_image); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <!-- Breadcrumbs -->
    <nav class="flex text-xs font-semibold text-slate-400 dark:text-slate-500 gap-2 items-center mb-8">
        <a href="/" class="hover:text-primary transition-colors">Home</a>
        <span>/</span>
        <a href="<?php echo e(route('trainings.index')); ?>" class="hover:text-primary transition-colors">Formações</a>
        <span>/</span>
        <span class="text-slate-650 dark:text-slate-350 truncate max-w-[200px] sm:max-w-none"><?php echo e($training->title); ?></span>
    </nav>

    <!-- Main Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Left: Course Details -->
        <article class="lg:col-span-8">
            <header class="mb-8">
                <!-- Badges -->
                <div class="flex items-center gap-3 mb-4">
                    <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-extrabold uppercase tracking-widest rounded-full">
                        <?php echo e(ucfirst($training->mode)); ?>

                    </span>
                    <?php $__currentLoopData = $training->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="text-xs text-slate-400 font-semibold">
                            #<?php echo e($cat->name); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <h1 class="font-heading font-black text-2xl sm:text-3xl md:text-4xl text-slate-900 dark:text-white tracking-tight leading-tight">
                    <?php echo e($training->title); ?>

                </h1>
                
                <p class="text-slate-500 dark:text-slate-400 mt-4 text-base sm:text-lg italic leading-relaxed">
                    <?php echo e($training->excerpt); ?>

                </p>

                <!-- Fast Info Bar -->
                <div class="mt-6 flex flex-wrap gap-6 items-center text-sm font-semibold text-slate-500 dark:text-slate-400 py-4 border-y border-slate-200/60 dark:border-slate-800">
                    <div class="flex items-center gap-2">
                        <span class="text-slate-400">Instituição:</span>
                        <span class="text-slate-800 dark:text-white"><?php echo e($training->institution); ?></span>
                    </div>
                    <?php if($training->instructor): ?>
                        <div class="flex items-center gap-2">
                            <span class="text-slate-400">Instrutor:</span>
                            <span class="text-slate-800 dark:text-white"><?php echo e($training->instructor); ?></span>
                        </div>
                    <?php endif; ?>
                    <div class="flex items-center gap-2">
                        <span class="text-slate-400">Visualizações:</span>
                        <span class="text-slate-800 dark:text-white"><?php echo e($training->views_count); ?></span>
                    </div>
                </div>
            </header>

            <!-- Course Banner Image -->
            <div class="relative w-full aspect-video rounded-3xl overflow-hidden bg-slate-100 dark:bg-slate-800 shadow-sm mb-10">
                <img src="<?php echo e($training->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800'); ?>" 
                     alt="<?php echo e($training->title); ?>" 
                     class="w-full h-full object-cover" />
            </div>

            <!-- Description Body -->
            <div class="prose prose-slate dark:prose-invert max-w-none text-slate-650 dark:text-slate-350 leading-relaxed space-y-6">
                <?php echo nl2br(e($training->description)); ?>

            </div>

            <!-- Poly tags if exist -->
            <?php if(count($training->tags) > 0): ?>
                <div class="mt-12 pt-6 border-t border-slate-200/60 dark:border-slate-800 flex flex-wrap gap-2 items-center">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mr-2">Tags:</span>
                    <?php $__currentLoopData = $training->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/search?q=<?php echo e(urlencode($tag->name)); ?>" class="px-3 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white dark:hover:bg-primary transition-all text-xs font-semibold rounded-lg text-slate-600 dark:text-slate-400">
                            <?php echo e($tag->name); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <!-- Related Courses / Trainings -->
            <?php if(count($relatedTrainings) > 0): ?>
                <section class="mt-16 pt-10 border-t border-slate-200/60 dark:border-slate-800">
                    <div class="flex items-center gap-3 mb-8">
                        <span class="w-3.5 h-3.5 bg-primary rounded-xs"></span>
                        <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white uppercase tracking-tight">Formações Relacionadas</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__currentLoopData = $relatedTrainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200/60 dark:border-slate-800 shadow-xs hover:shadow-md transition-all duration-300 flex flex-col overflow-hidden group">
                                <a href="<?php echo e(route('trainings.show', $related->slug)); ?>" class="block aspect-video bg-slate-100 overflow-hidden shrink-0">
                                    <img src="<?php echo e($related->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=400'); ?>" 
                                         class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500" />
                                </a>
                                <div class="p-4 flex-grow flex flex-col justify-between">
                                    <h4 class="font-heading font-bold text-sm text-slate-900 dark:text-white group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                        <a href="<?php echo e(route('trainings.show', $related->slug)); ?>"><?php echo e($related->title); ?></a>
                                    </h4>
                                    <span class="text-[10px] font-bold text-slate-450 mt-2 block"><?php echo e($related->institution); ?></span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            <?php endif; ?>
        </article>

        <!-- Right: Action Panel Sidebar -->
        <aside class="lg:col-span-4 space-y-8">
            <!-- Glass Box for registration info -->
            <div class="bg-slate-50 dark:bg-slate-900/80 border border-slate-200/60 dark:border-slate-800 rounded-3xl p-6 shadow-sm sticky top-28">
                <div class="mb-6">
                    <span class="text-xs font-bold text-slate-450 block uppercase tracking-wide">Investimento</span>
                    <span class="text-2xl font-heading font-black text-slate-900 dark:text-white mt-1 block">
                        <?php if($training->price > 0): ?>
                            <?php echo e(number_format($training->price, 2, ',', '.')); ?> AOA
                        <?php else: ?>
                            Gratuito
                        <?php endif; ?>
                    </span>
                </div>

                <!-- Registration action button -->
                <?php if($training->registration_link): ?>
                    <a href="<?php echo e($training->registration_link); ?>" target="_blank" class="w-full inline-flex items-center justify-center py-3 px-6 bg-primary hover:bg-primary/95 text-white text-sm font-bold uppercase tracking-wider rounded-2xl shadow-md transition-all hover:shadow-lg text-center mb-6">
                        Inscrever-se Agora
                    </a>
                <?php else: ?>
                    <button disabled class="w-full py-3 px-6 bg-slate-300 dark:bg-slate-800 text-slate-500 dark:text-slate-450 text-sm font-bold uppercase tracking-wider rounded-2xl cursor-not-allowed text-center mb-6">
                        Inscrições Fechadas
                    </button>
                <?php endif; ?>

                <!-- Course Meta List -->
                <ul class="space-y-4 text-xs font-semibold text-slate-500 dark:text-slate-400">
                    <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                        <span class="text-slate-400 font-bold uppercase">Duração</span>
                        <span><?php echo e($training->duration); ?></span>
                    </li>
                    <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                        <span class="text-slate-400 font-bold uppercase">Modalidade</span>
                        <span><?php echo e(ucfirst($training->mode)); ?></span>
                    </li>
                    <?php if($training->location): ?>
                        <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                            <span class="text-slate-400 font-bold uppercase">Localização</span>
                            <span class="text-right max-w-[150px] truncate" title="<?php echo e($training->location); ?>"><?php echo e($training->location); ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if($training->start_date): ?>
                        <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                            <span class="text-slate-400 font-bold uppercase">Data de Início</span>
                            <span><?php echo e($training->start_date->format('d/m/Y')); ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if($training->end_date): ?>
                        <li class="flex items-center justify-between pb-3 border-b border-slate-200/50 dark:border-slate-800">
                            <span class="text-slate-400 font-bold uppercase">Data de Fim</span>
                            <span><?php echo e($training->end_date->format('d/m/Y')); ?></span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </aside>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/trainings/show.blade.php ENDPATH**/ ?>