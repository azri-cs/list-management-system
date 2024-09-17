<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex items-center justify-between mb-4 px-6">
                <h2 class="text-3xl font-bold dark:text-white">{{__('Offline Items')}}</h2>
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

                    <tbody id="items-container" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-500 divide-solid">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <x-modal name="items-create" :show="false" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                {{ __('Create New Item') }}
            </h2>

            <form method="POST" onsubmit="createItem(event)">
                <div class="mb-4">
                    <x-input-label for="key" :value="__('Key')" />
                    <x-text-input id="key" class="block mt-1 w-full" type="text" required autofocus tabindex="1" />
                    <x-input-error :messages="$errors->get('key')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="value" :value="__('Value')" />
                    <x-text-input id="value" class="block mt-1 w-full" type="text" required tabindex="2" />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>

    <x-modal name="items-edit" :show="false" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                {{ __('Edit Item') }}
            </h2>

            <form method="POST" onsubmit="updateItem(event)">
                <input type="hidden" id="edit-id">
                <div class="mb-4">
                    <x-input-label for="edit-key" :value="__('Key')" />
                    <x-text-input id="edit-key" class="block mt-1 w-full" type="text" required autofocus tabindex="1" />
                    <x-input-error :messages="$errors->get('key')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="edit-value" :value="__('Value')" />
                    <x-text-input id="edit-value" class="block mt-1 w-full" type="text" required tabindex="2" />
                    <x-input-error :messages="$errors->get('value')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            renderItems();
        });

        function renderItems() {
            const items = localStorageService.getItems();
            const container = document.getElementById('items-container');
            container.innerHTML = items.map(item => `
        <tr class="bg-white dark:bg-gray-800">
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                ${item.key}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                ${item.value}
            </td>
            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                <div class="flex items-center justify-center space-x-2">
                    <button onclick="editItem(${item.id})" class="text-emerald-700 dark:text-emerald-500 hover:text-black dark:hover:text-white px-4 py-2 rounded-md">
                        <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 4H4C3.44772 4 3 4.44772 3 5V20C3 20.5523 3.44772 21 4 21H19C19.5523 21 20 20.5523 20 20V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.5 2.50001C19.3284 1.67158 20.6716 1.67158 21.5 2.50001C22.3284 3.32844 22.3284 4.67157 21.5 5.50001L12 15L8 16L9 12L18.5 2.50001Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button onclick="deleteItem(${item.id})" class="text-red-600 hover:text-red-900 px-4 py-2 rounded-md">
                        <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
        }


        function createItem(event) {
            event.preventDefault();
            const key = document.getElementById('key').value;
            const value = document.getElementById('value').value;
            localStorageService.addItem({key, value});
            renderItems();
            closeModal('items-create');
            event.target.reset();
        }

        function editItem(id) {
            const item = localStorageService.getItems().find(item => item.id === id);
            if (item) {
                document.getElementById('edit-id').value = item.id;
                document.getElementById('edit-key').value = item.key;
                document.getElementById('edit-value').value = item.value;
                openModal('items-edit');
            }
        }

        function updateItem(event) {
            event.preventDefault();
            const id = parseInt(document.getElementById('edit-id').value);
            const key = document.getElementById('edit-key').value;
            const value = document.getElementById('edit-value').value;
            localStorageService.updateItem({id, key, value});
            renderItems();
            closeModal('items-edit');
        }

        function deleteItem(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                localStorageService.deleteItem(id);
                renderItems();
            }
        }

        function openModal(modalName) {
            window.dispatchEvent(new CustomEvent('open-modal', { detail: modalName }));
        }

        function closeModal(modalName) {
            window.dispatchEvent(new CustomEvent('close-modal', { detail: modalName }));
        }
    </script>
</div>
