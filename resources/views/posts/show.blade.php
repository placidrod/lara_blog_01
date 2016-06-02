@extends('layouts.sidebar-right')

@section('title', $post->title)

@section('content')

<div class="">
  <h1>{{ $post->title }}</h1>
  <h4>by {{ $post->user->name }}</h4>
  <div>
    {{ $post->body }}
  </div>
</div>

@endsection