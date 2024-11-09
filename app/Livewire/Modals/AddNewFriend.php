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

        $user = auth()->user();


        $friend = User::where('email', $this->addNewFriendForm->only('email'))->first();


        if (!$friend) {
            session()->flash('error', 'No user found with this email.');
            return;
        }

        if ($user->isFriendsWith($friend)) {
            session()->flash('warning', "You are already friends with $friend->name!");
            return;
        }

        if (auth()->user()->hasPendingFriendRequestFor($friend)) {
            session()->flash('warning', "Waiting for $friend->name to accept your request.");
            return;
        }

        $user->pendingFriendsTo()->attach($friend);

        $this->dispatch('update-friend-index');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modals.add-new-friend');
    }
}
