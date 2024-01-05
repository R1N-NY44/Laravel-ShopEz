<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-[1780px] mx-auto sm:px-6 lg:px-8 flex gap-16">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="flex gap-4">
                            <div class="w-[620px]">
                                <input name="productName" value="{{ $product->productName }}" class="my-2 w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="text" placeholder="Product Name" required>
                                <input name="productPrice" value="{{ $product->productPrice }}" class="my-2 w-[100%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="number" placeholder="Price" required>
                                <div class="flex">
                                    <input name="productStock" value="{{ $product->productStock }}" class="my-2 w-[50%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="number" placeholder="Stock" required>
                                    <input name="minimumOrder" value="{{ $product->minimumOrder }}" class="my-2 w-[50%] h-[50px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="number" placeholder="Minim Order" required>
                                </div>
                                <textarea name="productDescription" class="my-2 w-[100%] h-[150px] border border-[#292E3] bg-[#fff] placeholder-[#555555] pl-2" type="text" placeholder="Description" required>{{ $product->productDescription }}</textarea>
                                @error('productDescription')
                                    <span class="flex items-center font-medium tracking-wide text-red-500 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <div class="flex items-center">
                                    <label for="condition">Condition : &nbsp;</label>
                                    <input type="radio" name="productCondition" value="baru" id="condition-New" @if ($product->productCondition == 'baru') ? checked @endif>
                                    <label for="condition-New" class="ml-1">New</label>
                                    <input type="radio" name="productCondition" value="bekas" id="condition-Second" class="ml-4" @if ($product->productCondition == 'bekas') ? checked @endif>
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
                                <input type="hidden" name="old_image" value="{{ $product->productIcon }}">
                                @error('productIcon')
                                    <span class="flex items-center font-medium tracking-wide text-red-500 ml-1">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <div id="image-preview" class="">
                                    <h2 class="font-bold mt-4">Preview Logo:</h2>
                                    <img id="preview" src="{{ asset('storage/'. $product->productIcon) }}" alt="Preview" class="mx-2 max-w-xs">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="mt-8 text-[#E1B168] px-7 py-3 flex items-center border-2 border-[#E1B168]">Update Product</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
    <script>
        function previewImage() {
            var input = document.getElementById('product_image');
            var preview = document.getElementById('preview');
            var imagePreview = document.getElementById('image-preview');

            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
            
        }
    </script>
    
</x-app-layout>
