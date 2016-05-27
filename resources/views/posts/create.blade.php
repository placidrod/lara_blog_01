@extends('layouts.default')

@section('title', 'Create new Post')

@section('content')

<div class="container">
  <h1>Create New Post</h1>
  @include('common.form-errors')
  <form action="{{ route('posts.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="title">Post Title</label>
      <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

@endsection