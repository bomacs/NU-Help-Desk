<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersResource;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UsersResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'user_id' => $request->input('user_id'),
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_Admin' => 0,
        ]);

        $department = Department::find(2);
        $department->user()->attach($user->id);

        return new UsersResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UsersResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update([
            'id' => $user->id,
            'user_id' => (null !== ($request->input('user_id'))) ? $request->input('user_id') : $user->user_id,
            'lastname' => (null !== ($request->input('lastname'))) ? $request->input('lastname') : $user->lastname,
            'firstname' => (null !== ($request->input('firstname'))) ? $request->input('firstname') : $user->firstname,
            'email' => (null !== ($request->input('email'))) ? $request->input('email') : $user->email,
            // 'email_verified_at' => $user->email_verified_at,
            'password' => (null !== ($request->input('password'))) ? Hash::make($request->input('password')) : $user->password,
            // 'remember_token' => $user->remember_token,
            'is_Admin' => $user->is_Admin,
            // 'created_at' => $user->created_at,
            // 'updated_at' => $user->updated_at,
            // 'deleted_at' => $user->deleted_at
        ]);

        return new UsersResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(["data" => "User" . " " . $user->user_id . " " . "has been deleted successfully."]);
    }
}
