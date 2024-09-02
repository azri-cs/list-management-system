<?php

namespace App\Livewire;

use App\Models\Listing;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Listings extends Component
{
    use WithPagination;

    public function deleteListing(int $listId): void
    {
        Listing::where('id', $listId)->delete();
    }

    public function copyListing(int $listId)
    {
        $listing = Listing::where('id', $listId)->first();
        $items = $listing->items;
        $details_string = $items->map(function($item) {
            return "{$item->key}: {$item->value}";
        })->implode("\n");
        $this->dispatch('clipboard-copy', [
            'text' => $details_string,
            'id' => $listId,
        ]);
    }

    #[Title('Listing List')]
    public function render(): View
    {
        $listings = Listing::where('created_by', auth()->id())->paginate(5);

        return view('livewire.listings', ['listings' => $listings]);
    }
}
