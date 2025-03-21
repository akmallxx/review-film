@section('title', $film->judul . ' - ' . config('app.name', 'Laravel'))

@section('meta-tag')
<!-- Meta SEO -->
<meta name="description" content="{{ Str::limit($film->deskripsi, 160, '...') }}">
<meta name="keywords" content="{{ $film->judul }}, {{ implode(', ', $genres->pluck('title')->toArray()) }}, {{ $film->kategori_film }}, {{ $film->kategori_umur }}, Film {{ $film->tahun_rilis }}">
<meta name="author" content="{{ $film->pencipta }}">

<!-- Meta Open Graph / Facebook -->
<meta property="og:type" content="video.movie">
<meta property="og:title" content="{{ $film->judul }} - {{ config('app.name', 'Laravel') }}">
<meta property="og:description" content="{{ Str::limit($film->deskripsi, 120, '...') }}">
<meta property="og:image" content="{{ $film->poster_url }}">
<meta property="og:image:width" content="630">
<meta property="og:image:height" content="1200">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $film->judul }} - {{ config('app.name', 'Laravel') }}">
<meta name="twitter:description" content="{{ Str::limit($film->deskripsi, 120, '...') }}">
<meta name="twitter:image" content="{{ $film->poster_url }}">
<meta name="twitter:image:width" content="1200">
<meta name="twitter:image:height" content="675">
@endsection


@section('css-content')
<!-- Fancybox CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<style>
    * {
        scroll-behavior: smooth;
    }

    .hidden-form {
        display: none;
    }
</style>
@endsection

