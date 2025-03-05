<?php $__env->startSection('title', 'CRUD Genre'); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-3xl font-bold text-neutral-900 dark:text-white mb-8">Edit Genre</h2>
<div class="p-4 md:p-5 space-y-4">
    <?php
    if (isset($id)) {
    $url = route('admin.castings.update', $id);
    } else {
    $url = route('admin.castings.store');
    }
    ?>
    <form action="<?php echo e($url); ?>" method="POST" class="mx-auto">
        <?php echo csrf_field(); ?>
        <?php if(isset($id)): ?>
        <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="mb-5">
                <label for="nama_asli" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Nama Asli</label>
                <input type="text" name="nama_asli" id="nama_asli" value="<?php echo e($castings->nama_asli ?? ''); ?>" required class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required />
            </div>
            <div class="mb-5">
                <label for="nama_panggung" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Nama Panggung</label>
                <input type="text" name="nama_panggung" id="nama_panggung" value="<?php echo e($castings->nama_panggung ?? ''); ?>" required class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required />
            </div>
        </div>
        <div class="mb-5">
            <label for="id_film" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Nama Film</label>
            <select name="id_film" id="id_film" required
                class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Pilih Film --</option>
                <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($film->id); ?>" <?php echo e(isset($castings) && $castings->id_film == $film->id ? 'selected' : ''); ?>>
                    <?php echo e($film->judul); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>



        <div class="flex gap-3">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            <a href="<?php echo e(route('admin.castings')); ?>" class="py-2.5 px-5 text-sm font-medium text-neutral-900 focus:outline-none bg-white rounded-lg border border-neutral-200 hover:bg-neutral-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-neutral-100 dark:focus:ring-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-600 dark:hover:text-white dark:hover:bg-neutral-700">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\review-film\resources\views/admin/castings/create.blade.php ENDPATH**/ ?>