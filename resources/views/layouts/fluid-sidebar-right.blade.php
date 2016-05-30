<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="sidebar-right-layout">
	<header id="page-header" class="row">
		@include('partials.header')
	</header>

	<div class="container-fluid">
		<div id="main" class="row" >
			<div class="col-md-8">
				@yield('content')
			</div>
			<div class="col-md-4">
				@include('partials.sidebar')
			</div>
		</div>
	</div>

	<footer id="page-footer" class="row">
		@include('partials.footer')	
	</footer>
  
  @include('partials.scripts')
</body>
</html>