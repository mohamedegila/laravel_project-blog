@extends('layouts.app')

@section('title') create post @endsection

@section('content')

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">

    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description"> </textarea>
    </div>
    <div class="form-control">
      <label class="form-check-label" for="exampleCheck1"></label>
    </div>
    <div class="form-group">
        <label  for="post_creator">Post Creator</label>
        <select class="form-control" id="post_creator">
            <option>Ahmed</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Create Post</button>
  </form>

  @endsection