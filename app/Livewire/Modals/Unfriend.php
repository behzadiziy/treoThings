<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Unfriend extends ModalComponent
{
    public User $friend;

    public function unfriendUser()
    {

        $user = auth()->user();

        $detached = $user->friendsTo()->detach($this->friend->id) ||
            $user->friendsFrom()->detach($this->friend->id);

        if ($detached) {
            $this->dispatch('update-friend-index');
            $this->dispatch('closeModal');
        }
    }

    public function render()
    {
        return view('livewire.modals.unfriend');
    }
}
