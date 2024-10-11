<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form wire:submit.prevent="updateListing" class="px-4 py-6">
            <div>
                <x-input-label for="name" :value="__('Listing Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')"/>
                <x-text-input id="description" class="block mt-1 w-full" type="text" wire:model="description"/>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label for="tags" :value="__('Tags')"/>
                <x-text-input id="tag-search" class="block mt-1 w-full" type="text"
                              wire:model.debounce.300ms="searchTerm" placeholder="Search tags..."/>
                <div class="my-3 flex flex-wrap gap-2">
                    @foreach($this->tags->take(5) as $tag)
                        <button type="button"
                                wire:click="toggleTag({{ $tag->id }})"
                                class="px-3 py-1 rounded-full text-sm {{ in_array($tag->id, $selectedTags, true) ? 'text-white' : 'bg-gray-200 text-gray-700' }}"
                                style="{{ in_array($tag->id, $selectedTags, true) ? 'background-color: ' . $tag->color : '' }}"
                        >
                            {{ $tag->name }}
                        </button>
                    @endforeach
                </div>

                <x-input-error :messages="$errors->get('selectedTags')" class="mt-2"/>
            </div>

            <div class="mt-4">
                <x-input-label :value="__('Items')"/>
                <div class="mt-2">
                    @foreach($itemSelections as $index => $selection)
                        <div class="flex items-center space-x-2 mb-2">
                            <select wire:model="itemSelections.{{ $index }}.item_id"
                                    class="block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                <option value="">Select an item</option>
                                @foreach($availableItems as $item)
                                    <option value="{{ $item->id }}">{{ $item->key }} - {{ $item->value }}</option>
                                @endforeach
                            </select>
                            <x-danger-button type="button" wire:click="removeItemSelection({{ $index }})">
                                {{ __('Remove') }}
                            </x-danger-button>
                        </div>
                    @endforeach

                    <div class="flex items-center justify-end space-x-2 mb-2">
                        <x-secondary-button type="button" wire:click="addItemSelection">
                            {{ __('+ Add Item') }}
                        </x-secondary-button>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update Listing') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
