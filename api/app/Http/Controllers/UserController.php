<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return UserResource::collection($users);
    }

    public function store(StoreRequest $request)
    {
        $data=$request->validated();
        $user=User::create($data);

        return UserResource::make($user);
    }

    public function show(User $user)
    {
        return UserResource::make($user);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data=$request->validated();
        $user->update($data);

        return UserResource::make($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message'=>'done']);
    }
}
