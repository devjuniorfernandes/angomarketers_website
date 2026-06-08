<?php $__env->startSection('title', 'Pesquisa Global | AngoMarketers'); ?>

<?php $__env->startSection('content'); ?>

<?php
$paths = [
    ['name' => 'Pesquisa', 'url' => '#']
];
?>

<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['paths' => $paths]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['paths' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paths)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
    
    <!-- Large Search Input Box Section -->
    <div class="mt-4 max-w-3xl mb-12">
        <h1 class="font-heading font-black text-3xl text-slate-900 dark:text-white mb-6">
            Pesquisar no Portal
        </h1>
        
        <form action="/search" method="GET" class="relative flex items-center">
            <svg class="absolute left-4 w-6 h-6 text-slate-450 dark:text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" name="q" value="<?php echo e($query); ?>" placeholder="Pesquise por notícias, eventos, formações..." required
                   class="w-full pl-12 pr-28 py-4 bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none focus:ring-2 focus:ring-primary focus:outline-none text-slate-800 dark:text-white placeholder-slate-400 font-medium">
            <button type="submit" class="absolute right-2 px-6 py-2 bg-primary hover:bg-primary/95 text-white font-bold text-xs uppercase tracking-wider rounded-none transition-all shadow-sm">
                Buscar
            </button>
        </form>
    </div>

    <!-- Search status information banner -->
    <?php if($query): ?>
        <div class="mb-8 pb-4 border-b border-slate-200 dark:border-slate-800">
            <h2 class="text-lg font-bold text-slate-800 dark:text-slate-200">
                Resultados da pesquisa para <span class="text-primary">"<?php echo e($query); ?>"</span> 
            </h2>
        </div>
    <?php endif; ?>

    <?php
        $totalResults = $articles->count() + $events->count() + $trainings->count();
    ?>

    <?php if($totalResults > 0): ?>
        <!-- Articles Group -->
        <?php if($articles->count() > 0): ?>
            <div class="mb-12">
                <div class="flex items-center gap-2 mb-6 border-b border-slate-100 dark:border-slate-800 pb-3">
                    <span class="w-2.5 h-2.5 bg-primary"></span>
                    <h3 class="font-heading font-black text-lg text-slate-900 dark:text-white uppercase tracking-tight">Notícias e Artigos (<?php echo e($articles->count()); ?>)</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.article-card','data' => ['article' => $article]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('article-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['article' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($article)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15)): ?>
