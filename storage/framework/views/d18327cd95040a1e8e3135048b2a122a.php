<?php $__env->startSection('title', 'Configurações do Sistema | AngoMarketers CMS'); ?>
<?php $__env->startSection('page_title', 'Configurações Gerais'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
        <div>
            <h2 class="font-heading font-black text-xl text-slate-900 dark:text-white leading-tight">Painel de Configurações</h2>
            <p class="text-xs text-slate-500 mt-1">Gerir o conteúdo dinâmico da página inicial, banners de publicidade e definições globais</p>
        </div>
    </div>

    <!-- Form Container with sections -->
    <form action="<?php echo e(route('admin.settings.update')); ?>" method="POST" enctype="multipart/form-data" class="space-y-8">
        <?php echo csrf_field(); ?>

        <!-- SECTION 1: SYSTEM & CONTACT INFO -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none space-y-6">
            <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white pb-3 border-b border-slate-100 dark:border-slate-800">1. Identidade do Portal & Contactos</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Site Name -->
                <div class="space-y-1">
                    <label for="system_site_name" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Nome do Portal</label>
                    <input type="text" name="system_site_name" id="system_site_name" value="<?php echo e(old('system_site_name', $settings['system_site_name'])); ?>" required
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary">
                    <?php $__errorArgs = ['system_site_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-primary font-bold mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Contact Email -->
                <div class="space-y-1">
                    <label for="system_contact_email" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">E-mail de Contacto</label>
                    <input type="email" name="system_contact_email" id="system_contact_email" value="<?php echo e(old('system_contact_email', $settings['system_contact_email'])); ?>"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary">
                    <?php $__errorArgs = ['system_contact_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-primary font-bold mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- WhatsApp number -->
                <div class="space-y-1">
                    <label for="system_contact_whatsapp" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">WhatsApp Oficial (com código de país)</label>
                    <input type="text" name="system_contact_whatsapp" id="system_contact_whatsapp" value="<?php echo e(old('system_contact_whatsapp', $settings['system_contact_whatsapp'])); ?>"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary"
                           placeholder="Ex: +244923000000">
                    <?php $__errorArgs = ['system_contact_whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-primary font-bold mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Site Description -->
                <div class="space-y-1 md:col-span-2">
                    <label for="system_site_description" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Descrição Geral / Meta Tag Description</label>
                    <textarea name="system_site_description" id="system_site_description" rows="3"
                              class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary resize-none"
                              placeholder="Breve descrição sobre o portal... (SEO)"><?php echo e(old('system_site_description', $settings['system_site_description'])); ?></textarea>
                </div>
            </div>

            <!-- Redes Sociais -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-slate-100 dark:border-slate-800">
                <!-- Facebook -->
                <div class="space-y-1">
                    <label for="system_facebook_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Facebook URL</label>
                    <input type="text" name="system_facebook_url" id="system_facebook_url" value="<?php echo e(old('system_facebook_url', $settings['system_facebook_url'])); ?>"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary">
                </div>
                <!-- Instagram -->
                <div class="space-y-1">
                    <label for="system_instagram_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Instagram URL</label>
                    <input type="text" name="system_instagram_url" id="system_instagram_url" value="<?php echo e(old('system_instagram_url', $settings['system_instagram_url'])); ?>"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary">
                </div>
                <!-- LinkedIn -->
                <div class="space-y-1">
                    <label for="system_linkedin_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">LinkedIn URL</label>
                    <input type="text" name="system_linkedin_url" id="system_linkedin_url" value="<?php echo e(old('system_linkedin_url', $settings['system_linkedin_url'])); ?>"
                           class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary">
                </div>
            </div>
        </div>

        <!-- SECTION 2: HOMEPAGE VIDEO FEATURE -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none space-y-6">
            <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white pb-3 border-b border-slate-100 dark:border-slate-800">2. Vídeo em Destaque da Homepage</h3>
            
            <div class="flex items-center gap-3">
                <input type="checkbox" name="homepage_video_show" id="homepage_video_show" value="1" <?php echo e(old('homepage_video_show', $settings['homepage_video_show']) == '1' ? 'checked' : ''); ?>

                       class="w-4 h-4 accent-primary rounded-none">
                <label for="homepage_video_show" class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-205 hover:cursor-pointer">Ativar Exibição do Vídeo na Homepage</label>
            </div>

            <div class="space-y-1">
                <label for="homepage_video_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">YouTube Video URL</label>
                <input type="text" name="homepage_video_url" id="homepage_video_url" value="<?php echo e(old('homepage_video_url', $settings['homepage_video_url'])); ?>"
                       class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary"
                       placeholder="Ex: https://www.youtube.com/watch?v=GyxYCgc3jmM ou https://youtu.be/GyxYCgc3jmM">
                <?php $__errorArgs = ['homepage_video_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-xs text-primary font-bold mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- SECTION 3: ADS BANNER SPACES -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 rounded-none space-y-8">
            <h3 class="font-heading font-bold text-base text-slate-950 dark:text-white pb-3 border-b border-slate-100 dark:border-slate-800">3. Espaços Publicitários (Banners)</h3>

            <!-- Ad Space A: Super Billboard -->
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h4 class="font-heading font-bold text-sm text-slate-800 dark:text-slate-200">Espaço A: Super Billboard (Topo/Destaque)</h4>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="ad_super_billboard_show" id="ad_super_billboard_show" value="1" <?php echo e(old('ad_super_billboard_show', $settings['ad_super_billboard_show']) == '1' ? 'checked' : ''); ?>

                               class="w-4 h-4 accent-primary rounded-none">
                        <label for="ad_super_billboard_show" class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-250 hover:cursor-pointer">Ativar</label>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Imagem do Banner</label>
                        <?php if($settings['ad_super_billboard_image']): ?>
                            <div class="mb-2">
                                <img src="<?php echo e($settings['ad_super_billboard_image']); ?>" alt="Super Billboard Banner" class="w-full max-h-24 object-cover border border-slate-200 dark:border-slate-800">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="ad_super_billboard_image_file"
                               class="w-full text-xs text-slate-500 file:py-2 file:px-3 file:bg-slate-100 dark:file:bg-slate-800 file:text-slate-700 dark:file:text-slate-200 file:border-none file:hover:bg-slate-200">
                    </div>
                    <div class="space-y-2">
                        <label for="ad_super_billboard_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">URL de Destino / Link</label>
                        <input type="text" name="ad_super_billboard_url" id="ad_super_billboard_url" value="<?php echo e(old('ad_super_billboard_url', $settings['ad_super_billboard_url'])); ?>"
                               class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary"
                               placeholder="Ex: https://empresa.com/campanha">
                    </div>
                </div>
            </div>

            <!-- Ad Space B: Slim Leaderboard -->
            <div class="space-y-4 pt-6 border-t border-slate-100 dark:border-slate-800">
                <div class="flex items-center justify-between">
                    <h4 class="font-heading font-bold text-sm text-slate-800 dark:text-slate-200">Espaço B: Slim Leaderboard (Corpo/Notícias)</h4>
                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="ad_slim_leaderboard_show" id="ad_slim_leaderboard_show" value="1" <?php echo e(old('ad_slim_leaderboard_show', $settings['ad_slim_leaderboard_show']) == '1' ? 'checked' : ''); ?>

                               class="w-4 h-4 accent-primary rounded-none">
                        <label for="ad_slim_leaderboard_show" class="text-xs font-bold uppercase tracking-wider text-slate-700 dark:text-slate-250 hover:cursor-pointer">Ativar</label>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">Imagem do Banner</label>
                        <?php if($settings['ad_slim_leaderboard_image']): ?>
                            <div class="mb-2">
                                <img src="<?php echo e($settings['ad_slim_leaderboard_image']); ?>" alt="Slim Leaderboard Banner" class="w-full max-h-24 object-cover border border-slate-200 dark:border-slate-800">
                            </div>
                        <?php endif; ?>
                        <input type="file" name="ad_slim_leaderboard_image_file"
                               class="w-full text-xs text-slate-500 file:py-2 file:px-3 file:bg-slate-100 dark:file:bg-slate-800 file:text-slate-700 dark:file:text-slate-200 file:border-none file:hover:bg-slate-200">
                    </div>
                    <div class="space-y-2">
                        <label for="ad_slim_leaderboard_url" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">URL de Destino / Link</label>
                        <input type="text" name="ad_slim_leaderboard_url" id="ad_slim_leaderboard_url" value="<?php echo e(old('ad_slim_leaderboard_url', $settings['ad_slim_leaderboard_url'])); ?>"
                               class="w-full px-4 py-2 bg-slate-50 dark:bg-slate-805 border border-slate-200 dark:border-slate-800 rounded-none text-slate-800 dark:text-slate-100 text-sm focus:outline-none focus:border-primary"
                               placeholder="Ex: https://empresa.com/promocao">
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end gap-3 bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-4">
            <button type="submit" 
                    class="px-6 py-3 bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-xs rounded-none uppercase tracking-wider hover:cursor-pointer transition-colors">
                Salvar Todas as Configurações
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/admin/settings/index.blade.php ENDPATH**/ ?>