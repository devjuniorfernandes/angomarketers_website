<?php $__env->startSection('title', 'Artigos | AngoMarketers CMS'); ?>
<?php $__env->startSection('page_title', 'Gestão de Artigos'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Lista de Artigos</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir todos os artigos publicados e rascunhos do portal</p>
        </div>
        <div>
            <a href="<?php echo e(route('admin.articles.create')); ?>" 
               class="inline-flex items-center justify-center bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs px-4 py-3 rounded-none uppercase tracking-wider transition-colors hover:cursor-pointer">
                Novo Artigo
            </a>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4 rounded-none">
        <form action="<?php echo e(route('admin.articles.index')); ?>" method="GET" class="grid grid-cols-1 sm:grid-cols-12 gap-4">
            <!-- Search field -->
            <div class="sm:col-span-6 relative">
                <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Pesquisar por título ou conteúdo..."
                       class="w-full pl-4 pr-10 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors">
                <?php if($search): ?>
                    <a href="<?php echo e(route('admin.articles.index', ['category_id' => $categoryId])); ?>" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Category filter -->
            <div class="sm:col-span-4">
                <select name="category_id" 
                        class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 text-sm transition-colors">
                    <option value="">Todas as Categorias</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e($categoryId == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <!-- Filter actions -->
            <div class="sm:col-span-2 flex gap-2">
                <button type="submit" 
                        class="w-full bg-slate-900 dark:bg-slate-800 text-white hover:bg-slate-850 dark:hover:bg-slate-700 font-heading font-bold text-xs py-2.5 px-4 rounded-none hover:cursor-pointer transition-colors uppercase tracking-wider text-center">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-16">Capa</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Artigo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Categoria</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Autor</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Leitura</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Estado</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Image Cover -->
                            <td class="p-4">
                                <div class="w-12 h-8 bg-slate-900 border border-slate-200 dark:border-slate-700 overflow-hidden shrink-0">
                                    <img src="<?php echo e($article->image_path); ?>" alt="<?php echo e($article->title); ?>" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <!-- Title & Subtitle -->
                            <td class="p-4 max-w-[300px]">
                                <div class="font-bold text-slate-900 dark:text-white truncate" title="<?php echo e($article->title); ?>">
                                    <?php echo e($article->title); ?>

                                </div>
                                <div class="text-xs text-slate-450 dark:text-slate-500 mt-0.5 truncate" title="<?php echo e($article->subtitle); ?>">
                                    <?php echo e($article->subtitle); ?>

                                </div>
                            </td>
                            <!-- Category -->
                            <td class="p-4 text-slate-600 dark:text-slate-400 font-medium">
                                <?php echo e($article->category->name ?? 'Sem categoria'); ?>

                            </td>
                            <!-- Author -->
                            <td class="p-4 text-slate-600 dark:text-slate-400">
                                <?php echo e($article->author->name ?? 'Sem autor'); ?>

                            </td>
                            <!-- Reading Time -->
                            <td class="p-4 text-slate-500 dark:text-slate-450 text-xs font-semibold">
                                <?php echo e($article->reading_time); ?>

                            </td>
                            <!-- Status -->
                            <td class="p-4">
                                <?php if($article->status === 'published'): ?>
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-emerald-500/10 text-emerald-500">Publicado</span>
                                <?php else: ?>
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-amber-500/10 text-amber-500">Rascunho</span>
                                <?php endif; ?>
                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <!-- Edit Link -->
                                    <a href="<?php echo e(route('admin.articles.edit', $article)); ?>" 
                                       class="px-2 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-650 dark:text-slate-300 hover:cursor-pointer transition-colors">
                                        Editar
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="<?php echo e(route('admin.articles.destroy', $article)); ?>" method="POST" onsubmit="return confirm('Deseja realmente eliminar este artigo?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" 
                                                class="px-2 py-1 bg-slate-105 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-primary hover:cursor-pointer transition-colors">
                                            Apagar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-450 dark:text-slate-500">
                                Nenhum artigo encontrado.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($articles->hasPages()): ?>
            <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                <?php echo e($articles->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/admin/articles/index.blade.php ENDPATH**/ ?>