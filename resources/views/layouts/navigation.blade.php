<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="w-[90%] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            {{-- <div class="flex"> --}}
                <!-- Logo -->
                <div class="shrink-0 flex items-center py-5">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="absolute inset-x-0 mt-5">
                    <div class="dropdown dropdown-bottom flex flex-wrap items-center justify-center text-base ml-auto mr-auto">
                        <label class="relative">
                            <input type="text" class="px-10 w-[650px] bg-[#fff] border focus-within:border-white border-[#000]/50 " placeholder="Search . . .">
                            {{-- SVG in Placeholder --}}
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5" width="25" height="24" viewBox="0 0 25 24" fill="#000" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.9848 14H15.1948L14.9148 13.73C15.5398 13.0039 15.9965 12.1487 16.2524 11.2256C16.5082 10.3024 16.5569 9.33413 16.3948 8.38998C15.9248 5.60998 13.6048 3.38997 10.8048 3.04997C9.82045 2.92544 8.82063 3.02775 7.88186 3.34906C6.9431 3.67038 6.09028 4.20219 5.38867 4.90381C4.68706 5.60542 4.15524 6.45824 3.83393 7.397C3.51261 8.33576 3.4103 9.33559 3.53484 10.32C3.87484 13.12 6.09484 15.44 8.87484 15.91C9.81899 16.072 10.7873 16.0234 11.7105 15.7675C12.6336 15.5117 13.4888 15.0549 14.2148 14.43L14.4848 14.71V15.5L18.7348 19.75C19.1448 20.16 19.8148 20.16 20.2248 19.75C20.6348 19.34 20.6348 18.67 20.2248 18.26L15.9848 14ZM9.98484 14C7.49484 14 5.48484 11.99 5.48484 9.49997C5.48484 7.00997 7.49484 4.99997 9.98484 4.99997C12.4748 4.99997 14.4848 7.00997 14.4848 9.49997C14.4848 11.99 12.4748 14 9.98484 14Z"/>
                            </svg>
                        </label>
                    </div>
                </div>

                {{-- </div> --}}

            <div class="flex z-10">
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('cart')" :active="request()->routeIs('cart')">
                    {{ __('Cart') }}
                </x-nav-link>
                <x-nav-link :href="route('cart')" :active="request()->routeIs('cart')">
                    {{ __('Abbout') }}
                </x-nav-link>
            </div>
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
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
