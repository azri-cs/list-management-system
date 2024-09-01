<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListListing extends Component
{
    #[Title('Listing List')]
    public function render(): View
    {
        return view('livewire.list-listing');
    }
}
