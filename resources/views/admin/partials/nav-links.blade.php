<!-- Dashboard Link -->
<a href="{{ route('admin.dashboard') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z" />
    </svg>
    Painel Geral
</a>

<!-- Articles Link -->
<a href="{{ route('admin.articles.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.articles.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 4a2 2 0 00-2-2v3m2-3V9m0 0a2 2 0 012 2v7a2 2 0 01-2 2h-2a2 2 0 01-2-2v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
    </svg>
    Artigos
</a>

<!-- Categories Link -->
<a href="{{ route('admin.categories.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.categories.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
    Categorias
</a>

<!-- Events Link -->
<a href="{{ route('admin.events.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.events.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
    Eventos
</a>

<!-- Trainings Link -->
<a href="{{ route('admin.trainings.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.trainings.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
    </svg>
    Formações
</a>

<!-- Comments Link -->
<a href="{{ route('admin.comments.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.comments.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
    Comentários
</a>

<!-- Subscribers Link -->
<a href="{{ route('admin.subscribers.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.subscribers.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
    </svg>
    Subscritores
</a>

<!-- Authors Link -->
<a href="{{ route('admin.authors.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.authors.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    Autores
</a>

<!-- Tags Link -->
<a href="{{ route('admin.tags.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.tags.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
    </svg>
    Tags
</a>

<!-- Slider Link -->
<a href="{{ route('admin.slider_items.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.slider_items.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
    Carrossel Home
</a>

<!-- Menus Link -->
<a href="{{ route('admin.menus.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.menus.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
    Navbar & Menus
</a>

<!-- Partners Link -->
<a href="{{ route('admin.partners.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.partners.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    Parceiros (Logos)
</a>

<!-- Settings Link -->
<a href="{{ route('admin.settings.index') }}" 
   class="group flex items-center px-4 py-3 text-xs font-bold uppercase tracking-wider transition-colors rounded-none {{ request()->routeIs('admin.settings.*') ? 'bg-primary text-white border-l-4 border-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white border-l-4 border-transparent' }}">
    <svg class="mr-3 h-4 w-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
    Configurações
</a>
