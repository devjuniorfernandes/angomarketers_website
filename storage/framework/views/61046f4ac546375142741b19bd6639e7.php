<?php $__env->startSection('title', 'AngoMarketers | ' . ($categoryName ?? 'Editorial')); ?>

<?php $__env->startSection('content'); ?>

<?php
$paths = [
    ['name' => $categoryName, 'url' => '/category/' . $category->slug]
];

// Extract featured and list articles from paginated list
$featuredArticle = $articles->first();
$categoryArticles = $articles->slice(1);
?>

<!-- Section 1: Breadcrumb & Category Hero -->
<div class="bg-light-gray dark:bg-slate-900/10 border-b border-slate-100 dark:border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-8 md:py-12">
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
        
        <div class="mt-4 max-w-3xl">
            <h1 class="font-heading font-black text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-white leading-tight">
                <?php echo e($categoryName); ?>

            </h1>
            <?php if($category->description): ?>
                <p class="mt-3 text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed">
                    <?php echo e($category->description); ?>

                </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Section 2: Main Layout Grid with Sidebar -->
<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        
        <!-- Category Articles Column (70% - 8 Cols) -->
        <div class="lg:col-span-8 space-y-10">
            <?php if($featuredArticle): ?>
                <!-- Premium Wide Featured Story -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-4 select-none">História de Destaque</h3>
                    <?php if (isset($component)) { $__componentOriginal8478432e61b79a2accd52008408b472d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8478432e61b79a2accd52008408b472d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.featured-card','data' => ['article' => $featuredArticle]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('featured-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['article' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($featuredArticle)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8478432e61b79a2accd52008408b472d)): ?>
<?php $attributes = $__attributesOriginal8478432e61b79a2accd52008408b472d; ?>
<?php unset($__attributesOriginal8478432e61b79a2accd52008408b472d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8478432e61b79a2accd52008408b472d)): ?>
<?php $component = $__componentOriginal8478432e61b79a2accd52008408b472d; ?>
<?php unset($__componentOriginal8478432e61b79a2accd52008408b472d); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if(count($categoryArticles) > 0): ?>
                <!-- Articles Grid listing -->
                <div>
                    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-6 select-none">Todos os Artigos</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                        <?php $__currentLoopData = $categoryArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <?php else: ?>
                <?php if(!$featuredArticle): ?>
                    <div class="py-12 text-center text-slate-400">
                        Nenhum artigo publicado nesta categoria atualmente.
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!-- Pagination section -->
            <?php if($articles->hasPages()): ?>
                <div class="border-t border-slate-200 dark:border-slate-800 pt-8">
                    <?php echo e($articles->links()); ?>

                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar Column (30% - 4 Cols) -->
        <div class="lg:col-span-4">
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

<!-- Extra newsletter bottom block -->
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/category.blade.php ENDPATH**/ ?>