<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="w-64 bg-neutral-200 dark:bg-neutral-800 text-white h-screen p-4">
    <div class="shrink-0 flex items-center">
        <a href="{{ route('admin') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-neutral-800 dark:text-neutral-200" />
        </a>
    </div>
    <ul class="mt-8">
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin') }}" :active="request()->routeIs('admin')"><i class="bi bi-house-door me-2"></i>Dashboard</x-sidebar-link>
        </li>
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin.film') }}" :active="request()->routeIs('admin.film')"><i class="bi bi-camera-reels me-2"></i>Film</x-sidebar-link>
        </li>
    </ul>
</aside>