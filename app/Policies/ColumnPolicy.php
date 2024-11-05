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
        return $user->id === $column->user_id;
    }

    public function updateColumn(User $user, Column $column)
    {
        return $user->id === $column->user_id;
    }

    public function createCard(User $user, Column $column)
    {
        return $user->id === $column->user_id;
    }
}
