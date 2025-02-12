<x-app-layout>

    <div class="p-12">
        <form action="" class="mb-12">
            <div class="relative">
                <input type="text" name="search" placeholder="Cari film..."
                    class="w-full px-4 py-3 text-black border-gray-300 bg-neutral-200 rounded-md focus:ring-0 focus:border-red-500 dark:bg-neutral-950 dark:text-white dark:border-black dark:focus:border-red-500">
                <button type="submit"
                    class="text-gray-400 dark:text-white absolute inset-y-0 right-0 flex items-center px-4 rounded-e-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 1 0-1.5 1.5L21 21z" />
                    </svg>
                </button>
            </div>
        </form>

        <div class="border-red-600 border-l-4 flex justify-between">
            <h2 class="ms-2 text-black dark:text-white font-semibold text-xl">MOVIES</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-4 mt-4">

            @foreach ($movies as $movie)
            <div class="relative max-w-sm overflow-hidden group">
                <a href="{{ route('film.detail', $movie->id) }}" class="block">
                    <div class="w-full relative">
                        <!-- Poster -->
                        <img class="w-full h-auto aspect-[3/4] object-cover transition-transform duration-300 group-hover:scale-105"
                            src="{{ $movie->poster }}"
                            alt="{{ $movie->judul }}" />
                    </div>
                    <div class="dark:text-white bg-neutral-100 dark:bg-neutral-900 p-1">
                        <!-- Judul -->
                        <h5 class="text-sm font-bold drop-shadow">{{ $movie->judul }}</h5>
                        <!-- Tahun Rilis -->
                        <p class="text-xs dark:text-gray-300">
                            {{ $movie->tahun_rilis }}
                        </p>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
        <nav aria-label="Page navigation example">
            <ul class="flex items-center -space-x-px h-10 text-base justify-center mt-6">
                {{ $movies->links() }}
            </ul>
        </nav>
    </div>

</x-app-layout>