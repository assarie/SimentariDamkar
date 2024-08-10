<x-app-layout>
    @push('css')
        <style>
            #html5-qrcode-select-camera {
                color: black;
            }
        </style>
    @endpush
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Scan Barang Masuk') }}
            </h2>
            
        </div>
    </x-slot>
    <audio hidden src="{{ asset('sound/beep.mp3') }}" id="beep"></audio>
    

    <div class="grid  lg:grid-cols-2 sm:grid-cols-2  justify-center ">
        

        <!-- card 1 -->
        <div class="p-4 max-w-full">
            <div class="flex rounded-lg h-full dark:bg-gray-800 bg-[#EB4B5A] p-8 flex-col ">
                <div class="flex items-center mb-3">
                    
                    <div id="reader" class="w-full text-white">

                    </div>
                </div>
                
            </div>
        </div>

        
    
        <!-- card 2 -->
        <div class="p-4 max-w-full">
            <div class="flex rounded-lg h-full dark:bg-gray-800 bg-[#EB4B5A] p-8 flex-col">
                
                <form class="w-full mx-auto" action="{{ route('scan.in.store') }}" method="POST">
                @csrf
                @method('POST')    
                    <label for="item_name" class="block mb-2 text-sm font-medium text-white dark:text-white">Select an option</label>
                    <select id="item_name" name="item_id" class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Pilih Barang</option>
                        @foreach ($item as $item)

                        <option class="py-2" value="{{ $item->qr_code }}" data-desc="{{ $item->description }}">{{ $item->name }} - {{ $item->qr_code }}</option>

                        @endforeach
                    </select>
                    <div class="mb-2"> 
                        <label for="description" class="block mb-2 text-sm font-medium text-white dark:text-white">Deskripsi Barang</label>
                        <textarea name="desc"  id="description" disabled class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" > </textarea>
                    </div>
                    <div class="mb-2">
                        <label  class="block  mb-2 text-sm font-medium text-white dark:text-white">Jumlah</label>
                        <input type="number" min="1" value="1" id="quantity" name="quantity" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>

                    </div>
                </form>

            </div>
        </div>
    
        
    
    </div>

    @push('scripts')
    
    <script>
        document.getElementById('item_name').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var description = selectedOption.getAttribute('data-desc');
            document.getElementById('description').value = description || ''; // Set the textarea value
        });

        
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // Handle the successful scan
            console.log(`Scan result: ${decodedText}`, decodedResult);

            // Select the option that matches the decoded result
            const selectElement = document.getElementById('item_name');
            const options = selectElement.options;

            for (let i = 0; i < options.length; i++) {
                if (options[i].value === decodedText) {
                    selectElement.selectedIndex = i;
                    // Trigger the change event if needed
                    const event = new Event('change');
                    selectElement.dispatchEvent(event);

                    // Play the beep audio
                    const audio = document.getElementById('beep');
                    audio.play();

                    
                    
                    break;
                }
            }
        }
        

        // Initialize the QR code scanner
        const html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10 });
        html5QrcodeScanner.render(onScanSuccess);
    </script>
    {{-- <script src="https://unpkg.com/html5-qrcode" type="text/javascript"> </script> --}}

    @endpush
    
    
</x-app-layout>
