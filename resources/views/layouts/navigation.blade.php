<nav x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
    :class="scrolled ? 'bg-white dark:bg-neutral-900 shadow-lg' : 'bg-transparent shadow-none'"
    class="sticky top-0 z-50 transition duration-300 px-4 md:px-4 sm:px-4">


    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-neutral-800 dark:text-neutral-200" />
                </a>
            </div>
            <div class="flex-grow flex justify-center">

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex justify-center">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('movies')" :active="request()->routeIs('movies')">
                        {{ __('Movies') }}
                    </x-nav-link>
                    <x-nav-link :href="route('series')" :active="request()->routeIs('series')">
                        {{ __('Series') }}
                    </x-nav-link>
                    <x-nav-link :href="route('anime')" :active="request()->routeIs('anime')">
                        {{ __('Anime') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown or Login/Register Links -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!--<button id="theme-toggle" class="me-4 px-1 p-3 rounded-full bg-neutral-200 dark:bg-neutral-900 text-neutral-900 dark:text-white transition duration-300 hover:bg-neutral-300 dark:hover:bg-neutral-800 shadow-lg">-->
                <!--    <i id="theme-icon" class="bi bi-moon-fill text-2xl transition-transform duration-300 transform rotate-0 dark:rotate-180"></i>-->
                <!--</button>-->
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-neutral-500 dark:text-neutral-300 bg-transparent hover:text-neutral-700 dark:hover:text-neutral-100 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-3">
                                @if(auth()->user()->avatar)
                                <img class="h-9 w-9 rounded-full object-cover shadow-md" src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="User Avatar">
                                @else
                                <img class="h-9 w-9 rounded-full object-cover shadow-md" src="{{ asset('storage/avatars/default-avatar.png') }}" alt="User Avatar">
                                @endif
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Check if user has 'admin' role -->
                        @if(auth()->user()->can('crud author'))
                        <x-dropdown-link :href="route('admin')">
                            {{ __('Admin Dashboard') }}
                        </x-dropdown-link>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        
                        <x-dropdown-link href="#" id="theme-toggle">
                            <i id="theme-icon" class="bi bi-moon-fill transition duration-300"></i> <span class="px-1 text-neutral-500">|</span>
                            {{ __('Change Theme') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                @else
                <!-- If the user is not authenticated, show login and register buttons -->
                <a href="{{ route('login') }}" class="text-sm rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>

                <span class="me-4 text-neutral-400">|</span> <!-- Separator -->

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="text-sm rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white border">
                    Register
                </a>
                @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-neutral-400 dark:text-neutral-100 hover:text-neutral-500 dark:hover:text-neutral-400 focus:outline-none focus:text-neutral-500 dark:focus:text-neutral-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('movies')" :active="request()->routeIs('movies')">
                {{ __('Movies') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('series')" :active="request()->routeIs('series')">
                {{ __('Series') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('anime')" :active="request()->routeIs('anime')">
                {{ __('Anime') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-4 bg-white dark:bg-neutral-900 bg-opacity-80 dark:bg-opacity-80 rounded-xl border-t border-neutral-200 dark:border-neutral-600">
            <div class="px-4 flex items-center justify-between">
                
                <button id="theme-toggle" class="px-2 py-1 rounded-full bg-neutral-100 dark:bg-neutral-700 text-neutral-900 dark:text-white transition duration-300 shadow-md">
                    <i id="theme-icon" class="bi bi-moon-fill text-2xl transition-transform duration-300 transform rotate-0 dark:rotate-180"></i>
                </button>

                @auth
                <div class="text-end">
                    <div class="font-medium text-base text-neutral-800 dark:text-neutral-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-neutral-500">{{ Auth::user()->email }}</div>
                </div>
                @else
                <div class="text-end">
                    <a href="{{ route('login') }}" class="text-sm rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    <span class="me-4 text-neutral-400">|</span> <!-- Separator -->

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white border">
                        Register
                    </a>
                    @endif
                </div>
                @endauth
            </div>


            @auth
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Check if user has 'admin' role -->
                @if(auth()->user()->hasRole('admin'))
                <x-responsive-nav-link :href="route('admin')">
                    {{ __('Admin Dashboard') }}
                </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @endauth
        </div>
    </div>
</nav>