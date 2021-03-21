@extends('layouts.app')

@section('title') Update post @endsection

@section('content')

<form method="PUT" action="{{ route('posts.update') }}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value={{ $post->title }} placeholder="Post Title">

    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description">{{ $post->description }} </textarea>
    </div>
    <div class="form-group">
        <label  for="post_creator">Post Creator</label>
        <select name="user_id"class="form-control" id="post_creator">
            <option value="{{ $post->user_id}}">{{ $post->user ? $post->user->name : "User Not Found" }}</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
  </form>

  @endsection