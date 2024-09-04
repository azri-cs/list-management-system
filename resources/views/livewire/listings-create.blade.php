<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
        {{ __('Create New Listing') }}
    </h2>

    <form method="POST" wire:submit="createList">
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus tabindex="1" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" wire:model="description" required tabindex="2" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="flex w-full items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</div>
