<main class="flex flex-col items-center flex-1 px-4 pt-6 sm:justify-center">
    <div>
        <a href="/">
            <div class="w-auto h-22 p-4 rounded-full bg-gray-100">
                <img src="{{ asset('images/simentari.png') }}" alt="" style="height: 100%;">
            </div>
        </a>
    </div>

    <div class="p-2 mb-4 overflow-hidden w-full">
        <h3 class="capitalize text-xl font-semibold leading-tight text-center">
            sistem manajemen penataan inventaris dalam mengamankan alat - alat pemadam kebakaran

        </h3>
    </div>

    <div class="w-full px-6 py-4 mb-6  overflow-hidden bg-white rounded-md shadow-md sm:max-w-md dark:bg-dark-eval-1">
        {{ $slot }}
    </div>
</main>