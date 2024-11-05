<?php

namespace App\Livewire\Modals;

use App\Livewire\Forms\EditCard as FormsEditCard;
use App\Models\Card;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditCard extends ModalComponent
{
    public Card $card;
    public FormsEditCard $editCardForm;

    public function mount()
    {
        $this->editCardForm->fill($this->card->only('title', 'notes'));
    }

    public function archiveCard()
    {
        $this->authorize('archiveCard', $this->card);

        $this->card->update([
            'archived_at' => now()
        ]);

        $this->dispatch('column-' . $this->card->column->id . '-archived');

        $this->dispatch('closeModal');
    }

    public function updateCard()
    {
        $this->authorize('updateCard', $this->card);

        $this->editCardForm->validate();

        $this->card->update($this->editCardForm->only('title', 'notes'));

        $this->dispatch('card-' . $this->card->id . '-updated');

        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modals.edit-card');
    }
}
