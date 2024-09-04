<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form wire:submit="updateListing" class="px-4 py-6">
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700 dark:text-white">{{ __('Listing Name') }}<span class="text-red-500">*</span></label>
                <input id="name" class="block mt-1 w-full border-gray-300 dark:border-gray-500 dark:bg-gray-500 dark:text-white rounded-md shadow-sm" type="text" wire:model="name" />
            </div>

            <div class="mt-4">
                <label for="description" class="block font-medium text-sm text-gray-700 dark:text-white">{{ __('Description') }}</label>
                <textarea id="description" class="block mt-1 w-full border-gray-300 dark:border-gray-500 dark:bg-gray-500 dark:text-white rounded-md shadow-sm" wire:model="description"></textarea>
            </div>

            <div class="block mt-4 w-full border border-gray-300 dark:border-gray-500 dark:bg-gray-500 dark:text-white rounded-md shadow-sm">
                <div class="border-gray-100 dark:border-gray-600 bg-gray-300 dark:bg-gray-600 dark:text-white px-4 py-3">
                    {{ __('Items') }}
                </div>

                <div class="min-w-full align-middle p-4">
                    @foreach($itemSelections as $index => $selection)
                        <div class="flex items-center space-x-2 mb-2">
                            <select wire:model="itemSelections.{{ $index }}.item_id" class="block w-full border-gray-300 dark:border-whitesmoke dark:bg-gray-300 dark:text-gray-700 rounded-md shadow-sm">
                                <option value="">Select an item</option>
                                @foreach($availableItems as $item)
                                    <option value="{{ $item->id }}">{{ $item->key }} - {{ $item->value }}</option>
                                @endforeach
                            </select>
                            <button type="button" wire:click="removeItemSelection({{ $index }})" class="px-3 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500">
                                Remove
                            </button>
                        </div>
                    @endforeach

                    <div class="flex items-center justify-end space-x-2 mb-2">
                        <button type="button" wire:click="addItemSelection" class="mt-4 px-4 py-2 text-white bg-emerald-500 hover:bg-emerald-700 dark:bg-emerald-600 dark:hover:bg-emerald-500 rounded-md font-semibold text-xs uppercase tracking-widest">
                            + Add Item
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex w-full items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Save Listing') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
