@extends('layouts.admin')

@section('title', 'CRUD Users')

@section('content')
    <h2 class="text-3xl font-bold text-neutral-900 dark:text-white mb-8">Edit User</h2>
    <div class="p-4 md:p-5 space-y-4">
        @php
        if (isset($user)) {
            $url = route('admin.users.update', $user->id);
        } else {
            $url = route('admin.users.store');
        }
        @endphp
        <form action="{{ $url }}" method="POST" class="mx-auto">
            @csrf
            @if (isset($user))
                @method('PUT')
            @endif

            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Nama</label>
                <input type="text" name="name" id="name" value="{{ $user->name ?? '' }}" required class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required />
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email ?? '' }}" required class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Email" required />
                </div>
                <div class="mb-5">
                <label for="role" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Role</label>
                <select name="role" id="role" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="admin" {{ isset($user) && $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ isset($user) && $user->hasRole('user') ? 'selected' : '' }}>User</option>
                    <option value="author" {{ isset($user) && $user->hasRole('author') ? 'selected' : '' }}>Author</option>
                </select>
            </div>
            </div>

            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-neutral-900 dark:text-white">Password (kosongkan jika tidak ingin diubah)</label>
                <input type="password" name="password" id="password" class="bg-neutral-50 border border-neutral-300 text-neutral-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-neutral-600 dark:border-neutral-600 dark:placeholder-neutral-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Password" />
            </div>

            <div class="flex gap-3">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                <a href="{{ route('admin.users') }}" class="py-2.5 px-5 text-sm font-medium text-neutral-900 focus:outline-none bg-white rounded-lg border border-neutral-200 hover:bg-neutral-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-neutral-100 dark:focus:ring-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:border-neutral-600 dark:hover:text-white dark:hover:bg-neutral-700">Batal</a>
            </div>
        </form>
    </div>
@endsection
