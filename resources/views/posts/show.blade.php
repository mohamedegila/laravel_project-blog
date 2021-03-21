
@extends('layouts.app')

@section('title') Show post @endsection

@section('content')
<div class="card">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Title</h5>
      <p class="card-text">{{ $post->title }}</p>
      <h5 class="card-title">Description</h5>
      <p class="card-text">{{ $post->description }}</p>
      
    </div>
  </div>

  <div class="card mt-5">
    <div class="card-header">
      Post Creator Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Name</h5>
      <p class="card-text">{{ $post->user ? $post->user->name:"User Not Found"}}</p>
      <h5 class="card-title">Email</h5>
      <p class="card-text">{{ $post->user ? $post->user->email:"User Not Found" }}</p>
      <h5 class="card-title">Created At</h5>
      <p class="card-text">{{ $post->created_at ? Carbon\Carbon::parse($post->created_at)->isoFormat('ddd Do \of MMMM YYYY, h:mm:ss a') : "No Date" }}</p>
      
    </div>
  </div>

  @endsection