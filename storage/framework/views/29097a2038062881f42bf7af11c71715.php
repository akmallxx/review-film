<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="dark:text-white text-2xl font-bold mb-4">Welcome to the Dashboard</h1>
    <p class="dark:text-neutral-300">Hi <?php echo e(Auth::user()->name); ?>👋, you logged in as <span class="font-bold text-blue-400"><?php echo e(ucfirst(Auth::user()->getRoleNames()->first())); ?></span></p>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/akmn4452/public_html/review-film.akmalazahwa.my.id/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>