<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-adsense-account" content="ca-pub-1915330423606341">
    
    @yield('meta-tag')

    <link rel="icon" href="{{ asset('images/logo/Y-logo.png') }}" type="image/png">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('css-content')

    <script>
        // Cek apakah user punya preferensi di localStorage
        if (localStorage.getItem("theme") === "light") {
            document.documentElement.classList.remove("dark"); // Pakai light mode jika sudah dipilih sebelumnya
        } else {
            document.documentElement.classList.add("dark"); // Default ke dark mode
            localStorage.setItem("theme", "dark"); // Simpan preferensi default ke dark
        }
    </script>
</head>

<body class="font-sans antialiased bg-neutral-200 dark:neutral-800">
    <div class="min-h-screen bg-neutral-200 dark:bg-neutral-900 transition duration-300">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @include('layouts.footer')

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('script-content')
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const themeToggle = document.getElementById("theme-toggle");
        const themeIcon = document.getElementById("theme-icon");
        const htmlElement = document.documentElement;

        // Atur default ke dark mode jika tidak ada di localStorage
        if (localStorage.getItem("theme") === "light") {
            htmlElement.classList.remove("dark");
            themeIcon.classList.replace("bi-moon-fill", "bi-brightness-high-fill");
        } else {
            htmlElement.classList.add("dark");
            themeIcon.classList.replace("bi-brightness-high-fill", "bi-moon-fill");
            localStorage.setItem("theme", "dark");
        }

        // Ganti tema saat tombol diklik
        themeToggle.addEventListener("click", function() {
            if (htmlElement.classList.contains("dark")) {
                htmlElement.classList.remove("dark");
                themeIcon.classList.replace("bi-moon-fill", "bi-brightness-high-fill");
                localStorage.setItem("theme", "light");
            } else {
                htmlElement.classList.add("dark");
                themeIcon.classList.replace("bi-brightness-high-fill", "bi-moon-fill");
                localStorage.setItem("theme", "dark");
            }
        });
    });
</script>
</html>