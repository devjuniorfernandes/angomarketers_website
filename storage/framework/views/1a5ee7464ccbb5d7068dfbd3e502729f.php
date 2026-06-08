<?php $__env->startSection('title', 'Sobre Nós | AngoMarketers'); ?>

<?php $__env->startSection('content'); ?>

<?php
$paths = [
    ['name' => 'Sobre Nós', 'url' => '/about']
];

$team = [
    [
        'name' => 'Sandra Neto',
        'role' => 'Diretora Editorial & IA Lead',
        'avatar' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=150',
        'bio' => 'Sandra é jornalista e consultora de tecnologia com foco em Inteligência Artificial e ética de dados.'
    ],
    [
        'name' => 'Mateus Cambando',
        'role' => 'Editor de Startups & VC',
        'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=150',
        'bio' => 'Mateus acompanha o ecossistema empreendedor africano, analisando rondas de capital de risco e fintechs.'
    ],
    [
        'name' => 'Telma Bernardo',
        'role' => 'Chefe de Redação & Marketing',
        'avatar' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=150',
        'bio' => 'Telma coordena a linha de marketing estratégico, tendências de branding e publicidade corporativa.'
    ]
];
?>

<div class="max-w-7xl mx-auto px-4 md:px-8 py-10">
    <?php if (isset($component)) { $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb','data' => ['paths' => $paths]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['paths' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($paths)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $attributes = $__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__attributesOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2)): ?>
<?php $component = $__componentOriginale19f62b34dfe0bfdf95075badcb45bc2; ?>
<?php unset($__componentOriginale19f62b34dfe0bfdf95075badcb45bc2); ?>
<?php endif; ?>

    <!-- Editorial Header Section -->
    <div class="mt-4 max-w-4xl mb-16">
        <span class="text-xs font-extrabold uppercase tracking-widest text-primary">Quem Somos</span>
        <h1 class="font-heading font-black text-3xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-white mt-2 leading-tight">
            Elevamos o Marketing, Negócios e Tecnologia em Angola
        </h1>
        <p class="mt-6 text-slate-650 dark:text-slate-405 text-base sm:text-lg leading-relaxed">
            Fundada em 2026, a <strong>AngoMarketers</strong> é uma empresa profissional de media e comunicação social que atua como a voz de referência do ecossistema de inovação angolano. A nossa missão é produzir jornalismo ético, aprofundado e analítico, cobrindo os avanços em marketing estratégico, inteligência artificial, novos negócios, startups e carreiras corporativas.
        </p>
    </div>

    <!-- Stats grid layout -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-16 py-8 border-t border-b border-slate-100 dark:border-slate-800/80">
        <div class="text-center p-4">
            <span class="font-heading font-black text-4xl text-primary block">20K+</span>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mt-2 block">Leitores Mensais</span>
        </div>
        <div class="text-center p-4 border-y sm:border-y-0 sm:border-x border-slate-100 dark:border-slate-800">
            <span class="font-heading font-black text-4xl text-primary block">500+</span>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mt-2 block">Artigos Publicados</span>
        </div>
        <div class="text-center p-4">
            <span class="font-heading font-black text-4xl text-primary block">100%</span>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mt-2 block">Produção Nacional</span>
        </div>
    </div>

    <!-- Editorial Pillars -->
    <div class="mb-16">
        <h2 class="font-heading font-black text-2xl text-slate-900 dark:text-white mb-8 text-center uppercase tracking-tight">Nossos Pilares Editoriais</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-6 bg-slate-50 dark:bg-slate-900/60 border border-slate-100 dark:border-slate-800 rounded-2xl">
                <div class="w-10 h-10 bg-primary/10 rounded-lg text-primary flex items-center justify-center font-bold text-lg mb-4">1</div>
                <h3 class="font-heading font-bold text-lg text-slate-900 dark:text-white mb-2.5">Independência Editorial</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Produzimos análises com base em factos rigorosos e investigações próprias, mantendo total imparcialidade frente a pressões externas corporativas.</p>
            </div>
            
            <div class="p-6 bg-slate-50 dark:bg-slate-900/60 border border-slate-100 dark:border-slate-800 rounded-2xl">
                <div class="w-10 h-10 bg-primary/10 rounded-lg text-primary flex items-center justify-center font-bold text-lg mb-4">2</div>
                <h3 class="font-heading font-bold text-lg text-slate-900 dark:text-white mb-2.5">Mentalidade Inovadora</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Acompanhamos na linha da frente a introdução de modelos de IA, automação inteligente e digitalização que definem o futuro laboral angolano.</p>
            </div>

            <div class="p-6 bg-slate-50 dark:bg-slate-900/60 border border-slate-100 dark:border-slate-800 rounded-2xl">
                <div class="w-10 h-10 bg-primary/10 rounded-lg text-primary flex items-center justify-center font-bold text-lg mb-4">3</div>
                <h3 class="font-heading font-bold text-lg text-slate-900 dark:text-white mb-2.5">Contexto Local</h3>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">Não traduzimos apenas notícias internacionais: contextualizamos as dinâmicas globais no ecossistema regulamentar e cultural de Angola.</p>
            </div>
        </div>
    </div>

    <!-- Executive Team Profile grid -->
    <div class="mb-12">
        <h2 class="font-heading font-black text-2xl text-slate-900 dark:text-white mb-8 text-center uppercase tracking-tight">Conselho de Redação</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $__currentLoopData = $team; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group flex flex-col bg-white dark:bg-slate-900 border border-slate-150 dark:border-slate-800 rounded-2xl overflow-hidden shadow-xs hover:shadow-lg transition-all duration-300 p-6 text-center">
                    <!-- Avatar circle image -->
                    <div class="w-20 h-20 rounded-full overflow-hidden mx-auto border-2 border-slate-100 dark:border-slate-800 shrink-0 mb-4">
                        <img src="<?php echo e($member['avatar']); ?>" alt="<?php echo e($member['name']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                    </div>
                    
                    <!-- Bio Details -->
                    <h3 class="font-heading font-extrabold text-lg text-slate-900 dark:text-white leading-tight">
                        <?php echo e($member['name']); ?>

                    </h3>
                    <span class="text-xs font-bold text-primary block mt-1 uppercase tracking-wider"><?php echo e($member['role']); ?></span>
                    
                    <p class="text-slate-500 dark:text-slate-400 text-xs sm:text-sm mt-3 leading-relaxed">
                        <?php echo e($member['bio']); ?>

                    </p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</div>

<?php if (isset($component)) { $__componentOriginalcaccc7c159de004e0967afab0e08461c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcaccc7c159de004e0967afab0e08461c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.newsletter','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('newsletter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcaccc7c159de004e0967afab0e08461c)): ?>
<?php $attributes = $__attributesOriginalcaccc7c159de004e0967afab0e08461c; ?>
<?php unset($__attributesOriginalcaccc7c159de004e0967afab0e08461c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcaccc7c159de004e0967afab0e08461c)): ?>
<?php $component = $__componentOriginalcaccc7c159de004e0967afab0e08461c; ?>
<?php unset($__componentOriginalcaccc7c159de004e0967afab0e08461c); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/about.blade.php ENDPATH**/ ?>