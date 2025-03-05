<?php $__env->startSection('title', $film->judul . ' - ' . config('app.name', 'Laravel')); ?>

<?php $__env->startSection('css-content'); ?>
<!-- Fancybox CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<style>
    .hidden-form {
        display: none;
    }
</style>
<?php $__env->stopSection(); ?>

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
    <div class="py-12">
        <div class="max-w-8xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="m-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-center">
                    <div class="p-4">
                        <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105 rounded-xl shadow-sm"
                            src="<?php echo e($film->poster_url); ?>" alt="<?php echo e($film->judul); ?>" />
                    </div>
                    <div class="col-span-2 sm:col-span-1 lg:col-span-2">
                        <h2
                            class="text-lg font-semibold tracking-tight text-black dark:text-white sm:text-xl md:text-2xl lg:text-3xl mb-2">
                            <?php echo e($film->judul); ?> <span class="text-md">(<?php echo e($film->tahun_rilis); ?>)</span>
                        </h2>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 flex items-center mb-8">
                            <i class="bi bi-camera-reels-fill mr-2"></i> By <span
                                class="font-bold ms-1"><?php echo e($film->pencipta); ?></span>
                        </p>

                        <div class="flex flex-wrap items-center gap-2 ">
                            <span
                                class="bg-red-700 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                <?php echo e(ucfirst($film->kategori_film)); ?>

                            </span>

                            <span
                                class="bg-orange-700 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                <?php echo e(ucfirst($film->kategori_umur)); ?>

                            </span>

                            <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span
                                class="bg-blue-800 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                <?php echo e($genre->title); ?>

                            </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <p class="text-sm sm:text-base text-black dark:text-neutral-200 pt-3 pb-8">
                            <?php echo e($film->deskripsi); ?>

                        </p>

                        <!-- Fancybox Trigger for Trailer -->
                        <a data-fancybox href="<?php echo e($film->trailer); ?>"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <i class="bi bi-play-circle"></i> Watch Trailer
                        </a>

                        <span class="me-4 ms-3 text-neutral-500 text-2xl">|</span>
                        <span class="dark:text-neutral-400 text-md">
                            <?php echo e($film->kategori_film !== 'movies' ? $film->total_episode . " Episodes" : $film->durasi_format); ?>

                        </span>
                        <div class="flex flex-wrap items-center mt-6">
                            <p class="flex text-lg md:text-xl drop-shadow-md">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <?php
                                    if ($i <=floor($roundedAverage)) {
                                    $icon='bi bi-star-fill text-yellow-400' ;
                                    } elseif ($i==ceil($roundedAverage) && fmod($roundedAverage, 1)>= 0.5) {
                                    $icon = 'bi bi-star-half text-yellow-400';
                                    } else {
                                    $icon = 'bi bi-star text-neutral-700';
                                    }
                                    ?>
                                    <span
                                        class="<?php echo e($icon); ?> text-2xl md:text-4xl px-0.5 md:px-1 hover:scale-110 transition-transform duration-200"></span>
                                    <?php endfor; ?>
                            </p>
                            <p class="text-xl md:text-2xl drop-shadow-md ms-2 md:ms-3 mt-1 md:mt-2 dark:text-white">
                                <?php echo e($roundedAverage); ?> <span
                                    class="dark:text-neutral-400 text-xs md:text-sm">(<?php echo e($numberOfComments); ?>

                                    rates)</span>
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php if($castings->count() > 0): ?>
    <div class="pb-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                        <p class="text-black dark:text-white text-2xl font-semibold mb-6">Castings</p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            <?php $__currentLoopData = $castings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-gray-100 dark:bg-neutral-700 p-4 rounded-lg shadow">
                                <p class="text-black dark:text-white font-medium"><?php echo e($casting->nama_asli); ?></p>
                                <p class="text-gray-600 dark:text-gray-300 text-sm"><?php echo e($casting->nama_panggung); ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="pb-12">
        <div class="max-w-8xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                        <p class="text-black dark:text-white text-2xl font-semibold mb-6">Komentar</p>

                        <?php if($countComment < 1): ?>
                            <div class="mt-8 pb-8 border-b relative">
                            <?php if(auth()->guard()->guest()): ?>
                            <h2 class="text-red-700 font-semibold text-center text-lg my-4">Harap login terlebih
                                dahulu untuk mengirim komentar</h2>
                            <?php else: ?>
                            <form action="<?php echo e(route('comments.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="flex flex-col md:flex-row items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <?php if( Auth::user()->avatar): ?>
                                            <img class="md:h-12 md:w-12 h-7 w-7 mt-2 rounded-full object-cover" src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="User Avatar">
                                        <?php else: ?>
                                            <img class="md:h-9 md:w-9 h-7 w-7 mt-2 rounded-full object-cover" src="<?php echo e(asset('storage/avatars/default-avatar.png')); ?>" alt="User Avatar">
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex-1 bg-white dark:bg-neutral-800 rounded-lg shadow-sm">
                                        <h3 class="text-gray-900 dark:text-white text-lg font-semibold mb-2">
                                            <?php echo e(Auth::user()->name); ?>

                                        </h3>

                                        <div class="flex items-center mb-2 space-x-1">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <span class="star bi bi-star-fill text-gray-400 cursor-pointer"
                                                data-value="<?php echo e($i); ?>"></span>
                                                <?php endfor; ?>
                                        </div>

                                        <textarea name="comment"
                                            class="w-full p-4 bg-neutral-200 dark:bg-neutral-700 text-gray-900 dark:text-white rounded-lg shadow-sm resize-none"
                                            rows="2" placeholder="Tulis komentar Anda..." id="comment"></textarea>

                                        <input type="hidden" name="id_film" value="<?php echo e($film->id); ?>">
                                        <input type="hidden" name="rating" id="rating" value="0">

                                        <button type="submit"
                                            class="mt-2 text-white bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5"
                                            id="submit-button" disabled>
                                            Kirim Komentar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <div class="space-y-4 mt-8">
                        <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="komentar-<?php echo e($c->user->name); ?>" class="flex flex-wrap items-start space-x-2 md:space-x-4 w-full relative bg-neutral-200 dark:bg-neutral-700 rounded-md p-4" id="comment-<?php echo e($c->id); ?>">
                            <div class="flex-shrink-0">
                                <?php if($c->user->avatar): ?>
                                    <img class="md:h-9 md:w-9 h-7 w-7 mt-1 rounded-full object-cover" src="<?php echo e(asset('storage/' . $c->user->avatar)); ?>" alt="User Avatar">
                                <?php else: ?>
                                    <img class="md:h-9 md:w-9 h-7 w-7 mt-1 rounded-full object-cover" src="<?php echo e(asset('storage/avatars/default-avatar.png')); ?>" alt="User Avatar">
                                <?php endif; ?>
                            </div>
                            <div class="flex-1 w-full">
                                <div class="flex items-center text-black dark:text-white font-semibold mb-1">
                                    <span class="text-sm md:text-lg font-semibold"><?php echo e($c->user->name); ?></span>
                                    <?php if($c->user->hasRole('admin')): ?>
                                    <span class="text-xs md:text-sm text-red-500 font-semibold ms-2">(Admin)</span>
                                    <?php elseif($c->user->hasRole('author')): ?>
                                    <span class="text-xs md:text-sm text-blue-500 font-semibold ms-2">(Author)</span>
                                    <?php endif; ?>
                                </div>

                                <?php if(!$c->user->hasRole(['admin', 'author'])): ?>
                                <div>
                                    <p class="-ms-0.5 flex text-xs md:text-sm drop-shadow-md items-center">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php
                                            $color=$i <=$c->rating ? 'bi bi-star-fill text-yellow-400' : 'bi bi-star text-neutral-800 dark:text-neutral-400';
                                            ?>
                                            <span class="<?php echo e($color); ?> px-0.5 md:px-1 hover:scale-110 transition-transform duration-200"></span>
                                            <?php endfor; ?>
                                    </p>
                                </div>
                                <?php endif; ?>

                                <div class="flex flex-col md:flex-row justify-between">
                                    <p class="text-neutral-700 dark:text-neutral-200 text-sm md:text-base" id="comment-text-<?php echo e($c->id); ?>"><?php echo e($c->comment); ?></p>
                                </div>
                                <p class="dark:text-neutral-400 text-xs text-right md:text-sm pt-2 md:mt-0">
                                    <?php echo e($c->created_at->diffForHumans()); ?>

                                </p>

                                <form id="edit-form-<?php echo e($c->id); ?>" action="<?php echo e(route('comments.update', $c->id)); ?>"
                                    method="POST" class="hidden-form mt-2">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <textarea name="comment"
                                        class="w-full p-2 border border-gray-300 rounded-md text-sm md:text-base"><?php echo e($c->comment); ?></textarea>
                                    <div class="mt-2">
                                        <label for="rating" class="block text-sm md:text-base font-medium text-gray-700">Rating</label>
                                        <select name="rating" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm text-sm md:text-base">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <option value="<?php echo e($i); ?>" <?php echo e($c->rating == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="bg-blue-500 text-white text-xs md:text-sm px-3 py-1 md:px-4 md:py-2 rounded-md mt-2">Update</button>
                                    <button type="button" onclick="toggleEditForm('<?php echo e($c->id); ?>')" class="bg-gray-500 text-white text-xs md:text-sm px-3 py-1 md:px-4 md:py-2 rounded-md mt-2 ml-2">Batal</button>
                                </form>
                            </div>

                            <div class="relative">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['update', 'delete'], $c)): ?>
                                <button onclick="toggleMenu(event, '<?php echo e($c->id); ?>')" class="dark:text-neutral-200 hover:text-neutral-400 pe-2">
                                    &#8942;
                                </button>
                                <?php endif; ?>

                                <div id="menu-<?php echo e($c->id); ?>" class="hidden absolute right-0 bg-white dark:bg-neutral-900 shadow-lg rounded-md py-1 w-24">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $c)): ?>
                                    <button onclick="toggleEditForm('<?php echo e($c->id); ?>')" class="block w-full text-left px-3 py-1 md:px-4 md:py-2 text-sm md:text-base text-blue-500 hover:bg-neutral-300 hover:dark:bg-neutral-600">Edit</button>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $c)): ?>
                                    <form action="<?php echo e(route('comments.destroy', $c->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="block w-full text-left px-3 py-1 md:px-4 md:py-2 text-sm md:text-base text-red-500 hover:bg-neutral-300 hover:dark:bg-neutral-600">Hapus</button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script>
    </script>
    <script>
        function toggleMenu(event, id) {
            event.stopPropagation();
            const menu = document.getElementById('menu-' + id);
            const isHidden = menu.classList.contains('hidden');
            document.querySelectorAll('[id^="menu-"]').forEach(m => m.classList.add('hidden'));
            if (isHidden) menu.classList.remove('hidden');
        }

        function toggleEditForm(id) {
            const commentText = document.getElementById(`comment-text-${id}`);
            const editForm = document.getElementById(`edit-form-${id}`);
            editForm.classList.toggle('hidden-form');
            commentText.classList.toggle('hidden-form');
        }

        document.addEventListener('click', function(event) {
            document.querySelectorAll('[id^="menu-"]').forEach(menu => {
                if (!menu.contains(event.target) && !menu.previousElementSibling.contains(event.target)) {
                    menu.classList.add('hidden');
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            // Initialize Fancybox for film trailer and other fancybox triggers
            Fancybox.bind("[data-fancybox]", {
                loop: true,
                autoFocus: false,
            });
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating');
            const textarea = document.getElementById('comment');
            const submitButton = document.getElementById('submit-button');

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const rating = star.getAttribute('data-value');
                    ratingInput.value = rating;

                    stars.forEach(s => {
                        s.classList.toggle("text-yellow-400", s.getAttribute("data-value") <= rating);
                        s.classList.toggle("text-gray-400", s.getAttribute("data-value") > rating);
                    });

                    updateButtonState();
                });
            });

            let savedRating = ratingInput.value;
            if (savedRating > 0) {
                stars.forEach(s => {
                    s.classList.toggle("text-yellow-400", s.getAttribute("data-value") <= savedRating);
                    s.classList.toggle("text-gray-400", s.getAttribute("data-value") > savedRating);
                });
            }

            textarea.addEventListener('input', updateButtonState);

            function updateButtonState() {
                const isRatingSelected = ratingInput.value > 0;
                const isCommentFilled = textarea.value.trim() !== '';
                if (isRatingSelected && isCommentFilled) {
                    submitButton.disabled = false;
                    submitButton.classList.remove('bg-gray-500');
                    submitButton.classList.add('bg-blue-600 hover:bg-blue-700');
                } else {
                    submitButton.disabled = true;
                    submitButton.classList.add('bg-gray-500');
                    submitButton.classList.remove('bg-blue-600 hover:bg-blue-700');
                }
            }

            updateButtonState();
        });

        function toggleEditForm(commentId) {
            const commentText = document.getElementById(`comment-text-${commentId}`);
            const editForm = document.getElementById(`edit-form-${commentId}`);

            if (editForm.classList.contains('hidden-form')) {
                editForm.classList.remove('hidden-form');
                commentText.classList.add('hidden-form');
            } else {
                editForm.classList.add('hidden-form');
                commentText.classList.remove('hidden-form');
            }
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH D:\NGODING\review-film\resources\views/detail.blade.php ENDPATH**/ ?>