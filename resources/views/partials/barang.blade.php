<x-app-layout>
    @push('css')
        {{-- <link href="https://cdn.tailwindcss.com/" rel="stylesheet"> --}}
        <link href="https://cdn.datatables.net/2.1.2/css/dataTables.tailwindcss.css" rel="stylesheet">
        {{-- <link href="{{ asset('src/assets/extra-libs/datatables.net-bs4/css/responsive.bootstrap.min.css') }}" rel="stylesheet"> --}}
        <style>
            /* Ensure the text color of table headers is preserved in dark mode */
            
            .dark .dt-column-title {
                color: #fff;
            }

            /* .dt-lenght {
                position: absolute;
                display: inline-block;
            } */
             .dt-search {
                 text-align: end;
             }

            .pagination {
                 text-align: center;
                 
             }

            .dark .pagination a {
                 color: black;
                 text-align: center;
             }

             
        </style>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List Barang') }}
        </h2>

        
        
    </x-slot>

    <div class="flex flex-row-reverse">
        <a href="{{route('barang.create')}}"><button  type="button" hr class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Tambah Barang</button></a>

    </div>
    

    <div class="overflow-x-auto relative">
        <table id="table" class="overflow-x-auto">
            <thead class="text-xs   text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-white">
                <tr>
                    <th scope="col" class=" text-center text-xs font-medium  uppercase tracking-wider">No.</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Gambar
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Qr Code
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="text-center whitespace-nowrap">
                            {{ $loop->iteration }}
    
                        </td>
                        <td class="px-6 py-4 text-wrap">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4  ">
                            <img class="max-w-10" src="{{ $item->image }}"  alt="">
                        </td>
                        <td class="px-6 py-4  ">
                            <img class="max-w-20" src="{{ $item->qr_path }}"  alt="">
                        </td>
                        <td class="px-6 py-4 text-wrap">
                            {{ $item->description }}
                        </td>
                       
                        <td class="px-6 py-4 ">
                            {{ $item->stock }}
                        </td>
                        <td class="px-6 py-4  flex flex-row justify-between">
                            <!-- Add your actions here (e.g., Edit, Delete) -->
                            <a href="{{route('barang.edit', $item->id)}}">
                                <button class="px-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    <span class="material-symbols-outlined">
                                        edit
                                    </span>
                                </button>
                            </a>
                            
                                <button  class="px-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="open-modal-{{ $item->id }}" onclick="document.getElementById('popup-modal-{{ $item->id }}')">
                                    <span class="material-symbols-outlined">
                                        delete
                                    </span>
                                </button>
                                <div id="popup-modal-{{$item->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-{{$item->id}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                                                <form action="{{route('barang.destroy', $item->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="popup-modal-{{$item->id}}"  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button id="close-modal" data-modal-hide="popup-modal-{{$item->id}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            
                                <button id="open-print-modal-{{$item->id}}" class="px-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <span class="material-symbols-outlined">
                                        print
                                    </span>
                                </button>
                                                                
                                
                                
                                <div id="print-modal-{{$item->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="print-modal-{{$item->id}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                
                                                    <form action="{{ route('barang.printqr', ['id' => $item->id, 'size' => ':size', 'quantity' => ':quantity']) }}" method="post" target="_blank">
                                                        @csrf
                                                        <div class="grid grid-cols-2 gap-2">

                                                            
                                                            <div class="mb-5 text-left col-span-2">
                                                                <label for="quantity-input-{{$item->id}}" class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                                                                <input type="number" min="1" value="1" id="quantity-input-{{$item->id}}" name="quantity" class="bg-gray-50  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            </div>

                  
                                                            <h3 class="mb-5 col-span-2 text-lg font-normal text-gray-500 dark:text-gray-400">Print QR Code?</h3>
                                                            
                                                            <div class="mb-5 col-span-2">
                                                                <img src="{{ asset($item->qr_path) }}" alt="QR Code" class="mx-auto">
                                                            </div>

                                                            <div class="">
                                                                <button data-modal-hide="print-modal-{{$item->id}}" type="submit" class="w-fit justify-center text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                    Yes, print it
                                                                </button>
                                                            </div>

                                                            <div>
                                                                <button id="close-print-modal-{{$item->id}}" data-modal-hide="print-modal-{{$item->id}}" type="button" class="w-fit  py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>

                                                            </div>
                                                            
                                                        </div>
                                                    </form>

                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                
                                
                           
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table> 
    </div>

    
    

    @push('scripts')

    <script>
        
        document.addEventListener('DOMContentLoaded', (event) => {
        const openModalButtons = document.querySelectorAll('[id^="open-modal-"]');
        const openPrintModalButtons = document.querySelectorAll('[id^="open-print-modal-"]');
        const closeModalButtons = document.querySelectorAll('[data-modal-hide^="popup-modal-"], [data-modal-hide^="print-modal-"]');

        openModalButtons.forEach(button => {
            const itemId = button.id.replace('open-modal-', '');
            button.addEventListener('click', () => {
                const modal = document.getElementById('popup-modal-' + itemId);
                modal.classList.remove('hidden');
            });
        });

        openPrintModalButtons.forEach(button => {
            const itemId = button.id.replace('open-print-modal-', '');
            button.addEventListener('click', () => {
                const modal = document.getElementById('print-modal-' + itemId);
                modal.classList.remove('hidden');
            });
        });

        closeModalButtons.forEach(button => {
            const modalHideAttr = button.getAttribute('data-modal-hide');
            button.addEventListener('click', () => {
                const modal = document.getElementById(modalHideAttr);
                modal.classList.add('hidden');
            });
        });

        // Optional: close modal when clicking outside the modal content
        window.addEventListener('click', (event) => {
            openModalButtons.forEach(button => {
                const itemId = button.id.replace('open-modal-', '');
                const modal = document.getElementById('popup-modal-' + itemId);
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
            openPrintModalButtons.forEach(button => {
                const itemId = button.id.replace('open-print-modal-', '');
                const modal = document.getElementById('print-modal-' + itemId);
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });

        
    });
    </script>



    

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script src="https://cdn.tailwindcss.com/"></script> --}}
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.tailwindcss.js"></script>
<script>
    new DataTable('#table', {
    layout: {
        
        bottomStart: null,
        bottomEnd: null,
        bottom: 'paging'
    }
});

</script>       
        
    @endpush    

</x-app-layout>


