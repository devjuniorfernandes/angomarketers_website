<!DOCTYPE html>
<html lang="pt" 
      x-data="{ 
          darkMode: localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches),
          toggleDarkMode() {
              this.darkMode = !this.darkMode;
              localStorage.setItem('darkMode', this.darkMode);
          },
          mobileMenuOpen: false,
          searchOpen: false
      }" 
      :class="{ 'dark': darkMode }"
      class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Metadata -->
    <title>@yield('title', 'AngoMarketers | Portal de Notícias, Eventos e Formações')</title>
    <meta name="description" content="@yield('meta_description', 'AngoMarketers é o principal portal de comunicação focado em Marketing, Comunicação, Publicidade, Negócios, Tecnologia e Inovação em Angola.')">
    <link rel="canonical" href="{{ request()->url() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="@yield('title', 'AngoMarketers | Portal de Notícias, Eventos e Formações')">
    <meta property="og:description" content="@yield('meta_description', 'AngoMarketers é o principal portal de comunicação focado em Marketing, Comunicação, Publicidade, Negócios, Tecnologia e Inovação em Angola.')">
    <meta property="og:image" content="@yield('og_image', url('/storage/og-default.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title" content="@yield('title', 'AngoMarketers | Portal de Notícias, Eventos e Formações')">
    <meta property="twitter:description" content="@yield('meta_description', 'AngoMarketers é o principal portal de comunicação focado em Marketing, Comunicação, Publicidade, Negócios, Tecnologia e Inovação em Angola.')">
    <meta property="twitter:image" content="@yield('og_image', url('/storage/og-default.png'))">
    
    <!-- Fonts: Inter & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Inline Script to prevent FOUC in Dark Mode -->
    <script>
        if (localStorage.getItem('darkMode') === 'true' || (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @yield('styles')
</head>
<body class="flex flex-col min-h-screen bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 font-sans antialiased transition-colors duration-300">
    
    <!-- Global Sticky Header Component -->
    <x-header />

    <!-- Main Content Area -->
    <main class="flex-grow pt-28 md:pt-36">
        @yield('content')
    </main>

    <!-- Global Footer Component -->
    <x-footer />

    <!-- Global Search Modal/Overlay -->
    <div x-show="searchOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-50 overflow-y-auto" 
         style="display: none;"
         x-on:keydown.escape.window="searchOpen = false">
        
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-900/60 dark:bg-black/80 backdrop-blur-sm transition-opacity" x-on:click="searchOpen = false"></div>
        
        <!-- Search dialog -->
        <div class="flex items-start justify-center min-h-screen px-4 pt-20 pb-4 sm:p-24">
            <div class="relative w-full max-w-2xl overflow-hidden bg-white dark:bg-slate-900 rounded-2xl shadow-2xl border border-slate-200 dark:border-slate-800 transition-all p-6">
                <!-- Search bar input -->
                <form action="/search" method="GET" class="relative flex items-center">
                    <svg class="absolute left-4 w-6 h-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="q" placeholder="Pesquisar notícias, eventos, formações..." 
                           class="w-full pl-12 pr-4 py-3 bg-slate-100 dark:bg-slate-800 border-0 rounded-xl focus:ring-2 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 focus:outline-none"
                           x-init="$watch('searchOpen', value => { if(value) { $el.focus(); } })">
                    <button type="button" x-on:click="searchOpen = false" class="absolute right-4 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </form>

                <!-- Quick links / Popular queries -->
                <div class="mt-6">
                    <h4 class="text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3">Pesquisas Frequentes</h4>
                    <div class="flex flex-wrap gap-2">
                        @foreach($topSearches as $search)
                            <a href="{{ route('search', ['q' => $search->query]) }}" class="px-3 py-1.5 bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 text-sm rounded-lg border border-slate-200 dark:border-slate-700 text-slate-600 dark:text-slate-300 hover:text-primary transition-all">{{ ucwords($search->query) }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
