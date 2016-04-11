@extends('layouts.front')

@section('title', 'Resolved Events')

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
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-success">
			  <div class="panel-heading">
			    <h3 class="panel-title">Resolved</h3>
			  </div>
			  	<div class="panel-body">
			  		@foreach($events as $event)
			  		<a href="{{route('pages.event', $event->id)}}"><div class="well well-sm">
			  		<h4>{{$event->title}}</h4>
			  		<p class="small">Resolved at <strong>{{$event->last_updated}}</strong></p> 
			  		<p class="small">{{$event->comments->count()}} comments</p>

			  		</div></a>
			  		@endforeach
			  	</div>
			</div>
		</div>
	</div>
</div>
{!! $events->render() !!}
@endsection