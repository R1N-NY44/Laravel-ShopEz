<x-app-layout>

    <div class="w-full text-black" style="font-family: 'Alice';">
        <div class="mx-auto w-[1280px] mt-14 gap-10 flex justify-between">

            {{-- Detail Barang (Kiri)--}}
            <div class="w-full p-5">
                <h1 class="font-semibold text-3xl mb-3" style="font-family: 'Almarai';">Keranjang</h1>
                <div class="ml-1 flex items-center gap-4">
                    <input type="checkbox" class="p-3 checkbox rounded-full border-[#C4A7A7] checked:border-[#C4A7A7]">
                    <div class="flex justify-between w-full">
                        <h1 class="text-2xl text-[#808080]">Pilih Semua</h1>

                        {{-- hapus semua isi cart --}}
                        <form action="{{ route('cart.destroyAll') }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-2xl text-[#C4A7A7] mr-2">Hapus Semua</button>
                        </form>
                        
                    </div>
                </div>
                {{-- Divider --}}
                <div class="bg-[#D9D9D9] py-[0.8px] w-full my-4"></div>

                {{-- Daftar Barang --}}
                <div class="h-[650px] overflow-y-auto">

                    @foreach ($carts as $cart)
                    {{-- Produk 1 --}}
                    <section x-data="{ count{{ $cart->id }}: document.getElementById('getQty{{ $cart->id }}').value, price{{ $cart->id }}: document.getElementById('getPrice{{ $cart->id }}').value}">
                        <div class="pl-1 flex items-center my-6">
                            {{-- ambil checkbox nya --}}
                            <input type="checkbox" class="p-3 checkbox rounded-full border-[#C4A7A7] checked:border-[#C4A7A7]">
                            <img class="w-[100px] h-[100px] rounded-lg mx-3" src="{{ asset('storage/'. $cart->product->productIcon) }}" alt="">
                            <div class="-mt-7">
                                <h1 class="text-[22px] mb-2">{{ $cart->product->productName }}</h1>
                                <h1 class="text-[22px] font-semibold">Rp<span x-text="(count{{ $cart->id }} * price{{ $cart->id }}).toLocaleString('id-ID')"></span></h1>
                            </div>
                        </div>
                        <div class="justify-between flex">
                            <h1 class="ml-10 text-xl text-[#C4A7A7]">{{ $cart->purchaseNotes }}</h1>
                            <div class="flex mr-2 items-center relative">
                                <h1 class="ml-8 text-xl ">Pindahkan Ke Wishlist</h1>
                                <h1 class="text-[#9d9d9d] text-2xl mx-6 -mt-1">|</h1>

                                {{-- hapus satu barang dalam cart --}}
                                <form action="{{ route('cart.destroy', $cart->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" title="Delete"><img class="mr-6" src="trash.svg" alt=""></button>
                                </form>

                                <div class="-mt-3 h-3 flex gap-6">
                                    <button x-on:click="count{{ $cart->id }} > 1 ? count{{ $cart->id }}-- : null">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="9" stroke="#33363F" stroke-width="2"/>
                                            <path d="M7.5 12H16.5" stroke="#33363F" stroke-width="2"/>
                                        </svg>
                                    </button>

                                    <input type="hidden" id="getPrice{{ $cart->id }}" value="{{ $cart->product->productPrice }}">
                                    <input type="hidden" id="getQty{{ $cart->id }}" value="{{ $cart->quantity }}">
                                    <p x-text="count{{ $cart->id }}" class="font-semibold"></p>

                                    {{-- Ambil buat QTY --}}
                                    <input x-bind:value="count{{ $cart->id }}" type="text" class="border-none w-5 bg-gray-100" hidden>
                                    <button x-on:click="count{{ $cart->id }}++">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18Z" fill="#222222"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{-- Divider --}}
                        <div class="bg-[#D9D9D9] py-[1px] w-full mt-4 mb-8"></div>
                    </section>
                    @endforeach

                </div>

            </div>

            {{-- Ringkasan belanja (Kanan)--}}
            <div class="w-[480px]">
                <div class=" mt-14 p-8 bg-white shadow-lg border border-[#f0f0f0] rounded-xl">
                    {{-- Daftar Detail --}}
                    <h1 class="text-3xl mb-6">Ringkasan Belanja</h1>

                    {{-- Printout Logic --}}
                    <div>
                        @php $total = 0; @endphp
                        @foreach ($carts as $summary)
                            <div class="mt-2 flex justify-between text-[#808080]">
                                <input hidden
                                    type="number"
                                    value="{{ $summary->product->productPrice * $summary->quantity }}"
                                    oninput="updateTotal()"
                                >
                                <h1 class="text-xl">{{ $summary->product->productName }}</h1>
                                <h1 class="text-xl">Rp. {{ number_format($summary->product->productPrice * $summary->quantity, 0, ',', ',') }}</h1>
                    
                                @php $total += $summary->product->productPrice * $summary->quantity; @endphp
                            </div>
                        @endforeach
                    
                        {{-- Divider --}}
                        <div class="bg-[#808080] py-[0.8px] w-full my-6"></div>
                    
                        {{-- Total --}}
                        <div class="flex justify-between text-[#808080]">
                            <h1 class="text-xl">Total</h1>
                            <h1 class="text-xl">Rp. {{ number_format($total, 0, ',', ',') }}</h1>
                        </div>
                    </div>
                    
                    {{-- Checkout Button --}}
                    <div class="flex justify-center mt-12">
                        <button class="bg-[#C4A7A7] text-white text-2xl w-full py-3">Beli ({{ $productCount }})</button>
                    </div>

                </div>
            </div>
            {{-- Ringkasan belanja --}}

        </div>

    </div>
</x-app-layout>
