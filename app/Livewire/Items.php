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

    public string $search = '';
    public int $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    public function deleteItem(int $itemId): void
    {
        Item::where('id', $itemId)->delete();
    }

    #[Title('Item List')]
    public function render(): View
    {
        $items = Item::where('created_by', auth()->id())
            ->where(function ($query) {
                $query->where('key', 'like', '%' . $this->search . '%')
                    ->orWhere('value', 'like', '%' . $this->search . '%');
            })
            ->when($this->perPage !== -1, function ($query) {
                return $query->paginate($this->perPage);
            }, function ($query) {
                return $query->get();
            });

        return view('livewire.items', ['items' => $items]);
    }
}
