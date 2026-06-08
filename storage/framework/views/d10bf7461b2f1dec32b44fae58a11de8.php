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
$category = $article->category->name ?? 'Destaque';
$title = $article->title ?? 'Título Destaque';
$excerpt = $article->subtitle ?? '';
$image = $article->image_path ?? 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200';
$author = $article->author->name ?? 'Redator Principal';
$authorAvatar = $article->author->avatar_path ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=100';
$date = $article->published_at ? $article->published_at->format('d M Y') : ($article->created_at ? $article->created_at->format('d M Y') : 'Junho 4, 2026');
$readingTime = $article->reading_time ?? '6 min';
?>

<article <?php echo e($attributes->merge(['class' => 'group overflow-hidden rounded-none border border-slate-200/80 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-none transition-all duration-300'])); ?>>
    <div class="grid grid-cols-1 lg:grid-cols-12">
        <!-- Image block -->
        <a href="/article/<?php echo e($slug); ?>" class="lg:col-span-7 relative block overflow-hidden min-h-[300px] lg:min-h-[420px] bg-slate-905">
            <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-103 transition-transform duration-700 ease-out" />
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/20 to-transparent"></div>
        </a>

        <!-- Content block -->
        <div class="lg:col-span-5 flex flex-col justify-center p-6 sm:p-8 lg:p-10">
            <div>
                <!-- Category Tag and Reading time -->
                <div class="flex items-center gap-3 mb-4">
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
                    <span class="text-xs text-slate-400 dark:text-slate-500 font-semibold uppercase tracking-wider"><?php echo e($readingTime); ?> leitura</span>
                </div>

                <!-- Big Title -->
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white leading-tight group-hover:text-primary transition-colors duration-200 mb-4">
                    <a href="/article/<?php echo e($slug); ?>">
                        <?php echo e($title); ?>

                    </a>
                </h2>

                <!-- Excerpt -->
                <?php if($excerpt): ?>
                    <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6">
                        <?php echo e($excerpt); ?>

                    </p>
                <?php endif; ?>
            </div>

            <!-- Author metadata block -->
            <div class="flex items-center gap-3.5 mt-auto pt-6 border-t border-slate-100 dark:border-slate-800">
                <a href="/author/<?php echo e(Str::slug($author)); ?>" class="relative shrink-0 w-10 h-10 rounded-none overflow-hidden border border-slate-200 dark:border-slate-700">
                    <img src="<?php echo e($authorAvatar); ?>" alt="<?php echo e($author); ?>" class="w-full h-full object-cover" />
                </a>
                <div>
                    <h4 class="text-sm font-bold text-slate-900 dark:text-white">
                        <a href="/author/<?php echo e(Str::slug($author)); ?>" class="hover:text-primary transition-colors">
                            <?php echo e($author); ?>

                        </a>
                    </h4>
                    <div class="flex items-center gap-1.5 text-xs text-slate-400 dark:text-slate-500 mt-0.5 font-semibold">
                        <time datetime="<?php echo e($date); ?>"><?php echo e($date); ?></time>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/featured-card.blade.php ENDPATH**/ ?>