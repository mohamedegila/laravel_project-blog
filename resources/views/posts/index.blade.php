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
            <x-button class="info" rout="{{ route('posts.show',['post' => $post['id']]) }}">View</x-button>
            <x-button class="primary" rout="{{ route('posts.edit',['post' => $post['id']]) }}">Edit</x-button>
            <x-button class="danger" rout="#">Delete</x-button>
    
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection