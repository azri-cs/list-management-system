<form wire:submit="save">
    <div>
        <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Listing Name') }}<span class="text-red-500">*</span></label>
        <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" wire:model="name" />
    </div>

    <div class="mt-4">
        <label for="description" class="block font-medium text-sm text-gray-700">{{ __('Description') }}</label>
        <textarea id="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" wire:model="description" />
    </div>

    <div class="block mt-4 w-full border border-gray-300 rounded-md shadow-sm">
        <div class="bg-gray-100 px-4 py-3">
            {{ __('Items') }}
        </div>

        <div class="min-w-full align-middle p-4">
            <table class="min-w-full divide-y divide-gray-200 border">
                <thead>
                <tr>
                    <th class="px-6 py-2 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Key') }}</span>
                    </th>
                    <th class="px-6 py-2 bg-gray-50 text-left">
                        <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __('Value') }}</span>
                    </th>
                    <th class="px-6 py-2 bg-gray-50 text-left">
                    </th>
                </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                @foreach($listingItems as $index => $listingItem)
                    <tr>
                        <td class="px-2 py-2">
                            <select wire:model="listingItems.{{ $index }}.listing_id" id="listingItems[{{ $index }}][listing_id]" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                <option value="0">-- choose item --</option>
                                @foreach($allListingItems as $item)
                                    <option value="{{ $item->id }}">{{ $item->key }} : {{ $item->value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-2 py-2">
                            <input wire:model="listingItems.{{ $index }}.value" id="listingItems[{{ $index }}][value]" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" />
                        </td>
                        <td class="px-2 py-2">
                            <button type="button" class="px-3 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="button" class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                + Add Another Product
            </button>
        </div>

    </div>

    <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
        Save Product
    </button>
</form>
