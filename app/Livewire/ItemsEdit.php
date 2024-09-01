<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ItemsEdit extends Component
{
    public Item $item;

    #[Validate('required|string')]
    public $key = '';

    #[Validate('required|string')]
    public $value = '';

    public function mount(Item $item): void
    {
        $this->item = $item;
        $this->key = $item->key;
        $this->value = $item->value;
    }

    public function updateItem(): void
    {
        $this->validate();

        $this->item->update([
            'key' => $this->key,
            'value' => $this->value,
        ]);

        $this->dispatch('item-updated', [
            'id' => $this->item->id,
            'key' => $this->item->key,
            'value' => $this->item->value
        ]);
        $this->dispatch('close-modal', 'items-edit' . $this->item->id);
        $this->redirectRoute('item.index');
    }

    public function render(): View
    {
        return view('livewire.items-edit');
    }
}
