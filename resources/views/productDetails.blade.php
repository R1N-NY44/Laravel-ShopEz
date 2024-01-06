<x-app-layout>
    <div class="w-full" style="font-family: 'Inter';">
        <div x-data="{ title: document.getElementById('title').value, imgLink: document.getElementById('imgLink').value, price: document.getElementById('price').value, condition: document.getElementById('condition').value, stock: document.getElementById('stock').value, minOrder: document.getElementById('minimalOrder').value, description: document.getElementById('description').value, Qty: document.getElementById('minimalOrder').value, selectedSize: '',  notes: document.getElementById('notes').value}" class="mx-auto w-[1500px] mt-14 gap-14 flex justify-between">

            {{-- Important!! --}}
            {{-- Ambil semua data dari database, pasang di tiap section,
                tambahin jg data min order sama price, masukin di inputan nya --}}

            {{-- Foto barang Kiri --}}
            <div class="w-[440px]">
                <img class="border rounded-xl" :src="imgLink" alt="imgLink">
            </div>

            {{-- Detail Barang Tengah--}}
            <div class="w-[640px] text-black">
                <h1 class="text-4xl font-semibold" x-text="title"></h1>
                <h1 class="text-5xl font-semibold mt-4" style="font-family: 'Almarai', sans-serif;">Rp. <span x-text="price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')" class="text-[#212121]"></h1>
                <div class="bg-[#D9D9D9] py-[1px] w-full mt-4 mb-3"></div>
                <h1 class="text-xl text-[#6D7588] my-[1.5px]">Kondisi : <span x-text="condition" class="text-[#212121]"></span></h1>
                <h1 class="text-xl text-[#6D7588] my-[1.5px]">Stok : <span x-text="stock" class="text-[#212121]">100</span></h1>
                <h1 class="text-xl text-[#6D7588] my-[1.5px] mb-4">Minimal Order : <span x-text="minOrder" class="text-[#212121]"></span></h1>
                <h1 class="text-justify overflow-y-auto" x-text="description"></h1>

            </div>

            {{-- Checkout di kanan --}}
            <div class="w-[400px]">
                <div class=" mt-4 p-5 bg-white shadow-lg border border-[#f0f0f0] rounded-xl">
                    {{-- Daftar Detail --}}
                    <h1 class="text-black text-2xl mb-8">Atur ukuran dan catatan</h1>

                    <div class="mb-10 h-3 flex justify-between">
                        <h1 class="text-2xl text-[#808080]">Jumlah</h1>
                        <div class="flex items-center mt-3 gap-4">
                            <button x-on:click="Qty > minOrder ? Qty-- : null">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="9" stroke="#808080" stroke-width="2"/>
                                    <path d="M7.5 12H16.5" stroke="#808080" stroke-width="2"/>
                                </svg>
                            </button>
                            <p class="font-semibold text-lg border-none" x-text="Qty"></p>
                            {{-- Jika ingin bisa input qty manual, tapi bug di pembatasan stok --}}
                            {{-- <input class="font-semibold text-lg border-none w-20" x-bind:value="Qty" x-model="Qty" type="number"> --}}
                            {{-- <button x-on:click="Qty < stock ? Qty++ : null" class="-ml-8"> --}}
                            <button x-on:click="Qty < stock ? Qty++ : null" class="">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12ZM12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18Z" fill="#808080"/>
                                </svg>
                            </button>
                        </div>
                    </div>


                        {{-- Ukuran --}}
                    <div class="flex justify-between text-[#808080] items-center mb-5">
                        <input name="size" x-model="selectedSize" value="Ukuran S" id="SizeS" class="peer/SizeS" type="radio" hidden checked>
                        <label  for="SizeS" class="peer-checked/SizeS:bg-[#C4A7A7] text-lg px-4 text-white bg-gray-400  rounded-full">S</label>
                        <input name="size" x-model="selectedSize" value="Ukuran M" id="SizeM" class="peer/SizeM" type="radio" hidden>
                        <label  for="SizeM" class="peer-checked/SizeM:bg-[#C4A7A7] text-lg px-4 text-white bg-gray-400  rounded-full">M</label>
                        <input name="size" x-model="selectedSize" value="Ukuran L" id="SizeL" class="peer/SizeL" type="radio" hidden>
                        <label  for="SizeL" class="peer-checked/SizeL:bg-[#C4A7A7] text-lg px-4 text-white bg-gray-400  rounded-full">L</label>
                        <input name="size" x-model="selectedSize" value="Ukuran XL" id="SizeXL" class="peer/SizeXL" type="radio" hidden>
                        <label  for="SizeXL" class="peer-checked/SizeXL:bg-[#C4A7A7] text-lg px-4 text-white bg-gray-400  rounded-full">XL</label>
                        <input name="size" x-model="selectedSize" value="Ukuran XXL" id="SizeXXL" class="peer/SizeXXL" type="radio" hidden>
                        <label  for="SizeXXL" class="peer-checked/SizeXXL:bg-[#C4A7A7] text-lg px-4 text-white bg-gray-400  rounded-full">XXL</label>
                    </div>

                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                    {{-- Menampilkan pilihan ukuran dalam textarea --}}
                    <textarea class="w-full h-32 rounded-lg border-[#808080] text-[#808080] pl-1" name="purchaseNotes" id="notes" placeholder="Catatan :" x-text="'Catatan : ' + selectedSize"></textarea>

                    {{-- Divider --}}
                    <div class="bg-[#808080] py-[0.8px] w-full my-6"></div>

                    {{-- Total --}}
                    <div class="flex justify-between text-[#808080] ">
                        <h1 class="text-xl">Total</h1>
                        {{-- <h1 class="text-xl">Rp. <span x-text="(price * Qty).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',')"></span></h1> --}}
                        <h1 class="text-xl">Rp. <span x-text="(price * Qty).toLocaleString('id-ID')"></span></h1>
                    </div>

                    {{-- Checkout Button --}}
                    <div class="flex justify-center mt-12">
                        <input type="number" x-bind:value="Qty" name="quantity" hidden> <!-- Jumlah Barang di Beli -->
                        <input type="hidden"  name="product_id" value="{{ $product->id }}"> >
                        <button type="submit" class="bg-[#C4A7A7] text-white text-2xl w-full py-3">Beli (<span x-text="Qty"></span>)</button>
                    </form>
                    </div>

                    <!-- Backend Interface -->
                    <div class="hidden">
                        <input value="{{ $product->productName }}" id="title" type="text"> <!-- Nama Barang -->
                        <input value="{{ asset('storage/' .$product->productIcon) }}" id="imgLink" type="text"> <!-- Link Foto Barang -->
                        <input value="{{ $product->productPrice }}" id="price" type="number"> <!-- Harga -->
                        <input value="baru" id="condition" type="text"> <!-- Baru/Bekas -->
                        <input value="{{ $product->productStock }}" id="stock" type="number"> <!-- Stok -->
                        <input value="{{ $product->minimumOrder }}" id="minimalOrder" type="number"> <!-- Minimal Order -->
                        <input value="{{ $product->productDescription }}" id="description" type="text"> <!-- Deskripsi -->
                    </div>
                    <!-- Backend Interface End-->

                </div>
            </div>


        </div>

    </div>
</x-app-layout>
