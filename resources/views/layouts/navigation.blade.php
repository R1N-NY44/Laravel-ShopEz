<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 sticky top-0 z-10">
    <!-- Primary Navigation Menu -->
    <div class="w-[90%] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            {{-- <div class="flex"> --}}
                <!-- Logo -->
                <div class="shrink-0 flex items-center py-5 z-10">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="absolute inset-x-0 mt-5">
                    <div class="w-[30%] dropdown dropdown-bottom flex flex-wrap items-center justify-center text-base ml-auto mr-auto">
                        <label class="relative w-full">
                            <input type="text" class="px-10 w-full bg-[#fff] border focus-within:border-white border-[#000]/50 " placeholder="Search . . .">
                            {{-- SVG in Placeholder --}}
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5" width="25" height="24" viewBox="0 0 25 24" fill="#000" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.9848 14H15.1948L14.9148 13.73C15.5398 13.0039 15.9965 12.1487 16.2524 11.2256C16.5082 10.3024 16.5569 9.33413 16.3948 8.38998C15.9248 5.60998 13.6048 3.38997 10.8048 3.04997C9.82045 2.92544 8.82063 3.02775 7.88186 3.34906C6.9431 3.67038 6.09028 4.20219 5.38867 4.90381C4.68706 5.60542 4.15524 6.45824 3.83393 7.397C3.51261 8.33576 3.4103 9.33559 3.53484 10.32C3.87484 13.12 6.09484 15.44 8.87484 15.91C9.81899 16.072 10.7873 16.0234 11.7105 15.7675C12.6336 15.5117 13.4888 15.0549 14.2148 14.43L14.4848 14.71V15.5L18.7348 19.75C19.1448 20.16 19.8148 20.16 20.2248 19.75C20.6348 19.34 20.6348 18.67 20.2248 18.26L15.9848 14ZM9.98484 14C7.49484 14 5.48484 11.99 5.48484 9.49997C5.48484 7.00997 7.49484 4.99997 9.98484 4.99997C12.4748 4.99997 14.4848 7.00997 14.4848 9.49997C14.4848 11.99 12.4748 14 9.98484 14Z"/>
                            </svg>
                        </label>
                    </div>
                </div>

                {{-- </div> --}}

            <div class="hidden lg:flex z-10 items-center">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    {{-- <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('cart')" :active="request()->routeIs('cart')">
                        {{ __('Abbout') }}
                    </x-nav-link> --}}
                    <x-nav-link :href="route('cart')" :active="request()->routeIs('cart')">
                        <svg width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.5 6.66675H9.80394C10.5582 6.66675 10.9353 6.66675 11.2072 6.88036C11.4791 7.09397 11.5684 7.46035 11.7471 8.19312L12.2559 10.2807C12.6131 11.7462 12.7917 12.479 13.3356 12.9062C13.8795 13.3334 14.6337 13.3334 16.1421 13.3334H16.25" stroke="#222222" stroke-width="2" stroke-linecap="round"/>
                            <path d="M29.25 28.3333H12.3077C11.2349 28.3333 10.6985 28.3333 10.403 28.0236C10.3414 27.959 10.2887 27.8865 10.2463 27.8079C10.0432 27.4312 10.209 26.9211 10.5405 25.9008V25.9008C10.9113 24.76 11.0967 24.1896 11.5131 23.8263C11.6027 23.7481 11.6991 23.678 11.8012 23.6169C12.2754 23.3333 12.8752 23.3333 14.0748 23.3333H22.75" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M25.125 23.3333H16.4025C14.7779 23.3333 13.9657 23.3333 13.4054 22.8567C12.8451 22.3801 12.7148 21.5783 12.4543 19.9748L11.9407 16.8144C11.678 15.1978 11.5466 14.3895 11.9959 13.8614C12.4451 13.3333 13.264 13.3333 14.9019 13.3333H29.3C30.7362 13.3333 31.4542 13.3333 31.748 13.8033C32.0417 14.2733 31.7271 14.9187 31.0978 16.2097L28.7205 21.0861C28.1878 22.1789 27.9214 22.7252 27.435 23.0292C26.9486 23.3333 26.3407 23.3333 25.125 23.3333Z" stroke="#222222" stroke-width="2" stroke-linecap="round"/>
                            <ellipse cx="27.625" cy="33.3334" rx="1.625" ry="1.66667" fill="#222222"/>
                            <ellipse cx="14.625" cy="33.3334" rx="1.625" ry="1.66667" fill="#222222"/>
                        </svg>
                    </x-nav-link>
                </div>
                <!-- Settings Dropdown -->
                @if (Route::has('login'))
                    @auth
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <img class="rounded-full border-[#C2A7A7] border-2" src="profile.svg" alt="">
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
                @else
                    <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">
                        <a href="{{ route('login') }}" class="px-3 py-1  border-2 border-[#C2A7A7] bg-[#C2A7A7] rounded-md font-semibold text-base text-white tracking-wide">
                            Login
                        </a>
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-2 py-1 border-2 border-[#C2A7A7] rounded-md font-semibold text-base text-[#C2A7A7] tracking-wide">
                            Register
                        </a>
                        @endif
                    </div>
                    @endauth
                @endif
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
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        @if (Route::has('login'))
            @auth
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
        @else
            <div class="flex items-center ms-6">
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
                @if (Route::has('register'))
                <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-nav-link>
                @endif
            </div>
            @endauth
        @endif
    </div>
</nav>
