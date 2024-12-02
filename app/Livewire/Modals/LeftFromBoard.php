<?php

namespace App\Livewire\Modals;

use App\Models\Board;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class LeftFromBoard extends ModalComponent
{
    public Board $board;

    public function leaveTheBoard()
    {
        $this->board->users()->detach(auth()->id());
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.modals.left-from-board');
    }
}
