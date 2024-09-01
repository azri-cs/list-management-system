<?php

namespace App\Livewire;

use App\Models\Tag;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditTag extends Component
{
    public Tag $tag;

    #[Validate('required|string')]
    public $name = '';

    #[Validate('required|string|regex:/^#[a-fA-F0-9]{6}$/')]
    public $color = '';

    public function mount(Tag $tag): void
    {
        $this->tag = $tag;
        $this->name = $tag->name;
        $this->color = $tag->color;
    }

    public function updateTag(): void
    {
        $this->validate();

        $this->tag->update([
            'name' => $this->name,
            'color' => $this->color,
        ]);

        $this->dispatch('tag-updated', [
            'id' => $this->tag->id,
            'name' => $this->tag->name,
            'color' => $this->tag->color
        ]);
        $this->dispatch('close-modal', 'edit-tag-' . $this->tag->id);
        $this->redirectRoute('tag.index');
    }

    public function deleteTag(): void
    {
        $this->tag->delete();
        $this->dispatch('tag-deleted', ['id' => $this->tag->id]);
        $this->dispatch('close-modal', 'edit-tag-' . $this->tag->id);
        $this->redirectRoute('tag.index');
    }

    public function render(): View
    {
        return view('livewire.edit-tag');
    }
}
