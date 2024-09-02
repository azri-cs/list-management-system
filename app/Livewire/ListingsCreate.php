<?php

namespace App\Livewire;

use App\Models\Listing;
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

    public function createList(): void
    {
        $this->validate();

        Listing::create([
            'created_by' => auth()->id(),
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->reset(['name', 'description']);
        $this->dispatch('listing-created');
        $this->dispatch('close-modal', 'create-listing');
        $this->redirectRoute('listings.index');
    }

    public function render(): View
    {
        return view('livewire.listings-create');
    }
}
