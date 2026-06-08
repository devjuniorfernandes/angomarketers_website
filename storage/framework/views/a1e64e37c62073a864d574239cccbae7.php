<?php $__env->startSection('title', ($article->title ?? 'Artigo') . ' | AngoMarketers'); ?>

<?php $__env->startSection('content'); ?>

<?php
$paths = [
    ['name' => $article->category->name, 'url' => '/category/' . $article->category->slug],
    ['name' => $article->title, 'url' => '#']
];
?>

<!-- Page Breadcrumbs -->
<div class="max-w-7xl mx-auto px-4 md:px-8 pt-4">
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
</div>

<!-- Main Editorial Column -->
<article class="max-w-7xl mx-auto px-4 md:px-8 py-6">
    
    <!-- Title & Header area -->
    <header class="max-w-4xl mb-8">
        <a href="/category/<?php echo e($article->category->slug); ?>" class="inline-block text-xs font-extrabold uppercase tracking-widest text-primary mb-3">
            <?php echo e($article->category->name); ?>

        </a>
        <h1 class="font-heading font-black text-2xl sm:text-4xl lg:text-5xl text-slate-900 dark:text-white leading-tight mb-4">
            <?php echo e($article->title); ?>

        </h1>
        <?php if($article->subtitle): ?>
            <p class="text-slate-650 dark:text-slate-400 text-base sm:text-lg leading-relaxed font-medium">
                <?php echo e($article->subtitle); ?>

            </p>
        <?php endif; ?>

        <!-- Author metadata panel -->
        <div class="flex flex-wrap items-center gap-4 mt-6 py-4 border-t border-b border-slate-100 dark:border-slate-800">
            <a href="/author/<?php echo e($article->author->slug); ?>" class="relative w-11 h-11 rounded-none overflow-hidden border border-slate-200 dark:border-slate-700 shrink-0">
                <?php if($article->author->avatar_path): ?>
                    <img src="<?php echo e($article->author->avatar_path); ?>" alt="<?php echo e($article->author->name); ?>" class="w-full h-full object-cover" />
                <?php else: ?>
                    <div class="w-full h-full bg-slate-200 text-slate-700 font-bold flex items-center justify-center uppercase"><?php echo e(substr($article->author->name, 0, 1)); ?></div>
                <?php endif; ?>
            </a>
            <div class="flex-grow">
                <h4 class="text-sm font-bold text-slate-900 dark:text-white">
                    <a href="/author/<?php echo e($article->author->slug); ?>" class="hover:text-primary transition-colors">
                        Por <?php echo e($article->author->name); ?>

                    </a>
                </h4>
                <div class="flex items-center gap-1.5 text-xs text-slate-400 dark:text-slate-500 mt-0.5 font-semibold">
                    <time datetime="<?php echo e($article->published_at); ?>"><?php echo e($article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y')); ?></time>
                    <span>•</span>
                    <span><?php echo e($article->reading_time); ?> de leitura</span>
                </div>
            </div>

            <!-- Share icons (Top alignment) -->
            <div class="flex items-center gap-2">
                <a href="#" class="w-8 h-8 rounded-none bg-slate-50 dark:bg-slate-900 hover:bg-primary hover:text-white flex items-center justify-center border border-slate-200 dark:border-slate-800 text-slate-400 dark:text-slate-400 transition-all" title="Facebook">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 rounded-none bg-slate-50 dark:bg-slate-900 hover:bg-primary hover:text-white flex items-center justify-center border border-slate-200 dark:border-slate-800 text-slate-400 dark:text-slate-400 transition-all" title="Twitter">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 rounded-none bg-slate-50 dark:bg-slate-900 hover:bg-primary hover:text-white flex items-center justify-center border border-slate-200 dark:border-slate-800 text-slate-400 dark:text-slate-400 transition-all" title="LinkedIn">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
            </div>
        </div>
    </header>

    <!-- Featured cover image -->
    <div class="relative rounded-none overflow-hidden aspect-[21/9] w-full border border-slate-100 dark:border-slate-800 mb-10 bg-slate-900">
        <img src="<?php echo e($article->image_path); ?>" alt="<?php echo e($article->title); ?>" class="absolute inset-0 w-full h-full object-cover" />
    </div>

    <!-- Content Split Layout (70% vs 30%) -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        
        <!-- Left Side: Editorial Body (70% - 8 Cols) -->
        <div class="lg:col-span-8 space-y-10">
            <!-- Article Body Typography -->
            <div class="prose dark:prose-invert max-w-none text-slate-800 dark:text-slate-300 text-base sm:text-lg leading-relaxed space-y-6">
                <?php echo nl2br(e($article->body)); ?>

            </div>

            <!-- Share actions (Bottom alignment) -->
            <div class="flex items-center justify-between py-6 border-t border-b border-slate-100 dark:border-slate-800 mt-10">
                <span class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest">Gostou deste artigo? Partilhe</span>
                <div class="flex gap-2">
                    <!-- Share facebook button -->
                    <button class="px-3.5 py-2 bg-slate-100 dark:bg-slate-900 hover:bg-primary hover:text-white text-xs font-bold rounded-none border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 transition-all flex items-center gap-1.5">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c4.56-.93 8-4.96 8-9.75z"/></svg>
                        Facebook
                    </button>
                    <!-- Share twitter button -->
                    <button class="px-3.5 py-2 bg-slate-100 dark:bg-slate-900 hover:bg-primary hover:text-white text-xs font-bold rounded-none border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-400 transition-all flex items-center gap-1.5">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        Twitter
                    </button>
                </div>
            </div>

            <!-- Author Card Component -->
            <?php if (isset($component)) { $__componentOriginal4b336c3e2c0d473d83dd6062c74acb47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4b336c3e2c0d473d83dd6062c74acb47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.author-card','data' => ['author' => $authorBio]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('author-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['author' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($authorBio)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4b336c3e2c0d473d83dd6062c74acb47)): ?>
<?php $attributes = $__attributesOriginal4b336c3e2c0d473d83dd6062c74acb47; ?>
<?php unset($__attributesOriginal4b336c3e2c0d473d83dd6062c74acb47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4b336c3e2c0d473d83dd6062c74acb47)): ?>
<?php $component = $__componentOriginal4b336c3e2c0d473d83dd6062c74acb47; ?>
<?php unset($__componentOriginal4b336c3e2c0d473d83dd6062c74acb47); ?>
<?php endif; ?>

            <!-- Related Articles -->
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-5 flex items-center gap-2">
                    <span class="w-2 h-2 bg-primary"></span> Artigos Relacionados
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <?php $__currentLoopData = $relatedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <article class="group flex flex-col bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 rounded-none overflow-hidden hover:border-slate-350 dark:hover:border-slate-700 transition-colors">
                            <a href="/article/<?php echo e($item->slug); ?>" class="relative block overflow-hidden aspect-video">
                                <img src="<?php echo e($item->image_path); ?>" alt="<?php echo e($item->title); ?>" class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-300" />
                            </a>
                            <div class="p-4 flex flex-col flex-grow">
                                <span class="text-[9px] font-extrabold uppercase tracking-widest text-primary mb-1.5 block"><?php echo e($item->category->name); ?></span>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-white group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                                    <a href="/article/<?php echo e($item->slug); ?>"><?php echo e($item->title); ?></a>
                                </h4>
                                <span class="text-[10px] text-slate-400 dark:text-slate-500 mt-auto pt-3"><?php echo e($item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y')); ?></span>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Comments Section Boilerplate -->
            <div class="bg-slate-50 dark:bg-slate-900/60 border border-slate-200/60 dark:border-slate-800 rounded-none p-6">
                <h3 class="font-heading font-extrabold text-lg text-slate-950 dark:text-white mb-4">Comentários (<?php echo e(count($article->approvedComments)); ?>)</h3>
                
                <?php if(session('comment_success')): ?>
                    <div class="mb-4 p-4 bg-green-500/10 border border-green-500/30 text-green-500 text-sm font-bold">
                        <?php echo e(session('comment_success')); ?>

                    </div>
                <?php endif; ?>

                <!-- Comment list -->
                <div class="space-y-6 mb-8">
                    <?php $__empty_1 = true; $__currentLoopData = $article->approvedComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex gap-4 items-start">
                            <div class="w-9 h-9 rounded-none bg-slate-200 dark:bg-slate-800 flex items-center justify-center font-bold text-slate-600 dark:text-slate-400 uppercase shrink-0">
                                <?php echo e(substr($comment->author_name, 0, 1)); ?>

                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h5 class="text-xs font-bold text-slate-900 dark:text-white"><?php echo e($comment->author_name); ?></h5>
                                    <span class="text-[10px] text-slate-400"><?php echo e($comment->created_at->diffForHumans()); ?></span>
                                </div>
                                <p class="text-xs sm:text-sm text-slate-650 dark:text-slate-405 mt-1 leading-relaxed"><?php echo e($comment->content); ?></p>
                            </div>
                        </div>

                        <!-- Nested Replies -->
                        <?php $__currentLoopData = $comment->approvedReplies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex gap-4 items-start pl-8 sm:pl-12">
                                <div class="w-9 h-9 rounded-none bg-slate-200 dark:bg-slate-850 flex items-center justify-center font-bold text-slate-600 dark:text-slate-400 uppercase shrink-0">
                                    <?php echo e(substr($reply->author_name, 0, 1)); ?>

                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h5 class="text-xs font-bold text-slate-900 dark:text-white"><?php echo e($reply->author_name); ?></h5>
                                        <span class="text-[10px] text-slate-400"><?php echo e($reply->created_at->diffForHumans()); ?></span>
                                    </div>
                                    <p class="text-xs sm:text-sm text-slate-650 dark:text-slate-405 mt-1 leading-relaxed"><?php echo e($reply->content); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-xs text-slate-400">Nenhum comentário publicado ainda. Seja o primeiro a comentar!</p>
                    <?php endif; ?>
                </div>

                <!-- Add Comment Form -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-slate-400 dark:text-slate-500 mb-3.5">Deixe o seu Comentário</h4>
                    <form action="<?php echo e(route('article.comment.store', $article->slug)); ?>" method="POST" class="space-y-3">
                        <?php echo csrf_field(); ?>
                        <textarea name="content" placeholder="Escreva aqui..." rows="4" required
                                  class="w-full p-4 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none text-sm focus:ring-1 focus:ring-primary focus:outline-none dark:text-white"></textarea>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <input type="text" name="author_name" placeholder="Seu Nome" required class="w-full p-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none text-sm focus:outline-none focus:ring-1 focus:ring-primary dark:text-white">
                            <input type="email" name="author_email" placeholder="Seu Email" required class="w-full p-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none text-sm focus:outline-none focus:ring-1 focus:ring-primary dark:text-white">
                        </div>
                        
                        <button type="submit" class="px-5 py-3 bg-primary hover:bg-primary/95 text-white font-bold text-xs uppercase tracking-wider rounded-none transition-all">Publicar Comentário</button>
                    </form>
                </div>
            </div>

        </div>

        <!-- Right Side: Sidebar Column (30% - 4 Cols) -->
        <div class="lg:col-span-4">
            <?php if (isset($component)) { $__componentOriginal2880b66d47486b4bfeaf519598a469d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2880b66d47486b4bfeaf519598a469d6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sidebar','data' => ['trendingArticles' => $trendingArticles]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['trendingArticles' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($trendingArticles)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $attributes = $__attributesOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__attributesOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2880b66d47486b4bfeaf519598a469d6)): ?>
<?php $component = $__componentOriginal2880b66d47486b4bfeaf519598a469d6; ?>
<?php unset($__componentOriginal2880b66d47486b4bfeaf519598a469d6); ?>
<?php endif; ?>
        </div>

    </div>
</article>

<!-- Newsletter CTA at bottom -->
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/pages/article.blade.php ENDPATH**/ ?>