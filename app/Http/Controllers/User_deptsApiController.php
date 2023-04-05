<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUser_deptRequest;
use App\Http\Requests\UpdateUser_deptRequest;
use App\Http\Resources\User_deptsResource;

class User_deptsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User_deptsResource::collection(User::with('departments')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUser_deptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser_deptRequest $request)
    {
        // $user_dept = User_dept::create($request->all());

        // return new User_deptsResource($user_dept);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_dept  $user_dept
     * @return \Illuminate\Http\Response
     */
    public function show(User_dept $user_dept)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_deptRequest  $request
     * @param  \App\Models\User_dept  $user_dept
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_deptRequest $request, User_dept $user_dept)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_dept  $user_dept
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_dept $user_dept)
    {
        //
    }
}
