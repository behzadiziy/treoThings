<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Board;

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
        return $user->id === $board->user_id;
    }
}
