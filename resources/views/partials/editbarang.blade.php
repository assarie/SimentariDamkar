<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Edit Barang') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        
    <form method="post" action="" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        
        <div class=" mb-6 ">
            <div class="mb-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                <input name="name" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ $items->name }}" value="{{ $items->name }}" required />
            </div>
            <div class="mb-2"> 
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Barang</label>
                <textarea name="desc"  id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""  required > {{ $items->description }} </textarea>
            </div>
            {{-- @dd($items->desc) --}}
            
            <div class="mb-2">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Default size</label>
                <input onchange="previewImage(event)" name="image" accept="image/*"  class="block w-full mb-5  text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" value="{{ $items->image }}" id="default_size" type="file">
            </div>

            <div class="flex flex-row flex-wrap">
                <div class="mb-2 ">
                
                    <img class=" max-w-xs hidden" class="image_preview"  id="imagePreview" src="{{ asset('storage/'.$items->image) }}" alt="image description">
                    <img class=" max-w-xs hidden" class="image_preview"  id="imagePreview" alt="image description">
    
                </div>
                <div id="qrcode" class="mb-2 "></div>
            </div>
            
            
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>


    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    @push('scripts')

    <script>
    

        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');
    
            if (input.files && input.files[0]) {
                const reader = new FileReader();
    
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                }
    
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    @endpush   
</x-app-layout>
