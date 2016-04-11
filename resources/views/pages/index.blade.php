@extends('layouts.front')

@section('title', 'Server Events')

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
				  			<div class="well well-sm">
					  			<h4><span class="label 
									@if ($event->status == 'Critical')
										label-danger"
									@elseif ($event->status == 'Intermitant')
										label-warning"
									@elseif ($event->status == 'Resolved')
										label-success"
									@endif
									>{{ $event->status }}
									</span>{{$event->title}}
								</h4>
				  				<p class="small">Event Occured <strong>{{$event->date_created}}</strong></p>
				  				<p class="small">Last Updated <strong>{{$event->last_updated}}</strong></p>
				  				<p class="small">{{$event->comments->count()}} comments</p>
				  			</div>
			  		 	</a>
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
			  			<a href="{{route('pages.event', $event->id)}}">
				  			<div class="well well-sm">
				  				<h4><span class="label 
									@if ($event->status == 'Critical')
										label-danger"
									@elseif ($event->status == 'Intermitant')
										label-warning"
									@elseif ($event->status == 'Resolved')
										label-success"
									@endif
									>{{ $event->status }}
									</span>{{$event->title}}
								</h4>
								<p class="small">Scheduled For <strong>{{$event->scheduled_date}}</strong></p>
								<p class="small">{{$event->comments->count()}} comments</p>
				  			</div>
				  		</a>
			  			@endif
			  		@endforeach
			  </div>
			</div>
		</div>
	</div>
</div>

@endsection