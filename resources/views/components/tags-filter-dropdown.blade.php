<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" type="button" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-600 dark:hover:bg-gray-700">
        {{ $label }}
        @if($badgeCount)
            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-800 dark:text-indigo-100">
                {{ $badgeCount }}
            </span>
        @endif
        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </button>

    <div x-show="open" @click.away="open = false" class="absolute left-0 z-10 mt-2 w-60 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-gray-800 dark:ring-gray-700">
        <div class="p-2">
            <div class="space-y-1">
                @foreach($options as $value => $label)
                    <label class="flex items-center px-2 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md cursor-pointer">
                        <input
                            type="checkbox"
                            value="{{ $value }}"
                            @checked(in_array($value, $selected))
                            {{ $attributes->wire('model') }}
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                        >
                        <span class="ml-2 text-gray-700 dark:text-gray-200">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
            <div class="border-t border-gray-200 dark:border-gray-600 mt-2 pt-2">
                <button
                    type="button"
                    wire:click="selectAllTags"
                    class="w-full text-left px-2 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md"
                >
                    Select All
                </button>
            </div>
        </div>
    </div>
</div>
