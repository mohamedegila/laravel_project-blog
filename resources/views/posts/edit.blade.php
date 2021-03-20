@extends('layouts.app')

@section('title') Update post @endsection

@section('content')

<form method="PUT" action="{{ route('posts.update') }}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value={{ $post['title'] }} placeholder="Post Title">

    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description">{{ $post['discription'] }} </textarea>
    </div>
    <div class="form-group">
        <label  for="post_creator">Post Creator</label>
        <select class="form-control" id="post_creator">
            <option>{{ $post['creator-name'] }}</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
  </form>

  @endsection