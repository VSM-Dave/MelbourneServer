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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="/">Melbourne Server</a>
    </div>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="nav navbar-nav">
        <li><a href="{{ route('pages.index') }}">All</a></li>
		<li><a href="{{ route('pages.scheduled') }}">Scheduled</a></li>
		<li><a href="{{ route('pages.resolved') }}">Resolved</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
      	<li><a href="{{ route('auth.login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
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