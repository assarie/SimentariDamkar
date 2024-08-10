<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Tambah Barang') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        
    <form id="addItemForm" method="post" action="" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="qr_code_image" id="qrCodeImage" />
        <input type="hidden" name="qr_code_text" id="qrCodeText" />
        
        <div class=" mb-6 ">
            <div class="mb-2">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                <input name="name" type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Silahkan isi nama barang" required />
            </div>
            <div class="mb-2"> 
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Barang</label>
                <textarea name="desc"  id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Isi Keterangan barang" required > </textarea>
            </div>
            
            <div class="mb-2">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Gambar Barang</label>
                <input onchange="previewImage(event)" name="image" accept="image/*"  class="block w-full mb-5  text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
            </div>

            
            <div class="flex flex-row flex-wrap">
                <div class="mb-2 mr-4">
                
                    <img class=" max-w-xs hidden image_preview" id="imagePreview" alt="image description">
    
                </div>
                <div id="qrcode" class="mb-2 "></div>
            </div>
            
            
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

    </div>
    
    @push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        generateQRCode();
        });

        function generateQRCode() {
            const randomString = Math.random().toString(36).substring(2, 12); // Generates a random string

            // Check if randomString already exists in the database
            $.ajax({
                url: '/check-qr-code',
                type: 'POST',
                data: {
                    qr_code: randomString,
                    _token: '{{ csrf_token() }}' // Laravel CSRF token for security
                },
                success: function(response) {
                    if (response.exists) {
                        // If randomString already exists, generate a new one
                        generateQRCode();
                    } else {
                        document.getElementById('qrCodeText').value = randomString;

                        const qrCodeContainer = document.getElementById('qrcode');
                        qrCodeContainer.innerHTML = ''; // Clear previous QR code
                        new QRCode(qrCodeContainer, {
                            text: randomString,
                            width: 128,
                            height: 128,
                        });

                        // Convert QR code canvas to base64 data URL
                        setTimeout(() => {
                            const canvas = qrCodeContainer.querySelector('canvas');
                            const dataUrl = canvas.toDataURL('image/png');
                            document.getElementById('qrCodeImage').value = dataUrl;
                        }, 500); // Delay to ensure QR code is generated
                    }
                },
                error: function(error) {
                    console.error('Error checking QR code:', error);
                }
            });
        }

        // Call the function to generate the QR code when the page loads
        window.onload = generateQRCode;

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

        document.getElementById('addItemForm').addEventListener('submit', function(event) {
            const imageInput = document.querySelector('input[name="image"]');
            if (!imageInput.value) {
                alert('Harap Masukkan Gambar!');
                event.preventDefault();
            }
        });

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    @endpush   
</x-app-layout>
