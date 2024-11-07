<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DestroyFriendRequest extends ModalComponent
{

    public User $pendingRequestTo;

    public function cancelRequest()
    {
        if (auth()->user()->friendsTo()->detach($this->pendingRequestTo)) {
            $this->dispatch('update-friend-index');
            $this->dispatch('closeModal');
            return;
        }
    }

    public function render()
    {
        return view('livewire.modals.destroy-friend-request');
    }
}
