@extends('layouts.app')

@section('title') posts @endsection

@section('content')
<a class="btn btn-success mb-3" href="{{ route('posts.create') }}" role="button">Create Post</a>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post )
            
      
      <tr>
        <th scope="row">{{ $post['id'] }}</th>
        <td>{{ $post['title'] }}</td>
        <td>{{ $post['creator-name'] }}</td>
        <td>{{ $post['created-at'] }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('posts.show',['post' => $post['id']])  }}" role="button">View</a>
            <a class="btn btn-primary" href="#" role="button">Edit</a>
            <a class="btn btn-danger" href="#" role="button">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection