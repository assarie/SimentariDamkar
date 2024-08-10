<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Barang"
        href="{{ route('barang') }}"
        :isActive="request()->routeIs('barang')"
    >
        <x-slot name="icon">
            <x-icons.inventory class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown
        title="Transaksi"
        :active="Str::startsWith(request()->route()->uri(), 'transaksi')"
    >
        <x-slot name="icon">
            <x-icons.receipt class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
            
        </x-slot>

        <x-sidebar.sublink
        title="Alat Masuk"
        href="{{ route('transaksi.in') }}"
        :active="request()->routeIs('transaksi.in')"
        />
        <x-sidebar.sublink
            title="Alat Keluar"
            href="{{ route('transaksi.out') }}"
            :active="request()->routeIs('transaksi.out')"
        />
        {{-- <x-sidebar.sublink
            title="Text with icon"
            href="{{ route('buttons.text-icon') }}"
            :active="request()->routeIs('buttons.text-icon')"
        /> --}}
        
    </x-sidebar.dropdown>

    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="text-sm text-gray-500"
    >
        {{-- Dummy Links --}}
    </div>

    @php
        $links = array_fill(0, 20, '');
    @endphp

    {{-- @foreach ($links as $index => $link)
        <x-sidebar.link title="Dummy link {{ $index + 1 }}" href="#" />
    @endforeach --}}

</x-perfect-scrollbar>
