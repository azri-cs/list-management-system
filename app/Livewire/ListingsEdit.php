<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Listing;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Log;

class ListingsEdit extends Component
{
    public Listing $listing;

    #[Validate('required|string')]
    public $name = '';

    #[Validate('string')]
    public $description = '';

    public $itemSelections = [];
    public $availableItems = [];

    #[Validate('array')]
    public $selectedTags = [];

    public Collection $tags;

    public $searchTerm = '';

    public function mount(Listing $listing): void
    {
        $this->listing = $listing;
        $this->name = $listing->name;
        $this->description = $listing->description;
        $this->loadItems();
        $this->loadTags();
    }

    public function loadItems(): void
    {
        $this->availableItems = Item::where('created_by', auth()->id())->get();
        $this->itemSelections = $this->listing->items->pluck('id')->map(function($id) {
            return ['item_id' => $id];
        })->toArray();
    }

    public function loadTags(): void
    {
        $this->tags = Tag::all();
        $this->selectedTags = $this->listing->tags->pluck('id')->toArray();
    }

    public function updatedSearchTerm()
    {
        $this->tags = Tag::where('name', 'like', '%' . $this->searchTerm . '%')->get();
    }

    public function toggleTag($tagId)
    {
        if (in_array($tagId, $this->selectedTags)) {
            $this->selectedTags = array_diff($this->selectedTags, [$tagId]);
        } else {
            $this->selectedTags[] = $tagId;
        }
    }

    public function addItemSelection(): void
    {
        $this->itemSelections[] = ['item_id' => ''];
    }

    public function removeItemSelection($index): void
    {
        unset($this->itemSelections[$index]);
        $this->itemSelections = array_values($this->itemSelections);
    }

    public function updateListing(): void
    {
        try {
            $this->validate();

            $this->listing->update([
                'name' => $this->name,
                'description' => $this->description,
            ]);

            $itemIds = collect($this->itemSelections)->pluck('item_id')->filter()->unique()->values()->toArray();
            $this->listing->items()->sync($itemIds);

            $this->listing->tags()->sync($this->selectedTags);

            $this->dispatch('listing-updated', [
                'id' => $this->listing->id,
                'name' => $this->listing->name,
                'description' => $this->listing->description
            ]);
            $this->dispatch('close-modal', 'listings-edit' . $this->listing->id);
            session()?->flash('success', 'Listing successfully updated!');
        } catch (\Exception $e) {
            session()?->flash('error', 'An error occurred while updating the listing: ' . $e->getMessage());
            Log::error('Error updating listing: ' . $e->getMessage());
        }
        $this->redirectRoute('listings.index');
    }

    public function render(): View
    {
        return view('livewire.listings-edit');
    }
}
