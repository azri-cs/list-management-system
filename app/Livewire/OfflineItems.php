<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class OfflineItems extends Component
{
    public function render(): View
    {
        return view('livewire.offline-items');
    }
}
