<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['author']));

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

foreach (array_filter((['author']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
$name = $author['name'] ?? 'Nome do Autor';
$avatar = $author['avatar'] ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=150';
$bio = $author['bio'] ?? 'Jornalista e editor apaixonado por tecnologia e inovação em África.';
$role = $author['role'] ?? 'Editor Sénior';
$social = $author['social'] ?? [];
$slug = Str::slug($name);
?>

<div <?php echo e($attributes->merge(['class' => 'p-6 sm:p-8 bg-slate-50 dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl flex flex-col sm:flex-row items-center sm:items-start gap-5 sm:gap-6 shadow-xs'])); ?>>
    <!-- Avatar image -->
    <a href="/author/<?php echo e($slug); ?>" class="w-18 h-18 sm:w-20 sm:h-20 rounded-full overflow-hidden shrink-0 border-2 border-slate-200 dark:border-slate-800">
        <img src="<?php echo e($avatar); ?>" alt="<?php echo e($name); ?>" class="w-full h-full object-cover" />
    </a>

    <!-- Bio & details -->
    <div class="flex-grow text-center sm:text-left">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 mb-2">
            <div>
                <span class="text-[10px] font-extrabold uppercase tracking-widest text-primary leading-none"><?php echo e($role); ?></span>
                <h4 class="text-lg font-extrabold text-slate-900 dark:text-white mt-1 leading-tight">
                    <a href="/author/<?php echo e($slug); ?>" class="hover:text-primary transition-colors">
                        <?php echo e($name); ?>

                    </a>
                </h4>
            </div>
            
            <!-- Social handles -->
            <div class="flex items-center justify-center gap-2">
                <a href="#" class="p-1.5 bg-white dark:bg-slate-800 rounded-lg hover:text-primary dark:text-slate-400 dark:hover:text-white transition-all shadow-xs border border-slate-100 dark:border-slate-800">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.779-1.75-1.75s.784-1.75 1.75-1.75 1.75.779 1.75 1.75-.784 1.75-1.75 1.75zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
                <a href="#" class="p-1.5 bg-white dark:bg-slate-800 rounded-lg hover:text-primary dark:text-slate-400 dark:hover:text-white transition-all shadow-xs border border-slate-100 dark:border-slate-800">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </a>
            </div>
        </div>

        <p class="text-slate-650 dark:text-slate-400 text-sm leading-relaxed">
            <?php echo e($bio); ?>

        </p>
    </div>
</div>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/author-card.blade.php ENDPATH**/ ?>