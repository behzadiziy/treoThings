<?php

namespace App\Livewire\Modals;

use App\Models\Board;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ColumnArchive extends ModalComponent
{
    public Board $board;

    public function unarchiveColumn($id)
    {
        $column = $this->board->columns()->find($id);
        $column->archived_at = null;
        $column->save();

        $this->dispatch('board-updated');
    }

    public function render()
    {
        return view('livewire.modals.column-archive', [
            // @todo order by when archived
            'columns' => $this->board->columns()->archived()->get(),
        ]);
    }
}
