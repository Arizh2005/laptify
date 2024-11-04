<nav x-data="{ open: false }" class="bg-blue-400 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo and Search Input -->
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::check() && Auth::user()->usertype == 'admin' ? route('admin.dashboard') : (Auth::check() ? route('dashboard') : url('/')) }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
                    </a>
                    <span class="ml-2 text-white font-semibold">Laptify</span>
                </div>
            </div>

            <!-- Login and Register Links on the Right Side -->
            <div class="ml-auto hidden space-x-8 sm:flex items-center">
                @if (Auth::check())
                    <x-nav-link :href="Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype == 'admin' ? request()->routeIs('admin.dashboard') : request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>

                    @if (Auth::user()->usertype == 'admin')
                        <x-nav-link href="admin/product" :active="request()->routeIs('crud')">{{ __('Product') }}</x-nav-link>
                        <x-nav-link href="admin/category" :active="request()->routeIs('admin.category')">{{ __('Category') }}</x-nav-link>
                        <x-nav-link href="admin/user" :active="request()->routeIs('admin.user')">{{ __('User') }}</x-nav-link>
                    @else
                        <x-nav-link href="simulation" :active="request()->routeIs('user.simulation')">{{ __('Simulation') }}</x-nav-link>
                        <x-nav-link href="favorite" :active="request()->routeIs('user.favorite')">{{ __('Favorite') }}</x-nav-link>
                        <x-nav-link href="profile" :active="request()->routeIs('profile.edit')">{{ __('My Profile') }}</x-nav-link>
                    @endif
                @else
                    <x-nav-link href="{{ route('login') }}">{{ __('Login') }}</x-nav-link>
                    <x-nav-link href="{{ route('register') }}">{{ __('Register') }}</x-nav-link>
                @endif
            </div>

            <!-- Dropdown for smaller screens (mobile) -->
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
    <!-- Remaining code for the responsive menu -->
</nav>
