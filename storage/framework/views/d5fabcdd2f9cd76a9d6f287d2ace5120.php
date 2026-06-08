<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['paths' => []]));

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

foreach (array_filter((['paths' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<nav aria-label="Breadcrumb" <?php echo e($attributes->merge(['class' => 'flex py-3 text-slate-500 dark:text-slate-450 text-xs sm:text-sm font-semibold font-heading'])); ?>>
    <ol class="inline-flex items-center space-x-1.5 md:space-x-2">
        <!-- Root: Home -->
        <li class="inline-flex items-center">
            <a href="/" class="inline-flex items-center text-slate-400 hover:text-primary dark:text-slate-500 dark:hover:text-white transition-colors">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h3m-6 0a1 1 0 001-1v-4a1 1 0 00-1-1h-3a1 1 0 00-1 1v4a1 1 0 001 1m6 0h-6" />
                </svg>
                Home
            </a>
        </li>

        <!-- Loop paths -->
        <?php $__currentLoopData = $paths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $isLast = $index === count($paths) - 1;
            ?>
            <li class="flex items-center">
                <!-- Divider Arrow -->
                <svg class="w-4 h-4 text-slate-350 dark:text-slate-700 mx-1 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
                </svg>
                
                <?php if($isLast): ?>
                    <span class="text-slate-800 dark:text-slate-300 font-bold max-w-[200px] truncate select-none" aria-current="page">
                        <?php echo e($path['name']); ?>

                    </span>
                <?php else: ?>
                    <a href="<?php echo e($path['url']); ?>" class="text-slate-400 hover:text-primary dark:text-slate-500 dark:hover:text-white transition-colors truncate max-w-[150px]">
                        <?php echo e($path['name']); ?>

                    </a>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>
</nav>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/breadcrumb.blade.php ENDPATH**/ ?>