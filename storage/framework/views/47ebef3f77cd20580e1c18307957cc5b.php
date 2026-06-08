<?php $__env->startSection('title', 'Parceiros | AngoMarketers CMS'); ?>
<?php $__env->startSection('page_title', 'Gestão de Parceiros'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Lista de Parceiros</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir logos dos parceiros exibidos no rodapé do portal</p>
        </div>
        <div>
            <a href="<?php echo e(route('admin.partners.create')); ?>" 
               class="inline-flex items-center justify-center bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs px-4 py-3 rounded-none uppercase tracking-wider transition-colors hover:cursor-pointer">
                Novo Parceiro
            </a>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4">
        <form action="<?php echo e(route('admin.partners.index')); ?>" method="GET" class="flex items-center gap-3">
            <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Pesquisar por nome de parceiro..."
                   class="w-full sm:w-80 px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm focus:outline-none focus:border-primary">
            <button type="submit" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold uppercase tracking-wider transition-colors hover:cursor-pointer">Filtrar</button>
            <?php if($search): ?>
                <a href="<?php echo e(route('admin.partners.index')); ?>" class="text-xs text-slate-400 hover:text-slate-200 underline">Limpar</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-16">Logo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Nome</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/3">Website URL</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 text-center w-24">Ordem</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    <?php $__empty_1 = true; $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Logo -->
                            <td class="p-4">
                                <img src="<?php echo e($partner->logo_path); ?>" 
                                     alt="<?php echo e($partner->name); ?>" class="h-8 max-w-[80px] object-contain bg-slate-100 dark:bg-slate-800 p-1 border border-slate-200 dark:border-slate-700">
                            </td>
                            <!-- Name -->
                            <td class="p-4 font-bold text-slate-900 dark:text-white">
                                <?php echo e($partner->name); ?>

                            </td>
                            <!-- URL -->
                            <td class="p-4 text-slate-500 dark:text-slate-450 font-mono text-xs">
                                <a href="<?php echo e($partner->url); ?>" target="_blank" class="hover:text-primary hover:underline">
                                    <?php echo e($partner->url ?? 'Nenhum'); ?>

                                </a>
                            </td>
                            <!-- Order -->
                            <td class="p-4 text-center font-bold text-slate-800 dark:text-slate-200">
                                <?php echo e($partner->order); ?>

                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <a href="<?php echo e(route('admin.partners.edit', $partner)); ?>" 
                                       class="px-2 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-655 dark:text-slate-300 hover:cursor-pointer transition-colors">
                                        Editar
                                    </a>
                                    <form action="<?php echo e(route('admin.partners.destroy', $partner)); ?>" method="POST" onsubmit="return confirm('Deseja realmente eliminar este parceiro?')">
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
                            <td colspan="5" class="p-8 text-center text-slate-455 dark:text-slate-500">
                                Nenhum parceiro registado.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if($partners->hasPages()): ?>
            <div class="p-4 border-t border-slate-200 dark:border-slate-800">
                <?php echo e($partners->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/admin/partners/index.blade.php ENDPATH**/ ?>