<?php

namespace App\Livewire;

use App\Models\Listing;
use App\Models\Tag;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Listings extends Component
{
    use WithPagination;

    public string $search = '';
    public array $selectedTags = [];
    public int $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedTags' => ['except' => []],
        'perPage' => ['except' => 10],
    ];

    public function selectAllTags(): void
    {
        $allTagIds = Tag::pluck('id')->map(fn($id) => (string) $id)->toArray();
        $this->selectedTags = $this->selectedTags === $allTagIds ? [] : $allTagIds;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedSelectedTags(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->search = '';
        $this->selectedTags = [];
        $this->resetPage();
    }

    public function deleteListing(int $listId): void
    {
        Listing::where('id', $listId)->delete();
    }

    public function copyListing(int $listId): void
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
        $listings = Listing::where('created_by', auth()->id())
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                });
            })
            ->when(!empty($this->selectedTags), function ($query) {
                $query->whereHas('tags', function ($query) {
                    $query->whereIn('tags.id', $this->selectedTags);
                });
            })
            ->when($this->perPage !== -1, function ($query) {
                return $query->paginate($this->perPage);
            }, function ($query) {
                return $query->get();
            });

        $tags = Tag::orderBy('name')->get();

        return view('livewire.listings', [
            'listings' => $listings,
            'tags' => $tags,
        ]);
    }
}
