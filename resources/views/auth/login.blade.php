<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class=" mt-5 mx-5 ">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
            <h3 class=" text-3xl my-4 font-bold leading-9 tracking-tight text-gray-900">Masuk</h3>
            </div>

                <!-- <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                    <p class="mx-4 mb-0 text-center font-semibold dark:text-black">
                    Or
                    </p>
                </div> -->

            <!-- Email Address -->
            <x-input-label for="email" :value="__('Email')" />
            <div class=" mt-1">

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <x-input-label for="password" :value="__('Password')" class="mt-4" />
            <div class="mt-1">


                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- button -->
            <div class="mt-4 ">
                <x-primary-button class=" bg-[#C2A7A7] from-gray-700 to-gray-900 font-medium md:p-4 text-white  uppercase w-full ">
                    {{ __('LOGIN') }}
                </x-primary-button>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#C2A7A7] shadow-sm focus:ring-[#C2A7A7]" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Forgot Password -->
            <div class="flex items-center mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div>

             <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                <p class="mx-4 mb-0 text-center font-semibold dark:text-black">
                Or
                </p>
            </div>

            <!-- Belum punya akun? -->
            <div class="flex items-center justify-center my-2">
                <a class="text-lg text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 mr-1"> Baru di ShopEasy?</a>
                <a class="underline text-lg text-[#C2A7A7] hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" href="{{ route('register') }}">
                    {{ __(' Register here') }}
                </a>
            </div>


        </form>
    </div>
</x-guest-layout>
