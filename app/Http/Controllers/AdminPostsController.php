<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPostsRequest;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Photo;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();

     //   $users=User::all();
//return $users->post();
//foreach($users as $user)
//{
//    foreach( $user->post as $post)
//    {
//        echo $post->title;
//        echo $post->body;
//    }
//}
         return view("admin.posts.index",compact("posts","photos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostsRequest $request)
    {
        //
        $input=$request->all();
        $user=Auth::user();

       // print_r($user);
      //  echo ($user->id);
//        foreach ($user as $authuser)
//        {
//            echo $authuser->id;
//
//        }
        if($file=$request->file("flPhoto"))
        {
             $name= time().$file->getClientOriginalName();
             $file->move("images",$name);
             $photo=Photo::create(["path"=>$name]);

             $input["flPhoto"]=$photo->id;
        }

        Post::create(["user_id"=>$user->id,"title"=>$request->txtTitle,"body"=>$request->txtBody,"photo_id"=>$input["flPhoto"],"category_id"=>1,"body"=>$request->txtBody]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
