<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = UserResource::collection(User::all());
        return $user->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new UserResource(User::create($request->all()));
        return $user->response()->setStatusCode(200, 'user returned successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = new UserResource(User::findOrFail($id));
        return $user->response()->setStatusCode(200, 'user returned successfuly')
        ->header('Additional Header', 'True');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = new UserResource(User::findOrFail($id));
        $user->update($request->all());

        return $user->response()->setStatusCode(200, 'user returned successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return 204;
    }
}
