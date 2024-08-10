<div class="flex items-center justify-between flex-shrink-0 px-3">
    <!-- Logo -->
    <a
        href="{{ route('dashboard') }}"
        class="inline-flex items-center gap-2"
    >
        {{-- <x-application-logo aria-hidden="true" class="w-10 h-auto" /> --}}
        {{-- <div class="w-auto h-12 p-2 rounded-full bg-white">
            <img src="{{ asset('images/simentari.png') }}" alt="" style="height: 100%;">
        </div> --}}

        <div x-show="!isSidebarOpen " class="w-auto h-10 p-1 rounded-full bg-white  ">
            <img src="{{ asset('images/simentari-min.png') }}" alt="" style="height: 100%;">
        </div>
        <div x-show="isSidebarOpen" class="w-auto h-10 p-2 rounded-full bg-white  ">
            <img src="{{ asset('images/simentari.png') }}" alt="" style="height: 100%;">
        </div>

        <span class="sr-only">Dashboard</span>
    </a>

    <!-- Toggle button -->
    <x-button
        type="button"
        icon-only
        sr-text="Toggle sidebar"
        variant="secondary"
        x-show="isSidebarOpen || isSidebarHovered"
        x-on:click="isSidebarOpen = !isSidebarOpen"
    >
        <x-icons.menu-fold-right
            x-show="!isSidebarOpen"
            aria-hidden="true"
            class="hidden w-6 h-6 lg:block"
        />

        <x-icons.menu-fold-left
            x-show="isSidebarOpen"
            aria-hidden="true"
            class="hidden w-6 h-6 lg:block"
        />

        <x-heroicon-o-x
            aria-hidden="true"
            class="w-6 h-6 lg:hidden"
        />
    </x-button>
</div>
