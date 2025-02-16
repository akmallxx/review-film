@section('title', $film->judul . ' - ' . config('app.name', 'Laravel'))
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="m-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-center">
                    <div class="p-4">
                        <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105 rounded-xl shadow-sm"
                            src="{{ $film->poster_url }}" alt="{{ $film->judul }}" />
                    </div>
                    <div class="col-span-2 sm:col-span-1 lg:col-span-2">
                        <h2 class="text-lg font-semibold tracking-tight text-black dark:text-white sm:text-xl md:text-2xl lg:text-3xl mb-2">
                            {{ $film->judul }} <span class="text-md">({{ $film->tahun_rilis }})</span>
                        </h2>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 flex items-center mb-8">
                            <i class="bi bi-camera-reels-fill mr-2"></i> By <span class="font-bold ms-1">{{ $film->pencipta }}</span>
                        </p>

                        <div class="flex flex-wrap items-center gap-2 ">
                            <!-- Kategori Film -->
                            <span class="bg-red-700 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                {{ ucfirst($film->kategori_film) }}
                            </span>

                            <!-- Kategori Umur -->
                            <span class="bg-orange-700 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                {{ ucfirst($film->kategori_umur) }}
                            </span>

                            <!-- Genres -->
                            @foreach ($genres as $genre)
                            <span class="bg-blue-800 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                {{ $genre->title }}
                            </span>
                            @endforeach
                        </div>

                        <p class="text-sm sm:text-base text-black dark:text-neutral-200 pt-3 pb-8">{{ $film->deskripsi }}</p>

                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <i class="bi bi-play-circle"></i> Watch Trailer
                        </button>
                        <span class="me-6 ms-4 text-neutral-500 text-2xl">|</span> <!-- Separator -->
                        <span class="dark:text-neutral-400 text-md">
                            {{ $film->kategori_film !== 'movies' ? "Total Episode: " . $film->total_episode : $film->durasi_format }}
                        </span>
                        <div class="flex flex-wrap items-center mt-6">
                            <p class="flex text-lg md:text-xl drop-shadow-md">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php
                                    $color=$i <=$roundedAverage ? 'bi bi-star-fill text-yellow-400' : 'bi bi-star text-neutral-700' ;
                                    @endphp
                                    <span class="{{ $color }} text-2xl md:text-4xl px-0.5 md:px-1 hover:scale-110 transition-transform duration-200"></span>
                                    @endfor
                            </p>
                            <p class="text-xl md:text-2xl drop-shadow-md ms-2 md:ms-3 mt-1 md:mt-2 dark:text-white">
                                {{ $roundedAverage }} <span class="dark:text-neutral-400 text-xs md:text-sm">({{ $numberOfComments }} rates)</span>
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

    @if ($castings->count() > 0)
    <div class="pb-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                        <p class="text-black dark:text-white text-xl font-semibold mb-6">Castings</p>

                        <!-- Grid untuk Castings -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                            @foreach ($castings as $casting)
                            <div class="bg-gray-100 dark:bg-neutral-700 p-4 rounded-lg shadow">
                                <p class="text-black dark:text-white font-medium">{{ $casting->nama_asli }}</p>
                                <p class="text-gray-600 dark:text-gray-300 text-sm">{{ $casting->nama_panggung }}</p>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="pb-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <h3 class="text-4xl font-semibold text-white mt-8">Komentar</h3>
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">

                        <div class="mt-8 pb-8 border-b relative">
                            @guest
                            <h2 class="text-red-700 font-semibold text-center text-lg my-4">Harap login terlebih
                                dahulu untuk mengirim komentar</h2>
                            @else
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="flex flex-col md:flex-row items-start space-x-4">
                                    <div class="flex-1 bg-white dark:bg-neutral-800 p-4 rounded-lg shadow-sm">
                                        <h3 class="text-gray-900 dark:text-white text-lg font-semibold mb-2">{{ Auth::user()->name }}</h3>

                                        <!-- Rating -->
                                        <div class="flex items-center mb-2 space-x-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="star bi bi-star-fill text-gray-400 cursor-pointer" data-value="{{ $i }}"></span>
                                                @endfor
                                        </div>

                                        <textarea name="comment" class="w-full p-4 bg-neutral-200 dark:bg-neutral-700 text-gray-900 dark:text-white rounded-lg shadow-sm resize-none"
                                            rows="2" placeholder="Tulis komentar Anda..." id="comment"></textarea>

                                        <input type="hidden" name="id_film" value="{{ $film->id }}">
                                        <input type="hidden" name="rating" id="rating" value="0"> <!-- Menyimpan rating yang dipilih -->

                                        <button type="submit"
                                            class="mt-2 text-white bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5"
                                            id="submit-button" disabled>
                                            Kirim Komentar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @endguest
                        </div>

                        <div class="space-y-4 mt-8">
                            @foreach ($comment as $c)
                            <div class="flex items-start space-x-4 py-2">
                                <div class="flex-1">
                                    <div class="text-black dark:text-white font-semibold mb-2">{{ $c->user->name }}</div>
                                    <div>
                                        <p class="flex text-sm drop-shadow-md items-center">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @php
                                                $color=$i <=$c->rating ? 'bi bi-star-fill text-yellow-400' : 'bi bi-star text-neutral-700';
                                                @endphp
                                                <span class="{{ $color }} px-0.5 md:px-1 hover:scale-110 transition-transform duration-200"></span>
                                                @endfor
                                                <span class="dark:text-neutral-400 ms-3">
                                                    {{ \Carbon\Carbon::parse($c->created_at)->format('d F Y') }}
                                                </span>
                                        </p>
                                    </div>
                                    <p class="text-neutral-700 dark:text-neutral-200 ps-1">{{ $c->comment }}</p>

                                    @can('delete', $c) <!-- Periksa izin untuk menghapus -->
                                    <form action="{{ route('comments.destroy', $c->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500"><i class="bi bi-trash3"></i></button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating');
            const textarea = document.getElementById('comment');
            const submitButton = document.getElementById('submit-button');

            // Mengatur event listener untuk bintang
            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const rating = star.getAttribute('data-value');
                    ratingInput.value = rating;

                    stars.forEach(s => {
                        s.classList.toggle("text-yellow-400", s.getAttribute("data-value") <= rating);
                        s.classList.toggle("text-gray-400", s.getAttribute("data-value") > rating);
                    });

                    // Update status tombol
                    updateButtonState();
                });
            });

            // Menyimpan rating yang dipilih sebelumnya, jika ada
            let savedRating = ratingInput.value;
            if (savedRating > 0) {
                stars.forEach(s => {
                    s.classList.toggle("text-yellow-400", s.getAttribute("data-value") <= savedRating);
                    s.classList.toggle("text-gray-400", s.getAttribute("data-value") > savedRating);
                });
            }

            // Menambahkan event listener untuk textarea
            textarea.addEventListener('input', updateButtonState);

            // Fungsi untuk mengupdate status tombol
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

            // Memastikan kondisi awal saat halaman dimuat
            updateButtonState();
        });
    </script>


</x-app-layout>