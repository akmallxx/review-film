<x-app-layout>

    <div class="p-12">
        <form action="" class="mb-12">
            <div class="relative">
                <input type="text" name="search" placeholder="Cari film..."
                    class="w-full px-4 py-3 text-black border-gray-300 bg-gray-100 rounded-sm focus:ring-0 focus:border-red-500 dark:bg-neutral-950 dark:text-white dark:border-black dark:focus:border-red-500">
                <button type="submit"
                    class="text-gray-400 dark:text-white absolute inset-y-0 right-0 flex items-center px-4 rounded-e-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 1 0-1.5 1.5L21 21z" />
                    </svg>
                </button>
            </div>
        </form>

        <div id="trend">
            <div class="border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-xl">SEDANG TREN</h2>
            </div>
            <!-- Swiper -->
            <div class="mt-4 pembatas swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide rounded-md">

                        <div class="relative max-w-sm">
                            <a href="detail" class="">
                                <div class="w-full">
                                    <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                        src="https://asset.tix.id/wp-content/uploads/2025/01/f3e9f805-8c13-4cb5-a50e-815d26b92712-600x885.webp"
                                        alt="COMPANION" />
                                </div>
                                <div class=" dark:text-white bg-neutral-100 dark:bg-neutral-900 p-1">
                                    <h5 class="text-sm font-bold drop-shadow">Companion</h5>
                                    <p class="text-xs dark:text-gray-300">
                                        2024
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div id="latest">
            <div class="border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-xl">TERBARU</h2>
            </div>
            <!-- Swiper -->
            <div class="mt-4 pembatas swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide rounded-md">

                        <div class="relative max-w-sm overflow-hidden group shadow-lg">
                            <a href="detail" class="block">
                                <div class="w-full relative">
                                    <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                        src="https://asset.tix.id/wp-content/uploads/2025/01/f3e9f805-8c13-4cb5-a50e-815d26b92712-600x885.webp"
                                        alt="COMPANION" />
                                </div>
                            </a>
                            <div
                                class="absolute bottom-0 p-2 text-white bg-gradient-to-t from-black/80 via-black/80 to-transparent w-full">
                                <h5 class="text-sm font-bold drop-shadow">Companion</h5>
                                <p class="text-xs text-gray-300">
                                    2024
                                </p>
                                <p class="text-xs pt-2">
                                    <span class="fa fa-star checked text-yellow-400"></span>
                                    <span class="fa fa-star checked text-yellow-400"></span>
                                    <span class="fa fa-star checked text-yellow-400"></span>
                                    <span class="fa fa-star checked text-yellow-400"></span>
                                    <span class="fa fa-star text-gray-400"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div id="anime">
            <div class="border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-xl">ANIME</h2>
            </div>
            <!-- Swiper -->
            <div class="mt-4 pembatas swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide rounded-md">

                        <div class="relative max-w-sm overflow-hidden group shadow-lg">
                            <a href="detail" class="block">
                                <div class="w-full relative">
                                    <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                        src="https://asset.tix.id/wp-content/uploads/2025/01/f3e9f805-8c13-4cb5-a50e-815d26b92712-600x885.webp"
                                        alt="COMPANION" />
                                </div>
                            </a>
                            <div
                                class="absolute bottom-0 p-2 text-white bg-gradient-to-t from-black/80 via-black/80 to-transparent w-full">
                                <h5 class="text-sm font-bold drop-shadow">Companion</h5>
                                <p class="text-xs text-gray-300">
                                    2024
                                </p>
                                <p class="text-xs pt-2">
                                    <span class="fa fa-star checked text-yellow-400"></span>
                                    <span class="fa fa-star checked text-yellow-400"></span>
                                    <span class="fa fa-star checked text-yellow-400"></span>
                                    <span class="fa fa-star checked text-yellow-400"></span>
                                    <span class="fa fa-star text-gray-400"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

    </div>


</x-app-layout>