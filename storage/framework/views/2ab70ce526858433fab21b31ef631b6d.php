<?php $__env->startSection('title', 'Navbar & Submenus | AngoMarketers CMS'); ?>
<?php $__env->startSection('page_title', 'Gestão de Navbar & Submenus'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Itens do Menu da Navbar</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir os links principais e submenus suspensos da barra de navegação superior</p>
        </div>
        <div>
            <a href="<?php echo e(route('admin.menus.create')); ?>" 
               class="inline-flex items-center justify-center bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs px-4 py-3 rounded-none uppercase tracking-wider transition-colors hover:cursor-pointer">
                Novo Item de Menu
            </a>
        </div>
    </div>

    <!-- Hierarchy Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/3">Item de Menu (Título)</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">URL / Destino</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 text-center w-24">Ordem</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    <?php $__empty_1 = true; $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <!-- Parent Row -->
                        <tr class="bg-slate-50/20 dark:bg-slate-900/20 font-bold text-slate-900 dark:text-white">
                            <td class="p-4 flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-450" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                                <span><?php echo e($item->title); ?></span>
                            </td>
                            <td class="p-4 text-slate-500 dark:text-slate-450 font-mono text-xs font-normal">
                                <?php echo e($item->url); ?>

                            </td>
                            <td class="p-4 text-center text-slate-800 dark:text-slate-200">
                                <?php echo e($item->order); ?>

                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo e(route('admin.menus.edit', $item)); ?>" 
                                       class="px-2 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-655 dark:text-slate-300 hover:cursor-pointer transition-colors">
                                        Editar
                                    </a>
                                    <form action="<?php echo e(route('admin.menus.destroy', $item)); ?>" method="POST" onsubmit="return confirm('Deseja realmente eliminar este item de menu? Submenus associados também serão eliminados.')">
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

                        <!-- Submenu Child Rows -->
                        <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20 text-slate-700 dark:text-slate-300">
                                <td class="p-4 pl-10 flex items-center gap-2 text-xs">
                                    <svg class="w-3 h-3 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7" />
                                    </svg>
                                    <span class="font-semibold"><?php echo e($child->title); ?></span>
                                </td>
                                <td class="p-4 text-slate-500 dark:text-slate-450 font-mono text-xs pl-10">
                                    <?php echo e($child->url); ?>

                                </td>
                                <td class="p-4 text-center font-semibold text-slate-600 dark:text-slate-400">
                                    <?php echo e($child->order); ?>

                                </td>
                                <td class="p-4">
                                    <div class="flex items-center gap-2 pl-4">
                                        <a href="<?php echo e(route('admin.menus.edit', $child)); ?>" 
                                           class="px-2 py-0.5 bg-slate-50 dark:bg-slate-850 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-750 text-[10px] font-bold uppercase tracking-wider text-slate-500 hover:cursor-pointer transition-colors">
                                            Editar
                                        </a>
                                        <form action="<?php echo e(route('admin.menus.destroy', $child)); ?>" method="POST" onsubmit="return confirm('Deseja realmente eliminar este submenu?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" 
                                                    class="px-2 py-0.5 bg-slate-50 dark:bg-slate-850 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-750 text-[10px] font-bold uppercase tracking-wider text-primary hover:cursor-pointer transition-colors">
                                                Apagar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="p-8 text-center text-slate-455 dark:text-slate-500">
                                Nenhum link de menu registado.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/admin/menus/index.blade.php ENDPATH**/ ?>