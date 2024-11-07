<?php

namespace App\Livewire;

use Livewire\Component;

class FriendIndex extends Component
{

    public $listeners = [
        'update-friend-index' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.friend-index', [
            'pendingFriendsTo' => auth()->user()->pendingFriendsTo,
            'pendingFriendsFrom' => auth()->user()->pendingFriendsFrom,
        ]);
    }
}
