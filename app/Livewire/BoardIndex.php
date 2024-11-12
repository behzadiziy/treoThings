<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BoardIndex extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        $boards = auth()->user()->ownedBoards->concat(auth()->user()->boards)->unique('id');

        return view('livewire.board-index', [
            'boards' => $boards,
        ]);
    }
}
