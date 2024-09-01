<?php

namespace App\Livewire;

use App\Models\Tag;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateTag extends Component
{
    #[Validate('required|string')]
    public $name = '';

    #[Validate('required|string|regex:/^#[a-fA-F0-9]{6}$/')]
    public $color = '#000000';

    public function createTag(): void
    {
        $this->validate();

        Tag::create([
            'name' => $this->name,
            'color' => $this->color,
            'created_by' => auth()->id(),
        ]);

        $this->reset(['name', 'color']);
        $this->dispatch('tag-created');
        $this->dispatch('close-modal', 'create-tag');
        $this->redirectRoute('tag.index');
    }

    public function render(): View
    {
        return view('livewire.create-tag');
    }
}
