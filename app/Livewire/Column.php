<?php

namespace App\Livewire;

use App\Models\Column as ModelsColumn;
use Livewire\Component;

class Column extends Component
{
    public ModelsColumn $column;

    public function render()
    {
        return view('livewire.column' , [
            'cards' => $this->column->cards,
        ]);
    }
}
