<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
        {{ __('Edit Tag') }}
    </h2>

    <form wire:submit.prevent="updateTag">
        <div class="mb-4">
            <x-input-label for="name" :value="__('Tag Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4" x-data="{ color: @entangle('color') }">
            <x-input-label for="color" :value="__('Tag Color')" />
            <div class="flex items-center">
                <x-text-input
                    x-model="color"
                    id="color-picker-{{ $tag->id }}"
                    class="h-10 w-10 rounded-md border-gray-300 mr-2"
                    type="color"
                    name="color-picker"
                    required />
                <x-text-input
                    x-model="color"
                    id="color-text-{{ $tag->id }}"
                    class="block w-full"
                    type="text"
                    name="color-text"
                />
            </div>
            <x-input-error :messages="$errors->get('color')" class="mt-2" />
        </div>

        <div class="flex justify-between">
            <x-primary-button type="submit">
                {{ __('Update') }}
            </x-primary-button>

            <x-danger-button type="button" x-data="" x-on:click="$dispatch('open-modal', 'delete-tag-{{ $tag->id }}')">
                {{ __('Delete') }}
            </x-danger-button>
        </div>
    </form>

    <x-modal name="delete-tag-{{ $tag->id }}" :show="false" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete this tag?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('This action cannot be undone.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close-modal', 'delete-tag-{{ $tag->id }}')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3" wire:click="deleteTag">
                    {{ __('Delete Tag') }}
                </x-danger-button>
            </div>
        </div>
    </x-modal>
</div>
