

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-white dark:bg-neutral-600 p-6 rounded shadow-md">
    <h1 class="dark:text-white text-2xl font-bold mb-4">Welcome to the Dashboard</h1>
    <p class="dark:text-neutral-300">Here is some content for the dashboard page.</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\review-film\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>