<?php

namespace App\Livewire;

use App\Models\Card as ModelsCard;
use Livewire\Component;

class Card extends Component
{

    public ModelsCard $card;
    
    public function render()
    {
        return view('livewire.card');
    }
}
