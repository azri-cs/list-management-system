<?php

namespace App\Livewire;

use App\Models\Listing;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Listings extends Component
{
    use WithPagination;

    public function deleteListing(int $listId): void
    {
        Listing::where('id', $listId)->delete();
    }

    #[Title('Listing List')]
    public function render(): View
    {
        $listings = Listing::where('created_by', auth()->id())->paginate(5);

        return view('livewire.listings', ['listings' => $listings]);
    }
}
