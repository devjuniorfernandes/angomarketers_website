<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['trendingArticles' => [], 'upcomingEvents' => []]));

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

foreach (array_filter((['trendingArticles' => [], 'upcomingEvents' => []]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<aside class="space-y-10">
    <!-- Trending Component -->
    <?php if(count($trendingArticles) > 0): ?>
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
    <?php endif; ?>

    <!-- Upcoming Events Widget -->
    <?php if(count($upcomingEvents) > 0): ?>
        <div>
            <div class="flex items-center gap-2 pb-4 mb-5 border-b border-slate-200 dark:border-slate-800">
                <span class="w-2.5 h-2.5 bg-primary rounded-full"></span>
                <h3 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900 dark:text-white">Próximos Eventos</h3>
            </div>
            <div class="space-y-4">
                <?php $__currentLoopData = $upcomingEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upEvent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex gap-3 items-start group">
                        <!-- Date Badge -->
                        <div class="w-10 h-11 bg-primary/10 rounded-lg flex flex-col items-center justify-center text-primary shrink-0">
                            <span class="text-[11px] font-black leading-none"><?php echo e($upEvent->event_date->format('d')); ?></span>
                            <span class="text-[8px] font-extrabold uppercase leading-none mt-0.5"><?php echo e($upEvent->event_date->format('M')); ?></span>
                        </div>
                        <div class="min-w-0">
                            <h4 class="text-xs font-bold text-slate-850 dark:text-slate-250 group-hover:text-primary transition-colors leading-snug line-clamp-2">
                                <a href="<?php echo e(route('events.show', $upEvent->slug)); ?>"><?php echo e($upEvent->title); ?></a>
                            </h4>
                            <span class="text-[9px] text-slate-400 font-medium block mt-0.5 truncate"><?php echo e($upEvent->location); ?></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Compact Newsletter Box -->
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

    <!-- Popular Tags Widget -->
    <div>
        <div class="flex items-center gap-2 pb-4 mb-5 border-b border-slate-200 dark:border-slate-800">
            <span class="w-2.5 h-2.5 bg-primary rounded-full"></span>
            <h3 class="font-heading font-black text-sm uppercase tracking-wider text-slate-900 dark:text-white">Tags Populares</h3>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="/search?q=Luanda" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#luanda</a>
            <a href="/search?q=Fintech" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#fintech</a>
            <a href="/search?q=Inovacao" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#inovacao</a>
            <a href="/search?q=Marketing" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#marketing</a>
            <a href="/search?q=IA" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#ia</a>
            <a href="/search?q=Banca" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#banca</a>
            <a href="/search?q=Angola" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-900/60 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-800 text-xs rounded-xl text-slate-600 dark:text-slate-400 transition-all duration-200">#angola</a>
        </div>
    </div>
</aside>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/sidebar.blade.php ENDPATH**/ ?>