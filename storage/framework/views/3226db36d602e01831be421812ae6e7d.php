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

    <div class="p-12">
        <form action="" class="mb-12">
            <div class="relative">
                <input type="text" name="search" placeholder="Cari film..."
                    class="w-full px-4 py-3 text-black border-gray-300 bg-gray-100 rounded-md focus:ring-0 focus:border-red-500 dark:bg-neutral-950 dark:text-white dark:border-black dark:focus:border-red-500">
                <button type="submit"
                    class="text-gray-400 dark:text-white absolute inset-y-0 right-0 flex items-center px-4 rounded-e-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 1 0-1.5 1.5L21 21z" />
                    </svg>
                </button>
            </div>
        </form>

        <!-- Start movies Page -->
        <div id="movies" class="my-16 pembatas md:my-16">
            <div class="flex justify-between border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">MOVIES</h2>
                <a href="movies">
                    <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">LIHAT SEMUA <i class="bi bi-arrow-right"></i></span>
                </a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative max-w-sm overflow-hidden group">
                    <a href="<?php echo e(route('film.detail', $movie->id)); ?>" class="block">
                        <div class="w-full relative">
                            <!-- Poster -->
                            <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                src="<?php echo e($movie->poster); ?>"
                                alt="<?php echo e($movie->judul); ?>" />
                        </div>
                        <div class="dark:text-white bg-neutral-100 dark:bg-neutral-900 p-1">
                            <!-- Judul -->
                            <h5 class="text-sm font-bold drop-shadow"><?php echo e($movie->judul); ?></h5>
                            <!-- Tahun Rilis -->
                            <p class="text-xs dark:text-gray-300">
                                <?php echo e($movie->tahun_rilis); ?>

                            </p>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- End movies Page -->

        <!-- Start series page -->
        <div id="series" class="my-16 pembatas md:my-16">
            <div class="flex justify-between border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">SERIES</h2>
                <a href="series">
                    <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">LIHAT SEMUA <i class="bi bi-arrow-right"></i></span>
                </a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">
                <?php $__currentLoopData = $series; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative max-w-sm overflow-hidden group">
                    <a href="<?php echo e(route('film.detail', $serie->id)); ?>" class="block">
                        <div class="w-full relative">
                            <!-- Poster -->
                            <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                src="<?php echo e($serie->poster); ?>"
                                alt="<?php echo e($serie->judul); ?>" />
                        </div>
                        <div class="dark:text-white bg-neutral-100 dark:bg-neutral-900 p-1">
                            <!-- Judul -->
                            <h5 class="text-sm font-bold drop-shadow"><?php echo e($serie->judul); ?></h5>
                            <!-- Tahun Rilis -->
                            <p class="text-xs dark:text-gray-300">
                                <?php echo e($serie->tahun_rilis); ?>

                            </p>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- End series page -->

        <!-- Start anime Page -->
        <div id="anime" class="my-16 pembatas md:my-16">
            <div class="flex justify-between border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">ANIME</h2>
                <a href="anime">
                    <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">LIHAT SEMUA <i class="bi bi-arrow-right"></i></span>
                </a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">

                <?php $__currentLoopData = $animes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="relative max-w-sm overflow-hidden group">
                    <a href="<?php echo e(route('film.detail', $anime->id)); ?>" class="block">
                        <div class="w-full relative">
                            <!-- Poster -->
                            <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                src="<?php echo e($anime->poster); ?>"
                                alt="<?php echo e($anime->judul); ?>" />
                        </div>
                        <div class="dark:text-white bg-neutral-100 dark:bg-neutral-900 p-1">
                            <!-- Judul -->
                            <h5 class="text-sm font-bold drop-shadow"><?php echo e($anime->judul); ?></h5>
                            <!-- Tahun Rilis -->
                            <p class="text-xs dark:text-gray-300">
                                <?php echo e($anime->tahun_rilis); ?>

                            </p>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
        <!-- End anime Page -->

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
<?php endif; ?><?php /**PATH D:\NGODING\review-film\resources\views/home.blade.php ENDPATH**/ ?>