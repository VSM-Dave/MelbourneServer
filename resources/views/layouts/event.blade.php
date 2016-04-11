<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title') &mdash; Melbourne Server</title>

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/front.css') }}">
</head>
<body>

<nav class="navbar navbar-static-top navbar-inverse">
<div class="container">
	<div class="navbar-header"><a href="/" class="navbar-brand">Melbourne Server</a></div>
	<ul class="nav navbar-nav">
		<li><a href="{{ route('pages.index') }}">All</a></li>
		<li><a href="{{ route('pages.scheduled') }}">Scheduled</a></li>
		<li><a href="{{ route('pages.resolved') }}">Resolved</a></li>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li><a href="{{ route('auth.login') }}">Admin Area</a></li>
	</ul>
</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			@yield('content')
		</div>
	</div>
</div>

</body>
</html>