<?php $__env->startSection('title', 'Notícias e Artigos de Marketing e Tecnologia em Angola | AngoMarketers'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <!-- Page Header -->
    <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="px-3 py-1 bg-primary/10 text-primary text-xs font-extrabold uppercase tracking-widest rounded-full">Atualidade & Opinião</span>
        <h1 class="font-heading font-black text-3xl sm:text-4xl md:text-5xl text-slate-900 dark:text-white mt-4 tracking-tight leading-tight">
            Notícias de Marketing, Tecnologia e Negócios
        </h1>
        <p class="text-slate-500 dark:text-slate-400 mt-4 text-base sm:text-lg">
            Fique por dentro das últimas novidades do ecossistema corporativo, inovação digital e tendências em Angola.
        </p>
    </div>

    <!-- Main Content Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <!-- Articles Grid -->
        <div class="lg:col-span-8 space-y-8">
            <?php if(count($articles) > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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

                <!-- Pagination Links -->
                <div class="mt-12">
                    <?php echo e($articles->links()); ?>

                </div>
            <?php else: ?>
                <div class="bg-slate-50 dark:bg-slate-900/40 rounded-3xl p-12 text-center border border-dashed border-slate-200 dark:border-slate-800">
                    <p class="text-slate-400 dark:text-slate-500">De momento não temos notícias registadas para esta secção.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar Layout -->
        <aside class="lg:col-span-4 space-y-10">
            <!-- Newsletter Widget -->
            <?php if (isset($component)) { $__componentOriginal254fdc9eb905ef6d44bba8bbecd82cdd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal254fdc9eb905ef6d44bba8bbecd82cdd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.newsletter-box','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('newsletter-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal254fdc9eb905ef6d44bba8bbecd82cdd)): ?>
<?php $attributes = $__attributesOriginal254fdc9eb905ef6d44bba8bbecd82cdd; ?>
<?php unset($__attributesOriginal254fdc9eb905ef6d44bba8bbecd82cdd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal254fdc9eb905ef6d44bba8bbecd82cdd)): ?>
<?php $component = $__componentOriginal254fdc9eb905ef6d44bba8bbecd82cdd; ?>
<?php unset($__componentOriginal254fdc9eb905ef6d44bba8bbecd82cdd); ?>
<?php endif; ?>

            <!-- Trending Articles Component -->
            <?php if (isset($component)) { $__componentOriginal257da9838c710a3ff52d0175f3b01c53 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal257da9838c710a3ff52d0175f3b01c53 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.trending','data' => ['articles' => $trendingArticles]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('trending'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['articles' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trendingArticles)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal257da9838c710a3ff52d0175f3b01c53)): ?>
<?php $attributes = $__attributesOriginal257da9838c710a3ff52d0175f3b01c53; ?>
<?php unset($__attributesOriginal257da9838c710a3ff52d0175f3b01c53); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal257da9838c710a3ff52d0175f3b01c53)): ?>
<?php $component = $__componentOriginal257da9838c710a3ff52d0175f3b01c53; ?>
<?php unset($__componentOriginal257da9838c710a3ff52d0175f3b01c53); ?>
<?php endif; ?>
        </aside>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/news/index.blade.php ENDPATH**/ ?>