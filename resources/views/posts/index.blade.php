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
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ $post->user ? $post->user->name : "User Not Found"}}</td>
        <td>{{ $post->created_at ? date_format($post->created_at , 'Y-M-D') : "No Date" }}</td>
        <td>
          <x-button class="info" rout="{{ route('posts.show',['post' => $post->id]) }}">View</x-button>
            <x-button class="primary" rout="{{ route('posts.edit',['post' => $post->id]) }}">Edit</x-button>
            {{-- <x-button class="danger" rout="#">Delete</x-button> --}}

            <form id="delete-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" style="display: none;" method="POST">
              @csrf
              @method('DELETE')
             </form>
             
             <a class="btn btn-danger"href="#" onclick="if (confirm('Are you sure want to delete this item?')) {
                        event.preventDefault();
                        document.getElementById('delete-{{$post->id}}').submit();
                      }else{
                        event.preventDefault();
                      }">
               
             Delete</a>
    
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <script>
    function contest(){
    var result = confirm("Want to delete?");
    if (result) {
      route('posts.destroy',['post' => $post->id]); 
    }
  }
  </script>

@endsection