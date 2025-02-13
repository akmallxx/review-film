@section('title', $film->judul . ' - ' . config('app.name', 'Laravel'))
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="m-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-center">
                    <div class="p-4">
                        <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105 rounded-xl shadow-sm"
                            src="{{ $film->poster }}" alt="{{ $film->judul }}" />
                    </div>
                    <div class="col-span-2 sm:col-span-1 lg:col-span-2">
                        <h2
                            class="text-lg font-semibold tracking-tight text-black dark:text-white sm:text-xl md:text-2xl lg:text-3xl mb-4">
                            {{ $film->judul }} <span class="text-md">({{ $film->tahun_rilis }})</span>
                        </h2>

                        <!-- Kategori Film -->
                        <span
                            class="bg-red-700 text-white text-sm font-medium me-2 px-2.5 pb-1 pt-0.5 rounded-full">{{ ucfirst($film->kategori_film) }}</span>

                        <!-- Kategori Umur -->
                        <span
                            class="bg-orange-600 text-white text-sm font-medium me-2 px-2.5 pb-1 pt-0.5 rounded-full">{{ ucfirst($film->kategori_umur) }}</span>

                        <!-- Genres -->
                        @foreach ($genres as $genre)
                            <span
                                class="bg-cyan-700 text-white text-sm font-medium me-2 px-2.5 pb-1 pt-0.5 rounded-full">{{ $genre->title }}</span>
                        @endforeach

                        <p class="text-sm sm:text-base text-black dark:text-neutral-200 pt-3">{{ $film->deskripsi }}</p>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 py-6">
                            Pencipta: {{ $film->pencipta }}
                        </p>

                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <i class="bi bi-play-circle"></i> Watch Trailer
                        </button>
                        <span class="me-6 ms-4 text-neutral-500 text-2xl">|</span> <!-- Separator -->
                        <span class="dark:text-neutral-400 text-md">{{ $film->durasi_format }}</span>
                        <div class="flex flex-wrap items-center mt-6">
                            <p class="flex text-lg md:text-xl drop-shadow-md">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span
                                        class="fa fa-star text-{{ $i <= 4 ? 'yellow-400' : 'neutral-600' }} text-2xl md:text-4xl px-0.5 md:px-1"></span>
                                @endfor
                            </p>
                            <p class="text-xl md:text-2xl drop-shadow-md ms-2 md:ms-3 mt-1 md:mt-2 text-white">
                                4.1 <span class="text-neutral-400 text-xs md:text-sm">(322 rates)</span>
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Main modal -->
                <div id="default-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-5xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-transparent rounded-lg shadow-sm">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between rounded-t dark:border-neutral-600 border-neutral-200">
                                <button type="button"
                                    class="text-neutral-400 bg-neutral-800 dark:bg-black hover:bg-neutral-500 hover:text-neutral-900 rounded-lg text-lg w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white"
                                    data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                @if (Str::contains($film->trailer, 'youtube.com') || Str::contains($film->trailer, 'youtu.be'))
                                                                @php
                                                                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $film->trailer, $matches);
                                                                    $youtubeId = $matches[1] ?? null;
                                                                @endphp

                                                                @if ($youtubeId)
                                                                    <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                                        frameborder="0" allowfullscreen></iframe>
                                                                @else
                                                                    <p>Invalid YouTube URL</p>
                                                                @endif
                                @else
                                    <video class="w-full" controls>
                                        <source src="{{ $film->trailer }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                        <p class="text-black dark:text-white">Hitam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                        <h3 class="text-2xl font-semibold text-white mb-4">Komentar</h3>

                        <div class="mt-8 pb-8 border-b relative">
                            @guest
                                <h2 class="text-red-700 font-semibold text-center text-lg my-4">Harap login terlebih
                                    dahulu untuk mengirim komentar</h2>
                            @else
                                <!-- Comment Input Section -->
                                <div class="flex items-start space-x-4">
                                    <!-- User Avatar -->
                                    <div class="flex-shrink-0">
                                        <img class="h-12 w-12 rounded-full object-cover"
                                            src="https://www.w3schools.com/w3images/avatar1.png" alt="User Avatar">
                                    </div>

                                    <!-- Comment Input Area -->
                                    <div class="flex-1">
                                        <!-- Textarea for Comment -->
                                        <textarea
                                            class="w-full p-4 bg-neutral-700 text-white rounded-lg shadow-sm resize-none"
                                            rows="4" placeholder="Tulis komentar Anda..."></textarea>

                                        <!-- Submit Button -->
                                        <button
                                            class="mt-4 text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Kirim
                                            Komentar</button>
                                    </div>
                                </div>
                            @endguest
                        </div>


                        <div class="space-y-4 mt-8">

                            <div class="flex items-start space-x-4 py-2">
                                <div class="flex-shrink-0">
                                    <img class="h-12 w-12 rounded-full object-cover"
                                        src="https://www.w3schools.com/w3images/avatar2.png" alt="User 1">
                                </div>
                                <div class="flex-1">
                                    <div class="text-black dark:text-white font-semibold">User 1</div>
                                    <p class="text-neutral-400">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Accusamus suscipit ad eligendi quaerat numquam deleniti, tempora fuga
                                        veritatis dolorum architecto maiores, consequatur debitis deserunt laborum
                                        totam iusto corrupti, quae soluta. Accusantium molestias ducimus illum
                                        exercitationem quos eum eaque doloribus ipsum nam asperiores distinctio
                                        aliquid ullam est, accusamus natus, qui illo.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 py-2">
                                <div class="flex-shrink-0">
                                    <img class="h-12 w-12 rounded-full object-cover"
                                        src="https://www.w3schools.com/w3images/avatar2.png" alt="User 2">
                                </div>
                                <div class="flex-1">
                                    <div class="text-black dark:text-white font-semibold">User 2</div>
                                    <p class="text-neutral-400">Kisah yang sangat emosional, meskipun agak berat,
                                        tetapi tetap menghibur.</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 py-2">
                                <div class="flex-shrink-0">
                                    <img class="h-12 w-12 rounded-full object-cover"
                                        src="https://www.w3schools.com/w3images/avatar2.png" alt="User 3">
                                </div>
                                <div class="flex-1">
                                    <div class="text-black dark:text-white font-semibold">User 3</div>
                                    <p class="text-neutral-400">Saya rasa film ini terlalu gelap untuk selera saya,
                                        tetapi tetap memberikan beberapa momen yang menarik.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>