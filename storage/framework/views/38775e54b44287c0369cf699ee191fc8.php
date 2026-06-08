<!DOCTYPE html>
<html lang="pt" 
      x-data="{ 
          darkMode: localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
          toggleDarkMode() {
              this.darkMode = !this.darkMode;
              localStorage.setItem('darkMode', this.darkMode);
          },
          sidebarOpen: false
      }" 
      :class="{ 'dark': darkMode }"
      class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo $__env->yieldContent('title', 'AngoMarketers | CMS Dashboard'); ?></title>
    
    <!-- Fonts: Inter & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Inline Script to prevent FOUC in Dark Mode -->
    <script>
        if (localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <!-- Vite Assets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="flex h-screen bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-150 font-sans antialiased overflow-hidden">
    
    <!-- Off-canvas sidebar for mobile devices -->
    <div x-show="sidebarOpen" class="relative z-55 md:hidden" style="display: none;" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div x-show="sidebarOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm"
             @click="sidebarOpen = false"></div>

        <div class="fixed inset-0 flex">
            <!-- Sidebar panel -->
            <div x-show="sidebarOpen" 
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 class="relative flex w-full max-w-xs flex-1 flex-col bg-slate-900 text-white pt-5 pb-4">
                
                <!-- Close button -->
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" @click="sidebarOpen = false" class="ml-1 flex h-10 w-10 items-center justify-center focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Fechar menu</span>
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- App Logo -->
                <div class="flex shrink-0 items-center px-4">
                    <span class="bg-primary text-white text-xs font-black px-2 py-1 uppercase tracking-wider rounded-none">
                        ANGO
                    </span>
                    <span class="ml-2 font-heading font-black text-base tracking-tight text-white">
                        MARKETERS <span class="text-primary font-light">CMS</span>
                    </span>
                </div>

                <!-- Navigation List -->
                <div class="mt-8 flex-1 h-0 overflow-y-auto px-2 space-y-1">
                    <?php echo $__env->make('admin.partials.nav-links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Desktop Sidebar -->
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0 bg-slate-900 border-r border-slate-800 text-white">
        <!-- Sidebar Brand -->
        <div class="flex h-16 shrink-0 items-center px-6 border-b border-slate-800">
            <a href="/" class="flex items-center">
                <span class="bg-primary text-white text-xs font-black px-2 py-1 uppercase tracking-wider rounded-none">
                    ANGO
                </span>
                <span class="ml-2 font-heading font-black text-sm tracking-tight text-white">
                    MARKETERS <span class="text-primary font-light">CMS</span>
                </span>
            </a>
        </div>
        
        <!-- Navigation Links -->
        <div class="flex-1 flex flex-col overflow-y-auto px-3 py-6 space-y-1">
            <?php echo $__env->make('admin.partials.nav-links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <!-- Sidebar Footer/User Profile -->
        <div class="flex shrink-0 border-t border-slate-800 p-4 bg-slate-950/40">
            <div class="flex items-center w-full">
                <div class="w-9 h-9 bg-slate-800 flex items-center justify-center font-bold text-white uppercase rounded-none shrink-0 border border-slate-700">
                    <?php echo e(substr(Auth::user()->name ?? 'A', 0, 1)); ?>

                </div>
                <div class="ml-3 overflow-hidden">
                    <p class="text-xs font-bold truncate text-slate-200"><?php echo e(Auth::user()->name); ?></p>
                    <p class="text-[10px] font-medium text-slate-500 truncate mt-0.5">Administrador</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Column Area -->
    <div class="md:pl-64 flex flex-col flex-1 w-full overflow-hidden">
        <!-- Top bar/header -->
        <header class="flex h-16 shrink-0 items-center justify-between border-b border-slate-250 dark:border-slate-850 bg-white dark:bg-slate-900 px-4 sm:px-6 md:px-8">
            <!-- Hamburger menu button -->
            <button type="button" @click="sidebarOpen = true" class="md:hidden -mx-2 p-2 text-slate-500 dark:text-slate-400 hover:text-slate-650 dark:hover:text-slate-200">
                <span class="sr-only">Abrir sidebar</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <!-- Page Title Header (rendered dynamically via yield) -->
            <div class="flex-1 md:pl-0 pl-4">
                <h1 class="text-sm font-bold text-slate-450 dark:text-slate-400 uppercase tracking-widest">
                    <?php echo $__env->yieldContent('page_title', 'Painel Geral'); ?>
                </h1>
            </div>

            <!-- Header Controls -->
            <div class="flex items-center gap-4">
                <!-- View Site Link -->
                <a href="/" target="_blank" class="hidden sm:inline-flex items-center gap-1 text-xs font-bold text-slate-600 dark:text-slate-450 hover:text-primary transition-colors uppercase tracking-wider">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Ver Portal
                </a>

                <!-- Dark/Light Mode Button -->
                <button @click="toggleDarkMode()" class="p-2 text-slate-500 dark:text-slate-450 hover:text-slate-700 dark:hover:text-slate-200 transition-colors" title="Alternar tema">
                    <!-- Sun Icon (visible in dark mode) -->
                    <svg x-show="darkMode" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                    <!-- Moon Icon (visible in light mode) -->
                    <svg x-show="!darkMode" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>

                <!-- Divider -->
                <span class="h-6 w-px bg-slate-200 dark:bg-slate-800"></span>

                <!-- Sign Out Action -->
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="text-xs font-bold text-primary hover:text-primary/80 transition-colors uppercase tracking-wider hover:cursor-pointer">
                        Sair
                    </button>
                </form>
            </div>
        </header>

        <!-- Dynamic Main Scrollable Content -->
        <main class="flex-grow p-4 sm:p-6 md:p-8 overflow-y-auto bg-slate-50 dark:bg-slate-950">
            <?php if(session('success')): ?>
                <div class="mb-6 p-4 bg-emerald-500/10 border-l-4 border-emerald-500 text-emerald-500 text-sm font-medium rounded-none">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="mb-6 p-4 bg-primary/10 border-l-4 border-primary text-primary text-sm font-medium rounded-none">
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/layouts/admin.blade.php ENDPATH**/ ?>