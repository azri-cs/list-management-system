<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListTag extends Component
{
    #[Title('Tag List')]
    public function render(): View
    {
        return view('livewire.list-tag');
    }
}
