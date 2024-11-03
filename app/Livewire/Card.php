<?php

namespace App\Livewire;

use App\Models\Card as ModelsCard;
use Livewire\Component;

class Card extends Component
{

    public ModelsCard $card;

    protected $listeners = [
        'card-{card.id}-updated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.card');
    }
}
