<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(User::all(), 200);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json($user->load('posts'), 200);
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());

        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}