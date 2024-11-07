<?php

namespace App\Livewire\Modals;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Unfriend extends ModalComponent
{
    
    public function render()
    {
        return view('livewire.modals.unfriend');
    }
}