<x-app-layout>
    <div class="relative pb-16 pt-16 sm:py-36 mb-12 -mt-20">
        <!-- Background Image with Blur and Dark Overlay -->
        <div class="absolute inset-0 bg-cover bg-center blur-lg dark:brightness-50 h-full"
            style="background-image: url('{{ $film->poster_url }}');">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-neutral-400 dark:to-neutral-900 opacity-80"></div>
        </div>

        <div class="relative max-w-7xl mx-auto lg:px-8 h-full">
            <div class="overflow-hidden sm:rounded-lg p-6">
                <div class="my-10 mx-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-center">
                    <div class="p-4 flex justify-center">
                        <img src="{{ $film->poster_url }}" alt="{{ $film->judul }}"
                            class="w-full max-w-xs sm:max-w-sm h-auto rounded-xl object-cover" />
                    </div>
                    <div class="col-span-2 sm:col-span-1 lg:col-span-2">
                        <h2 class="font-bold tracking-tight text-neutral-900 dark:text-white text-xl lg:text-3xl mb-2">
                            {{ $film->judul }}
                        </h2>
                        <p class="text-neutral-900 dark:text-neutral-300 font-semibold mb-0.5">
                            {{ ucfirst($film->kategori_film) }} <span class="mx-0.5">·</span> {{ ucfirst($film->kategori_umur) }} <span class="mx-1">·</span> {{ $film->tahun_rilis }}
                        </p>
                        <p class="text-neutral-900 dark:text-neutral-300 font-semibold mb-6">
                            By {{ $film->pencipta }}
                        </p>

                        <div class="flex flex-wrap items-center gap-2 ">
                            @foreach ($genres as $genre)
                            <span class="text-neutral-900 dark:text-white text-sm font-medium px-2.5 py-1 rounded-full border border-neutral-800 dark:border-neutral-400">
                                {{ $genre->title }}
                            </span>
                            @endforeach
                        </div>

                        <div x-data="{ open: false }">
                            <p class="text-sm sm:text-base text-black dark:text-neutral-200 pt-3 pb-8">
                                {{ \Illuminate\Support\Str::words($film->deskripsi, 50, '...') }}

                                @if(\Illuminate\Support\Str::wordCount($film->deskripsi) > 50)
                                <button @click="open = true" class="dark:text-white font-semibold hover:underline">
                                    Lihat Selengkapnya
                                </button>
                                @endif
                            </p>

                            <!-- Modal dengan Efek Blur & Animasi -->
                            <div x-show="open" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-60 backdrop-blur-md flex items-center justify-center p-4 z-50">
                                <div @click.away="open = false" class="bg-white dark:bg-black bg-opacity-70 dark:bg-opacity-70 shadow-lg p-6 rounded-lg max-w-4xl w-full transform transition-all duration-500 scale-95">
                                    <h2 class="text-lg dark:text-white font-semibold mb-4">Deskripsi Lengkap</h2>
                                    <p class="text-neutral-800 dark:text-neutral-300">
                                        {{ $film->deskripsi }}
                                    </p>
                                    <button @click="open = false" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-300">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <a data-fancybox href="{{ $film->trailer }}"
                                class="flex items-center text-neutral-100 hover:text-neutral-300 rounded-lg text-sm transition duration-200">
                                <div class="p-2.5 rounded-full transition-transform border border-neutral-400 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                        <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                    </svg>
                                </div>
                                WATCH TRAILER
                            </a>
    
                            <span class="me-2 ms-3 text-neutral-500 text-2xl">|</span>
                            <span class="dark:text-neutral-400 text-md">
                                {{ $film->kategori_film !== 'movies' ? $film->total_episode . " Episodes" : $film->durasi_format }}
                            </span>
                        </div>

                        <div class="flex flex-wrap items-center mt-6">
                            <p class="flex text-lg md:text-xl drop-shadow-md">
                                @for ($i = 1; $i <= 5; $i++)
                                    @php
                                    if ($i <=floor($roundedAverage)) {
                                    $icon='bi bi-star-fill text-yellow-400' ;
                                    } elseif ($i==ceil($roundedAverage) && fmod($roundedAverage, 1)>= 0.5) {
                                    $icon = 'bi bi-star-half text-yellow-400';
                                    } else {
                                    $icon = 'bi bi-star text-neutral-400';
                                    }
                                    @endphp
                                    <span class="{{ $icon }} text-2xl md:text-4xl px-0.5 md:px-1"></span>
                                    @endfor
                            </p>
                            <p class="text-xl md:text-2xl ms-2 md:ms-3 mt-1 md:mt-2 dark:text-white">
                                {{ $roundedAverage }} <span class="dark:text-neutral-400 text-xs md:text-sm">({{ $numberOfComments }} rates)</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($castings->count() > 0)
    <div class="pb-12">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">
                        <p class="text-neutral-900 dark:text-white text-2xl font-semibold mb-6">Castings</p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach ($castings as $casting)
                            <div class="bg-neutral-200 dark:bg-neutral-700 p-4 rounded-lg shadow">
                                <p class="text-neutral-900 dark:text-white font-medium">{{ $casting->nama_asli }}</p>
                                <p class="text-neutral-600 dark:text-neutral-300 text-sm">{{ $casting->nama_panggung }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="pb-12" id="komentar">
        <div class="max-w-7xl mx-auto lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg p-8">

                        @if ($countComment < 1)
                            <div class="mt-8 pb-8 border-b relative">
                            @guest
                            <!-- Overlay Blur -->
                            <div class="absolute inset-0 dark:bg-neutral-800/10 backdrop-blur-sm z-10 rounded-lg"></div>

                            <!-- Teks peringatan di atas blur -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6 z-10">
                                <h2 class="dark:text-neutral-200 font-semibold text-md leading-tight">
                                    Harap <a href="{{ route('login') }}" class="text-red-500 hover:underline font-bold">LOGIN</a> atau
                                    <a href="{{ route('register') }}" class="text-red-500 hover:underline font-bold">REGISTRASI</a>
                                    terlebih dahulu untuk mengirim komentar.
                                </h2>
                            </div>

                            <form action="{{ route('comments.store') }}" method="POST" class="@guest pointer-events-none select-none @endguest relative z-0">
                                @csrf
                                <div class="flex flex-wrap items-start space-x-2 md:space-x-4 w-full relative rounded-md p-4">
                                    <div class="flex-shrink-0">
                                        @if( Auth::user() && Auth::user()->avatar)
                                        <img class="md:h-12 md:w-12 h-7 w-7 mt-2 rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="User Avatar">
                                        @else
                                        <img class="md:h-9 md:w-9 h-7 w-7 mt-2 rounded-full object-cover" src="{{ asset('storage/avatars/default-avatar.png') }}" alt="User Avatar">
                                        @endif
                                    </div>
                                    <div class="flex-1 bg-white dark:bg-neutral-800 rounded-lg shadow-sm relative z-10">
                                        <h3 class="text-neutral-900 dark:text-white text-lg font-semibold">
                                            {{ Auth::user() ? Auth::user()->name : 'Guest' }}
                                        </h3>

                                        <div class="flex items-center mb-2 space-x-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="star bi bi-star-fill text-neutral-400 cursor-pointer" data-value="{{ $i }}"></span>
                                                @endfor
                                        </div>

                                        <textarea name="comment"
                                            class="w-full p-4 bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-white rounded-lg shadow-sm resize-none"
                                            rows="5" placeholder="Tulis komentar Anda..." id="comment"></textarea>

                                        <input type="hidden" name="id_film" value="{{ $film->id }}">
                                        <input type="hidden" name="rating" id="rating" value="0">

                                        <button type="submit"
                                            class="mt-2 text-white bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5"
                                            id="submit-button" disabled>
                                            Kirim Komentar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="flex flex-wrap items-start space-x-2 md:space-x-4 w-full relative rounded-md p-4">
                                    <div class="flex-shrink-0">
                                        @if( Auth::user()->avatar)
                                        <img class="md:h-12 md:w-12 h-10 w-10 mt-2 rounded-full object-cover" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="User Avatar">
                                        @else
                                        <img class="md:h-12 md:w-12 h-10 w-10 mt-2 rounded-full object-cover" src="{{ asset('storage/avatars/default-avatar.png') }}" alt="User Avatar">
                                        @endif
                                    </div>
                                    <div class="flex-1 bg-white dark:bg-neutral-800 rounded-lg shadow-sm relative z-10">
                                        <h3 class="text-neutral-900 dark:text-white text-lg font-semibold">
                                            {{ Auth::user()->name }}
                                        </h3>

                                        <div class="flex items-center mb-2 space-x-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span class="star bi bi-star-fill text-neutral-400 cursor-pointer" data-value="{{ $i }}"></span>
                                                @endfor
                                        </div>

                                        <textarea name="comment"
                                            class="w-full p-4 bg-neutral-200 dark:bg-neutral-700 text-neutral-900 dark:text-white rounded-lg shadow-sm resize-none"
                                            rows="5" placeholder="Tulis komentar Anda..." id="comment"></textarea>

                                        <input type="hidden" name="id_film" value="{{ $film->id }}">
                                        <input type="hidden" name="rating" id="rating" value="0">

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
                        <div class="flex justify-between">
                            <p class="text-neutral-900 dark:text-white text-2xl font-semibold mb-2">Komentar</p>
                        </div>
                        @foreach ($comment as $c)
                        <div id="komentar-{{ $c->user->id }}" class="flex flex-wrap items-start space-x-2 md:space-x-4 w-full relative bg-neutral-200 dark:bg-neutral-700 rounded-md p-4" id="comment-{{ $c->id }}">
                            <div class="flex-shrink-0">
                                @if($c->user->avatar)
                                <img class="md:h-9 md:w-9 h-7 w-7 mt-1 rounded-full object-cover" src="{{ asset('storage/' . $c->user->avatar) }}" alt="User Avatar">
                                @else
                                <img class="md:h-9 md:w-9 h-7 w-7 mt-1 rounded-full object-cover" src="{{ asset('storage/avatars/default-avatar.png') }}" alt="User Avatar">
                                @endif
                            </div>
                            <div class="flex-1 w-full">
                                <div class="flex items-center text-neutral-900 dark:text-white font-semibold mb-1">
                                    <span class="text-sm md:text-lg font-semibold">{{ $c->user->name }}</span>
                                    @if ($c->user->hasRole('admin'))
                                    <span class="text-xs md:text-sm text-red-500 font-semibold ms-2">(Admin)</span>
                                    @elseif ($c->user->hasRole('author'))
                                    <span class="text-xs md:text-sm text-blue-500 font-semibold ms-2">(Author)</span>
                                    @endif
                                </div>

                                @if (!$c->user->hasRole(['admin', 'author']))
                                <div id="ratingStar-{{ $c->id }}">
                                    <p class="-ms-0.5 flex text-xs md:text-sm drop-shadow-md items-center">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @php
                                            $color=$i <=$c->rating ? 'bi bi-star-fill text-yellow-400' : 'bi bi-star text-neutral-800 dark:text-neutral-400';
                                            @endphp
                                            <span class="{{ $color }} px-0.5 md:px-1 hover:scale-110 transition-transform duration-200"></span>
                                            @endfor
                                    </p>
                                </div>
                                @endif

                                <div class="flex flex-col md:flex-row justify-between">
                                    <p class="text-neutral-700 dark:text-neutral-200 text-sm md:text-base" id="comment-text-{{ $c->id }}">{{ $c->comment }}</p>
                                </div>

                                <form id="edit-form-{{ $c->id }}" action="{{ route('comments.update', $c->id) }}" method="POST" class="hidden-form">
                                    @csrf
                                    @method('PUT')
                                    <div class="">
                                        <label for="rating" class="block text-sm md:text-base font-medium text-neutral-700">Rating</label>
                                        <div class="flex items-center mb-2 space-x-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @php
                                                $isSelected=$i <=$c->rating; // Cek apakah bintang ini harus diisi
                                                $starClass = $isSelected ? 'text-yellow-400' : 'text-neutral-400';
                                                @endphp
                                                <span class="star bi bi-star-fill cursor-pointer {{ $starClass }}"
                                                    data-value="{{ $i }}"
                                                    onclick="setRating('{{ $c->id }}', '{{ $i }}')"></span>
                                                @endfor
                                        </div>
                                        <input type="hidden" name="rating" id="edit-rating-{{ $c->id }}" value="{{ $c->rating }}">
                                    </div>
                                    <textarea name="comment" class="w-full p-2 dark:bg-neutral-800 text-white rounded-md text-sm md:text-base">{{ $c->comment }}</textarea>
                                    <button type="submit" class="bg-blue-500 text-white text-xs md:text-sm px-3 py-1 md:px-4 md:py-2 rounded-md mt-2">Ubah</button>
                                    <button type="button" onclick="toggleEditForm('{{ $c->id }}')" class="bg-neutral-500 text-white text-xs md:text-sm px-3 py-1 md:px-4 md:py-2 rounded-md mt-2 ml-2">Batal</button>
                                </form>

                                <p class="dark:text-neutral-400 text-xs text-right md:text-sm pt-2 md:mt-0">
                                    {{ $c->created_at->diffForHumans() }}
                                </p>

                            </div>

                            <div class="relative">
                                @canany(['update', 'delete'], $c)
                                <button onclick="toggleMenu(event, '{{ $c->id }}')" class="dark:text-neutral-200 hover:text-neutral-400 pe-2">
                                    &#8942;
                                </button>
                                @endcanany

                                <div id="menu-{{ $c->id }}" class="hidden absolute right-0 bg-white dark:bg-neutral-900 shadow-lg rounded-md py-1 w-24 z-30">
                                    @can('update', $c)
                                    <button onclick="toggleEditForm('{{ $c->id }}')" class="block w-full text-left px-3 py-1 md:px-4 md:py-2 text-sm md:text-base text-blue-500 hover:bg-neutral-300 hover:dark:bg-neutral-600">Edit</button>
                                    @endcan
                                    @can('delete', $c)
                                    <form action="{{ route('comments.destroy', $c->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block w-full text-left px-3 py-1 md:px-4 md:py-2 text-sm md:text-base text-red-500 hover:bg-neutral-300 hover:dark:bg-neutral-600">Hapus</button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <script>
        function toggleMenu(event, id) {
            event.stopPropagation();
            const menu = document.getElementById('menu-' + id);
            const isHidden = menu.classList.contains('hidden');
            document.querySelectorAll('[id^="menu-"]').forEach(m => m.classList.add('hidden'));
            if (isHidden) menu.classList.remove('hidden');
        }

        function setRating(commentId, rating) {
            const stars = document.querySelectorAll(`#edit-form-${commentId} .star`);
            const ratingInput = document.getElementById(`edit-rating-${commentId}`);

            ratingInput.value = rating;

            stars.forEach(star => {
                const starValue = star.getAttribute('data-value');
                if (starValue <= rating) {
                    star.classList.add('text-yellow-400');
                    star.classList.remove('text-neutral-400');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-neutral-400');
                }
            });
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
                        s.classList.toggle("text-neutral-400", s.getAttribute("data-value") > rating);
                    });

                    updateButtonState();
                });
            });

            let savedRating = ratingInput.value;
            if (savedRating > 0) {
                stars.forEach(s => {
                    s.classList.toggle("text-yellow-400", s.getAttribute("data-value") <= savedRating);
                    s.classList.toggle("text-neutral-400", s.getAttribute("data-value") > savedRating);
                });
            }

            textarea.addEventListener('input', updateButtonState);

            function updateButtonState() {
                const isRatingSelected = ratingInput.value > 0;
                const isCommentFilled = textarea.value.trim() !== '';
                if (isRatingSelected && isCommentFilled) {
                    submitButton.disabled = false;
                    submitButton.classList.remove('bg-neutral-500');
                    submitButton.classList.add('bg-blue-600 hover:bg-blue-700');
                } else {
                    submitButton.disabled = true;
                    submitButton.classList.add('bg-neutral-500');
                    submitButton.classList.remove('bg-blue-600 hover:bg-blue-700');
                }
            }

            updateButtonState();
        });

        function toggleEditForm(commentId) {
            const commentText = document.getElementById(`comment-text-${commentId}`);
            const rating = document.getElementById(`ratingStar-${commentId}`);
            const editForm = document.getElementById(`edit-form-${commentId}`);

            if (editForm.classList.contains('hidden-form')) {
                editForm.classList.remove('hidden-form');
                commentText.classList.add('hidden-form');
                rating.classList.add('hidden-form');
            } else {
                editForm.classList.add('hidden-form');
                commentText.classList.remove('hidden-form');
                rating.classList.remove('hidden-form');
            }
        }
    </script>

    <script>
    document.addEventListener("contextmenu", function (e) {
        if (e.target.tagName === "IMG") {
            e.preventDefault();
        }
    });
    </script>
</x-app-layout>