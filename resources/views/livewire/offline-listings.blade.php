<div>
    <div>
        <div class="py-12">
            <div id="listingTableDiv" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-between mb-4 px-6">
                    <h2 class="text-3xl font-bold dark:text-white">{{__('Offline Listings')}}</h2>
                    <x-primary-button type="button" class="ms-3" data-modal-target="createListingModal" data-modal-toggle="createListingModal">
                        {{ __('Create New') }}
                    </x-primary-button>
                </div>

                <div id="listingTableDivAlertContainer"></div>

                <div class="w-full px-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 border">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left">
                            <span
                                class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-100 uppercase tracking-wider">{{ __('Name') }}</span>
                            </th>
                            <th class="px-6 py-3 text-left">
                            <span
                                class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-100 uppercase tracking-wider">{{ __('Description') }}</span>
                            </th>
                            <th class="px-6 py-3 text-left">
                            </th>
                        </tr>
                        </thead>

                        <tbody id="listings-container"
                               class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-500 divide-solid">
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="editListingDiv" class="hidden max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full flex items-center justify-between mb-4 px-6">
                    <h2 class="text-3xl font-bold dark:text-white">{{__('Edit Offline Listing')}}</h2>
                    <div class="inline-block">&nbsp;</div>
                </div>

                <div id="editListingAlertContainer"></div>

                <!-- Edit Form -->
                <div id="editListingForm" class="max-w-4xl mx-auto mt-10">
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <h2 class="text-2xl font-bold mb-6 dark:text-white">Edit Listing</h2>
                        <form class="space-y-6" onsubmit="updateListing(event)">
                            <input type="hidden" id="edit-id">
                            <div>
                                <label for="edit-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="edit-name"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       required>
                            </div>
                            <div>
                                <label for="edit-description"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea name="description" id="edit-description" rows="3"
                                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                            </div>
                            <div>
                                <h4 class="mb-2 text-lg font-medium text-gray-900 dark:text-white">Items</h4>
                                <div id="listing-items" class="space-y-2"></div>
                                <button type="button" onclick="addItemDropdown()"
                                        class="mt-2 text-white bg-emerald-500 hover:bg-emerald-700 dark:bg-emerald-600 dark:hover:bg-emerald-500 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                    Add Item
                                </button>
                            </div>
                            <div class="flex justify-between">
                                <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Update Listing
                                </button>
                                <button type="button" onclick="goBackToListings()"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Go Back
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Listing Modal -->
        <div id="createListingModal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                            data-modal-toggle="createListingModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create New Listing</h3>
                        <form class="space-y-6" onsubmit="createListing(event)">
                            <div>
                                <label for="name"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       required>
                            </div>
                            
                            <div>
                                <label for="description"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea name="description" id="description" rows="3"
                                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"></textarea>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button class="ml-4">
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                renderListings();
            });

            function renderListings() {
                const listings = localStorageService.getListings();
                const container = document.getElementById('listings-container');
                container.innerHTML = listings.map(listing => `
                <tr class="bg-white dark:bg-gray-800">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                        ${listing.name}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                        ${listing.description}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex items-center justify-center space-x-2">
                            <button onclick="editListing(${listing.id})" class="text-emerald-700 dark:text-emerald-500 hover:text-black dark:hover:text-white px-4 py-2 rounded-md">
                                <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 4H4C3.44772 4 3 4.44772 3 5V20C3 20.5523 3.44772 21 4 21H19C19.5523 21 20 20.5523 20 20V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18.5 2.50001C19.3284 1.67158 20.6716 1.67158 21.5 2.50001C22.3284 3.32844 22.3284 4.67157 21.5 5.50001L12 15L8 16L9 12L18.5 2.50001Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button onclick="deleteListing(${listing.id})" class="text-red-500 dark:text-red-600 hover:text-black dark:hover:text-white px-4 py-2 rounded-md">
                                <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
            }

            function createListing(event) {
                event.preventDefault();
                const name = document.getElementById('name').value;
                const description = document.getElementById('description').value;
                localStorageService.addListing({name, description});
                renderListings();
                closeCreateListingModal();
                event.target.reset();
                showAlertListingTable('Listing created successfully', 'success');
            }

            let currentEditingListingId = null;

            function editListing(id) {
                const listing = localStorageService.getListings().find(listing => listing.id === id);
                if (listing) {
                    currentEditingListingId = listing.id;

                    document.getElementById('listingTableDiv').classList.add('hidden');

                    const editFormDiv = document.getElementById('editListingDiv');
                    editFormDiv.classList.remove('hidden');

                    document.getElementById('edit-id').value = listing.id;
                    document.getElementById('edit-name').value = listing.name;
                    document.getElementById('edit-description').value = listing.description;
                    renderListingItems(listing.items || []);
                }
            }

            function goBackToListings() {
                document.getElementById('editListingDiv').classList.add('hidden');
                document.getElementById('listingTableDiv').classList.remove('hidden');

                document.getElementById('edit-id').value = '';
                document.getElementById('edit-name').value = '';
                document.getElementById('edit-description').value = '';
                document.getElementById('listing-items').innerHTML = '';
            }

            function renderListingItems(items) {
                const container = document.getElementById('listing-items');
                container.innerHTML = items.map(item => `
        <div class="flex items-center justify-between bg-gray-100 dark:bg-gray-600 p-2 rounded">
            <span class="text-gray-800 dark:text-white">${item.key}: ${item.value}</span>
            <button onclick="removeItemFromListing(${item.id})" class="text-red-500 dark:text-red-600 hover:text-black dark:hover:text-white px-4 py-2 rounded-md">
                <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    `).join('');
            }

            function openAddItemModal() {
                const modal = document.getElementById('addItemModal');
                modal.classList.remove('hidden');
                populateItemSelect();
            }

            function closeAddItemModal() {
                const modal = document.getElementById('addItemModal');
                modal.classList.add('hidden');
            }

            function addItemDropdown() {
                const items = localStorageService.getItems();
                const dropdownHtml = `
        <div class="mt-2 relative item-select">
            <select id="itemSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                ${items.map(item => `<option value="${item.id}">${item.key}: ${item.value}</option>`).join('')}
            </select>
            <button onclick="addSelectedItemToListing()" class="mt-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Confirm Selected Item
            </button>
            <button onclick="removeItemDropdown(this)" class="mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                Delete Selected Item
            </button>
        </div>
    `;

                const listingItemsContainer = document.getElementById('listing-items');
                listingItemsContainer.insertAdjacentHTML('beforeend', dropdownHtml);
            }

            function removeItemDropdown(button) {
                const dropdownContainer = button.closest('.item-select');
                if (dropdownContainer) {
                    dropdownContainer.remove();
                }
            }

            function addSelectedItemToListing() {
                const select = document.getElementById('itemSelect');
                const selectedItemId = parseInt(select.value);
                const item = localStorageService.getItems().find(item => item.id === selectedItemId);

                if (item) {
                    const listing = localStorageService.getListings().find(listing => listing.id === currentEditingListingId);
                    if (listing) {
                        listing.items = listing.items || [];
                        if (!listing.items.some(i => i.id === item.id)) {
                            listing.items.push(item);
                            localStorageService.updateListing(listing);
                            renderListingItems(listing.items);
                            showAlertEditForm('Item added to listing successfully', 'success');

                            // Remove the dropdown after adding the item
                            const dropdownContainer = select.closest('.mt-2');
                            if (dropdownContainer) {
                                dropdownContainer.remove();
                            }
                        } else {
                            showAlertEditForm('Item already exists in the listing', 'error');
                        }
                    }
                }
            }

            function removeItemFromListing(itemId) {
                const listing = localStorageService.getListings().find(listing => listing.id === currentEditingListingId);
                if (listing) {
                    const itemIndex = listing.items.findIndex(item => item.id === itemId);
                    if (itemIndex !== -1) {
                        listing.items.splice(itemIndex, 1);
                        localStorageService.updateListing(listing);
                        renderListingItems(listing.items);
                        showAlertEditForm('Item removed from listing successfully', 'success');
                    } else {
                        showAlertEditForm('Item not found in the listing', 'error');
                    }
                } else {
                    showAlertEditForm('Listing not found', 'error');
                }
            }

            function updateListing(event) {
                event.preventDefault();
                const id = parseInt(document.getElementById('edit-id').value);
                const name = document.getElementById('edit-name').value;
                const description = document.getElementById('edit-description').value;
                const listing = localStorageService.getListings().find(l => l.id === id);
                if (listing) {
                    listing.name = name;
                    listing.description = description;
                    localStorageService.updateListing(listing);
                    renderListings();
                    goBackToListings(); // Use the new function to go back
                    showAlertListingTable('Listing updated successfully', 'success');
                }
            }

            function deleteListing(id) {
                if (confirm('Are you sure you want to delete this listing?')) {
                    localStorageService.deleteListing(id);
                    renderListings();
                    showAlertListingTable('Listing deleted successfully', 'success');
                }
            }

            function showAlertListingTable(message, type) {
                const alertContainer = document.getElementById('listingTableDivAlertContainer');
                const alertClass = type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700';
                const alertHtml = `
                <div class="${alertClass} border-l-4 p-4 mb-4" role="alert">
                    <p>${message}</p>
                </div>
            `;
                alertContainer.innerHTML = alertHtml;
                setTimeout(() => {
                    alertContainer.innerHTML = '';
                }, 3000);
            }

            function showAlertEditForm(message, type) {
                const alertContainer = document.getElementById('editListingAlertContainer');
                const alertClass = type === 'success' ? 'bg-green-100 border-green-400 text-green-700' : 'bg-red-100 border-red-400 text-red-700';
                const alertHtml = `
                <div class="${alertClass} border-l-4 p-4 mb-4" role="alert">
                    <p>${message}</p>
                </div>
            `;
                alertContainer.innerHTML = alertHtml;
                setTimeout(() => {
                    alertContainer.innerHTML = '';
                }, 3000);
            }
        </script>
    </div>
</div>
