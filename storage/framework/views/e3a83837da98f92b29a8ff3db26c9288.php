<section id="newsletter-form" <?php echo e($attributes->merge(['class' => 'max-w-7xl mx-auto px-4 md:px-8 py-10 md:py-16'])); ?>>
    <div class="relative rounded-3xl overflow-hidden bg-gradient-to-tr from-slate-950 via-slate-900 to-slate-900 text-white shadow-2xl py-12 px-6 sm:px-12 lg:px-16 border border-slate-800">
        
        <!-- Ambient radial glow spots to feel extremely premium -->
        <div class="absolute -top-24 -left-24 w-80 h-80 bg-primary/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-4xl mx-auto text-center flex flex-col items-center">
            <!-- Icon Badge (WhatsApp Icon) -->
            <div class="w-12 h-12 bg-emerald-500/10 rounded-2xl border border-emerald-500/20 flex items-center justify-center text-emerald-500 mb-6">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.012 2c-5.506 0-9.988 4.476-9.988 9.976 0 1.764.462 3.42 1.267 4.872L2 22l5.364-1.398c1.4.764 2.99 1.198 4.648 1.198 5.506 0 9.988-4.476 9.988-9.976S17.518 2 12.012 2zm6.262 14.22c-.258.72-1.506 1.404-2.07 1.458-.564.054-1.128.252-3.648-.756-3.216-1.29-5.274-4.506-5.436-4.722-.162-.216-1.302-1.704-1.302-3.246 0-1.542.81-2.298 1.1-2.604.288-.306.636-.384.846-.384.21 0 .42.006.606.012.192.006.45-.072.702.528.258.618.882 2.112.96 2.268.078.156.132.336.024.546-.108.21-.162.342-.324.528-.162.186-.336.414-.48.558-.162.162-.33.336-.144.654.186.318.828 1.344 1.776 2.172.93 1.092 2.148 1.434 2.454 1.578.306.144.486.126.666-.078.18-.21.78-.906.99-1.218.21-.312.42-.258.702-.156.282.102 1.788.84 2.094.996.306.156.51.234.582.36.072.126.072.72-.186 1.44z"/>
                </svg>
            </div>

            <!-- Headline -->
            <h2 class="font-heading font-black text-2xl sm:text-3xl lg:text-4xl text-white leading-tight mb-4 max-w-2xl">
                Receba as principais notícias de Marketing e Tecnologia no seu WhatsApp
            </h2>
            
            <p class="text-slate-400 text-sm sm:text-base leading-relaxed max-w-xl mb-8">
                Junte-se a mais de 5.000 profissionais angolanos. Cadastre o seu número de WhatsApp e receba o resumo de notícias e tendências diretamente no seu telemóvel.
            </p>

            <!-- Subscription Form -->
            <form action="<?php echo e(route('newsletter.subscribe')); ?>" method="POST" class="w-full max-w-lg flex flex-col sm:flex-row gap-3">
                <?php echo csrf_field(); ?>
                <input type="tel" name="whatsapp" placeholder="Ex: +244 923 000 000" required
                       class="flex-grow px-5 py-3.5 bg-slate-800/80 backdrop-blur-md text-white border border-slate-700/80 rounded-2xl text-sm focus:ring-2 focus:ring-primary focus:outline-none placeholder-slate-500 transition-all">
                <button type="submit" 
                        class="px-8 py-3.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm tracking-wider uppercase rounded-2xl transition-all duration-300 shadow-md hover:shadow-lg hover:scale-[1.02] shrink-0">
                    Subscrever
                </button>
            </form>

            <?php if(session('newsletter_success')): ?>
                <div class="mt-4 text-emerald-400 text-sm font-semibold">
                    <?php echo e(session('newsletter_success')); ?>

                </div>
            <?php endif; ?>

            <span class="text-slate-500 text-xs mt-4">Respeitamos a sua privacidade. Cancele a subscrição a qualquer momento.</span>
        </div>
    </div>
</section>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/newsletter.blade.php ENDPATH**/ ?>