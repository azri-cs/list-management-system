<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Items extends Component
{
    use WithPagination;

    public function deleteItem(int $itemId): void
    {
        Item::where('id', $itemId)->delete();
    }

    #[Title('Item List')]
    public function render(): View
    {
        $items = Item::where('created_by', auth()->id())->paginate(5);

        return view('livewire.items', ['items' => $items]);
    }
}
