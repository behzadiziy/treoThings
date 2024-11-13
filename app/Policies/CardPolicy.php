<?php

namespace App\Policies;

use App\Enums\BoardPermission;
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
        //dd(BoardPermission::EDIT);
        return $user->id === $card->owner_id || $card->column->board->users()->where('user_id', $user->id)->where('permission', BoardPermission::EDIT->value)->exists();
    }

    public function updateCard(User $user, Card $card)
    {
        return $user->id  === $card->owner_id  || $card->column->board->users()->where('user_id', $user->id)->where('permission', BoardPermission::EDIT->value)->exists();
    }
}
