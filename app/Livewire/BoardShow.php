<?php

namespace App\Livewire;

use App\Models\Board;
use App\Models\Card;
use App\Models\Column;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Database\Eloquent\Builder;

class BoardShow extends Component
{

    public Board $board;

    public function mount()
    {
        $this->authorize('show', $this->board);
    }

    public function sorted(array $items)
    {
        $order = collect($items)->pluck('value')->toArray();
        Column::setNewOrder($order, 1, 'id', function (Builder $query) {
            $query->where('user_id', auth()->id());
        });
    }

    public function moved(array $items)
    {
        //dd(collect($items)->recursive());

        collect($items)->recursive()->each(function ($column) {
            $columnId = $column->get('value');
            $order = $column->get('items')->pluck('value')->toArray();

            Card::where('user_id', auth()->id())
                ->find($order)
                ->where('column_id', '!=', $columnId)
                ->each->update([
                    'column_id' => $columnId,
                ]);

            Card::setNewOrder($order, 1, 'id', function (Builder $query) {
                $query->where('user_id', auth()->id());
            });
        });
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.board-show', [
            'columns' => $this->board->columns()->ordered()->get(),
        ]);
    }
}
