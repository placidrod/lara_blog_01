<h3>Categories</h3>
@foreach($categories as $cat)
  <li><a href="/categories/{{ $cat->slug }}">{{ $cat->title }}</a></li>
@endforeach