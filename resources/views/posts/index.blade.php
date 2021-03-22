@extends('layouts.app')

@section('title') posts @endsection

@section('content1')
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
        <td>{{ $post->created_at ? Carbon\Carbon::parse($post->created_at)->isoFormat('Y-M-D') : "No Date" }}</td>
        <td>


          @if ($post->trashed())
            <a class="btn btn-primary" href="{{ route('posts.restore',['post' => $post->id]) }}" id="{{ $post->id }}">Restore</a>
          @else

          <x-button class="info" rout="{{ route('posts.show',['post' => $post->id]) }}">View</x-button>
          <x-button class="primary" rout="{{ route('posts.edit',['post' => $post->id]) }}">Edit</x-button>
          <form id="delete-{{$post->id}}" action="{{route('posts.destroy',$post->id)}}" style="display: none;" method="POST">
            @csrf
            @method('DELETE')
           </form>
           
           <a class="btn btn-danger"href="#" onclick="if (confirm('Are you sure want to delete this item?')) {
                      event.preventDefault();
                      document.getElementById('delete-{{$post->id}}').submit();
                      console.log('del');
                    }else{
                      event.preventDefault();
                    }">
             
           Delete</a>
          @endif
            {{-- <x-button class="danger" rout="#">Delete</x-button> --}}

           
    
        </td>
      </tr>
      @endforeach
    </tbody>
   
  </table>
  {{-- {{$posts->links("pagination::bootstrap-4")}} --}}
  {{-- another solution --}}
  {!! $posts->links() !!}





@endsection