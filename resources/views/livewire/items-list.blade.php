<div>
    <div class="flex justify-between items-center">
        <input wire:model="search" type="text" placeholder="Search..." class="block w-full max-w-xs p-2.5 my-2 ps-10  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <select wire:model="sortField" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 my-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 max-w-xs">
            <option value="name">Name</option>
            <option value="description">Description</option>
            <option value="stock">Stock</option>
        </select>
    </div> 

    <table class="w-full border border-grey dark:border-gray-700 text-sm text-left rtl:text-right text-gray-500 dark:text-white">
        <thead class="text-xs   text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                    <button wire:click="sortBy('name')">Name</button>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                    <button wire:click="sortBy('description')">Description</button>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                    <button wire:click="sortBy('stock')">Stock</button>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($items as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $item->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $item->description }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $item->stock }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <!-- Add your actions here (e.g., Edit, Delete) -->
                    </td>
                </tr>
            @endforeach
            
        </tbody>
    </table> 

    <div class="mt-4">
        {{ $items->links() }}
    </div>
</div>
