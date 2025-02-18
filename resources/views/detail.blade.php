@section('title', $film->judul . ' - ' . config('app.name', 'Laravel'))

@section('css-content')
    <style>
        .hidden-form {
            display: none;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
        }

        .modal-content {
            position: relative;
            z-index: 1001;
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            width: 80%;
            max-width: 600px;
            border-radius: 8px;
        }
    </style>
@endsection

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
                        <h2
                            class="text-lg font-semibold tracking-tight text-black dark:text-white sm:text-xl md:text-2xl lg:text-3xl mb-2">
                            {{ $film->judul }} <span class="text-md">({{ $film->tahun_rilis }})</span>
                        </h2>
                        <p class="text-sm sm:text-base text-neutral-600 dark:text-neutral-400 flex items-center mb-8">
                            <i class="bi bi-camera-reels-fill mr-2"></i> By <span
                                class="font-bold ms-1">{{ $film->pencipta }}</span>
                        </p>

                        <div class="flex flex-wrap items-center gap-2 ">
                            <!-- Kategori Film -->
                            <span
                                class="bg-red-700 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                {{ ucfirst($film->kategori_film) }}
                            </span>

                            <!-- Kategori Umur -->
                            <span
                                class="bg-orange-700 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                {{ ucfirst($film->kategori_umur) }}
                            </span>

                            <!-- Genres -->
                            @foreach ($genres as $genre)
                                <span
                                    class="bg-blue-800 text-white text-sm font-medium px-2.5 py-1 rounded-full transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                                    {{ $genre->title }}
                                </span>
                            @endforeach
                        </div>

                        <p class="text-sm sm:text-base text-black dark:text-neutral-200 pt-3 pb-8">
                            {{ $film->deskripsi }}
                        </p>

                        <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <i class="bi bi-play-circle"></i> Watch Trailer
                        </button>
                        <span class="me-6 ms-4 text-neutral-500 text-2xl">|</span> <!-- Separator -->
                        <span class="dark:text-neutral-400 text-md">
                            {{ $film->kategori_film !== 'movies' ? $film->total_episode . " Episodes" : $film->durasi_format }}
                        </span>
                        <div class="flex flex-wrap items-center mt-6">
                            <p class="flex text-lg md:text-xl drop-shadow-md">
                                @for ($i = 1; $i <= 5; $i++)
                                                                @php
                                                                    if ($i <= floor($roundedAverage)) {
                                                                        $icon = 'bi bi-star-fill text-yellow-400';
                                                                    } elseif ($i == ceil($roundedAverage) && fmod($roundedAverage, 1) >= 0.5) {
                                                                        $icon = 'bi bi-star-half text-yellow-400';
                                                                    } else {
                                                                        $icon = 'bi bi-star text-neutral-700';
                                                                    }
                                                                @endphp
                                                                <span
                                                                    class="{{ $icon }} text-2xl md:text-4xl px-0.5 md:px-1 hover:scale-110 transition-transform duration-200"></span>
                                @endfor
                            </p>
                            <p class="text-xl md:text-2xl drop-shadow-md ms-2 md:ms-3 mt-1 md:mt-2 dark:text-white">
                                {{ $roundedAverage }} <span
                                    class="dark:text-neutral-400 text-xs md:text-sm">({{ $numberOfComments }}
                                    rates)</span>
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Overlay dengan animasi -->
                <div id="modal-overlay"
                    class="hidden fixed inset-0 bg-black bg-opacity-75 z-40 transition-opacity duration-300 opacity-0">
                </div>

                <!-- Main modal dengan animasi -->
                <div id="default-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-5xl max-h-full">
                        <!-- Modal content dengan animasi -->
                        <div
                            class="relative bg-white dark:bg-neutral-800 rounded-lg shadow-lg transform transition-all duration-300 scale-95 opacity-0">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-neutral-600 border-neutral-200">
                                <h3 class="text-xl font-semibold text-neutral-900 dark:text-white">
                                    Trailer Film
                                </h3>
                                <button type="button"
                                    class="text-neutral-400 bg-transparent hover:bg-neutral-200 hover:text-neutral-900 rounded-lg text-lg w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-neutral-600 dark:hover:text-white"
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
                                                                    <iframe class="w-full aspect-video rounded-lg"
                                                                        src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0"
                                                                        allowfullscreen></iframe>
                                                                @else
                                                                    <p class="text-neutral-600 dark:text-neutral-400">Invalid YouTube URL</p>
                                                                @endif
                                @else
                                    <video class="w-full rounded-lg" controls>
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
                            <p class="text-black dark:text-white text-2xl font-semibold mb-6">Castings</p>

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
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                        <p class="text-black dark:text-white text-2xl font-semibold mb-6">Komentar</p>

                        @if ($countComment < 1)
                            <div class="mt-8 pb-8 border-b relative">
                                @guest
                                    <h2 class="text-red-700 font-semibold text-center text-lg my-4">Harap login terlebih
                                        dahulu untuk mengirim komentar</h2>
                                @else
                                    <form action="{{ route('comments.store') }}" method="POST">
                                        @csrf
                                        <div class="flex flex-col md:flex-row items-start space-x-4">
                                            <div class="flex-1 bg-white dark:bg-neutral-800 p-4 rounded-lg shadow-sm">
                                                <h3 class="text-gray-900 dark:text-white text-lg font-semibold mb-2">
                                                    {{ Auth::user()->name }}
                                                </h3>

                                                <!-- Rating -->
                                                <div class="flex items-center mb-2 space-x-1">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <span class="star bi bi-star-fill text-gray-400 cursor-pointer"
                                                            data-value="{{ $i }}"></span>
                                                    @endfor
                                                </div>

                                                <textarea name="comment"
                                                    class="w-full p-4 bg-neutral-200 dark:bg-neutral-700 text-gray-900 dark:text-white rounded-lg shadow-sm resize-none"
                                                    rows="2" placeholder="Tulis komentar Anda..." id="comment"></textarea>

                                                <input type="hidden" name="id_film" value="{{ $film->id }}">
                                                <input type="hidden" name="rating" id="rating" value="0">
                                                <!-- Menyimpan rating yang dipilih -->

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
                        @endif

                        <div class="space-y-4 mt-8">
                            @foreach ($comment as $c)
                                                    <div class="flex items-start space-x-4 py-2" id="comment-{{ $c->id }}">
                                                        <div class="flex-1">
                                                            <div class="text-black dark:text-white font-semibold mb-2">
                                                                {{ $c->user->name }}
                                                                @if ($c->user->hasRole('admin'))
                                                                    <span
                                                                        class="bg-red-600 text-white text-xs font-semibold ml-2 px-2 py-1 rounded-md">Admin</span>
                                                                @elseif ($c->user->hasRole('author'))
                                                                    <span
                                                                        class="bg-green-600 text-white text-xs font-semibold ml-2 px-2 py-1 rounded-md">Author</span>
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <p class="flex text-sm drop-shadow-md items-center">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                                                            @php
                                                                                                                $color = $i <= $c->rating ? 'bi bi-star-fill text-yellow-400' : 'bi bi-star text-neutral-700';
                                                                                                            @endphp
                                                                                                            <span
                                                                                                                class="{{ $color }} px-0.5 md:px-1 hover:scale-110 transition-transform duration-200"></span>
                                                                    @endfor
                                                                    <span class="dark:text-neutral-400 ms-3">
                                                                        {{ \Carbon\Carbon::parse($c->created_at)->format('d F Y') }}
                                                                    </span>
                                                                </p>
                                                            </div>
                                                            <p class="text-neutral-700 dark:text-neutral-200 ps-1"
                                                                id="comment-text-{{ $c->id }}">{{ $c->comment }}</p>

                                                            <div class="flex">
                                                                @can('update', $c)
                                                                    <button onclick="toggleEditForm('{{ $c->id }}')"
                                                                        class="text-blue-500 text-sm ms-1">Edit</button>
                                                                @endcan

                                                                @can('delete', $c)
                                                                    <form action="{{ route('comments.destroy', $c->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="text-red-500 text-sm ms-1">Hapus</button>
                                                                    </form>
                                                                @endcan
                                                            </div>

                                                            <!-- Formulir Edit (Awalnya Tersembunyi) -->
                                                            <form id="edit-form-{{ $c->id }}" action="{{ route('comments.update', $c->id) }}"
                                                                method="POST" class="hidden-form mt-2">
                                                                @csrf
                                                                @method('PUT')
                                                                <textarea name="comment"
                                                                    class="w-full p-2 border border-gray-300 rounded-md">{{ $c->comment }}</textarea>
                                                                <div class="mt-2">
                                                                    <label for="rating"
                                                                        class="block text-sm font-medium text-gray-700">Rating</label>
                                                                    <select name="rating"
                                                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            <option value="{{ $i }}" {{ $c->rating == $i ? 'selected' : '' }}>{{ $i }}
                                                                            </option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <button type="submit"
                                                                    class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2">Update</button>
                                                                <button type="button" onclick="toggleEditForm('{{ $c->id }}')"
                                                                    class="bg-gray-500 text-white px-4 py-2 rounded-md mt-2 ml-2">Batal</button>
                                                            </form>
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
        document.addEventListener("DOMContentLoaded", function () {
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

        function toggleEditForm(commentId) {
            const commentText = document.getElementById(`comment-text-${commentId}`);
            const editForm = document.getElementById(`edit-form-${commentId}`);

            if (editForm.classList.contains('hidden-form')) {
                // Tampilkan formulir edit dan sembunyikan teks komentar
                editForm.classList.remove('hidden-form');
                commentText.style.display = 'none';
            } else {
                // Sembunyikan formulir edit dan tampilkan teks komentar
                editForm.classList.add('hidden-form');
                commentText.style.display = 'block';
            }
        }

        // Function to show modal and overlay
        function showModal() {
            document.getElementById('modal-overlay').classList.remove('hidden');
            document.getElementById('default-modal').classList.remove('hidden');
        }

        // Function to hide modal and overlay
        function hideModal() {
            document.getElementById('modal-overlay').classList.add('hidden');
            document.getElementById('default-modal').classList.add('hidden');
        }

        // Event listener for modal toggle buttons (you can add this to your button that opens the modal)
        document.querySelector('[data-modal-toggle="default-modal"]').addEventListener('click', showModal);
        document.querySelector('[data-modal-hide="default-modal"]').addEventListener('click', hideModal);
    </script>


</x-app-layout>