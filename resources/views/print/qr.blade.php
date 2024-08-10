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
    <div class="grid grid-cols-10 grid-rows-5 border border-black m-2" style="width: 10cm; height: 5cm; page-break-inside: avoid;">
        <div class="row-span-3 col-span-3 border border-black flex justify-center">
            <img class="object-contain" src="{{asset('images/logobpn.png')}}" alt="">
        </div>
        <div class="col-span-4 row-span-3 border border-black flex justify-center  ">
            <img src="{{ asset($item->qr_path) }}" class="h-full p-2 " alt="">
        </div>
        <div class="row-span-3 col-span-3 col-start-8 border border-black justify-center">
            <img class="object-contain" src="{{asset('images/bpbd.png')}}" alt="">
        </div>
        <div class="grid grid-rows-2 place-items-center col-span-10 row-span-2 row-start-4 border border-black flex justify-center">
            <h5 class="block text-center uppercase font-sans text-md antialiased font-semibold leading-snug tracking-normal text-black">
                UPTD PBD WILAYAH TENGAH
    
            </h5>
            <h5 class="block text-center uppercase font-sans text-md antialiased font-semibold leading-snug tracking-normal text-black">
                bpbd kota balikpapan
            </h5>
        </div>
    </div>

            
        
        
    @endfor

    

    

    </div>



    {{-- @dd($quantity, $size); --}}
</body>
</html>
