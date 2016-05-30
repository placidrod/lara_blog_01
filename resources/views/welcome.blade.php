@extends('layouts.default')

@section('title', 'All Posts')

@section('content')

<div class="container">
  <h1>All Posts</h1>
  @if(count($posts))
    @foreach($posts as $post)
      <h3>{{$post->title}}</h3>
      <h5>by {{ $post->user->name }}</h5>
      <div>
        {{$post->body}}
        <div>
          <a href="{{ route('posts.show', $post->slug) }}" class="text-primary"><strong>Read more</strong></a>
          @can('update-post', $post)
              <a href="{{ route('posts.edit', $post->id) }}" class="text-warning"><strong>Edit</strong></a>
          @endcan
          @can('delete-post', $post)
          <form action="{{ route('posts.destroy', $post->id) }}" class="form-inline form-inline-with-single-button form-delete-record" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn-link btn-delete-record"><strong class="text-danger">Delete</strong></button>
          </form>          
          @endcan          
        </div>
      </div>
    @endforeach
  @else
    <h3>Sorry. No posts here !!</h3>
  @endif
</div>

@endsection