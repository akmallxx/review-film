@section('meta-tag')
<!-- Meta SEO -->
<meta name="description" content="Website informasi detailtentang film movies, series, dan anime">
<meta name="keywords" content="review film, tentang series, review anime">
<meta name="author" content="yanto-film">

<!-- Meta Open Graph / Facebook -->
<meta property="og:type" content="video.movie">
<meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
<meta property="og:description" content="Website informasi detail tentang film movies, series, dan anime">
<meta property="og:image" content="{{ asset('images/logo/ambatron.jpg') }}">
<meta property="og:image:width" content="630">
<meta property="og:image:height" content="630">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}">
<meta name="twitter:description" content="Website informasi detail tentang film movies, series, dan anime">
<meta name="twitter:image" content="{{ asset('images/logo/ambatron.jpg') }}">
<meta name="twitter:image:width" content="675">
<meta name="twitter:image:height" content="675">
@endsection

<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto">
        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-0">
            <form action="{{ route('home') }}" method="GET" class="mb-8">
                <div class="flex">
                    <!-- Dropdown Filter Genre -->
                    <div class="shrink-0">
                        <select name="genre" class="ps-4 pe-0 py-3 text-black border-gray-300 bg-gray-100 rounded-s-md focus:ring-0 focus:border-red-500 dark:bg-neutral-800 dark:text-white dark:border-black dark:focus:border-red-500">
                            <option value="">Pilih Genre</option>
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->slug }}"
                                {{ isset($search_genre) && $search_genre == $genre->slug ? 'selected' : '' }}>
                                {{ $genre->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Dropdown FIlter Tahun --}}
                    <div class="shrink-0">
                        <select name="tahun" class="ps-4 pe-8 py-3 text-black border-gray-300 bg-gray-100 focus:ring-0 focus:border-red-500 dark:bg-neutral-800 dark:text-white dark:border-black dark:focus:border-red-500">
                            <option value="">Pilih Tahun</option>
                            @foreach ($tahuns as $tahun)
                            <option value="{{ $tahun->tahun_rilis }}"
                                {{ isset($search_tahun) && $search_tahun == $tahun->tahun_rilis ? 'selected' : '' }}>
                                {{ $tahun->tahun_rilis }}
                            </option>
                            @endforeach
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

        @if(isset($search) || isset($search_genre) || isset($search_tahun))
        <!-- Tampilan Hasil Pencarian -->
        @if($films->isEmpty())
        <p class="text-center text-gray-600 dark:text-gray-300">Tidak ada film yang ditemukan.</p>
        @else
        <div class="mx-auto px-4 sm:px-6 lg:px-0">
            <div class="flex justify-between border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">HASIL PENCARIAN UNTUK: {{ $search }}</h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-6 mt-8">
                @foreach($films as $film)
                <div class="relative max-w-sm overflow-hidden group">
                    <a href="{{ route('film.detail', $film->slug) }}" class="block">
                        <div class="w-full relative">
                            <!-- Badge Total Rating -->
                            <div class="absolute top-2 left-2 bg-red-800 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg z-10">
                                ⭐ {{ number_format($film->average_rating, 1) }}
                            </div>

                            <!-- Poster dengan efek hover -->
                            <div class="relative w-full overflow-hidden rounded">
                                <img class="w-full h-72 object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy"
                                    src="{{ $film->poster_url }}"
                                    alt="{{ $film->judul }}" />
                                <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-500 ease-out group-hover:bg-opacity-40"></div>
                            </div>
                        </div>
                        <div class="dark:text-white bg-transparent p-2 flex flex-col justify-between min-h-[70px]">
                            <!-- Judul dengan tinggi minimal -->
                            <h5 class="text-sm font-bold drop-shadow min-h-[40px] group-hover:text-red-500">
                                {{ $film->judul }}
                            </h5>
                            <!-- Tahun Rilis -->
                            <p class="text-xs dark:text-neutral-300 group-hover:text-neutral-700 dark:group-hover:text-neutral-200">
                                {{ $film->tahun_rilis }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        @else
        <!-- Start movies Page -->
        <div id="movies" class="">
            <div class="mx-auto px-4 sm:px-6 lg:px-0">
                <div class="flex justify-between border-l-4 border-red-600">
                    <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">MOVIES</h2>
                    <a href="movies">
                        <span class="bg-red-800 text-white text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm hover:text-gray-400 dark:text-white">LIHAT SEMUA <i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-6 mt-8">
                    @foreach ($movies as $movie)
                    <div class="relative max-w-sm overflow-hidden group">
                        <a href="{{ route('film.detail', $movie->slug) }}" class="block">
                            <div class="w-full relative">
                                <!-- Badge Total Rating -->
                                <div class="absolute top-2 left-2 bg-red-700 bg-opacity-80 text-white text-xs font-bold px-2 py-1 rounded-md shadow-lg z-10">
                                    ⭐ {{ number_format($movie->average_rating, 1) }}
                                </div>

                                <!-- Poster dengan efek hover -->
                                <div class="relative w-full overflow-hidden rounded">
                                    <img class="w-full h-72 object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy"
                                        src="{{ $movie->poster_url }}"
                                        alt="{{ $movie->judul }}" />
                                    <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-500 ease-out group-hover:bg-opacity-40"></div>
                                </div>
                            </div>
                            <div class="dark:text-white bg-transparent p-2 flex flex-col justify-between min-h-[70px]">
                                <!-- Judul dengan tinggi minimal -->
                                <h5 class="text-sm font-bold min-h-[40px] group-hover:text-red-500">
                                    {{ $movie->judul }}
                                </h5>
                                <!-- Tahun Rilis -->
                                <p class="text-xs dark:text-neutral-300 group-hover:text-neutral-500 dark:group-hover:text-neutral-200">
                                    {{ $movie->tahun_rilis }}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
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
                <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-6 mt-8">
                    @foreach ($series as $serie)
                    <div class="relative max-w-sm overflow-hidden group">
                        <a href="{{ route('film.detail', $serie->slug) }}" class="block">
                            <div class="w-full relative">
                                <!-- Badge Total Rating -->
                                <div class="absolute top-2 left-2 bg-red-800 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg z-10">
                                    ⭐ {{ number_format($serie->average_rating, 1) }}
                                </div>

                                <!-- Poster dengan efek hover -->
                                <div class="relative w-full overflow-hidden rounded">
                                    <img class="w-full h-72 object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy"
                                        src="{{ $serie->poster_url }}"
                                        alt="{{ $serie->judul }}" />
                                    <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-500 ease-out group-hover:bg-opacity-40"></div>
                                </div>
                            </div>
                            <div class="dark:text-white bg-transparent p-2 flex flex-col justify-between min-h-[70px]">
                                <!-- Judul dengan tinggi minimal -->
                                <h5 class="text-sm font-bold drop-shadow min-h-[40px] group-hover:text-red-500">
                                    {{ $serie->judul }}
                                </h5>
                                <!-- Tahun Rilis -->
                                <p class="text-xs dark:text-gray-300 group-hover:text-gray-200">
                                    {{ $serie->tahun_rilis }}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
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
                <div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-6 mt-8">

                    @foreach ($animes as $anime)
                    <div class="relative max-w-sm overflow-hidden group">
                        <a href="{{ route('film.detail', $anime->slug) }}" class="block">
                            <div class="w-full relative">
                                <!-- Badge Total Rating -->
                                <div class="absolute top-2 left-2 bg-red-800 text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg z-10">
                                    ⭐ {{ number_format($anime->average_rating, 1) }}
                                </div>

                                <!-- Poster dengan efek hover -->
                                <div class="relative w-full overflow-hidden rounded">
                                    <img class="w-full h-72 object-cover transition-transform duration-500 ease-out group-hover:scale-105" loading="lazy"
                                        src="{{ $anime->poster_url }}"
                                        alt="{{ $anime->judul }}" />
                                    <div class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-500 ease-out group-hover:bg-opacity-40"></div>
                                </div>
                            </div>
                            <div class="dark:text-white bg-transparent p-2 flex flex-col justify-between min-h-[70px]">
                                <!-- Judul dengan tinggi minimal -->
                                <h5 class="text-sm font-bold drop-shadow min-h-[40px] group-hover:text-red-500">
                                    {{ $anime->judul }}
                                </h5>
                                <!-- Tahun Rilis -->
                                <p class="text-xs dark:text-gray-300 group-hover:text-gray-200">
                                    {{ $anime->tahun_rilis }}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- End anime Page -->
        @endif
    </div>
    <script>
        document.addEventListener("contextmenu", function(event) {
            let target = event.target;
            if (target.tagName === "IMG") {
                event.preventDefault(); // Blokir menu default
            }
        });
    </script>
</x-app-layout>

@section('css-content')
@endsection

@section('script-content')