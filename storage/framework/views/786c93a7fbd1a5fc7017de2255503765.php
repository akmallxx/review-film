

<?php $__env->startSection('title', 'CRUD Film'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-neutral-200 dark:bg-neutral-600 p-6 rounded shadow-md">
    <h2 class="text-3xl font-bold text-neutral-900 dark:text-white mb-8">Edit Film</h2>
    <div class="p-4 md:p-5 space-y-4">
        <form action="<?php echo e(route('admin.film.update', $id)); ?>" method="POST" enctype="multipart/form-data" class="mx-auto">
            <?php echo csrf_field(); ?>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Pilih Metode Poster</label>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="poster_method" value="url" <?php echo e($film->poster_method == 'url' ? 'checked' : ''); ?> onclick="togglePosterInput('url')" class="form-radio text-blue-600">
                        <span class="ml-2 text-sm text-neutral-900 dark:text-white">Gunakan URL</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="poster_method" value="upload" <?php echo e($film->poster_method == 'file' ? 'checked' : ''); ?> onclick="togglePosterInput('upload')" class="form-radio text-blue-600">
                        <span class="ml-2 text-sm text-neutral-900 dark:text-white">Unggah File</span>
                    </label>
                </div>
            </div>

            <!-- Input Poster URL -->
            <div id="poster_url" class="mb-5" style="<?php echo e($film->poster_method == 'url' ? '' : 'display: none;'); ?>">
                <label for="poster_url_input" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Poster URL</label>
                <input type="text" name="poster_url" id="poster_url_input" value="<?php echo e($film->poster_url); ?>" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan URL Poster" required />
            </div>

            <!-- Input Poster File Upload -->
            <div id="poster_upload" class="mb-5" style="<?php echo e($film->poster_method == 'file' ? '' : 'display: none;'); ?>">
                <label for="poster_file_input" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Unggah Poster</label>
                <input type="file" name="poster_file" id="poster_file_input" class="block w-full text-sm text-neutral-900 border border-neutral-300 rounded-lg cursor-pointer bg-neutral-50 dark:text-neutral-400 dark:border-neutral-600 dark:bg-neutral-700 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Unggah file gambar (JPG, PNG, JPEG)</p>
            </div>

            <div class="mb-5">
                <label for="judul" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Judul</label>
                <input type="text" name="judul" id="judul" value="<?php echo e($film->judul); ?>" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Judul" required />
            </div>

            <div class="mb-5">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Deskripsi" required><?php echo e($film->deskripsi); ?></textarea>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-5">
                    <label for="kategori_film" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Kategori Film</label>
                    <select name="kategori_film" id="kategori_film" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="" disabled>Pilih Kategori</option>
                        <option value="movies" <?php echo e($film->kategori_film == 'movies' ? 'selected' : ''); ?>>Movies</option>
                        <option value="series" <?php echo e($film->kategori_film == 'series' ? 'selected' : ''); ?>>Series</option>
                        <option value="anime" <?php echo e($film->kategori_film == 'anime' ? 'selected' : ''); ?>>Anime</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="tahun_rilis" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Tahun Rilis</label>
                    <input type="number" name="tahun_rilis" id="tahun_rilis" value="<?php echo e($film->tahun_rilis); ?>" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Tahun Rilis" required />
                </div>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-5">
                    <label for="durasi" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Durasi Film (Menit)</label>
                    <input type="number" name="durasi" id="durasi" value="<?php echo e($film->durasi); ?>" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Durasi" required />
                </div>
                <div class="mb-5">
                    <label for="pencipta" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Pencipta</label>
                    <input type="text" name="pencipta" id="pencipta" value="<?php echo e($film->pencipta); ?>" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Pencipta" required />
                </div>
            </div>

            <div class="mb-5">
                <label for="trailer" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Trailer URL</label>
                <input type="text" name="trailer" id="trailer" value="<?php echo e($film->trailer); ?>" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan URL Trailer" required />
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-5">
                    <label for="kategori_umur" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Kategori Umur</label>
                    <input type="text" name="kategori_umur" id="kategori_umur" value="<?php echo e($film->kategori_umur); ?>" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Kategori Umur" required />
                </div>
                <div class="mb-5">
                    <label for="total_episode" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Total Episode</label>
                    <input type="number" name="total_episode" id="total_episode" value="<?php echo e($film->total_episode); ?>" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-700 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Total Episode" required />
                </div>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            <a href="<?php echo e(route('admin.film')); ?>" class="py-2.5 px-5 ms-3 text-sm font-medium text-neutral-900 focus:outline-none bg-white rounded-lg border border-neutral-200 hover:bg-neutral-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-neutral-100 dark:focus:ring-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-600 dark:hover:text-white dark:hover:bg-neutral-700">Batal</a>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function togglePosterInput(method) {
        if (method === 'url') {
            document.getElementById('poster_url').style.display = 'block';
            document.getElementById('poster_upload').style.display = 'none';
        } else {
            document.getElementById('poster_url').style.display = 'none';
            document.getElementById('poster_upload').style.display = 'block';
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\review-film\resources\views/admin/film/edit.blade.php ENDPATH**/ ?>