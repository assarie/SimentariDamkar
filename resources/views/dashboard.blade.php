<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="p-6 mb-2 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        {{ __("Kamu berhasil Login!")  }}
    </div>
    <div class="relaive p-6 mb-2 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <h3 id="toggleDescription" class="capitalize text-xl font-semibold leading-tight text-center cursor-pointer flex items-center justify-center">
            sistem manajemen penataan inventaris dalam mengamankan alat - alat pemadam kebakaran
            <img id="arrowIcon" src="{{asset('images/arrow-down.gif')}}" alt="arrow" class="ml-2 w-5 h-5 transform transition-transform duration-300 opacity-35">
        </h3>
        <!-- Deskripsi yang bisa ditampilkan -->
    <div id="description" class="hidden mt-4 text-center">
      <p>
          Simentari Damkar adalah sistem baru yang dirancang untuk mengatasi masalah kurangnya pengelolaan inventaris alat pemadam kebakaran di UPTD PBD Wilayah Tengah. <span class="highlight">Sistem ini menggunakan teknologi QR code untuk melacak dan mencatat semua peralatan secara digital</span>, sehingga lebih akurat, efisien, dan mudah dikelola. Dengan Simentari Damkar, diharapkan dapat mengurangi kesalahan pencatatan, meningkatkan efektivitas kerja petugas, dan memastikan peralatan selalu siap digunakan saat dibutuhkan.
      </p>
      <style>
        .highlight{
          background-color: #B4D6CD;
          padding: 0 2px; /* Spasi di sekitar teks yang disorot */
        }
      </style>
  </div>
</div>

    <!-- JavaScript -->
<script>
  document.getElementById('toggleDescription').addEventListener('click', function() {
      var description = document.getElementById('description');
      var arrowIcon = document.getElementById('arrowIcon');

      if (description.classList.contains('hidden')) {
          description.classList.remove('hidden');
          arrowIcon.classList.add('rotate-180'); // Rotate icon to indicate expanded state
      } else {
          description.classList.add('hidden');
          arrowIcon.classList.remove('rotate-180'); // Rotate icon back to original state
      }
  });
</script>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-[#EB4B5A] dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
          <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#EA3323"><path d="M360-80q-33 0-56.5-23.5T280-160v-40h400v40q0 33-23.5 56.5T600-80H360Zm-80-160v-200h400v200H280Zm4-240q10-46 42-86.5t81-59.5q-10-8-18-17.5T375-664l-175-36v-40l175-36q15-29 42.5-46.5T480-840q21 0 40 7t34 19l126-26v240l-127-26q47 19 79.5 57.5T676-480H284Zm196-200q17 0 28.5-11.5T520-720q-1-18-12-29t-28-11q-17 0-28.5 11.5T440-720q0 17 11.5 28.5T480-680Z"/></svg>
            {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg> --}}
          </div>
          <div class="text-right">
            <p class="text-2xl">{{$items->count()}}</p>
            <p>Jenis Alat</p>
          </div>
        </div>
        <div class="bg-[#EB4B5A] dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
          <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#EA3323"><path d="M320-160q-33 0-56.5-23.5T240-240v-120h120v-90q-35-2-66.5-15.5T236-506v-44h-46L60-680q36-46 89-65t107-19q27 0 52.5 4t51.5 15v-55h480v520q0 50-35 85t-85 35H320Zm120-200h240v80q0 17 11.5 28.5T720-240q17 0 28.5-11.5T760-280v-440H440v24l240 240v56h-56L510-514l-8 8q-14 14-29.5 25T440-464v104ZM224-630h92v86q12 8 25 11t27 3q23 0 41.5-7t36.5-25l8-8-56-56q-29-29-65-43.5T256-684q-20 0-38 3t-36 9l42 42Zm376 350H320v40h286q-3-9-4.5-19t-1.5-21Zm-280 40v-40 40Z"/></svg>
            {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg> --}}
          </div>
          <div class="text-right">
            <p class="text-2xl">{{$items->sum('stock')}}</p>
            <p>Total Alat</p>
          </div>
        </div>
        <div class="bg-[#EB4B5A] dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
          <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#EA3323"><path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z"/></svg>
            {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> --}}
          </div>
          <div class="text-right">
            <p class="text-2xl">{{$transactions->where('transaction_type', 'masuk')->sum('quantity')}}</p>
            <p>Alat Masuk</p>
          </div>
        </div>
        <div class="bg-[#EB4B5A] dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
            <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#EA3323"><path d="M440-800v487L216-537l-56 57 320 320 320-320-56-57-224 224v-487h-80Z"/></svg>
                {{-- <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg> --}}
            </div>
            <div class="text-right">
              <p class="text-2xl">{{$transactions->where('transaction_type', 'keluar')->sum('quantity')}}</p>
              <p>Alat Keluar</p>
            </div>
        </div>
        {{-- <div class="bg-[#EB4B5A] dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
          <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
          </div>
          <div class="text-right">
            <p class="text-2xl">$75,257</p>
            <p>Balances</p>
          </div>
        </div> --}}
      </div>
</x-app-layout>
