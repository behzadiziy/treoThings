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
        return $user->id === $card->owner_id;
    }

    public function updateCard(User $user, Card $card)
    {
        return $user->id === $card->owner_id;
    }
}
