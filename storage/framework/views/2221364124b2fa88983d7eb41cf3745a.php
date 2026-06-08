<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['article']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['article']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
$slug = $article->slug ?? 'slug-default';
$category = $article->category->name ?? 'Geral';
$title = $article->title ?? 'Título do Artigo';
$excerpt = $article->subtitle ?? '';
$image = $article->image_path ?? 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800';
$author = $article->author->name ?? 'Redação';
$date = $article->published_at ? $article->published_at->format('d M Y') : ($article->created_at ? $article->created_at->format('d M Y') : 'Jan 1, 2026');
$readingTime = $article->reading_time ?? '4 min';
?>

<article <?php echo e($attributes->merge(['class' => 'group flex flex-col h-full bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800/80 rounded-none overflow-hidden shadow-none hover:-translate-y-1 transition-all duration-300'])); ?>>
    <!-- Image Header -->
    <a href="/article/<?php echo e($slug); ?>" class="relative block overflow-hidden aspect-video bg-slate-905">
        <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy" />
        
        <!-- Hover overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </a>

    <!-- Card Body -->
    <div class="flex flex-col flex-grow p-5 md:p-6">
        <!-- Category & Time -->
        <div class="flex items-center justify-between mb-3.5">
            <?php if (isset($component)) { $__componentOriginald2d7ec366e64c2b13b8c4aa5d881be7e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald2d7ec366e64c2b13b8c4aa5d881be7e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.category-badge','data' => ['category' => $category]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('category-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald2d7ec366e64c2b13b8c4aa5d881be7e)): ?>
<?php $attributes = $__attributesOriginald2d7ec366e64c2b13b8c4aa5d881be7e; ?>
<?php unset($__attributesOriginald2d7ec366e64c2b13b8c4aa5d881be7e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald2d7ec366e64c2b13b8c4aa5d881be7e)): ?>
<?php $component = $__componentOriginald2d7ec366e64c2b13b8c4aa5d881be7e; ?>
<?php unset($__componentOriginald2d7ec366e64c2b13b8c4aa5d881be7e); ?>
<?php endif; ?>
            <span class="text-xs text-slate-400 dark:text-slate-500 font-medium"><?php echo e($readingTime); ?> de leitura</span>
        </div>

        <!-- Title -->
        <h3 class="text-lg md:text-xl font-bold text-slate-900 dark:text-white leading-snug group-hover:text-primary transition-colors line-clamp-2 mb-2.5">
            <a href="/article/<?php echo e($slug); ?>">
                <?php echo e($title); ?>

            </a>
        </h3>

        <!-- Excerpt -->
        <?php if($excerpt): ?>
            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed line-clamp-3 mb-5">
                <?php echo e($excerpt); ?>

            </p>
        <?php endif; ?>

        <!-- Footer / Meta -->
        <div class="flex items-center justify-between mt-auto pt-4 border-t border-slate-100 dark:border-slate-800/60">
            <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">Por <?php echo e($author); ?></span>
            <time class="text-xs text-slate-400 dark:text-slate-500" datetime="<?php echo e($date); ?>"><?php echo e($date); ?></time>
        </div>
    </div>
</article>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/article-card.blade.php ENDPATH**/ ?>