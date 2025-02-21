<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  
    public function show(User $user)
    {
        return response()->json([
            'status' => 200,
            'data' => [
                'user' => $user,
                'posts' => $user->posts
            ]
        ]);
    }
}