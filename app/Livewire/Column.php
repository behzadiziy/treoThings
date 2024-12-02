<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateCardForm;
use App\Livewire\Forms\UpdateColumn;
use App\Models\Card;
use App\Models\Column as ModelsColumn;
use Livewire\Component;

class Column extends Component
{
    public ModelsColumn $column;

    public CreateCardForm $createCardForm;

    public UpdateColumn $updateColumnForm;

    public $cards;

    protected $listeners = [
        'column-{column.id}-archived' => '$refresh',
        'column-{column.id}-updated' => '$refresh',
    ];

    public function mount()
    {
        $this->updateColumnForm->fill($this->column->only('title'));
        $this->cards = $this->column->cards()->ordered()->notArchive()->get();
    }

    public function archiveColumn()
    {
        $this->authorize('archiveColumn', $this->column);

        $this->column->update([
            'archived_at' => now()
        ]);


        $this->dispatch('archive-column');
    }

    public function createCard()
    {
        $this->authorize('createCard', $this->column);

        $this->createCardForm->validate();

        $card = $this->column->cards()->make($this->createCardForm->only('title'));
        $card->user()->associate(auth()->user());
        $card->save();

        $this->createCardForm->reset();

        $this->dispatch('card-created');
    }

    public function updateColumn()
    {
        $this->authorize('updateColumn', $this->column);

        $this->updateColumnForm->validate();
        $this->column->update($this->updateColumnForm->only('title'));

        $this->dispatch('update-column');
    }

    public function render()
    {
        return view('livewire.column', [
            'cards' => $this->cards,
        ]);
    }
}
