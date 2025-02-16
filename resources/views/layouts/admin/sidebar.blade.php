<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="w-64 bg-white dark:bg-neutral-800 text-white h-screen p-4">
    <ul class="mt-8">
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin') }}" :active="request()->routeIs('admin')"><i class="bi bi-house-door me-2"></i>Dashboard</x-sidebar-link>
        </li>
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin.film') }}" :active="request()->routeIs('admin.film')"><i class="bi bi-camera-reels me-2"></i>Film</x-sidebar-link>
        </li>
    </ul>
</aside>