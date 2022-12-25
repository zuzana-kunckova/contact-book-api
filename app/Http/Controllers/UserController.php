<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function store(Request $request)
    {
        $user = User::create($request->only([
            'name', 'email', 'password',
        ]));

        return new UserResource($user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only([
            'name', 'email', 'password'
        ]));

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
