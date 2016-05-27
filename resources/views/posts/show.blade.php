@extends('layouts.default')

@section('title', $post->title)

@section('content')

<div class="container">
  <h1>{{ $post->title }}</h1>
  <div>
    {{ $post->body }}
  </div>
</div>

@endsection