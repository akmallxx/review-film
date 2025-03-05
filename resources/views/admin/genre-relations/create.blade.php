@extends('layouts.admin')

@section('title', 'FORM TAMBAH GENRE RELASI')

@section('content')
    <h2 class="text-3xl font-bold text-neutral-900 dark:text-white mb-8">FORM TAMBAH GENRE RELASI</h2>
    <div class="p-4 md:p-5 space-y-4">
        @php
        if (isset($film->id)) {
        $url = route('admin.genre-relations.update', $film->id);
        } else {
        $url = route('admin.genre-relations.store');
        }
        @endphp
        <form action="{{ $url }}" method="POST" id="genreRelasiForm" class="text-left">
            @csrf
            @if (isset($film->id))
                @method('PUT')
            @endif

            <div class="mb-5">
                <label for="id_film" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Judul Film</label>
                <select name="id_film" id="id_film" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" selected disabled>Pilih Judul Film</option>
                    @foreach($filmList as $f)
                        <option value="{{ $f->id }}" {{ isset($film) && $film->id == $f->id ? 'selected' : '' }}>{{ $f->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Genre</label>
                <div class="flex flex-wrap gap-3">
                    @foreach($genres as $genreItem)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" id="genre_{{ $genreItem->id }}" name="id_genre[]" value="{{ $genreItem->id }}" class="mr-2 border-gray-300 rounded focus:ring-indigo-500"
                                {{ isset($selectedGenres) && in_array($genreItem->id, $selectedGenres) ? 'checked' : '' }}>
                            <label for="genre_{{ $genreItem->id }}" class="text-neutral-900 dark:text-white">{{ $genreItem->title }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                <a href="{{ route('admin.genre-relations') }}" class="py-2.5 px-5 text-sm font-medium text-neutral-900 focus:outline-none bg-white rounded-lg border border-neutral-200 hover:bg-neutral-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-neutral-100 dark:focus:ring-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-600 dark:hover:text-white dark:hover:bg-neutral-700">Batal</a>
            </div>
        </form>
    </div>
@endsection
