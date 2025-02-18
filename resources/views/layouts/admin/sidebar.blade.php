<aside class="w-64 bg-white dark:bg-neutral-900 text-white h-screen p-4 sticky top-0">
    <ul class="mt-8">
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin') }}" :active="request()->routeIs('admin')">
                <i class="bi bi-house-door me-2"></i>Dashboard
            </x-sidebar-link>
        </li>
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin.film') }}" :active="request()->routeIs('admin.film')">
                <i class="bi bi-camera-reels me-2"></i>Film
            </x-sidebar-link>
        </li>
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin.genre-relations') }}" :active="request()->routeIs('admin.genre-relations')">
                <i class="bi bi-list-ul me-2"></i>Genre Relation
            </x-sidebar-link>
        </li>
        @can('crud admin')
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users')">
            <i class="bi bi-person me-2"></i>User
            </x-sidebar-link>
        </li>
        @endcan
    </ul>
</aside>
