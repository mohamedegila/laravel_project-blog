{{-- @dd($post) --}}
@extends('layouts.app')

@section('title') Update post @endsection

@section('content1')

<form method="POST" action="{{ route('posts.update') }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $post->id }}">
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" placeholder="Post Title">

    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description">{{ $post->description }}</textarea>
    </div>
    <div class="form-group">
        <label  for="post_creator">Post Creator</label>
        <select name="user_id" class="form-control" id="post_creator" >
            <option value="{{ $post->user ? $post->user->id : "" }}"selected disabled hidden>{{ $post->user ? $post->user->name : "User Not Found" }}</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name}}</option>
            @endforeach
            
        </select>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
  </form>

  @endsection