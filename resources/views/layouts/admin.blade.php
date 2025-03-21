<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/logo/Y-logo.png') }}" type="image/png">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Cek apakah user punya preferensi di localStorage
        if (localStorage.getItem("theme") === "light") {
            document.documentElement.classList.remove("dark"); // Pakai light mode jika sudah dipilih sebelumnya
        } else {
            document.documentElement.classList.add("dark"); // Default ke dark mode
            localStorage.setItem("theme", "dark"); // Simpan preferensi default ke dark
        }
    </script>

    @yield('styles')
</head>

<body class="bg-neutral-200 dark:bg-neutral-950">
    @include('.layouts.admin.navbar')
    <div class="flex h-screen">
        @include('layouts.admin.sidebar')
        <div class="flex-1 flex flex-col">
            <main class="p-6">
                <div class="bg-neutral-100 dark:bg-neutral-900 p-6 rounded shadow-md ms-64 mt-16">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    @yield('scripts')

    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Link CSS DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- Link JS DataTables dan jQuery -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{!! session('success') !!}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    @if(session('error'))
    <script>
        Swal.fire({
            title: 'Error!',
            text: "{!! session('error') !!}",
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "pagingType": "simple",
                "responsive": true,
                "autoWidth": false,
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ entri",
                    "info": "<p class='dark:text-white'>Menampilkan _START_ sampai _END_ dari _TOTAL_ entri</p>",
                    "infoEmpty": "<p class='dark:text-white'>Menampilkan 0 sampai 0 dari 0 entri</p>",
                    "infoFiltered": "<p class='dark:text-white'>(difilter dari _MAX_ total entri)</p>",
                    "paginate": {
                        "first": "Awal",
                        "last": "Akhir",
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    },
                },
                "dom": '<"flex justify-between items-center mb-4"lf>t<"flex justify-between items-center mt-4"ip>',
                "initComplete": function() {
                    $(".dataTables_length select").addClass("px-4 py-2 border rounded-lg bg-white dark:bg-neutral-800 dark:text-white");
                    $(".dataTables_length select option").addClass("px-4 py-2 border rounded-lg bg-white dark:bg-neutral-800 dark:text-white");
                    $(".dataTables_length label").addClass("dark:text-white");
                    $(".dataTables_filter input").addClass("px-4 py-2 border rounded-lg bg-white dark:bg-neutral-800 dark:text-white");
                    $(".dataTables_filter label").addClass("dark:text-white");
                    $("dataTables_paginate").addClass("dark:text-white");
                }
            });
        });
    </script>
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