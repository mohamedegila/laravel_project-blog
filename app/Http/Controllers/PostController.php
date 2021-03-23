<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        dd("here");
        $posts= Post::withTrashed()->paginate(5);

        // $posts= Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    public function restore($postid)
    {
        $post= Post::withTrashed()->find($postid);
        // dd($post);
        $post->restore();
        return redirect()->route('posts.index');
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

    public function store(StorePostRequest $request)
    {

        //Start-> upload image

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        

        if ($request->file('file')) {
            $imagePath = $request->file('file');
            $imageName = $imagePath->getClientOriginalName();

            

            $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
            // $request->file->move(Storage_path('uploads'), $imageName);
        }
        // $path = '/storage/'.$path;
        
        //End-> upload image
        $requestData = $request->all();
        $requestData['post_image']=$path;
        // dd($requestData);
        Post::create($requestData);
        return redirect()->route('posts.index');
    }

    public function update(UpdatePostRequest $request)
    {
        // dd($request);
        $requestData = $request->all();
        $postid = $request->post;
        $post= Post::find($postid);
        $post->update($requestData);
        return redirect()->route('posts.index');
    }

    public function destroy($postid)
    {
        $post= Post::find($postid);
        
        $post->delete();
        // dd($post);
        return redirect()->route('posts.index');
    }
    
    public function ajaxShow(Request $request)
    {
        // dd($request);
        $postid = $request->post;
        $post= Post::find($postid);
        // dd($post);
        return view('posts.ajax_show', ['post'=>$post]);
    }
}