<?php $attributes = $__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15; ?>
<?php unset($__attributesOriginal2ef36d4355cd7834c6b42ce99ba2ff15); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15)): ?>
<?php $component = $__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15; ?>
<?php unset($__componentOriginal2ef36d4355cd7834c6b42ce99ba2ff15); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Events Group -->
        <?php if($events->count() > 0): ?>
            <div class="mb-12">
                <div class="flex items-center gap-2 mb-6 border-b border-slate-100 dark:border-slate-800 pb-3">
                    <span class="w-2.5 h-2.5 bg-primary"></span>
                    <h3 class="font-heading font-black text-lg text-slate-900 dark:text-white uppercase tracking-tight">Eventos (<?php echo e($events->count()); ?>)</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/60 dark:border-slate-800 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col h-full overflow-hidden group">
                            <div class="relative aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden shrink-0">
                                <img src="<?php echo e($event->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=600'); ?>" class="w-full h-full object-cover group-hover:scale-103 transition-all duration-500">
                            </div>
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <span class="text-[10px] font-bold text-primary block uppercase mb-1"><?php echo e($event->location); ?></span>
                                    <h4 class="font-heading font-bold text-base text-slate-900 dark:text-white group-hover:text-primary transition-colors line-clamp-2">
                                        <a href="<?php echo e(route('events.show', $event->slug)); ?>"><?php echo e($event->title); ?></a>
                                    </h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-3 leading-relaxed"><?php echo e($event->description); ?></p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 text-xs font-semibold text-slate-400">
                                    <?php echo e($event->event_date->format('d/m/Y H:i')); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Trainings Group -->
        <?php if($trainings->count() > 0): ?>
            <div class="mb-12">
                <div class="flex items-center gap-2 mb-6 border-b border-slate-100 dark:border-slate-800 pb-3">
                    <span class="w-2.5 h-2.5 bg-primary"></span>
                    <h3 class="font-heading font-black text-lg text-slate-900 dark:text-white uppercase tracking-tight">Formações e Cursos (<?php echo e($trainings->count()); ?>)</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/60 dark:border-slate-800 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col h-full overflow-hidden group">
                            <div class="relative aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden shrink-0">
                                <img src="<?php echo e($training->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=600'); ?>" class="w-full h-full object-cover group-hover:scale-103 transition-all duration-500">
                                <div class="absolute top-4 left-4 bg-slate-900/80 text-white text-[9px] font-black uppercase tracking-wider px-2 py-1 rounded">
                                    <?php echo e(ucfirst($training->mode)); ?>

                                </div>
                            </div>
                            <div class="p-6 flex-grow flex flex-col justify-between">
                                <div>
                                    <span class="text-[10px] font-bold text-slate-400 block uppercase mb-1"><?php echo e($training->institution); ?></span>
                                    <h4 class="font-heading font-bold text-base text-slate-900 dark:text-white group-hover:text-primary transition-colors line-clamp-2">
                                        <a href="<?php echo e(route('trainings.show', $training->slug)); ?>"><?php echo e($training->title); ?></a>
                                    </h4>
                                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-2 line-clamp-3 leading-relaxed"><?php echo e($training->excerpt); ?></p>
                                </div>
                                <div class="mt-4 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-xs font-bold text-slate-800 dark:text-white">
                                    <span><?php echo e($training->duration); ?></span>
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
            </div>
        <?php endif; ?>
    <?php else: ?>
        <!-- Empty State Container -->
        <div class="bg-slate-50 dark:bg-slate-900/60 rounded-none border border-slate-200/60 dark:border-slate-800 p-8 md:p-16 text-center max-w-2xl mx-auto my-6 flex flex-col items-center">
            <!-- Icon -->
            <div class="w-16 h-16 rounded-none bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-450 dark:text-slate-555 mb-6">
                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            
            <h3 class="font-heading font-black text-xl text-slate-900 dark:text-white mb-2">
                <?php if($query): ?>
                    Nenhum Resultado Encontrado
                <?php else: ?>
                    Escreva algo para pesquisar
                <?php endif; ?>
            </h3>
            
            <p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed max-w-md mb-8">
                <?php if($query): ?>
                    Não encontrámos nenhuma notícia, evento ou formação que coincida com a sua pesquisa. Certifique-se de que todas as palavras estão escritas corretamente ou tente outros termos.
                <?php else: ?>
                    Pesquise na nossa base de dados por notícias de marketing, eventos de tecnologia, cursos e formações de negócios ou autores especializados.
                <?php endif; ?>
            </p>

            <!-- Search recommendations -->
            <div class="w-full">
                <h4 class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-3.5 select-none">Termos Recomendados</h4>
                <div class="flex flex-wrap items-center justify-center gap-2">
                    <a href="/search?q=IA" class="px-3.5 py-1.5 bg-white dark:bg-slate-850 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs font-bold rounded-none text-slate-650 dark:text-slate-355 transition-all">IA</a>
                    <a href="/search?q=Marketing" class="px-3.5 py-1.5 bg-white dark:bg-slate-850 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs font-bold rounded-none text-slate-650 dark:text-slate-355 transition-all">Marketing</a>
                    <a href="/search?q=Eventos" class="px-3.5 py-1.5 bg-white dark:bg-slate-850 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs font-bold rounded-none text-slate-650 dark:text-slate-355 transition-all">Eventos</a>
                    <a href="/search?q=Formacao" class="px-3.5 py-1.5 bg-white dark:bg-slate-850 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs font-bold rounded-none text-slate-650 dark:text-slate-355 transition-all">Formação</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php if (isset($component)) { $__componentOriginalcaccc7c159de004e0967afab0e08461c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcaccc7c159de004e0967afab0e08461c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.newsletter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('newsletter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcaccc7c159de004e0967afab0e08461c)): ?>
<?php $attributes = $__attributesOriginalcaccc7c159de004e0967afab0e08461c; ?>
<?php unset($__attributesOriginalcaccc7c159de004e0967afab0e08461c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcaccc7c159de004e0967afab0e08461c)): ?>
<?php $component = $__componentOriginalcaccc7c159de004e0967afab0e08461c; ?>
<?php unset($__componentOriginalcaccc7c159de004e0967afab0e08461c); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/search.blade.php ENDPATH**/ ?>