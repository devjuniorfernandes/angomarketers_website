<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['articles']));

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

foreach (array_filter((['articles']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<div <?php echo e($attributes->merge(['class' => 'flex flex-col'])); ?>>
    <!-- Header -->
    <div class="flex items-center gap-2 pb-4 mb-5 border-b border-slate-200 dark:border-slate-800">
        <span class="w-2.5 h-2.5 bg-primary rounded-none"></span>
        <h3 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900 dark:text-white">Mais Lidos</h3>
    </div>

    <!-- Ranked List -->
    <div class="space-y-5">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $rankNum = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            $slug = $item->slug ?? 'slug-default';
            $title = $item->title ?? 'Título';
            $category = $item->category->name ?? 'Geral';
            ?>
            <article class="flex items-start gap-4 group">
                <!-- Large Ranking Number -->
                <span class="font-heading font-black text-3xl sm:text-4xl text-slate-200 dark:text-slate-800/80 group-hover:text-primary transition-colors shrink-0 select-none">
                    <?php echo e($rankNum); ?>

                </span>
                
                <!-- Headline Details -->
                <div>
                    <!-- Mini category link -->
                    <span class="text-[9px] font-extrabold uppercase tracking-widest text-primary mb-1 block"><?php echo e($category); ?></span>
                    <!-- Title -->
                    <h4 class="text-sm font-bold text-slate-850 dark:text-slate-200 group-hover:text-primary transition-colors leading-snug line-clamp-2">
                        <a href="/article/<?php echo e($slug); ?>">
                            <?php echo e($title); ?>

                        </a>
                    </h4>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/trending.blade.php ENDPATH**/ ?>