<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex items-center justify-between mb-4 px-6">
                <h2 class="text-3xl font-bold dark:text-white">{{__('Items')}}</h2>
                <x-primary-button type="button" class="ms-3" x-data="" x-on:click="$dispatch('open-modal', 'items-create')">
                    {{ __('Create New') }}
                </x-primary-button>
            </div>

            <div class="w-full px-6 mb-4">
                <div class="flex flex-wrap gap-4 items-center">
                    <div class="flex-1 min-w-[200px]">
                        <input
                            wire:model.live.debounce.300ms="search"
                            type="text"
                            placeholder="Search items..."
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        >
                    </div>
                    <div class="flex gap-2">
                        <select wire:model.live="perPage" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="10">10 per page</option>
                            <option value="20">20 per page</option>
                            <option value="50">50 per page</option>
                            <option value="-1">All</option>
                        </select>
                        @if($search)
                            <button
                                wire:click="clearFilters"
                                class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-700"
                            >
                                Clear Filters
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-full px-6">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-100 uppercase tracking-wider">{{ __('Key') }}</span>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-100 uppercase tracking-wider">{{ __('Value') }}</span>
                        </th>
                        <th class="px-6 py-3 text-left">
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-500 divide-solid">
                    @forelse($items as $item)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                                {{ $item->key }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                                {{ $item->value }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                                <!-- Mobile view: Ellipsis button -->
                                <div x-data="{ open: false }" class="sm:hidden">
                                    <button @click="open = !open" class="text-gray-400 hover:text-gray-500">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>

                                    <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none">
                                        <div class="py-1" role="none">
                                            <a x-on:click="$dispatch('open-modal', 'items-edit-{{ $item->id }}')" href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                Edit
                                            </a>
                                            <a wire:click="deleteItem({{ $item->id }})" wire:confirm="Are you sure you want to delete this item?" href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Desktop view: Action buttons -->
                                <div class="hidden sm:flex items-center space-x-2">
                                    <a x-on:click="$dispatch('open-modal', 'items-edit-{{ $item->id }}')" href="#" class="text-emerald-700 dark:text-emerald-500 hover:text-black dark:hover:text-white px-4 py-2 rounded-md">
                                        <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 4H4C3.44772 4 3 4.44772 3 5V20C3 20.5523 3.44772 21 4 21H19C19.5523 21 20 20.5523 20 20V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.5 2.50001C19.3284 1.67158 20.6716 1.67158 21.5 2.50001C22.3284 3.32844 22.3284 4.67157 21.5 5.50001L12 15L8 16L9 12L18.5 2.50001Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <a wire:click="deleteItem({{ $item->id }})" wire:confirm="Are you sure you want to delete this item?" href="#" class="text-red-500 hover:text-black dark:hover:text-white px-4 py-2 rounded-md">
                                        <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <x-modal name="items-edit-{{ $item->id }}" :show="false" focusable>
                            <livewire:items-edit :item="$item" :wire:key="'items-edit-' . $item->id" />
                        </x-modal>
                    @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white" colspan="3">
                                {{ __('No items were found.') }}
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                @if($perPage !== -1)
                    <div class="mt-3">
                        {{ $items->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-modal name="items-create" :show="false" focusable>
        <livewire:items-create />
    </x-modal>
</div>
