<?php

namespace App\Livewire;

use App\Models\Card as ModelsCard;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Card extends Component
{

    public ModelsCard $card;

    public $is_card_done;

    protected $listeners = [
        'card-{card.id}-updated' => '$refresh',
    ];

    public function mount($card)
    {
        $this->card = $card;
        $this->is_card_done = $card->is_done;
    }


    public function toggleTask($cardId)
    {
        $card = ModelsCard::findOrFail($cardId);
        $card->is_done = !$card->is_done;
        $card->save();


        $this->is_card_done = $card->is_done;
    }



    public function render()
    {
        return view('livewire.card');
    }
}
