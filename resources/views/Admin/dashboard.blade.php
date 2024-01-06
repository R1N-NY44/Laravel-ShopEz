<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="xl:w-[1280px] mx-auto sm:px-6 xl:px-8 grid grid-cols-1 xl:flex xl:justify-between gap-16 ">

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex gap-4">
                            <div class="w-[620px]">
                                <input name="productName" value="{{ old('productName') }}" class="my-2 w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="text" placeholder="Product Name" required>
                                <input name="productPrice" value="{{ old('productPrice') }}" class="my-2 w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="number" placeholder="Price" required>
                                <div class="flex">
                                    <input name="productStock" value="{{ old('productStock') }}" class="my-2 w-[50%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="number" placeholder="Stock" required>
                                    <input name="minimumOrder" value="{{ old('minimumOrder') }}" class="my-2 w-[50%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="number" placeholder="Minim Order" required>
                                </div>
                                <textarea name="productDescription" class="my-2 w-[100%] h-[150px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="text" placeholder="Description" required>{{ old('productDescription') }}</textarea>
                                @error('productDescription')
                                    <span class="flex items-center font-medium tracking-wide text-red-500 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <div class="flex items-center">
                                    <label for="condition">Condition : &nbsp;</label>
                                    <input type="radio" name="productCondition" value="baru" id="condition-New" @if (old('productCondition') == 'baru') ? checked @endif>
                                    <label for="condition-New" class="ml-1">New</label>
                                    <input type="radio" name="productCondition" value="bekas" id="condition-Second" class="ml-4" @if (old('productCondition') == 'bekas') ? checked @endif>
                                    <label for="condition-Second" class="ml-1">Second</label>
                                </div>
                                @error('productCondition')
                                    <span class="flex items-center font-medium tracking-wide text-red-500 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label for="product_image">Product Image:</label>
                                <input type="file" name="productIcon" id="product_image" accept="image/*" class="w-full" onchange="previewImage()">
                                @error('productIcon')
                                    <span class="flex items-center font-medium tracking-wide text-red-500 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <div id="image-preview" class="hidden">
                                    <h2 class="font-bold mt-4">Preview Logo:</h2>
                                    <img id="preview" src="" alt="Preview" class="mx-2 max-w-xs">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="mt-8 text-[#E1B168] px-7 py-3 flex items-center border-2 border-[#E1B168]">Add Product</button>
                    </form>
                </div>

            </div>

            <div class="bg-white xl:w-[700px] overflow-y-auto shadow-lg hidden-scrol sm:rounded-lg">
                <table class="border-collapse table-auto w-full text-sm  relative">
                    <thead class="sticky top-0 bg-slate-950/70 backdrop-blur-sm">
                    <tr>
                        <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-slate-400 text-left">Foto Produk</th>
                        <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-slate-400 text-left">Nama Produk</th>
                        <th class="border-b font-medium p-4 pr-8 pt-3 pb-3 text-slate-400 text-left">Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white">
                    @if (count($data_produk) == 0)
                        <tr>
                            <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">-</td>
                            <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">Tidak ada data</td>
                            <td class="border-b border-slate-100 p-4 pr-8 text-slate-500 flex flex-col">
                                <a class="py-1 text-center font-semibold text-sm bg-green-400 text-white rounded-full shadow-sm mb-2">View</a>
                                <a class="py-1 text-center font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm mb-2">Edit</a>
                                <a class="py-1 text-center font-semibold text-sm bg-red-400 text-white rounded-full shadow-sm mb-2">Delete</a>
                            </td>
                        </tr>

                    @else
                        @foreach ($data_produk as $data)
                        <tr>
                            <td class="border-b border-slate-100 p-4 pl-8 text-slate-500"><img class="h-24 rounded-lg" src="{{ asset('storage/' .$data->productIcon) }}" alt=""></td>
                            <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ $data->productName }}</td>
                            <td class="border-b border-slate-100 p-4 pr-8 text-slate-500 flex flex-col">
                                <a href="{{ route('product.show', $data->id) }}" class="py-1 text-center font-semibold text-sm bg-green-400 text-white rounded-full shadow-sm mb-2">View</a>
                                <a href="{{ route('product.edit', $data->id) }}" class="py-1 text-center font-semibold text-sm bg-cyan-500 text-white rounded-full shadow-sm mb-2">Edit</a>
                                <form action="{{ route("product.destroy", $data) }}" method="POST" class="delete-form w-full">
                                    @csrf
                                    @method("DELETE")
                                    <button value="{{ $data->productName }}" class="w-full delete-button py-1 text-center font-semibold text-sm bg-red-400 text-white rounded-full shadow-sm mb-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    @endif


                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script>
        function previewImage() {
            var input = document.getElementById('product_image');
            var preview = document.getElementById('preview');
            var imagePreview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
                imagePreview.classList.remove('hidden');
            } else {
                imagePreview.classList.add('hidden');
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error2'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'error',
                title: '{{ session('error2') }}'
            })
        </script>
    @endif
    @if (session('success'))
        <script>
            const ToastSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            ToastSuccess.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif
    <script>
        // Ambil semua tombol hapus
        const deleteButtons = document.querySelectorAll('.delete-button');

        // Tambahkan event listener ke setiap tombol hapus
        deleteButtons.forEach(function(button) {
            const nama_produk = button.value;
            button.addEventListener('click', function(e) {
                // Tampilkan konfirmasi SweetAlert
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: `Apakah Anda yakin ingin menghapus produk ${nama_produk}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                }).then((result) => {
                    // Jika pengguna menekan "Ya", submit form
                    if (result.isConfirmed) {
                        const form = button.closest('.delete-form');
                        form.submit();
                    }
                });
            });
        });
    </script>
</x-app-layout>
