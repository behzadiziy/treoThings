<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateCardForm;
use App\Models\Column as ModelsColumn;
use Livewire\Component;

class Column extends Component
{
    public ModelsColumn $column;

    public CreateCardForm $createCardForm;

    protected $listeners = [
        'column-{column.id}-archived' => '$refresh',
        'column-{column.id}-updated' => '$refresh',
    ];

    public function archiveColumn()
    {

        $this->column->update([
            'archived_at' => now()
        ]);


        $this->dispatch('archive-column');
    }

    public function createCard()
    {
        $this->createCardForm->validate();

        $card = $this->column->cards()->make($this->createCardForm->only('title'));
        $card->user()->associate(auth()->user());
        $card->save();

        $this->createCardForm->reset();

        $this->dispatch('card-created');
    }

    public function render()
    {
        return view('livewire.column', [
            'cards' => $this->column->cards()->ordered()->notArchive()->get(),
        ]);
    }
}
