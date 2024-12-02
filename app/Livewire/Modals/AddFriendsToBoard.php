<?php

namespace App\Livewire\Modals;

use App\Models\Board;
use Livewire\Component;
use App\Enums\BoardPermission;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class AddFriendsToBoard extends ModalComponent
{
    public Board $board;
    public $friend_id;
    public $permission = BoardPermission::VIEW;
    public $friends;
    public $collaborationPermissions = [];

    public function mount(Board $board)
    {
        $this->board = $board;
        $this->friends = auth()->user()->friends()
            ->whereNotIn('id', $this->board->users->pluck('id') ?? collect())
            ->get();

        // Load existing permissions for collaborations
        foreach ($this->board->users as $user) {
            $this->collaborationPermissions[$user->id] = $user->pivot->permission;
        }
    }

    public function shareWithFriend()
    {
        $this->authorize('canShareThisBoard', $this->board);

        $this->validate([
            'friend_id' => 'required|exists:users,id',
            'permission' => [
                'required',
                Rule::enum(BoardPermission::class)
            ],
        ]);

        $this->board->users()->attach($this->friend_id, ['permission' => $this->permission]);

        $this->friends = auth()->user()->friends()->whereNotIn('id', $this->board->users->pluck('id'))->get();

        session()->flash('message', 'Friend added successfully to the board!');

        $this->reset(['friend_id', 'permission']);
    }

    public function deleteUserFromBoard($friend_id)
    {
        $this->authorize('canRemoveUserFromBoard', $this->board);

        $this->board->users()->detach($friend_id);
        session()->flash('message', "This User remove successfully from the board!");
    }

    public function updatePermission($friend_id, $permission)
    {
        $this->authorize('canUpdatePermission', $this->board);

        $this->board->users()->updateExistingPivot($friend_id, ['permission' => $permission]);

        session()->flash('message', 'Permission updated successfully!');
    }

    public function render()
    {
        return view('livewire.modals.add-friends-to-board', [
            'friends' => auth()->user()->friends,
            'permissions' => BoardPermission::values(),
            'collaborations' => $this->board->users
        ]);
    }
}
