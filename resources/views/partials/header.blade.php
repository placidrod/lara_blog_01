<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Placid's Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->

        @if(auth()->guest())
        <li><a href="{{ route('posts.index') }}">All Posts</a></li>
        @endif

        @can('author-post')
        <li><a href="{{ route('posts.admin-index') }}">All Posts</a></li>
        <li><a href="{{ route('posts.create') }}">Create Post</a></li>
        @endcan

        @can('publish-post')
        <li><a href="{{ route('posts.unpublished-posts') }}">Posts Pending Reveiew</a></li>
        @endcan
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('project-details') }}">Project Details</a></li>
        @can('manage-users')
        <li><a href="{{ url('users') }}">Manage Users</a></li>
        @endcan
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>