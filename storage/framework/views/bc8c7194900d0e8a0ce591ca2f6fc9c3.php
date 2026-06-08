<?php $__env->startSection('title', 'Comentários | AngoMarketers CMS'); ?>
<?php $__env->startSection('page_title', 'Moderação de Comentários'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Lista de Comentários</h2>
        <p class="text-xs text-slate-500 mt-1">Aprove ou elimine as contribuições dos leitores no portal</p>
    </div>

    <!-- Status Filters -->
    <div class="flex items-center gap-2 border-b border-slate-200 dark:border-slate-800 pb-px">
        <a href="<?php echo e(route('admin.comments.index', ['status' => 'all'])); ?>" 
           class="px-4 py-2 text-xs font-bold uppercase tracking-wider border-b-2 transition-colors <?php echo e($status === 'all' ? 'border-primary text-primary' : 'border-transparent text-slate-450 hover:text-slate-700 dark:hover:text-slate-200'); ?>">
            Todos
        </a>
        <a href="<?php echo e(route('admin.comments.index', ['status' => 'pending'])); ?>" 
           class="px-4 py-2 text-xs font-bold uppercase tracking-wider border-b-2 transition-colors <?php echo e($status === 'pending' ? 'border-primary text-primary' : 'border-transparent text-slate-450 hover:text-slate-700 dark:hover:text-slate-200'); ?>">
            Pendentes
        </a>
        <a href="<?php echo e(route('admin.comments.index', ['status' => 'approved'])); ?>" 
           class="px-4 py-2 text-xs font-bold uppercase tracking-wider border-b-2 transition-colors <?php echo e($status === 'approved' ? 'border-primary text-primary' : 'border-transparent text-slate-450 hover:text-slate-700 dark:hover:text-slate-200'); ?>">
            Aprovados
        </a>
    </div>

    <!-- Table Listing -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-250 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/5">Autor</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-2/5">Comentário</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-1/5">Artigo</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-24">Estado</th>
                        <th class="p-4 text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 w-32">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800 text-sm">
                    <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-850/20">
                            <!-- Author info -->
                            <td class="p-4">
                                <div class="font-bold text-slate-900 dark:text-white"><?php echo e($comment->author_name); ?></div>
                                <div class="text-xs text-slate-400 dark:text-slate-500 mt-0.5 font-semibold"><?php echo e($comment->author_email); ?></div>
                                <div class="text-[10px] text-slate-400 dark:text-slate-500 mt-1 font-semibold"><?php echo e($comment->created_at->format('d M Y H:i')); ?></div>
                            </td>
                            <!-- Content -->
                            <td class="p-4 text-slate-700 dark:text-slate-300 text-xs leading-relaxed max-w-sm italic">
                                "<?php echo e($comment->content); ?>"
                            </td>
                            <!-- Article Title -->
                            <td class="p-4 text-slate-600 dark:text-slate-400 font-medium max-w-[200px] truncate" title="<?php echo e($comment->article->title ?? 'N/A'); ?>">
                                <?php if($comment->article): ?>
                                    <a href="/article/<?php echo e($comment->article->slug); ?>" target="_blank" class="hover:text-primary transition-colors">
                                        <?php echo e($comment->article->title); ?>

                                    </a>
                                <?php else: ?>
                                    <span class="text-slate-400">Artigo não encontrado</span>
                                <?php endif; ?>
                            </td>
                            <!-- Status -->
                            <td class="p-4">
                                <?php if($comment->is_approved): ?>
                                    <span class="inline-flex px-2 py-0.5 text-[9px] font-extrabold uppercase bg-emerald-500/10 text-emerald-500">Aprovado</span>
                                <?php else: ?>
                                    <span class="inline-flex px-2 py-0.5 text-[9px] font-extrabold uppercase bg-amber-500/10 text-amber-500">Pendente</span>
                                <?php endif; ?>
                            </td>
                            <!-- Actions -->
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <?php if(!$comment->is_approved): ?>
                                        <!-- Approve form -->
                                        <form action="<?php echo e(route('admin.comments.approve', $comment)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" 
                                                    class="px-2 py-1 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold uppercase tracking-wider hover:cursor-pointer transition-colors">
                                                Aprovar
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <!-- Delete form -->
                                    <form action="<?php echo e(route('admin.comments.destroy', $comment)); ?>" method="POST" onsubmit="return confirm('Deseja realmente eliminar este comentário?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" 
                                                class="px-2 py-1 bg-slate-105 dark:bg-slate-800 hover:bg-primary hover:text-white border border-slate-200 dark:border-slate-700 text-xs font-bold uppercase tracking-wider text-primary hover:cursor-pointer transition-colors">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="p-8 text-center text-slate-455 dark:text-slate-500">
                                Nenhum comentário encontrado.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($comments->hasPages()): ?>
            <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-900/50">
                <?php echo e($comments->links()); ?>

            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/admin/comments/index.blade.php ENDPATH**/ ?>