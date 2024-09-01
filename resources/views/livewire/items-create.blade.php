<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
        {{ __('Create New Item') }}
    </h2>

    <form method="POST" wire:submit="createItem">
        <div class="mb-4">
            <x-input-label for="key" :value="__('Key')" />
            <x-text-input id="key" class="block mt-1 w-full" type="text" wire:model="key" required autofocus tabindex="1" />
            <x-input-error :messages="$errors->get('key')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="value" :value="__('Value')" />
            <x-text-input id="value" class="block mt-1 w-full" type="text" wire:model="value" required tabindex="2" />
            <x-input-error :messages="$errors->get('value')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</div>
