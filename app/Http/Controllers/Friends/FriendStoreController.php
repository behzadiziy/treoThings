<?php

namespace App\Http\Controllers\Friends;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendStoreController extends Controller
{
    public function __invoke(User $user, Request $request)
    {
        $request->user()->pendingFriendsTo()->attach($user);

        return back();
    }
}
