<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = TagResource::collection(Tag::all());
        return $tag->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tag = new TagResource(Tag::create($request->all()));
        return $tag->response()->setStatusCode(200, 'tag returned successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tag = new TagResource(Tag::findOrFail($id));
        return $tag->response()->setStatusCode(200, 'tag returned successfuly')
        ->header('Additional Header', 'True');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tag = new TagResource(Tag::findOrFail($id));
        $tag->update($request->all());

        return $tag->response()->setStatusCode(200, 'tag returned successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();

        return 204;
    }
}