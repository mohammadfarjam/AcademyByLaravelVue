<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $posts=Post::all();
            return response()->json($posts,200);
         }catch (\Exception $e) {
            return 'error';
         }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $new_post= new Post();
        $new_post->title=$request['title'];
        $new_post->price=$request['price'];
        $new_post->discount=$request['discount'];
        $new_post->path_img=$request['photo_name'];
        $new_post->description=$request['description'];
        $new_post->save();
    } catch (\Exception $e) {

        return $e->getMessage();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return $info_edit=Post::findorfail($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
        $find_post=Post::findorfail($id);
        if(isset($find_post)){
            $find_post->title=$request['title'];
            $find_post->price=$request['price'];
            $find_post->discount=$request['discount'];
            $find_post->description=$request['description'];
            $find_post->path_img=$request['path_img'];

            $find_post->save();

        }
    } catch (\Exception $e) {

        return $e->getMessage();
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
