<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts=[
            ['id' => 1,'title' => "Laravel", 'discription' => "Laravel is a web application framework with expressive, elegant syntax ", 'creator-name' => "Mohammed",'creator-email' => "Mohammed@gmail.com",'created-at' => "2021-03-21"],
            ['id' => 2,'title' => "Css", 'discription' => "Css web design",'creator-name' => "Ahmed",'creator-email' => "Ahmed@gmail.com",'created-at' => "2021-04-01"],
            ['id' => 3,'title' => "Java", 'discription' => "programming lang",'creator-name' => "Ali",'creator-email' => "Ali@gmail.com",'created-at' => "2021-11-10"]
        ];
        return view('posts.index',['posts' => $posts]);
    }

    public function show($postid){

        $post=['id' => 3,'title' => "Java", 'discription' => "programming lang",'creator-name' => "Ali",'creator-email' => "Ali@gmail.com",'created-at' => "2021-11-10"];
        return view('posts.show',['post' => $post]);
    }

    public function create(){

       return view('posts.create');
    }

    public function edit(){

        $post=['id' => 3,'title' => "Java", 'discription' => "programming lang",'creator-name' => "Ali",'creator-email' => "Ali@gmail.com",'created-at' => "2021-11-10"];
        return view('posts.edit',['post' => $post]);
     }
 

    public function store(){

        return redirect()->route('posts.index');
     }

     public function update(){

        return redirect()->route('posts.index');
     }
}
