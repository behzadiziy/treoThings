<?php

namespace App\Livewire;

use App\Livewire\Forms\CreateColumn;
use App\Models\Board;
use App\Models\Card;
use App\Models\Column;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Builder;

class BoardShow extends Component
{
    public Board $board;

    public CreateColumn $createColumnForm;

    protected $listeners = [
        'archive-column' => '$refresh',
        'board-updated' => '$refresh',
        'update-column' => '$refresh',
    ];

    public function mount()
    {
        $this->authorize('show', $this->board);
    }

    public function sorted(array $items)
    {
        $this->authorize('canSort', $this->board);

        $order = collect($items)->pluck('value')->toArray();
        Column::setNewOrder($order, 1, 'id');
    }

    public function moved(array $items)
    {
        $this->authorize('canMove', $this->board);

        collect($items)->recursive()->each(function ($column) {
            $columnId = $column->get('value');
            $order = $column->get('items')->pluck('value')->toArray();

            Card::find($order)
                ->where('column_id', '!=', $columnId)
                ->each->update([
                    'column_id' => $columnId,
                ]);

            Card::setNewOrder($order, 1, 'id');
        });
    }

    public function createColumn()
    {
        $this->authorize('createColumn', $this->board);

        $this->createColumnForm->validate();

        $column = $this->board->columns()->make($this->createColumnForm->only('title'));
        $column->user()->associate(auth()->user());
        $column->save();

        $this->createColumnForm->reset();
        $this->dispatch('column-create');
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.board-show', [
            'columns' => $this->board->columns()->ordered()->notArchive()->get(),
        ]);
    }
}
