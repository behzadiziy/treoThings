<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\User;

class CardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function archiveCard(User $user, Card $card)
    {
        return $user->id === $card->owner_id || $card->column->board->users()->where('user_id', $user->id)->where('permission', 1)->exists();
    }

    public function updateCard(User $user, Card $card)
    {
        return $user->id  === $card->owner_id  || $card->column->board->users()->where('user_id', $user->id)->where('permission', 1)->exists();
    }
}
