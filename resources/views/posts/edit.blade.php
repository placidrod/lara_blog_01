@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')

<div class="container-fluid">
  <h1>Edit Post</h1>
  @include('common.form-errors')
  <form action="{{ route('posts.update', [$post->id]) }}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <label for="title">Post Title</label>
          <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class="">Categories</label>
          <div id="category-select-div">
            @if(count($categories))
              @foreach($categories as $category)
                <div class="checkbox category-select-checkbox">
                  <label class="sub-label">
                    <input 
                      type="checkbox" 
                      value="{{ $category->id }}" 
                      name="categories[]" 
                      @if(in_array($category->id, $post->getCategoryIds()->toArray())) checked @endif>
                      {{ $category->title }}
                  </label>
                </div>           
              @endforeach
            @endif
          </div>
        </div>
        
        <div class="form-group">
          <label for="" class="sub-label">Add New Category</label>
          <input type="text" class="form-control input-sm" id="new-category">
        </div>
        <div class="form-group">
          <button class="btn btn-default btn-sm" id="add-new-category-button" data-token="{{ csrf_token() }}">Add New Category</button>
        </div>

        <div class="form-group">
          <label for="body">Publish Status</label>
          <select name="publish_status" id="publish_status" class="form-control">
            <option value="">Select</option>
            @can('publish-post')
            <option value="published" @if($post->publish_status == "published") selected @endif>Publish</option>
            @endcan
            <option value="pending-review" @if($post->publish_status == "pending-review") selected @endif>Pending Review</option>
            <option value="draft" @if($post->publish_status == "draft") selected @endif>Draft</option>
          </select>
        </div>
        @can('publish-post')
        <div class="form-group">
          <label for="published_at">Publish Date</label>
          <input type="date" name="published_at" id="published_at" class="form-control" value="{{ $post->published_at }}">
        </div>
        @endcan
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div> <!-- /col-md-4 -->
    </div> <!-- /row -->
  </form>
</div>

@endsection