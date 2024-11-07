<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class RejectFriendRequest extends ModalComponent
{
    public User $pendingRequestFrom;


    public function rejectRequest()
    {
        if (auth()->user()->friendsFrom()->detach($this->pendingRequestFrom)) {
            $this->dispatch('update-friend-index');
            $this->dispatch('closeModal');
            return;
        }
    }
    public function render()
    {
        return view('livewire.modals.reject-friend-request');
    }
}
