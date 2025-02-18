<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="py-6 max-w-7xl mx-auto">
        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-0">
            <form action="<?php echo e(route('home')); ?>" method="GET" class="mb-8">
                <div class="flex">
                    <!-- Dropdown Filter Genre -->
                    <div class="shrink-0">
                        <select name="genre" class="ps-4 pe-10 py-3 text-black border-gray-300 bg-gray-100 rounded-s-md focus:ring-0 focus:border-red-500 dark:bg-neutral-800 dark:text-white dark:border-black dark:focus:border-red-500">
                            <option value="" disable>Pilih Genre</option>
                            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($genre->slug); ?>"
                                <?php echo e(isset($search_genre) && $search_genre == $genre->slug ? 'selected' : ''); ?>>
                                <?php echo e($genre->title); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <!-- Search Input -->
                    <div class="relative w-full">
                        <input type="text" name="search" placeholder="Cari film..." autocomplete="off"
                            class="w-full px-4 py-3 text-black border-gray-300 bg-gray-100 rounded-e-md focus:ring-0 focus:border-red-500 dark:bg-neutral-950 dark:text-white dark:border-black dark:focus:border-red-500" />
                        <button type="submit"
                            class="text-gray-400 dark:text-white absolute inset-y-0 right-0 flex items-center px-4 rounded-e-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 1 0-1.5 1.5L21 21z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <?php if(isset($search) || isset($search_genre)): ?>
        <!-- Tampilan Hasil Pencarian -->
        <?php if($films->isEmpty()): ?>
        <p class="text-center text-gray-600 dark:text-gray-300">Tidak ada film yang ditemukan.</p>
        <?php else: ?>
        <div class="mx-auto px-4 sm:px-6 lg:px-0">
            <div class="flex justify-between border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">HASIL PENCARIAN</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">
                <?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative max-w-sm overflow-hidden group">
                    <a href="<?php echo e(route('film.detail', $film->slug)); ?>" class="block">
                        <div class="w-full relative">
                            <!-- Badge Total Rating -->
                            <div class="absolute top-2 left-2 bg-yellow-700 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg z-10">
                                ⭐ <?php echo e(number_format($film->average_rating, 1)); ?>

                            </div>

                            <!-- Poster dengan efek hover -->
                            <div class="relative w-full aspect-[3/4] overflow-hidden rounded-lg">
                                <img class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110"
                                    src="<?php echo e($film->poster_url); ?>"
                                    alt="<?php echo e($film->judul); ?>" />
                                <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-500 ease-out group-hover:bg-opacity-40"></div>
                            </div>
                        </div>
                        <div class="dark:text-white bg-transparent p-2 flex flex-col justify-between min-h-[70px]">
                            <!-- Judul dengan tinggi minimal -->
                            <h5 class="text-sm font-bold drop-shadow min-h-[40px] group-hover:text-red-500">
                                <?php echo e($film->judul); ?>

                            </h5>
                            <!-- Tahun Rilis -->
                            <p class="text-xs dark:text-gray-300 group-hover:text-gray-200">
                                <?php echo e($film->tahun_rilis); ?>

                            </p>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <!-- Start movies Page -->
        <div id="movies" class="">
            <div class="mx-auto px-4 sm:px-6 lg:px-0">
                <div class="flex justify-between border-l-4 border-red-600">
                    <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">MOVIES</h2>
                    <a href="movies">
                        <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">LIHAT SEMUA <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">
                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="relative max-w-sm overflow-hidden group">
                        <a href="<?php echo e(route('film.detail', $movie->slug)); ?>" class="block">
                            <div class="w-full relative">
                                <!-- Badge Total Rating -->
                                <div class="absolute top-2 left-2 bg-yellow-700 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg z-10">
                                    ⭐ <?php echo e(number_format($movie->average_rating, 1)); ?>

                                </div>

                                <!-- Poster dengan efek hover -->
                                <div class="relative w-full aspect-[3/4] overflow-hidden rounded-sm">
                                    <img class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110"
                                        src="<?php echo e($movie->poster_url); ?>"
                                        alt="<?php echo e($movie->judul); ?>" />
                                    <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-500 ease-out group-hover:bg-opacity-40"></div>
                                </div>
                            </div>
                            <div class="dark:text-white bg-transparent p-2 flex flex-col justify-between min-h-[70px]">
                                <!-- Judul dengan tinggi minimal -->
                                <h5 class="text-sm font-bold drop-shadow min-h-[40px] group-hover:text-red-500">
                                    <?php echo e($movie->judul); ?>

                                </h5>
                                <!-- Tahun Rilis -->
                                <p class="text-xs dark:text-gray-300 group-hover:text-gray-200">
                                    <?php echo e($movie->tahun_rilis); ?>

                                </p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!-- End movies Page -->

        <!-- Start series page -->
        <div id="series" class="my-16 pembatas md:my-16">
            <div class="mx-auto py-6 px-4 sm:px-6 lg:px-0">
                <div class="flex justify-between border-l-4 border-red-600">
                    <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">SERIES</h2>
                    <a href="series">
                        <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">LIHAT SEMUA <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">
                    <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="relative max-w-sm overflow-hidden group">
                        <a href="<?php echo e(route('film.detail', $serie->slug)); ?>" class="block">
                            <div class="w-full relative">
                                <!-- Badge Total Rating -->
                                <div class="absolute top-2 left-2 bg-yellow-700 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg z-10">
                                    ⭐ <?php echo e(number_format($serie->average_rating, 1)); ?>

                                </div>

                                <!-- Poster dengan efek hover -->
                                <div class="relative w-full aspect-[3/4] overflow-hidden rounded-sm">
                                    <img class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110"
                                        src="<?php echo e($serie->poster_url); ?>"
                                        alt="<?php echo e($serie->judul); ?>" />
                                    <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-500 ease-out group-hover:bg-opacity-40"></div>
                                </div>
                            </div>
                            <div class="dark:text-white bg-transparent p-2 flex flex-col justify-between min-h-[70px]">
                                <!-- Judul dengan tinggi minimal -->
                                <h5 class="text-sm font-bold drop-shadow min-h-[40px] group-hover:text-red-500">
                                    <?php echo e($serie->judul); ?>

                                </h5>
                                <!-- Tahun Rilis -->
                                <p class="text-xs dark:text-gray-300 group-hover:text-gray-200">
                                    <?php echo e($serie->tahun_rilis); ?>

                                </p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <!-- End series page -->

        <!-- Start anime Page -->
        <div id="anime" class="my-16 pembatas md:my-16">
            <div class="mx-auto py-6 px-4 sm:px-6 lg:px-0">
                <div class="flex justify-between border-l-4 border-red-600">
                    <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">ANIME</h2>
                    <a href="anime">
                        <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">LIHAT SEMUA <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">

                    <?php $__currentLoopData = $animes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="relative max-w-sm overflow-hidden group">
                        <a href="<?php echo e(route('film.detail', $anime->slug)); ?>" class="block">
                            <div class="w-full relative">
                                <!-- Badge Total Rating -->
                                <div class="absolute top-2 left-2 bg-yellow-700 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg z-10">
                                    ⭐ <?php echo e(number_format($anime->average_rating, 1)); ?>

                                </div>

                                <!-- Poster dengan efek hover -->
                                <div class="relative w-full aspect-[3/4] overflow-hidden rounded-sm">
                                    <img class="w-full h-full object-cover transition-transform duration-500 ease-out group-hover:scale-110"
                                        src="<?php echo e($anime->poster_url); ?>"
                                        alt="<?php echo e($anime->judul); ?>" />
                                    <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-500 ease-out group-hover:bg-opacity-40"></div>
                                </div>
                            </div>
                            <div class="dark:text-white bg-transparent p-2 flex flex-col justify-between min-h-[70px]">
                                <!-- Judul dengan tinggi minimal -->
                                <h5 class="text-sm font-bold drop-shadow min-h-[40px] group-hover:text-red-500">
                                    <?php echo e($anime->judul); ?>

                                </h5>
                                <!-- Tahun Rilis -->
                                <p class="text-xs dark:text-gray-300 group-hover:text-gray-200">
                                    <?php echo e($anime->tahun_rilis); ?>

                                </p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
        <!-- End anime Page -->
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH E:\review-film\resources\views/home.blade.php ENDPATH**/ ?>