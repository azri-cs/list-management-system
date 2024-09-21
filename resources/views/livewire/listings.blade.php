<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @session('error')
            <x-alert type="danger" :message="session('error')" />
            @endsession
            @session('success')
            <x-alert type="success" :message="session('success')" />
            @endsession

            <div class="w-full flex items-center justify-between mb-4 px-6">
                <h2 class="text-3xl font-bold dark:text-white">{{__('Listings')}}</h2>
                <x-primary-button type="button" class="ms-3" x-data="" x-on:click="$dispatch('open-modal', 'listings-create')">
                    {{ __('Create New') }}
                </x-primary-button>
            </div>

            <div class="w-full px-6 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-100 uppercase tracking-wider">{{ __('Name') }}</span>
                        </th>
                        <th class="px-6 py-3 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500 dark:text-gray-100 uppercase tracking-wider">{{ __('Description') }}</span>
                        </th>
                        <th class="px-6 py-3 text-left">
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-500 divide-solid">
                    @forelse($listings as $listing)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                                {{ Str::limit($listing->name, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900 dark:text-white">
                                {{ Str::limit($listing->description, 50) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center justify-end">
                                    <!-- Mobile view: Ellipsis button -->
                                    <div x-data="{ open: false, copied: false }" class="sm:hidden">
                                        <button @click="open = !open" class="text-gray-400 hover:text-gray-500">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none">
                                            <div class="py-1" role="none">
                                                <a href="{{ route('listings.edit', $listing) }}" class="text-gray-700 block px-4 py-2 text-sm">Edit</a>
                                                <a wire:click="deleteListing({{ $listing->id }})" wire:confirm="Are you sure you want to delete this listing?" href="#" class="text-red-700 dark:text-red-500 block px-4 py-2 text-sm">Delete</a>
                                                <a wire:click="copyListing({{ $listing->id }})" @click="copied = true; setTimeout(() => copied = false, 2000)" href="#" class="text-gray-700 block px-4 py-2 text-sm relative">
                                                    <span x-show="!copied">Copy</span>
                                                    <span x-show="copied" class="text-green-500 dark:text-green-700">Copied</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Desktop view: Action buttons -->
                                    <div class="hidden sm:flex items-center space-x-2">
                                        <a href="{{ route('listings.edit', $listing) }}" class="text-emerald-700 dark:text-emerald-500 hover:text-black dark:hover:text-white px-4 py-2 rounded-md">
                                            <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 4H4C3.44772 4 3 4.44772 3 5V20C3 20.5523 3.44772 21 4 21H19C19.5523 21 20 20.5523 20 20V13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M18.5 2.50001C19.3284 1.67158 20.6716 1.67158 21.5 2.50001C22.3284 3.32844 22.3284 4.67157 21.5 5.50001L12 15L8 16L9 12L18.5 2.50001Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <a wire:click="deleteListing({{ $listing->id }})" wire:confirm="Are you sure you want to delete this listing?" href="#" class="text-red-500 hover:text-black dark:hover:text-white px-4 py-2 rounded-md">
                                            <svg class="w-6 h-auto" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19 7L18.1327 19.1425C18.0579 20.1891 17.187 21 16.1378 21H7.86224C6.81296 21 5.94208 20.1891 5.86732 19.1425L5 7M10 11V17M14 11V17M15 7V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V7M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <a wire:click="copyListing({{ $listing->id }})" href="#" class="inline-flex items-center px-4 py-2 rounded-md">
                                            <svg id="copyIcon{{ $listing->id }}" viewBox="0 0 24 24" fill="none" class="w-6 h-auto text-gray-700 dark:text-gray-300 hover:text-gray-500 dark:hover:text-gray-500">
                                                <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V7C19 5.89543 18.1046 5 17 5H15M9 5C9 6.10457 9.89543 7 11 7H13C14.1046 7 15 6.10457 15 5M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5M12 12H15M12 16H15M9 12H9.01M9 16H9.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <svg id="tickIcon{{ $listing->id }}" viewBox="0 0 24 24" fill="none" class="hidden w-6 h-auto text-emerald-700 dark:text-emerald-500 hover:text-emerald-500 dark:hover:text-emerald-300">
                                                <g stroke-width="0"></g>
                                                <g stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g>
                                                    <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M7.75 12L10.58 14.83L16.25 9.17004" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm" colspan="3">
                                {{ __('No listings were found.') }}
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {!! $listings->links() !!}
                </div>
            </div>
        </div>
    </div>

    <x-modal name="listings-create" :show="false" focusable>
        <livewire:listings-create />
    </x-modal>

    @script
    <script>
        $wire.on('clipboard-copy', event => {
            navigator.clipboard.writeText(event[0].text)
                .then(() => {
                    const copyIcon = document.getElementById(`copyIcon${event[0].id}`);
                    const tickIcon = document.getElementById(`tickIcon${event[0].id}`);

                    if (copyIcon && tickIcon) {
                        copyIcon.classList.add('hidden');
                        tickIcon.classList.remove('hidden');

                        setTimeout(() => {
                            tickIcon.classList.add('hidden');
                            copyIcon.classList.remove('hidden');
                        }, 2000);
                    }
                })
                .catch(err => {
                    console.error('Failed to copy text: ', err);
                });
        });
    </script>
    @endscript
</div>
