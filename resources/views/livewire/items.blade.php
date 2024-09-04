<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex items-center justify-between mb-4 px-6">
                <h2 class="text-3xl font-bold dark:text-white">{{__('Items')}}</h2>
                <x-primary-button type="button" class="ms-3" x-data="" x-on:click="$dispatch('open-modal', 'items-create')">
                    {{ __('Create New') }}
                </x-primary-button>
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
                                <div x-data="{ open: false }" class="relative">
                                    <!-- Ellipsis button for mobile -->
                                    <button @click="open = !open" class="md:hidden">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>

                                    <!-- Action buttons -->
                                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10 md:relative md:flex md:mt-0 md:w-auto md:shadow-none">
                                        <a x-on:click="$dispatch('open-modal', 'items-edit-{{ $item->id }}')" href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Edit
                                        </a>
                                        <a wire:click="deleteItem({{ $item->id }})" wire:confirm="Are you sure you want to delete this item?" href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                            Delete
                                        </a>
                                    </div>
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
                <div class="mt-3">
                    {!! $items->links() !!}
                </div>
            </div>
        </div>
    </div>

    <x-modal name="items-create" :show="false" focusable>
        <livewire:items-create />
    </x-modal>
</div>
