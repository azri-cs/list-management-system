<?php

namespace App\Livewire;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateListing extends Component
{
    #[Validate('required|string')]
    public $name = '';

    #[Validate('string')]
    public $description = '';

    public array $listingItems = [];
    public Collection $allListingItems;

    public function mount(): void
    {
        $this->allListingItems = \App\Models\ItemListing::all();
        $this->listingItems[] = ['listing_id' => '', 'key' => '', 'value' => ''];
    }

    public function addListingItem(): void
    {
        $this->listingItems[] = ['listing_id' => '', 'key' => '', 'value' => ''];
    }

    public function removeListingItem($index): void
    {
        unset($this->listingItems[$index]);
        $this->listingItems = array_values($this->listingItems);
    }

    public function render(): View
    {
        return view('livewire.create-listing');
    }
}
