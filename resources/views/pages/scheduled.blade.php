@extends('layouts.front')

@section('title', 'Scheduled')

@section('content')

<!-- <div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Melbourne Server</h3>
			  </div>
			  <div class="panel-body">
			Resolved Events</div>
			</div>
		</div>
	</div>
</div> -->



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Scheduled</h3>
			  </div>
			  	<div class="panel-body">
			  		@foreach($events as $event)
			  				{{$event->status}} - {{$event->title}} - {{$event->last_updated}}<br>
			  		@endforeach
			  	</div>
			</div>
		</div>
	</div>
</div>

@endsection