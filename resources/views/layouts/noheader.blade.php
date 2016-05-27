<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="default-layout">
	
	<div id="main" class="row" >
		<div class="col-md-12">
			@yield('content')
		</div>
	</div>

	<footer id="page-footer" class="row">
		@include('partials.footer')	
	</footer>

  @include('partials.scripts')
</body>
</html>