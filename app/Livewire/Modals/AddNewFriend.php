<?php

namespace App\Livewire\Modals;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Livewire\Forms\AddNewFriend as FormsAddNewFriend;

class AddNewFriend extends ModalComponent
{
    public FormsAddNewFriend $addNewFriendForm;

    public function sendRequest()
    {
        $this->addNewFriendForm->validate();

        $user = User::where('email', $this->addNewFriendForm->only('email'))->first();

        if (!$user) {
            session()->flash('error', 'No user found with this email.');
            return;
        }

        if (auth()->user()->hasPendingFriendRequestFor($user)) {
            session()->flash('warning', "Waiting for $user->name to accept your request.");
            return;
        }

        auth()->user()->pendingFriendsTo()->attach($user);

        $this->dispatch('update-friend-index');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modals.add-new-friend');
    }
}
