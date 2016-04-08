@extends('layouts.admin')

@section('title', 'Events')

@section('content')
<a href="{{ route('admin.events.create') }}" class="btn btn-primary">Create New Event</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Title</th>
			<th>Description</th>
			<th>Status</th>
			<th>Sheduled</th>
			<th>Last Update</th>
			<th>Add Comment</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	@if($events->isEmpty())
		<tr>
			<td colspan="5" align="center">There are no pages.</td>
		</tr>
	@else
		@foreach($events as $event)
			<tr>
				<td>
				@if ($event->is_active)
				<span class="label label-info">Active</span>
				@endif
					<a href="{{ route('admin.events.edit', $event->id) }}">{{ $event->title }}</a>
				</td>
				
				<td>{{ $event->description }}</td>
				<td><span class="label 
				@if ($event->status == 'Critical')
					label-danger"
				@elseif ($event->status == 'Intermitant')
					label-warning"
				@elseif ($event->status == 'Resolved')
					label-success"
				@endif
				>
						{{ $event->status }}
					</span>
				</td>
				<td>@if ($event->is_scheduled)
				<span class="label label-primary">Scheduled</span><br>
				@endif
				<span class="small">{{ $event->scheduled_date }}</span>
				</td>
				<td>{{ $event->last_updated }}
				</td>
				<td><a href="{{ route('admin.events.comment.create', $event->id) }}" class="btn btn-info" >Add Comment</a>
				</td>
				<td>
					<a href="{{ route('admin.events.edit', $event->id) }}">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a href="{{ route('admin.events.confirm', $event->id) }}">
						<span class="glyphicon glyphicon-remove"></span>
					</a>
				</td>
			</tr>
		@endforeach
	@endif
	</tbody>
</table>
{!! $events->render() !!}

@endsection