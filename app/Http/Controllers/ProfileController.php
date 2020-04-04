<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    function show(User $user) {
        return view('profile.show', [
            'user' => $user,
            'posts' => $user->posts,
            'comments' => $user->comments,
            'likes' => $user->likes
        ]);
    }

}
