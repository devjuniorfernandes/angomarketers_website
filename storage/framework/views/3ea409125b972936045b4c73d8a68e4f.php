<?php $__env->startSection('title', 'Subscritores | AngoMarketers CMS'); ?>
<?php $__env->startSection('page_title', 'Lista de Subscritores'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6 max-w-4xl mx-auto">
    <!-- Header -->
    <div>
        <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Subscritores do WhatsApp</h2>
        <p class="text-xs text-slate-500 mt-1">Lista de números de WhatsApp inscritos no portal AngoMarketers</p>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-12 text-center">#</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Número de WhatsApp</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/3">Data de Subscrição</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    <?php $__empty_1 = true; $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Index -->
                            <td class="p-4 text-center text-slate-400 font-semibold font-mono text-xs">
                                <?php echo e(($subscribers->currentPage() - 1) * $subscribers->perPage() + $index + 1); ?>

                            </td>
                            <!-- WhatsApp -->
                            <td class="p-4 font-bold text-slate-900 dark:text-white">
                                <?php echo e($subscriber->whatsapp); ?>

                            </td>
                            <!-- Created At -->
                            <td class="p-4 text-slate-550 dark:text-slate-400 text-xs">
                                <?php echo e($subscriber->created_at->format('d \d\e F \d\e Y \à\s H:i')); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="3" class="p-8 text-center text-slate-455 dark:text-slate-500">
                                Nenhum contacto de WhatsApp registado atualmente.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($subscribers->hasPages()): ?>
            <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                <?php echo e($subscribers->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/admin/subscribers/index.blade.php ENDPATH**/ ?>