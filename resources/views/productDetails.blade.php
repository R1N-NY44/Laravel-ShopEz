<x-app-layout>
    <div class="w-full" style="font-family: 'Inter';">
        <div class="mx-auto w-[1580px] mt-14 gap-8 flex justify-between">

            {{-- Foto barang Kiri --}}
            <div class="border rounded-xl w-[440px] overflow-hidden">
                {{-- <img src="https://i.pinimg.com/originals/b4/0f/cf/b40fcf17d35c0b9c0f6392c18a03a22f.jpg" alt=""> --}}
            </div>

            {{-- Detail Barang Tengah--}}
            <div class="w-[800px] text-black">
                <h1 class="text-4xl font-semibold">High School Uniform</h1>
                <h1 class="text-5xl font-semibold mt-4" style="font-family: 'Almarai', sans-serif;">Rp. 100.000</h1>
                <div class="bg-[#D9D9D9] py-[1px] w-full mt-4 mb-3"></div>
                <h1 class="text-xl text-[#6D7588] my-[1.5px]">Kondisi : <span class="text-[#212121]">Baru</span></h1>
                <h1 class="text-xl text-[#6D7588] my-[1.5px]">Stok : <span class="text-[#212121]">100</span></h1>
                <h1 class="text-xl text-[#6D7588] my-[1.5px]">Minimal Order : <span class="text-[#212121]">1</span></h1>

            </div>

            {{-- Checkout di kanan --}}
            <div class="w-[350px]">
                <div class=" mt-4 p-8 bg-white shadow-lg border border-[#f0f0f0] rounded-xl">
                    {{-- Daftar Detail --}}
                    <h1 class="text-3xl mb-6">Ringkasan Belanja</h1>

                    <div>
                        <div class="mt-2 flex justify-between text-[#808080]">
                            <h1 class="text-xl">Kaos Kaki</h1>
                            <h1 class="text-xl">Rp. 100.000</h1>
                        </div>
                        <div class="mt-2 flex justify-between text-[#808080]">
                            <h1 class="text-xl">Tubler</h1>
                            <h1 class="text-xl">Rp. 400.000</h1>
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="bg-[#808080] py-[0.8px] w-full my-6"></div>

                    {{-- Total --}}
                    <div class="flex justify-between text-[#808080] ">
                        <h1 class="text-xl">Total</h1>
                        <h1 class="text-xl">Rp. 500.000</h1>
                    </div>

                    {{-- Checkout Button --}}
                    <div class="flex justify-center mt-12">
                        <button class="bg-[#C4A7A7] text-white text-2xl w-full py-3">Beli (1)</button>
                    </div>

                </div>
            </div>


        </div>

    </div>
</x-app-layout>
