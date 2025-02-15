

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-4">

    <table id="myTable" class="min-w-full border dark:border-neutral-500 rounded-lg shadow-lg dark:text-white">
        <thead class="bg-neutral-300 dark:bg-neutral-500">
            <tr>
                <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">ID</th>
                <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">KATEGORI</th>
                <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">POSTER</th>
                <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">JUDUL</th>
                <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">PENCIPTA</th>
                <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">KATEGORI UMUR</th>
                <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="border-b dark:border-neutral-500 hover:bg-neutral-100 dark:hover:bg-neutral-600 transition duration-300">
                <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100"><?php echo e($film->id); ?></td>
                <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100"><?php echo e($film->kategori_film); ?></td>
                <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100">
                    <img class="w-24 h-32 object-cover" src="<?php echo e($film->poster); ?>" alt="<?php echo e($film->slug); ?>">
                </td>
                <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100"><?php echo e($film->judul); ?></td>
                <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100"><?php echo e($film->pencipta); ?></td>
                <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100"><?php echo e($film->kategori_umur); ?></td>
                <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100">
                    <a class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300" href="">Edit</a>
                    <a class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300" href="">Delete</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "searching": true,
            "dom": '<"top"f>rt<"bottom"p><"clear">', // Mengatur posisi elemen seperti search dan pagination
            "pagingType": "simple", // Menambahkan tipe pagination yang lebih sederhana
            "lengthMenu": [5, 10, 25, 50],
            "pageLength": 10,
            "responsive": true // Menambahkan responsivitas pada tabel
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\review-film\resources\views/admin/film.blade.php ENDPATH**/ ?>