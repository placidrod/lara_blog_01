@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')

<div class="container">
  <h1>Edit Post</h1>
  @include('common.form-errors')
  <form action="{{ route('posts.update', [$post->id]) }}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection