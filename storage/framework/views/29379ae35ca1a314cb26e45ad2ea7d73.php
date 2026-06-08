<?php $__env->startSection('title', 'Formações | AngoMarketers CMS'); ?>
<?php $__env->startSection('page_title', 'Gestão de Formações'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Lista de Formações</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir todos os cursos, workshops e especializações publicados no portal</p>
        </div>
        <div>
            <a href="<?php echo e(route('admin.trainings.create')); ?>" 
               class="inline-flex items-center justify-center bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs px-4 py-3 rounded-none uppercase tracking-wider transition-colors hover:cursor-pointer">
                Nova Formação
            </a>
        </div>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-16">Capa</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Título / Instituição</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Duração / Preço</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Modalidade</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Views</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Estado</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    <?php $__empty_1 = true; $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Image Cover -->
                            <td class="p-4">
                                <div class="w-12 h-8 bg-slate-900 border border-slate-200 dark:border-slate-700 overflow-hidden shrink-0">
                                    <img src="<?php echo e($training->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=100'); ?>" alt="<?php echo e($training->title); ?>" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <!-- Title & Institution -->
                            <td class="p-4 max-w-[300px]">
                                <div class="font-bold text-slate-900 dark:text-white truncate" title="<?php echo e($training->title); ?>">
                                    <?php echo e($training->title); ?>

                                </div>
                                <div class="text-xs text-slate-450 dark:text-slate-500 mt-0.5" title="<?php echo e($training->institution); ?>">
                                    <?php echo e($training->institution); ?>

                                </div>
                            </td>
                            <!-- Duration & Price -->
                            <td class="p-4">
                                <div class="text-slate-800 dark:text-slate-200 font-medium">
                                    <?php echo e($training->duration); ?>

                                </div>
                                <div class="text-xs text-slate-500 font-semibold">
                                    <?php if($training->price > 0): ?>
                                        <?php echo e(number_format($training->price, 2, ',', '.')); ?> AOA
                                    <?php else: ?>
                                        Gratuito
                                    <?php endif; ?>
                                </div>
                            </td>
                            <!-- Mode -->
                            <td class="p-4 text-slate-600 dark:text-slate-400 font-medium">
                                <?php echo e(ucfirst($training->mode)); ?>

                            </td>
                            <!-- Views -->
                            <td class="p-4 text-slate-500 dark:text-slate-450 text-xs font-semibold">
                                <?php echo e($training->views_count); ?>

                            </td>
                            <!-- Status -->
                            <td class="p-4">
                                <?php if($training->status === 'published'): ?>
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-emerald-500/10 text-emerald-500">Publicado</span>
                                <?php elseif($training->status === 'scheduled'): ?>
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-indigo-500/10 text-indigo-500">Agendado</span>
                                <?php else: ?>
                                    <span class="inline-flex px-2.5 py-1 text-[9px] font-extrabold uppercase bg-amber-500/10 text-amber-500">Rascunho</span>
                                <?php endif; ?>
                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <!-- Edit Link -->
                                    <a href="<?php echo e(route('admin.trainings.edit', $training)); ?>" 
                                       class="px-2 py-1 bg-slate-100 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-slate-650 dark:text-slate-300 hover:cursor-pointer transition-colors">
                                        Editar
                                    </a>
                                    <!-- Delete Button -->
                                    <form action="<?php echo e(route('admin.trainings.destroy', $training)); ?>" method="POST" onsubmit="return confirm('Deseja realmente eliminar esta formação?')">
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
                                Nenhuma formação encontrada.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($trainings->hasPages()): ?>
            <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                <?php echo e($trainings->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/admin/trainings/index.blade.php ENDPATH**/ ?>