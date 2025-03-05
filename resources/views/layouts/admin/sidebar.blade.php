<aside class="w-64 bg-white dark:bg-neutral-900 text-white h-screen p-4 fixed z-40 top-0">
    <ul class="mt-20">
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
            <x-sidebar-link href="{{ route('admin.castings') }}" :active="request()->routeIs('admin.castings')">
                <i class="bi bi-person-lines-fill me-2"></i>Casting
            </x-sidebar-link>
        </li>
        @can('crud admin')
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin.users') }}" :active="request()->routeIs('admin.users')">
                <i class="bi bi-person me-2"></i>User
            </x-sidebar-link>
        </li>
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin.genre') }}" :active="request()->routeIs('admin.genre')">
                <i class="bi bi-film me-2"></i>Genre
            </x-sidebar-link>
        </li>
        @endcan
        <li class="mb-2">
            <x-sidebar-link href="{{ route('admin.genre-relations') }}" :active="request()->routeIs('admin.genre-relations')">
                <i class="bi bi-diagram-3 me-2"></i>Genre Relation
            </x-sidebar-link>
        </li>
    </ul>
</aside>
