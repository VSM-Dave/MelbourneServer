<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') &mdash; Melbourne Server</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/admin.css') }}">
	<script src="{{ URL::asset('assets/js/all.js') }}" ></script>
</head>
<body>
<nav class="navbar navbar-static-top navbar-inverse">
<div class="container">
	<div class="navbar-header"><a href="/" class="navbar-brand">Melbourne Server</a></div>
	<ul class="nav navbar-nav">
		<li><a href="{{ route('admin.events.index') }}">Events</a></li>
		<li><a href="{{ route('admin.comments.index') }}">Comments</a></li>
		
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><span class="navbar-text">Hello, {{ $admin->name }}</span></li>
		<li><a href="{{ route('auth.logout') }}">Logout</a></li>
	</ul>
</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>@yield('title')</h3>
			@if($errors->any())
					<div class="alert alert-danger">
						<strong>We found some errors!</strong>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>

							@endforeach
						</ul>
					</div>

			@endif

			@if($status)

					<div class="alert alert-info">
					{{ $status }}
					</div>

				@endif


				
			@yield('content')
		</div>
	</div>
</div>

</body>
</html>