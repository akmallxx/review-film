@extends('layouts.admin')

@section('title', 'CRUD Film')

@section('content')
    <h2 class="text-3xl font-bold text-neutral-900 dark:text-white mb-8">Edit Film</h2>
    <div class="p-4 md:p-5 space-y-4">
        @php
        if ($id) {
        $url = route('admin.film.update', $id);
        } else {
        $url = route('admin.film.store');
        }
        @endphp
        <form action="{{ $url }}" method="POST" enctype="multipart/form-data" class="mx-auto">
            @csrf
            @if ($id)
            @method('PUT')
            @endif

            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Pilih Metode Poster</label>
                <div class="flex items-center space-x-4 mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" name="poster_method" value="url" {{ $film->poster_method == 'url' ? 'checked' : '' }} onclick="togglePosterInput('url')" class="form-radio text-blue-600">
                        <span class="ml-2 text-sm text-neutral-900 dark:text-white">Gunakan URL</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="poster_method" value="upload" {{ $film->poster_method == 'file' ? 'checked' : '' }} onclick="togglePosterInput('upload')" class="form-radio text-blue-600">
                        <span class="ml-2 text-sm text-neutral-900 dark:text-white">Unggah File</span>
                    </label>
                </div>
            </div>

            <!-- Input Poster URL -->
            <div id="poster_url" class="mb-5" style="{{ $film->poster_method == 'url' ? '' : 'display: none;' }}">
                <label for="poster_url_input" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Poster URL</label>
                <input type="text" name="poster_url" id="poster_url_input" value="{{ str_starts_with($film->poster_url, 'http://127.0.0.1:8000/storage') ? '' : $film->poster_url }}" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan URL Poster" required />
            </div>

            <!-- Input Poster File Upload -->
            <div id="poster_upload" class="mb-5" style="{{ $film->poster_method == 'file' ? '' : 'display: none;' }}">
                <label for="poster_file_input" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Unggah Poster</label>
                <input type="file" name="poster_file" id="poster_file_input" class="block w-full text-sm text-neutral-900 border border-neutral-300 rounded-lg cursor-pointer bg-neutral-50 dark:text-neutral-400 dark:border-neutral-600 dark:bg-neutral-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <p class="mt-1 text-sm text-neutral-500 dark:text-neutral-400">Unggah file gambar (JPG, PNG, JPEG)</p>
            </div>

            <div class="mb-5">
                <label for="judul" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ $film->judul }}" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Judul" required />
            </div>

            <div class="mb-5">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Deskripsi</label>
                <textarea rows="7" name="deskripsi" id="deskripsi" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Deskripsi" required>{{ $film->deskripsi }}</textarea>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
            <div class="mb-5">
                    <label for="total_episode" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Total Episode</label>
                    <input type="number" name="total_episode" id="total_episode" value="{{ $film->total_episode }}" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Total Episode" required />
                </div>
                <div class="mb-5">
                    <label for="tahun_rilis" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Tahun Rilis</label>
                    <input type="number" name="tahun_rilis" id="tahun_rilis" value="{{ $film->tahun_rilis }}" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Tahun Rilis" required />
                </div>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-5">
                    <label for="durasi" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Durasi Film (Menit)</label>
                    <input type="number" name="durasi" id="durasi" value="{{ $film->durasi }}" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Durasi" required />
                </div>
                <div class="mb-5">
                    <label for="pencipta" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Pencipta</label>
                    <input type="text" name="pencipta" id="pencipta" value="{{ $film->pencipta }}" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Pencipta" required />
                </div>
            </div>

            <div class="mb-5">
                <label for="trailer" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Trailer URL</label>
                <input type="text" name="trailer" id="trailer" value="{{ $film->trailer }}" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan URL Trailer" required />
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-5">
                    <label for="kategori_umur" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Kategori Umur</label>
                    <select name="kategori_umur" id="kategori_umur" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="" @php echo $id ? '' : 'selected'; @endphp disabled>Pilih Kategori</option>
                        <option value="G" {{ $film->kategori_umur == 'G' ? 'selected' : '' }}>G (General Audience)</option>
                        <option value="PG" {{ $film->kategori_umur == 'PG' ? 'selected' : '' }}>PG (Parental Guidance)</option>
                        <option value="PG-13" {{ $film->kategori_umur == 'PG-13' ? 'selected' : '' }}>PG-13 (Parents Strongly Cautioned)</option>
                        <option value="R" {{ $film->kategori_umur == 'R' ? 'selected' : '' }}>R (Restricted)</option>
                        <option value="NC-17" {{ $film->kategori_umur == 'NC-17' ? 'selected' : '' }}>NC-17 (Adults Only)</option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="kategori_film" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Kategori Film</label>
                    <select name="kategori_film" id="kategori_film" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="" @php echo $id ? '' : 'selected'; @endphp disabled>Pilih Kategori</option>
                        <option value="movies" {{ $film->kategori_film == 'movies' ? 'selected' : '' }}>Movies</option>
                        <option value="series" {{ $film->kategori_film == 'series' ? 'selected' : '' }}>Series</option>
                        <option value="anime" {{ $film->kategori_film == 'anime' ? 'selected' : '' }}>Anime</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            <a href="{{ route('admin.film') }}" class="py-2.5 px-5 ms-3 text-sm font-medium text-neutral-900 focus:outline-none bg-white rounded-lg border border-neutral-200 hover:bg-neutral-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-neutral-100 dark:focus:ring-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-600 dark:hover:text-white dark:hover:bg-neutral-700">Batal</a>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    function togglePosterInput(method) {
        if (method === 'url') {
            document.getElementById('poster_url').style.display = 'block';
            document.getElementById('poster_url_input').required = true;
            document.getElementById('poster_upload').style.display = 'none';
            document.getElementById('poster_file_input').required = false;
        } else {
            document.getElementById('poster_url').style.display = 'none';
            document.getElementById('poster_url_input').required = false;
            document.getElementById('poster_upload').style.display = 'block';
            document.getElementById('poster_file_input').required = true;
        }
    }
</script>
@endsection