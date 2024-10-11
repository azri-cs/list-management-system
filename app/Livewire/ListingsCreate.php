<?php

namespace App\Livewire;

use App\Models\Listing;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ListingsCreate extends Component
{
    #[Validate('required|string')]
    public $name = '';

    #[Validate('string')]
    public $description = '';

    #[Validate('array')]
    public $selectedTags = [];

    public Collection $tags;

    public $searchTerm = '';

    public function mount(): void
    {
        $this->tags = Tag::all();
    }

    public function updatedSearchTerm(): void
    {
        $this->tags = Tag::where('name', 'like', '%' . $this->searchTerm . '%')->get();
    }

    public function toggleTag($tagId): void
    {
        if (in_array($tagId, $this->selectedTags, true)) {
            $this->selectedTags = array_diff($this->selectedTags, [$tagId]);
        } else {
            $this->selectedTags[] = $tagId;
        }
    }

    public function createList(): void
    {
        $this->validate();

        $listing = Listing::create([
            'created_by' => auth()->id(),
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $listing->tags()->attach($this->selectedTags);

        $this->reset(['name', 'description', 'selectedTags']);
        $this->dispatch('listing-created');
        $this->dispatch('close-modal', 'create-listing');
        $this->redirectRoute('listings.index');
    }

    public function render(): View
    {
        return view('livewire.listings-create');
    }
}
