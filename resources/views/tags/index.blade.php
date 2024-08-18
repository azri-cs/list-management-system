<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex items-center justify-between mb-4 px-6">
                <h2 class="text-3xl font-bold dark:text-white">{{__('Tags')}}</h2>
                <a href="#">
                    <x-primary-button type="button" class="ms-3">
                        {{ __('Create New') }}
                    </x-primary-button>
                </a>
            </div>

            <div class="mb-4 px-6">
                <input type="text" id="tagSearch" placeholder="Search tags..."
                       class="w-full px-4 py-2 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>

            <div id="tagContainer" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 px-6">
                @foreach($tags as $tag)
                    <button
                        class="tag-button px-4 py-2 rounded-full text-white font-semibold transition-all duration-300 ease-in-out transform hover:scale-110 transition-all duration-300 ease-in-out transform hover:scale-110 hover:shadow-lg"
                        style="background-color: {{ $tag->color }}; font-size: 1rem;"
                    >
                        {{ $tag->name }}
                    </button>
                @endforeach
            </div>
        </div>

    </div>

    @push('footer')
        <script>
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', function() {
                    this.classList.toggle('ring-4');
                    this.classList.toggle('ring-offset-2');

                    // Here you can also handle the tag selection,
                    // e.g., add/remove from a selected tags list
                });
            });

            document.getElementById('tagSearch').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const tagContainer = document.getElementById('tagContainer');
                let visibleCount = 0;

                document.querySelectorAll('.tag-button').forEach(button => {
                    const tagName = button.textContent.toLowerCase();
                    if (tagName.includes(searchTerm)) {
                        button.style.display = '';
                        visibleCount++;
                    } else {
                        button.style.display = 'none';
                    }
                });

                // Adjust grid columns based on visible tags
                if (visibleCount < 4) {
                    tagContainer.className = 'grid grid-cols-2 gap-4';
                } else if (visibleCount < 7) {
                    tagContainer.className = 'grid grid-cols-2 sm:grid-cols-3 gap-4';
                } else {
                    tagContainer.className = 'grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4';
                }
            });
        </script>
    @endpush
</x-app-layout>
