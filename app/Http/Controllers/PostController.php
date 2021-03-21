<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts= Post::paginate(5);
        //$posts= Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function show($postid)
    {
        $post= Post::find($postid);
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        $users= User::all();
        return view('posts.create', ['users' => $users]);
    }

    public function edit($postid)
    {
        $post= Post::find($postid);
        $users= User::all();
        return view('posts.edit', ['post' => $post,'users' =>  $users]);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        // dd($requestData);
        Post::create($requestData);
        return redirect()->route('posts.index');
    }

    public function update(Request $request)
    {
        $requestData = $request->all();
        $postid = $requestData['id'];
        $post= Post::find($postid);
        $post->update($requestData);
        // dd($requestData);
        // // PostDB::update('update users set votes = 100 where name = ?', ['John']);
        return redirect()->route('posts.index');
    }

    public function destroy($postid)
    {
        $post= Post::find($postid);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
