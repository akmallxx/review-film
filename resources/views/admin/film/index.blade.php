@extends('layouts.admin')

@section('title', 'CRUD Film')

@section('content')


<div class="flex justify-between mb-8">
    <h2 class="text-3xl font-bold text-neutral-900 dark:text-white">Tabel Film</h2>

    <!-- Create toggle -->
    <a href="{{ route('admin.film.create') }}"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="a">
        <i class="bi bi-plus-circle me-2"></i>Tambah Film
    </a>
</div>

<!-- @if (session('success'))
        <div id="alert-1" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-100 dark:bg-neutral-600 dark:text-green-400" role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-neutral-600 dark:text-green-400 dark:hover:bg-neutral-600" data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @elseif (session('error'))
        <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-100 dark:bg-neutral-700 dark:text-red-400" role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('error') }}
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-neutral-700 dark:text-red-400 dark:hover:bg-neutral-700" data-dismiss-target="#alert-2" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif -->

<table id="myTable" class="min-w-full border dark:border-neutral-500 rounded-lg shadow-lg dark:text-white">
    <thead class="bg-neutral-300 dark:bg-neutral-600">
        <tr>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">
                #</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">
                KATEGORI</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">
                POSTER</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">
                JUDUL</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">
                PEMOSTING</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">
                DETAIL</th>
            <th class="p-4 text-left font-bold text-sm uppercase tracking-wider text-neutral-700 dark:text-neutral-200">
                ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($films as $film)
        <tr
            class="border-b dark:border-neutral-500 hover:bg-neutral-100 dark:hover:bg-neutral-600 transition duration-300">
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500">{{ $loop->iteration }}
            </td>
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500">
                {{ $film->kategori_film }}
            </td>
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500">
                <img class="w-24 h-32 object-cover" src="{{ $film->poster_url }}" alt="{{ $film->slug }}">
            </td>
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500">
                {{ $film->judul }}
            </td>
            <td class="p-4 text-sm text-neutral-700 dark:text-neutral-100 border-b border-neutral-500">
                {{ $film->user->name }}
            </td>
            <td class="p-4 text-xs text-neutral-700 dark:text-neutral-100 border-b border-neutral-500">
                <a class="bg-neutral-800 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300"
                    href="{{ url('detail/' . $film->slug) }}">Detail</a>
            </td>
            <td class="p-4 text-xs text-neutral-700 dark:text-neutral-100 border-b border-neutral-500">
                <a href="{{ route('admin.film.edit', $film->id) }}"
                    class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300">Edit</a>

                <form id="delete-form-{{ $film->id }}" action="{{ route('admin.film.delete', $film->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-lg transition duration-300" onclick="confirmDelete({{ $film->id }})">Delete</button>
                </form>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus pengguna?',
            text: "Data yang sudah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>
@endsection