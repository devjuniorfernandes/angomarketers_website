<?php
// Fetch featured articles, events, and trainings for the header dropdowns
$headerArticles = \App\Domain\Articles\Models\Article::published()
    ->with('category')
    ->where('featured', true)
    ->latest('published_at')
    ->take(3)
    ->get();

if ($headerArticles->isEmpty()) {
    $headerArticles = \App\Domain\Articles\Models\Article::published()
        ->with('category')
        ->latest('published_at')
        ->take(3)
        ->get();
}

$headerEvents = \App\Domain\Events\Models\Event::published()
    ->latest('event_date')
    ->take(3)
    ->get();

$headerTrainings = \App\Domain\Trainings\Models\Training::published()
    ->latest('start_date')
    ->take(3)
    ->get();

// Dynamic Menu Items from Database
$dynamicMenuItems = \App\Domain\Core\Models\MenuItem::whereNull('parent_id')
    ->with(['children' => function ($q) {
        $q->orderBy('order', 'asc');
    }])
    ->orderBy('order', 'asc')
    ->get();

$navItems = [];
if ($dynamicMenuItems->isEmpty()) {
    $navItems = [
        ['title' => 'Notícias', 'url' => '/noticias', 'key' => 'news', 'children' => collect()],
        ['title' => 'Formações', 'url' => '/formacoes', 'key' => 'trainings', 'children' => collect()],
        ['title' => 'Eventos', 'url' => '/eventos', 'key' => 'events', 'children' => collect()],
    ];
} else {
    foreach ($dynamicMenuItems as $item) {
        $titleLower = strtolower($item->title);
        $urlLower = strtolower($item->url);
        $key = null;
        if (str_contains($titleLower, 'notíc') || str_contains($titleLower, 'news') || str_contains($urlLower, 'news') || str_contains($urlLower, 'notic')) {
            $key = 'news';
        } elseif (str_contains($titleLower, 'formaç') || str_contains($titleLower, 'train') || str_contains($urlLower, 'train') || str_contains($urlLower, 'formac')) {
            $key = 'trainings';
        } elseif (str_contains($titleLower, 'event') || str_contains($urlLower, 'event')) {
            $key = 'events';
        }
        
        $navItems[] = [
            'title' => $item->title,
            'url' => $item->url,
            'key' => $key,
            'children' => $item->children,
        ];
    }
}

// Fetch social URLs settings
$facebookUrl = \App\Domain\Core\Models\Setting::get('system_facebook_url', '#');
$instagramUrl = \App\Domain\Core\Models\Setting::get('system_instagram_url', '#');
$linkedinUrl = \App\Domain\Core\Models\Setting::get('system_linkedin_url', '#');
$whatsappNumber = \App\Domain\Core\Models\Setting::get('system_contact_whatsapp', '+244923000000');

// Fetch latest breaking news from database
$latestArticlesForTicker = \App\Domain\Articles\Models\Article::published()
    ->with(['category'])
    ->latest('published_at')
    ->take(5)
    ->get();

$tickerItems = [];
if ($latestArticlesForTicker->isNotEmpty()) {
    foreach ($latestArticlesForTicker as $art) {
        $tickerItems[] = [
            'category_name' => $art->category ? mb_strtoupper($art->category->name) : 'NOTÍCIA',
            'title' => $art->title,
            'url' => route('article', $art->slug),
        ];
    }
} else {
    $tickerItems = [
        [
            'category_name' => 'EXCLUSIVO',
            'title' => 'Startup angolana atrai investimento internacional de $500k.',
            'url' => '#',
        ],
        [
            'category_name' => 'TECNOLOGIA',
            'title' => 'Angola Telecom expande rede de fibra óptica nas províncias do sul.',
            'url' => '#',
        ],
        [
            'category_name' => 'IA',
            'title' => 'Inteligência Artificial revoluciona o marketing em Luanda.',
            'url' => '#',
        ],
        [
            'category_name' => 'NEGÓCIOS',
            'title' => 'Fórum de Empreendedorismo de Angola reúne mais de 100 startups.',
            'url' => '#',
        ],
    ];
}
?>

