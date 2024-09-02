<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ItemsCreate extends Component
{
    #[Validate('required|string')]
    public $key = '';

    #[Validate('required|string')]
    public $value = '';

    public function createItem(): void
    {
        $this->validate();

        Item::create([
            'created_by' => auth()->id(),
            'key' => $this->key,
            'value' => $this->value,
        ]);

        $this->reset(['key', 'value']);
        $this->dispatch('item-created');
        $this->dispatch('close-modal', 'create-item');
        $this->redirectRoute('items.index');
    }

    public function render(): View
    {
        return view('livewire.items-create');
    }
}
