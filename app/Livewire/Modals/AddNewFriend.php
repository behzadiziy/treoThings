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

        //dd($this->addNewFriendForm->only('email'));

        $user = User::where('email', $this->addNewFriendForm->only('email'))->first();

        if (!$user) {
            session()->flash('error', 'There is no user with this email.');
            return;
        }

        auth()->user()->pendingFriendsTo()->attach($user);

        $this->dispatch('update-friends');

        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.modals.add-new-friend');
    }
}
