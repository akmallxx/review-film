<?php $__env->startSection('title', 'CRUD User'); ?>

<?php $__env->startSection('content'); ?>

<div class="flex justify-between mb-8">
    <h2 class="text-3xl font-bold text-neutral-900 dark:text-white">Tabel Pengguna</h2>

    <!-- Create User Button -->
    <a href="<?php echo e(route('admin.users.create')); ?>"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class="bi bi-plus-circle me-2"></i>Tambah Pengguna
    </a>
</div>

<table id="myTable" class="min-w-full border dark:border-neutral-500 rounded-lg shadow-lg dark:text-white">
    <thead class="bg-neutral-300 dark:bg-neutral-600">
        <tr>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">ID</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">Nama</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">Email</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">Roles</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-b dark:border-neutral-500 hover:bg-neutral-100 dark:hover:bg-neutral-600 transition duration-300">
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500"><?php echo e($user->id); ?></td>
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500"><?php echo e($user->name); ?></td>
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500"><?php echo e($user->email); ?></td>
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500"><?php echo e($user->getRoleNames()->implode(', ')); ?></td>
            <td class="p-4 text-xs text-neutral-700 dark:text-neutral-100 border-b border-neutral-500">
                <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                    class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Edit</a>

                <form id="delete-form-<?php echo e($user->id); ?>" action="<?php echo e(route('admin.users.delete', $user->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="button" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300" onclick="confirmDelete(<?php echo e($user->id); ?>)">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus pengguna?',
                text: "Data yang sudah dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\NGODING\review-film\resources\views/admin/users/index.blade.php ENDPATH**/ ?>