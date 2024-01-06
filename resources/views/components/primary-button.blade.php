<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-base text-white uppercase tracking-widest hover:bg-[#D6A7A7] focus:bg-[#D6A7A7] active:bg-[#D6A7A7] focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
