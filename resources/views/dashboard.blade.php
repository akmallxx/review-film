<x-app-layout>

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
        <div id="movies" class="my-8 md:my-16">
            <div class="flex justify-between">
                <h2 class="text-black dark:text-white font-semibold text-lg md:text-xl">MOVIES</h2>
                <a href="movies">
                    <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">Lihat Semua</span>
                </a>
            </div>
            <div class="position-relative border-b border-gray-400">
                <hr class="thick-hr">
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-4">

                <div class="relative max-w-sm overflow-hidden group">
                    <a href="detail" class="block">
                        <div class="w-full relative">
                            <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                src="https://asset.tix.id/wp-content/uploads/2025/01/f3e9f805-8c13-4cb5-a50e-815d26b92712-600x885.webp"
                                alt="COMPANION" />
                        </div>
                        <div class="dark:text-white bg-neutral-100 dark:bg-neutral-900 p-1">
                            <h5 class="text-sm font-bold drop-shadow">Companion</h5>
                            <p class="text-xs dark:text-gray-300">
                                2024
                            </p>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
                <div class="swiper-slide">Slide 10</div>
                <div class="swiper-slide">Slide 11</div>
                <div class="swiper-slide">Slide 12</div>

            </div>
        </div>
        <!-- End movies Page -->

        <!-- Start series page -->
        <div id="series" class="my-8 md:my-16">
            <div class="flex justify-between">
                <h2 class="text-black dark:text-white font-semibold text-lg md:text-xl">SERIES</h2>
                <a href="series">
                    <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">Lihat Semua</span>
                </a>
            </div>
            <div class="position-relative border-b border-gray-400">
                <hr class="thick-hr">
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-4">

                <div class="relative max-w-sm overflow-hidden group">
                    <a href="detail" class="block">
                        <div class="w-full relative">
                            <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                src="https://asset.tix.id/wp-content/uploads/2025/01/f3e9f805-8c13-4cb5-a50e-815d26b92712-600x885.webp"
                                alt="COMPANION" />
                        </div>
                        <div class="dark:text-white bg-neutral-100 dark:bg-neutral-900 p-1">
                            <h5 class="text-sm font-bold drop-shadow">Companion</h5>
                            <p class="text-xs dark:text-gray-300">
                                2024
                            </p>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
                <div class="swiper-slide">Slide 10</div>
                <div class="swiper-slide">Slide 11</div>
                <div class="swiper-slide">Slide 12</div>

            </div>
        </div>
        <!-- End series page -->

        <!-- Start anime Page -->
        <div id="anime" class="my-8 md:my-16">
            <div class="flex justify-between">
                <h2 class="text-black dark:text-white font-semibold text-lg md:text-xl">ANIME</h2>
                <a href="anime">
                    <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">Lihat Semua</span>
                </a>
            </div>
            <div class="position-relative border-b border-gray-400">
                <hr class="thick-hr">
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-4">

                <div class="relative max-w-sm overflow-hidden group">
                    <a href="detail" class="block">
                        <div class="w-full relative">
                            <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                src="https://asset.tix.id/wp-content/uploads/2025/01/f3e9f805-8c13-4cb5-a50e-815d26b92712-600x885.webp"
                                alt="COMPANION" />
                        </div>
                        <div class="dark:text-white bg-neutral-100 dark:bg-neutral-900 p-1">
                            <h5 class="text-sm font-bold drop-shadow">Companion</h5>
                            <p class="text-xs dark:text-gray-300">
                                2024
                            </p>
                        </div>
                    </a>
                </div>

                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                <div class="swiper-slide">Slide 4</div>
                <div class="swiper-slide">Slide 5</div>
                <div class="swiper-slide">Slide 6</div>
                <div class="swiper-slide">Slide 7</div>
                <div class="swiper-slide">Slide 8</div>
                <div class="swiper-slide">Slide 9</div>
                <div class="swiper-slide">Slide 10</div>
                <div class="swiper-slide">Slide 11</div>
                <div class="swiper-slide">Slide 12</div>

            </div>
        </div>
        <!-- End anime Page -->

    </div>


</x-app-layout>