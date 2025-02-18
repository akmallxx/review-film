@section('title', 'Anime - ' . config('app.name', 'Laravel'))
<x-app-layout>

    <div class="py-6 max-w-7xl mx-auto">
        <div class="mx-auto py-6 px-4 sm:px-6 lg:px-0">
            <form action="{{ route('home') }}" method="GET" class="mb-8">
                <div class="flex">
                    <!-- Dropdown Filter Genre -->
                    <div class="shrink-0">
                        <select name="genre" class="ps-4 pe-10 py-3 text-black border-gray-300 bg-gray-100 rounded-s-md focus:ring-0 focus:border-red-500 dark:bg-neutral-800 dark:text-white dark:border-black dark:focus:border-red-500">
                            <option value="" disable>Pilih Genre</option>
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->slug }}"
                                {{ isset($search_genre) && $search_genre == $genre->slug ? 'selected' : '' }}>
                                {{ $genre->title }}
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

        @if(isset($search))
        <!-- Tampilan Hasil Pencarian -->
        @if($films->isEmpty())
        <p class="text-center text-gray-600 dark:text-gray-300">Tidak ada film yang ditemukan.</p>
        @else
        <div class="mx-auto px-4 sm:px-6 lg:px-0">
            <div class="flex justify-between border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">HASIL PENCARIAN UNTUK: {{ $search }}</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">
                @foreach($films as $film)
                <div class="relative max-w-sm overflow-hidden group">
                    <a href="{{ route('film.detail', $film->slug) }}" class="block">
                        <div class="w-full relative">
                            <!-- Poster -->
                            <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                src="{{ $film->poster_url }}"
                                alt="{{ $film->judul }}" />
                        </div>
                        <div class="dark:text-white bg-transparent p-1">
                            <!-- Judul -->
                            <h5 class="text-sm font-bold drop-shadow">{{ $film->judul }}</h5>
                            <!-- Tahun Rilis -->
                            <p class="text-xs dark:text-gray-300">
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
        <div class="mx-auto px-4 sm:px-6 lg:px-0">
            <div class="flex justify-between border-l-4 border-red-600">
                <h2 class="ms-2 text-black dark:text-white font-semibold text-lg md:text-xl">ANIME</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-8">

                @foreach ($animes as $anime)
                <div class="relative max-w-sm overflow-hidden group">
                    <a href="{{ route('film.detail', $anime->slug) }}" class="block">
                        <div class="w-full relative">
                            <!-- Poster -->
                            <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                                src="{{ $anime->poster_url }}"
                                alt="{{ $anime->judul }}" />
                        </div>
                        <div class="dark:text-white bg-transparent p-1">
                            <!-- Judul -->
                            <h5 class="text-sm font-bold drop-shadow">{{ $anime->judul }}</h5>
                            <!-- Tahun Rilis -->
                            <p class="text-xs dark:text-gray-300">
                                {{ $anime->tahun_rilis }}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
            <nav aria-label="Page navigation example">
                <ul class="flex items-center -space-x-px h-10 text-base justify-center mt-6">
                    {{ $animes->links() }}
                </ul>
            </nav>
        </div>
        @endif
    </div>


</x-app-layout>