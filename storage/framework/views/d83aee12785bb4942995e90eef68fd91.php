<?php
$facebookUrl = \App\Domain\Core\Models\Setting::get('system_facebook_url', '#');
$instagramUrl = \App\Domain\Core\Models\Setting::get('system_instagram_url', '#');
$linkedinUrl = \App\Domain\Core\Models\Setting::get('system_linkedin_url', '#');
?>

<footer class="bg-slate-900 text-slate-300 border-t border-slate-800 font-sans mt-auto">
    <!-- Top Footer Panel -->
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-12 md:py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12">
        <!-- Col 1: About -->
        <div class="lg:col-span-4 flex flex-col space-y-4">
            <a href="/" class="font-heading font-black text-2xl tracking-tighter text-white">
                ANGO<span class="text-primary">MARKETERS</span>
            </a>
            <p class="text-sm text-slate-400 leading-relaxed max-w-sm">
                O portal de referência para profissionais, empreendedores e líderes de opinião em Angola. Cobertura diária sobre marketing estratégico, avanços em IA, negócios, startups e inovação tecnológica.
            </p>
            <div class="flex items-center gap-3 pt-2">
                <!-- Facebook -->
                <a href="<?php echo e($facebookUrl); ?>" target="_blank" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center text-slate-400">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                </a>
                <!-- Instagram (instead of Twitter if mapped) -->
                <a href="<?php echo e($instagramUrl); ?>" target="_blank" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center text-slate-400">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <!-- Linkedin -->
                <a href="<?php echo e($linkedinUrl); ?>" target="_blank" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-primary hover:text-white transition-all duration-300 flex items-center justify-center text-slate-400">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
            </div>
        </div>

        <!-- Col 2: Categories -->
        <div class="lg:col-span-2 flex flex-col space-y-3">
            <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider">Editorias</h4>
            <ul class="space-y-2 text-sm text-slate-400">
                <li><a href="/category/marketing" class="hover:text-primary transition-colors">Marketing</a></li>
                <li><a href="/category/tecnologia" class="hover:text-primary transition-colors">Tecnologia</a></li>
                <li><a href="/category/ia" class="hover:text-primary transition-colors">Inteligência Artificial</a></li>
                <li><a href="/category/negocios" class="hover:text-primary transition-colors">Negócios & Gestão</a></li>
                <li><a href="/category/startups" class="hover:text-primary transition-colors">Startups & VC</a></li>
                <li><a href="/eventos" class="hover:text-primary transition-colors">Eventos</a></li>
                <li><a href="/formacoes" class="hover:text-primary transition-colors">Formações</a></li>
            </ul>
        </div>

        <!-- Col 3: Resources -->
        <div class="lg:col-span-2 flex flex-col space-y-3">
            <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider">A Empresa</h4>
            <ul class="space-y-2 text-sm text-slate-400">
                <li><a href="/about" class="hover:text-primary transition-colors">Sobre Nós</a></li>
                <li><a href="/contact" class="hover:text-primary transition-colors">Contacto</a></li>
                <li><a href="#" class="hover:text-primary transition-colors">Anuncie Connosco</a></li>
                <li><a href="/category/podcast" class="hover:text-primary transition-colors">Podcasts</a></li>
                <li><a href="<?php echo e(route('home')); ?>#newsletter-form" class="hover:text-primary transition-colors">WhatsApp Alertas</a></li>
            </ul>
        </div>

        <!-- Col 4: WhatsApp Subscription -->
        <div class="lg:col-span-4 flex flex-col space-y-4">
            <h4 class="font-heading font-bold text-white text-sm uppercase tracking-wider">Receba no WhatsApp</h4>
            <p class="text-sm text-slate-400 leading-relaxed">
                Inscreva-se para receber o resumo diário de notícias diretamente no seu WhatsApp.
            </p>
            <form action="<?php echo e(route('newsletter.subscribe')); ?>" method="POST" class="flex gap-2">
                <?php echo csrf_field(); ?>
                <input type="tel" name="whatsapp" placeholder="Seu WhatsApp..." required
                       class="flex-grow px-4 py-2.5 bg-slate-800 text-white rounded-xl text-sm border-0 focus:ring-1 focus:ring-emerald-500 focus:outline-none placeholder-slate-500">
                <button type="submit" class="px-4 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm rounded-xl transition-colors">
                    Enviar
                </button>
            </form>
        </div>
    </div>

    <!-- Bottom Footer Copyright / Policy Panel -->
    <div class="border-t border-slate-800 py-6 text-center text-xs text-slate-500">
        <div class="max-w-7xl mx-auto px-4 md:px-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <span>&copy; <?php echo e(date('Y')); ?> AngoMarketers. Todos os direitos reservados. Feito em Angola.</span>
            <div class="flex items-center gap-6">
                <a href="#" class="hover:text-primary transition-colors">Políticas de Privacidade</a>
                <a href="#" class="hover:text-primary transition-colors">Termos de Uso</a>
                <a href="#" class="hover:text-primary transition-colors">Ajuda & FAQs</a>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/components/footer.blade.php ENDPATH**/ ?>