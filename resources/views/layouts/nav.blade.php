<nav x-data="{ open: false }" class="bg-blue-400 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
                    </a>
                    <span class="ml-2 text-white font-semibold">Laptify</span>
                </div>

                <!-- Search Bar -->
                <div class="ml-6">
                    <input type="text" placeholder="Search" class="rounded-full py-2 px-4 bg-yellow-50 border-none focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex items-center">
                <x-nav-link :href="Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype == 'admin' ? request()->routeIs('admin.dashboard'): request()->routeIs('dashboard')">
                    {{ __('Home') }}
                </x-nav-link>

                {{--Admin Links--}}
                @if (Auth::user()->usertype == 'admin')
                <x-nav-link href="admin/product" :active="request()->routeIs('crud')">
                    {{ __('Product') }}
                </x-nav-link>

                <x-nav-link href="admin/category" :active="request()->routeIs('admin.category')">
                    {{ __('Category') }}
                </x-nav-link>

                <x-nav-link href="admin/user" :active="request()->routeIs('admin.user')">
                    {{ __('User') }}
                </x-nav-link>

                @endif

                {{--User Links--}}
                @if (Auth::user()->usertype == 'user')
                <x-nav-link href="simulation" :active="request()->routeIs('user.simulation')">
                    {{ __('Simulation') }}
                </x-nav-link>

                <x-nav-link href="favorite" :active="request()->routeIs('user.favorite')">
                    {{ __('Favorite') }}
                </x-nav-link>

                <x-nav-link href="profile" :active="request()->routeIs('profile.edit')">
                    {{ __('My Profile') }}
                </x-nav-link>

                @endif

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex items-center ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="url('/')">
                            {{ __('Home') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-blue-500 focus:outline-none focus:bg-blue-500 transition duration-150 ease-in-out">
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
            {{--Admin Links--}}
            @if (Auth::user()->usertype == 'admin')
            <x-responsive-nav-link href="admin/product" :active="request()->routeIs('crud')">
                {{ __('Product') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="admin/category" :active="request()->routeIs('admin.category')">
                {{ __('Category') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="admin/user" :active="request()->routeIs('admin.user')">
                {{ __('User') }}
            </x-responsive-nav-link>

            @endif

            {{--User Links--}}
            @if (Auth::user()->usertype == 'user')
            <x-responsive-nav-link href="simulation" :active="request()->routeIs('user.simulation')">
                {{ __('Simulation') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="favorite" :active="request()->routeIs('user.favorite')">
                {{ __('Favorite') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link href="profile" :active="request()->routeIs('profile.edit')">
                {{ __('My Profile') }}
            </x-responsive-nav-link>

            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('/')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
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
        </div>
    </div>
</nav>
