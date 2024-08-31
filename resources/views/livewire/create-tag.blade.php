<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
        {{ __('Create New Tag') }}
    </h2>

    <form method="POST" wire:submit="createTag">
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4" x-data="{ color: '#000000' }" x-init="$watch('color', value => $wire.color = value)">
            <x-input-label for="color" :value="__('Tag Color')" />
            <div class="flex items-center">
                <input
                    id="color"
                    type="color"
                    x-model="color"
                    class="h-10 w-10 rounded-md border-gray-300 mr-2"
                    @input="$wire.color = color"
                >
                <x-text-input
                    type="text"
                    x-model="color"
                    class="block w-full"
                    required
                    @input="$wire.color = color"
                />
            </div>
            <x-input-error :messages="$errors->get('color')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</div>
