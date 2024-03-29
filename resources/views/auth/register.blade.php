<x-guest-layout>

    <div class=" mt-5 mx-5 ">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
            <h3 class=" text-3xl my-4 font-bold leading-9 tracking-tight text-gray-900">Register</h3>
            </div>

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class=" items-center justify-end my-4">

                <x-primary-button class=" bg-[#C2A7A7] from-gray-700 to-gray-900 font-medium md:p-4 text-white  uppercase w-full">
                    {{ __('Register') }}
                </x-primary-button>

                <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                    <p class="mx-4 mb-0 text-center font-semibold dark:text-black">
                    Or
                    </p>
                </div>

                <!-- Belum punya akun? -->
                <div class="flex items-center justify-center my-2">
                    <a class="text-lg text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 mr-1"> Sudah memilikii akun ?</a>
                    <a class="underline text-lg text-[#C2A7A7] hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" href="{{ route('login') }}">
                        {{ __(' Login here') }}
                    </a>
                </div>

            </div>
        </form>
    </div>
</x-guest-layout>
