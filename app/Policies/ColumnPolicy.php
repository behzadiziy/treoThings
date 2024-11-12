<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Column;

class ColumnPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function archiveColumn(User $user, Column $column)
    {
        return $column->owner_id  === $user->id || $column->board->users()->where('user_id', $user->id)->where('permission', 1)->exists();
    }

    public function updateColumn(User $user, Column $column)
    {
        return $column->owner_id === $user->id || $column->board->users()->where('user_id', $user->id)->where('permission', 1)->exists();
    }

    public function createCard(User $user, Column $column)
    {
        return $column->owner_id === $user->id || $column->board->users()->where('user_id', $user->id)->where('permission', 1)->exists();
    }
}
