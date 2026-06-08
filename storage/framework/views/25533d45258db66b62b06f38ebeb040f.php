<!DOCTYPE html>
<html lang="pt" class="h-full bg-slate-50 dark:bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Login | AngoMarketers</title>
    
    <!-- Fonts: Inter & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="h-full flex items-center justify-center font-sans antialiased text-slate-900 dark:text-slate-100 p-4">
    <div class="w-full max-w-md bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-none p-8">
        
        <!-- Logo / Title -->
        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center gap-2 group mb-4">
                <span class="bg-primary text-white text-xs font-black px-2 py-1 uppercase tracking-wider rounded-none group-hover:bg-primary/95 transition-colors">
                    ANGO
                </span>
                <span class="font-heading font-black text-lg tracking-tight text-slate-900 dark:text-white">
                    MARKETERS <span class="text-primary font-light">CMS</span>
                </span>
            </a>
            <p class="text-xs text-slate-400 dark:text-slate-500 uppercase tracking-widest font-semibold mt-1">
                Painel de Administração do Portal
            </p>
        </div>

        <?php if($errors->any()): ?>
            <div class="mb-6 bg-primary/10 border-l-4 border-primary p-4 rounded-none text-sm text-primary font-medium">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo e($error); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.login.submit')); ?>" method="POST" class="space-y-6">
            <?php echo csrf_field(); ?>

            <!-- Email Input -->
            <div class="space-y-1">
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                    E-mail
                </label>
                <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required autofocus
                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                    placeholder="admin@angomarketers.com">
            </div>

            <!-- Password Input -->
            <div class="space-y-1">
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500">
                        Palavra-passe
                    </label>
                </div>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 rounded-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary text-slate-800 dark:text-slate-100 placeholder-slate-400 text-sm transition-colors"
                    placeholder="••••••••">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember"
                    class="h-4 w-4 rounded-none border-slate-350 dark:border-slate-800 text-primary focus:ring-primary bg-white dark:bg-slate-850">
                <label for="remember" class="ml-2 block text-xs font-semibold text-slate-500 dark:text-slate-400">
                    Lembrar-me neste dispositivo
                </label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-primary hover:bg-primary/95 text-white font-heading font-extrabold text-sm py-3 px-4 rounded-none hover:cursor-pointer transition-colors uppercase tracking-wider">
                    Entrar no Painel
                </button>
            </div>
        </form>
    </div>
</body>
</html>
<?php /**PATH /Users/utilizador/Desktop/BUILDINS/angomarketers/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>