<header x-data="{ 
            scrolled: false, 
            activeMenu: null,
            mobileMenuOpen: false
        }" 
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 40 })"
        class="fixed top-0 inset-x-0 z-40 transition-all duration-300">
        
    <!-- TOP BAR (Hides on scroll for reading focus) -->
    <div :class="scrolled ? 'h-0 -translate-y-full opacity-0' : 'h-10 opacity-100'" 
         class="bg-secondary text-white text-xs flex items-center border-b border-slate-800 transition-all duration-300 overflow-hidden px-4 md:px-8">
        
        <!-- Breaking News Label -->
        <div class="flex items-center gap-1.5 shrink-0 bg-primary px-3 py-1 font-bold tracking-wider uppercase text-[10px] rounded-sm mr-4 animate-pulse-slow">
            <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
            Últimas
        </div>

        <!-- News Ticker -->
        <div class="flex-grow overflow-hidden relative h-5">
            <div class="absolute inset-0 flex items-center whitespace-nowrap gap-12 animate-[marquee_25s_linear_infinite] hover:[animation-play-state:paused]">
                <?php $__currentLoopData = array_merge($tickerItems, $tickerItems); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e($item['url']); ?>" class="text-slate-300 font-medium hover:text-primary transition-colors cursor-pointer">
                        <span class="text-slate-200 font-bold"><?php echo e($item['category_name']); ?>:</span> <?php echo e($item['title']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Social Icons + Newsletter Link (Desktop) -->
        <div class="hidden md:flex items-center gap-4 shrink-0 pl-4 border-l border-slate-800">
            <div class="flex items-center gap-3">
                <a href="<?php echo e($facebookUrl); ?>" target="_blank" class="text-slate-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="<?php echo e($instagramUrl); ?>" target="_blank" class="text-slate-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="<?php echo e($linkedinUrl); ?>" target="_blank" class="text-slate-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
            </div>
            <a href="<?php echo e(route('home')); ?>#newsletter-form" class="bg-slate-800 hover:bg-slate-700 text-[10px] font-bold tracking-wider uppercase py-1 px-3.5 rounded border border-slate-700 transition-colors">
                Newsletter
            </a>
        </div>
    </div>

    <!-- MAIN NAVBAR (Becomes sticky at the top on scroll) -->
    <nav :class="scrolled ? 'bg-white/95 dark:bg-slate-950/95 shadow-md border-b border-slate-200/80 dark:border-slate-800/85 backdrop-blur-md py-3.5' : 'bg-white dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 py-5'" 
         class="transition-all duration-300 px-4 md:px-8"
         x-on:mouseleave="activeMenu = null">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="/" class="flex items-center gap-2">
                <span class="font-heading font-black text-2xl tracking-tighter text-slate-900 dark:text-white flex items-center">
                    ANGO<span class="text-primary font-extrabold">MARKETERS</span>
                </span>
            </a>

            <!-- Desktop Primary Navigation Links -->
            <ul class="hidden lg:flex items-center gap-8 xl:gap-10 font-heading text-sm font-bold text-slate-700 dark:text-slate-300">
                <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item['key']): ?>
                        <li class="relative" 
                            x-on:mouseenter="activeMenu = '<?php echo e($item['key']); ?>'">
                            <a href="<?php echo e($item['url']); ?>" 
                               class="flex items-center gap-1.5 py-2 hover:text-primary transition-colors uppercase tracking-wider"
                               :class="activeMenu === '<?php echo e($item['key']); ?>' ? 'text-primary' : ''">
                                <?php echo e($item['title']); ?>

                                <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="activeMenu === '<?php echo e($item['key']); ?>' ? 'rotate-180 text-primary' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="relative" 
                            x-data="{ open: false }"
                            x-on:mouseenter="open = true"
                            x-on:mouseleave="open = false">
                            <a href="<?php echo e($item['url']); ?>" 
                               class="flex items-center gap-1.5 py-2 hover:text-primary transition-colors uppercase tracking-wider">
                                <?php echo e($item['title']); ?>

                                <?php if(count($item['children']) > 0): ?>
                                    <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180 text-primary' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                    </svg>
                                <?php endif; ?>
                            </a>
                            <?php if(count($item['children']) > 0): ?>
                                <!-- General Dropdown (Glassmorphic) -->
                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="opacity-100 scale-100"
                                     x-transition:leave-end="opacity-0 scale-95"
                                     class="absolute left-0 mt-1 w-48 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-xl py-2 z-50 rounded-lg">
                                    <?php $__currentLoopData = $item['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e($child->url); ?>" class="block px-4 py-2 text-xs font-semibold text-slate-700 dark:text-slate-350 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-primary transition-colors">
                                            <?php echo e($child->title); ?>

                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <!-- Header Action Items (Right) -->
            <div class="flex items-center gap-2.5 sm:gap-4 text-slate-600 dark:text-slate-400">
                <!-- Search Button -->
                <button x-on:click="searchOpen = true" 
                        class="p-2.5 hover:bg-slate-100 dark:hover:bg-slate-900 hover:text-slate-900 dark:hover:text-white rounded-full transition-all duration-200"
                        title="Pesquisar">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>



                <!-- Subscribe Button (Desktop) -->
                <a href="<?php echo e(route('home')); ?>#newsletter-form" class="hidden sm:inline-flex items-center justify-center px-5 py-2.5 bg-primary hover:bg-primary/90 text-white text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-300 shadow-sm hover:shadow-lg">
                    Subscrever
                </a>

                <!-- Mobile Menu Button (Hamburger) -->
                <button x-on:click="mobileMenuOpen = true" 
                        class="lg:hidden p-2.5 hover:bg-slate-100 dark:hover:bg-slate-900 rounded-full text-slate-800 dark:text-white transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- NOTÍCIAS MEGA MENU -->
        <div x-show="activeMenu === 'news'" 
             x-on:mouseenter="activeMenu = 'news'" 
             x-on:mouseleave="activeMenu = null"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="hidden lg:block absolute left-0 right-0 mt-5 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 shadow-2xl p-8"
             style="display: none;">
            <div class="max-w-7xl mx-auto grid grid-cols-12 gap-8">
                <!-- Mega Menu Links -->
                <div class="col-span-3">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Secções Populares</h4>
                    <ul class="space-y-3 font-heading text-sm font-semibold">
                        <?php $__currentLoopData = \App\Domain\Categories\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('category', $cat->slug)); ?>" class="text-slate-800 dark:text-slate-200 hover:text-primary transition-colors flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 bg-primary rounded-full"></span> <?php echo e($cat->name); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <!-- Featured News Dropdown -->
                <div class="col-span-9 grid grid-cols-3 gap-6 border-l border-slate-100 dark:border-slate-800 pl-8">
                    <?php $__currentLoopData = $headerArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('article', $art->slug)); ?>" class="group flex flex-col justify-between h-full">
                            <div>
                                <div class="aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden mb-3 relative">
                                    <img src="<?php echo e($art->image_path ?: 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=400'); ?>" 
                                         class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500" 
                                         onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');" />
                                    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 hidden flex items-center justify-center"></div>
                                </div>
                                <span class="text-[9px] font-black uppercase text-primary tracking-widest"><?php echo e($art->category->name ?? 'Geral'); ?></span>
                                <h5 class="font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors text-sm line-clamp-2 mt-1 leading-snug">
                                    <?php echo e($art->title); ?>

                                </h5>
                            </div>
                            <span class="text-[10px] text-slate-450 dark:text-slate-500 mt-2 block"><?php echo e($art->published_at ? $art->published_at->format('d/m/Y') : ''); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- FORMAÇÕES MEGA MENU -->
        <div x-show="activeMenu === 'trainings'" 
             x-on:mouseenter="activeMenu = 'trainings'" 
             x-on:mouseleave="activeMenu = null"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="hidden lg:block absolute left-0 right-0 mt-5 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 shadow-2xl p-8"
             style="display: none;">
            <div class="max-w-7xl mx-auto grid grid-cols-12 gap-8">
                <!-- Mega Menu Links -->
                <div class="col-span-3">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Modalidades</h4>
                    <ul class="space-y-3 font-heading text-sm font-semibold">
                        <li><a href="/formacoes?modalidade=online" class="text-slate-800 dark:text-slate-200 hover:text-primary transition-colors flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Cursos Online</a></li>
                        <li><a href="/formacoes?modalidade=presencial" class="text-slate-800 dark:text-slate-200 hover:text-primary transition-colors flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Cursos Presenciais</a></li>
                        <li><a href="/formacoes?modalidade=hibrido" class="text-slate-800 dark:text-slate-200 hover:text-primary transition-colors flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Cursos Híbridos</a></li>
                    </ul>
                </div>

                <!-- Featured Trainings Dropdown -->
                <div class="col-span-9 grid grid-cols-3 gap-6 border-l border-slate-100 dark:border-slate-800 pl-8">
                    <?php $__currentLoopData = $headerTrainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('trainings.show', $tr->slug)); ?>" class="group flex flex-col justify-between h-full">
                            <div>
                                <div class="aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden mb-3 relative">
                                    <img src="<?php echo e($tr->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=400'); ?>" 
                                         class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500" 
                                         onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');" />
                                    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 hidden flex items-center justify-center"></div>
                                    <span class="absolute top-2 left-2 bg-slate-900/80 text-white text-[8px] font-black uppercase tracking-wider px-2 py-0.5"><?php echo e($tr->mode); ?></span>
                                </div>
                                <span class="text-[9px] font-black uppercase text-slate-400 tracking-widest block"><?php echo e($tr->institution); ?></span>
                                <h5 class="font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors text-sm line-clamp-2 mt-1 leading-snug">
                                    <?php echo e($tr->title); ?>

                                </h5>
                            </div>
                            <span class="text-[10px] text-primary font-bold mt-2 block"><?php echo e($tr->price > 0 ? number_format($tr->price, 2, ',', '.') . ' AOA' : 'Gratuito'); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <!-- EVENTOS MEGA MENU -->
        <div x-show="activeMenu === 'events'" 
             x-on:mouseenter="activeMenu = 'events'" 
             x-on:mouseleave="activeMenu = null"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="hidden lg:block absolute left-0 right-0 mt-5 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 shadow-2xl p-8"
             style="display: none;">
            <div class="max-w-7xl mx-auto grid grid-cols-12 gap-8">
                <!-- Mega Menu Links -->
                <div class="col-span-3">
                    <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4">Secção</h4>
                    <ul class="space-y-3 font-heading text-sm font-semibold">
                        <li><a href="/eventos" class="text-slate-800 dark:text-slate-200 hover:text-primary transition-colors flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Próximos Eventos</a></li>
                        <li><a href="/eventos" class="text-slate-800 dark:text-slate-200 hover:text-primary transition-colors flex items-center gap-1.5"><span class="w-1.5 h-1.5 bg-primary rounded-full"></span> Todos os Eventos</a></li>
                    </ul>
                </div>

                <!-- Featured Events Dropdown -->
                <div class="col-span-9 grid grid-cols-3 gap-6 border-l border-slate-100 dark:border-slate-800 pl-8">
                    <?php $__currentLoopData = $headerEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('events.show', $evt->slug)); ?>" class="group flex flex-col justify-between h-full">
                            <div>
                                <div class="aspect-video bg-slate-100 dark:bg-slate-800 overflow-hidden mb-3 relative">
                                    <img src="<?php echo e($evt->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=400'); ?>" 
                                         class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500" 
                                         onerror="this.style.display='none'; this.nextElementSibling.classList.remove('hidden');" />
                                    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-950 to-slate-900 hidden flex items-center justify-center"></div>
                                </div>
                                <span class="text-[9px] font-black uppercase text-primary tracking-widest block"><?php echo e($evt->location); ?></span>
                                <h5 class="font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors text-sm line-clamp-2 mt-1 leading-snug">
                                    <?php echo e($evt->title); ?>

                                </h5>
                            </div>
                            <span class="text-[10px] text-slate-450 dark:text-slate-500 mt-2 block"><?php echo e($evt->event_date ? $evt->event_date->format('d/m/Y H:i') : ''); ?></span>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- MOBILE NAVIGATION SIDEBAR / DRAWER -->
    <div x-show="mobileMenuOpen" 
         class="fixed inset-0 z-50 lg:hidden" 
         style="display: none;"
         role="dialog" 
         aria-modal="true">
        <!-- Drawer Backdrop -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-950/70 backdrop-blur-xs"
             x-on:click="mobileMenuOpen = false"></div>

        <!-- Drawer Content -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-200 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="fixed top-0 bottom-0 left-0 w-full max-w-xs bg-white dark:bg-slate-900 shadow-2xl overflow-y-auto flex flex-col p-6 border-r border-slate-200 dark:border-slate-800">
            
            <!-- Drawer Header -->
            <div class="flex items-center justify-between pb-6 border-b border-slate-100 dark:border-slate-800">
                <a href="/" class="font-heading font-black text-xl tracking-tighter text-slate-900 dark:text-white">
                    ANGO<span class="text-primary">MARKETERS</span>
                </a>
                <button x-on:click="mobileMenuOpen = false" class="p-2 rounded-full hover:bg-slate-100 dark:hover:bg-slate-850 text-slate-500 dark:text-slate-400">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Search in Mobile Menu -->
            <div class="my-6">
                <form action="/search" method="GET" class="relative">
                    <input type="text" name="q" placeholder="Pesquisar..." 
                           class="w-full pl-10 pr-4 py-2 text-sm bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl focus:ring-1 focus:ring-primary focus:outline-none dark:text-white">
                    <svg class="absolute left-3.5 top-3 w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </form>
            </div>

            <!-- Drawer Links -->
            <ul class="space-y-4 font-heading text-base font-bold text-slate-850 dark:text-slate-200">
                <?php $__currentLoopData = $navItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li x-data="{ open: false }">
                        <div class="flex items-center justify-between">
                            <a href="<?php echo e($item['url']); ?>" x-on:click="mobileMenuOpen = false" class="block py-1 hover:text-primary transition-colors uppercase tracking-wider">
                                <?php echo e($item['title']); ?>

                            </a>
                            <?php if(count($item['children']) > 0): ?>
                                <button x-on:click="open = !open" class="p-1 text-slate-400 focus:outline-none">
                                    <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                            <?php endif; ?>
                        </div>
                        <?php if(count($item['children']) > 0): ?>
                            <ul x-show="open" class="pl-4 mt-2 space-y-2 font-normal text-sm border-l border-slate-100 dark:border-slate-800">
                                <?php $__currentLoopData = $item['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="<?php echo e($child->url); ?>" x-on:click="mobileMenuOpen = false" class="block py-1 text-slate-600 dark:text-slate-400 hover:text-primary">
                                            <?php echo e($child->title); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

            <!-- Drawer Footer Action -->
            <div class="mt-auto pt-8 border-t border-slate-100 dark:border-slate-800">
                <a href="<?php echo e(route('home')); ?>#newsletter-form" x-on:click="mobileMenuOpen = false" class="w-full inline-flex items-center justify-center px-4 py-3 bg-primary text-white text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-200 shadow-sm">
                    Subscrever Newsletter
                </a>
                
                <div class="flex items-center justify-center gap-6 mt-6 text-slate-400">
                    <a href="#" class="hover:text-primary transition-colors">Facebook</a>
                    <a href="#" class="hover:text-primary transition-colors">Twitter</a>
                    <a href="#" class="hover:text-primary transition-colors">LinkedIn</a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- CSS Marquee Animation for Breaking News Ticker -->
<style>
@keyframes marquee {
    0% { transform: translate3d(0, 0, 0); }
    100% { transform: translate3d(-50%, 0, 0); }
}
</style>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/header.blade.php ENDPATH**/ ?>