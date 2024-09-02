<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Listing;
use Illuminate\Database\Eloquent\Collection;
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

    public function mount(Listing $listing): void
    {
        $this->listing = $listing;
        $this->name = $listing->name;
        $this->description = $listing->description;
        $this->loadItems();
    }

    public function loadItems(): void
    {
        $this->availableItems = Item::where('created_by', auth()->id())->get();
        $this->itemSelections = $this->listing->items->pluck('id')->map(function($id) {
            return ['item_id' => $id];
        })->toArray();
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
