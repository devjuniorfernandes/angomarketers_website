<div {{ $attributes->merge(['class' => 'p-6 bg-slate-50 dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 rounded-2xl shadow-xs']) }}>
    <h3 class="font-heading font-extrabold text-lg text-slate-900 dark:text-white mb-2 flex items-center gap-2">
        <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.012 2c-5.506 0-9.988 4.476-9.988 9.976 0 1.764.462 3.42 1.267 4.872L2 22l5.364-1.398c1.4.764 2.99 1.198 4.648 1.198 5.506 0 9.988-4.476 9.988-9.976S17.518 2 12.012 2zm6.262 14.22c-.258.72-1.506 1.404-2.07 1.458-.564.054-1.128.252-3.648-.756-3.216-1.29-5.274-4.506-5.436-4.722-.162-.216-1.302-1.704-1.302-3.246 0-1.542.81-2.298 1.1-2.604.288-.306.636-.384.846-.384.21 0 .42.006.606.012.192.006.45-.072.702.528.258.618.882 2.112.96 2.268.078.156.132.336.024.546-.108.21-.162.342-.324.528-.162.186-.336.414-.48.558-.162.162-.33.336-.144.654.186.318.828 1.344 1.776 2.172.93 1.092 2.148 1.434 2.454 1.578.306.144.486.126.666-.078.18-.21.78-.906.99-1.218.21-.312.42-.258.702-.156.282.102 1.788.84 2.094.996.306.156.51.234.582.36.072.126.072.72-.186 1.44z"/>
        </svg>
        Receba no WhatsApp
    </h3>
    <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed mb-4">
        As principais novidades de inovação e tecnologia angolanas, resumidas por especialistas e entregues diretamente no seu WhatsApp.
    </p>
    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="space-y-2.5">
        @csrf
        <input type="tel" name="whatsapp" placeholder="Ex: +244 923 000 000" required
               class="w-full px-4 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-white rounded-xl text-xs focus:ring-1 focus:ring-emerald-500 focus:outline-none placeholder-slate-400">
        <button type="submit" 
                class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs uppercase tracking-wider rounded-xl transition-all shadow-sm">
            Subscrever WhatsApp
        </button>
    </form>
    
    @if(session('newsletter_success'))
        <div class="mt-2 text-emerald-500 text-[10px] font-semibold text-center">
            {{ session('newsletter_success') }}
        </div>
    @endif
</div>
