<?php

namespace App\Livewire;

use App\Models\Card as ModelsCard;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Card extends Component
{

    public ModelsCard $card;

    protected $listeners = [
        'card-{card.id}-updated' => '$refresh',
    ];

    public function scopeNotArchived(Builder $query)
    {
        $query->whereNull('archived_at');
    }

    public function render()
    {
        return view('livewire.card');
    }
}
