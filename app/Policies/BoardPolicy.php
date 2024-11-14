<?php

namespace App\Policies;

use App\Enums\BoardPermission;
use App\Models\User;
use App\Models\Board;
use App\Models\Column;

class BoardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function show(User $user, Board $board)
    {
        return $board->owner_id === $user->id || $board->users->contains($user);
    }

    public function createColumn(User $user, Board $board)
    {
        return $board->owner_id === $user->id || $board->users()->where('user_id', $user->id)->where('permission', BoardPermission::EDIT->value)->exists();
    }

    public function canSort(User $user, Board $board)
    {
        return $board->owner_id === $user->id || $board->users()->where('user_id', $user->id)->where('permission', BoardPermission::EDIT->value)->exists();
    }

    public function canMove(User $user, Board $board)
    {
        return $board->owner_id === $user->id || $board->users()->where('user_id', $user->id)->where('permission', BoardPermission::EDIT->value)->exists();
    }

    public function canShareThisBoard(User $user, Board $board)
    {
        return auth()->id() === $board->owner_id;
    }

    public function canRemoveUserFromBoard(User $user, Board $board)
    {
        return auth()->id() === $board->owner_id;
    }

    public function canUpdatePermission(User $user, Board $board)
    {
        return auth()->id() === $board->owner_id;
    }
}
