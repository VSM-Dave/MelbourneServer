@extends('layouts.front')

@section('title', 'Scheduled Events')

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
			<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Scheduled</h3>
			  </div>
			  	<div class="panel-body">
			  	@foreach($events as $event)
			  		<a href="{{route('pages.event', $event->id)}}"><div class="well well-sm">
			  		<h4>
			  		<span class="label 
									@if ($event->status == 'Critical')
										label-danger"
									@elseif ($event->status == 'Intermitant')
										label-warning"
									@elseif ($event->status == 'Resolved')
										label-success"
									@endif
									>{{ $event->status }}
									</span>{{$event->title}}</h4>
			  		<p class="small">Scheduled for <strong>{{$event->scheduled_for}}</strong></p> 
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