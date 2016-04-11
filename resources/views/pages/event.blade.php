@extends('layouts.event')

@section('title', $event->title)

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default event-panel">
				<div class="panel-heading">
					<h4>{{$event->title}}</h4>
					@if ($event->is_resolved)
					<span class="label label-success">Resolved</span>
					@elseif ($event->is_scheduled)
					<span class="label label-primary">Scheduled</span>
					@elseif ($event->status == 'Critical')
					<span class="label label-danger">Critical</span>
					@elseif ($event->status == 'Intermitant')
					<span class="label label-warning">Intermitant</span>
					@endif
				</div>
					
				<div class="panel-body">
					@if ($event->is_scheduled)
					<p class="small">Event Scheduled for <strong>{{$event->scheduled_date}}</strong></p>
					@elseif ($event->is_active)
					<p class="small">Event Occured <strong>{{$event->date_created}}</strong></p>
					@elseif ($event->is_resolved)
					<p class="small">Resolved <strong>{{$event->last_updated}}</strong></p>
					@endif
					<p class="small">Last Updated <strong>{{$event->last_updated}}</strong></p>
					<p>{{$event->description}}</p>
					@if ($event->has_comments)
					<div class="panel panel-default "> 
						<div class="panel-heading">
							<h5>Comments</h5>
						</div>
						<div class="panel-body panel-comments">
							@foreach ($event->comments as $comment)
								<p>{{$comment->content}}</p>
								<p class="small">Added {{$comment->updated_at}}</p>
								<hr>
							@endforeach
						</div>
						
					</div>
					@endif
				</div>

			
			</div>
		</div>
	</div>
</div>
@endsection