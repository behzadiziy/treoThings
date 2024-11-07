<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class FriendIndex extends Component
{
    public User $pendingRequestFrom;

    public $listeners = [
        'update-friend-index' => '$refresh',
    ];

    public function acceptFriendRequest($pendingRequestFrom)
    {
        auth()->user()->pendingFriendsFrom()->updateExistingPivot($pendingRequestFrom, [
            'is_accepted' => true,
            'accepted_at' => now()
        ]);

        $this->dispatch('update-friend-index');
    }

    public function render()
    {
        return view('livewire.friend-index', [
            'pendingFriendsTo' => auth()->user()->pendingFriendsTo,
            'pendingFriendsFrom' => auth()->user()->pendingFriendsFrom,
            'friends' => auth()->user()->friends,
        ]);
    }
}
