@extends('layouts.front')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">Melbourne Server</h3>
			  </div>
			  <div class="panel-body">
			Any information regarding active issues or planned maintenance will be made available here.  </div>
			</div>
		</div>
	</div>
</div>



<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-danger">
			  <div class="panel-heading">
			    <h3 class="panel-title">Active</h3>
			  </div>
			  	<div class="panel-body">
			  		@foreach($events as $event)
			  			@if ($event->is_active)
			  			<a href="{{route('pages.event', $event->id)}}">
			  				{{$event->status}} - {{$event->title}}</a> <br>
			  			@endif
			  		@endforeach
			  	</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Scheduled</h3>
			  </div>
			  <div class="panel-body">
			  	@foreach($events as $event)
			  			@if ($event->is_scheduled && !$event->is_resolved)
			  				{{$event->status}} - {{$event->title}}<br>
			  			@endif
			  		@endforeach
			  </div>
			</div>
		</div>
	</div>
</div>

@endsection