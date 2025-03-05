<?php $__env->startSection('title', 'CRUD Genre'); ?>

<?php $__env->startSection('content'); ?>
    <h2 class="text-3xl font-bold text-neutral-900 dark:text-white mb-8">Edit Genre</h2>
    <div class="p-4 md:p-5 space-y-4">
        <?php
        if (isset($id)) {
            $url = route('admin.genre.update', $id);
        } else {
            $url = route('admin.genre.store');
        }
        ?>
        <form action="<?php echo e($url); ?>" method="POST" class="mx-auto">
            <?php echo csrf_field(); ?>
            <?php if(isset($id)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Nama</label>
                <input type="text" name="title" id="title" value="<?php echo e($genre->title ?? ''); ?>" required class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required />
            </div>

            <div class="flex gap-3">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                <a href="<?php echo e(route('admin.genre')); ?>" class="py-2.5 px-5 text-sm font-medium text-neutral-900 focus:outline-none bg-white rounded-lg border border-neutral-200 hover:bg-neutral-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-neutral-100 dark:focus:ring-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-600 dark:hover:text-white dark:hover:bg-neutral-700">Batal</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NGODING\review-film\resources\views/admin/genre/create.blade.php ENDPATH**/ ?>