<!-- In resources/views/print/qr.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Print QR Code</title>
    <style>
        /* Add any necessary print styles here */
    </style>
</head>
<body onload="window.print()">
    {{-- onload="window.print()" --}}

    <div class="flex flex-row flex-wrap">
   
    
    @for ($i = 0; $i < $infos['quantity']; $i++)
    
    <div class="grid grid-rows-3 border border-black m-2" style="width: 12cm; height: 7cm; page-break-inside: avoid;">
    {{-- Baris Logo --}}
    <div class="flex flex-col items-center border-b border-black px-4 py-2">
    <div class="flex justify-between items-center w-full">
        <img class="object-contain h-14 mx-1" src="{{asset('images/BPSDM.png')}}" alt="">
        <img class="object-contain h-14 mx-1" src="{{asset('images/logoBpn.png')}}" alt="">
        <img class="object-contain h-14 mx-1" src="{{asset('images/bpbd.png')}}" alt="">
        <img class="object-contain h-14 mx-1" src="{{asset('images/simentari.png')}}" alt="">
    </div>
    <p class="text-center mt-0 text-blue-500 underline">
        https://simentarii-damkarr2.site/
    </p>
    </div>
        <div class="flex justify-center items-center border-b border-black py-12">
            <img src="{{ asset($item->qr_path) }}" class="h-24 p-2" alt="">
        </div>
        <!-- Teks di bagian bawah -->
    <div class="flex flex-col items-center justify-center py-12">
        <h5 class="block text-center uppercase font-sans text-md antialiased font-semibold leading-snug tracking-normal text-black">
            UPTD PBD WILAYAH TENGAH
        </h5>
        <h5 class="block text-center uppercase font-sans text-md antialiased font-semibold leading-snug tracking-normal text-black">
            BPBD KOTA BALIKPAPAN
        </h5>
        <h5 class="block text-center uppercase font-sans text-md antialiased font-semibold leading-snug tracking-normal text-black">
            PKP-XXI TAHUN 2024
        </h5>
    </div>
</div>
    
    @endfor
    {{-- @dd($quantity, $size); --}}
</body>
</html>
