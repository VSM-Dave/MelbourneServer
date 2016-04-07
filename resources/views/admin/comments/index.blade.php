@extends('layouts.admin')

@section('title', 'Comments')

@section('content')
<a href="{{ route('admin.comments.create') }}" class="btn btn-primary">Create New Comment</a>
<table class="table table-hover">
	<thead>
		<tr>
			<th>Content</th>
			<th>Post ID</th>
			<th>Post Title</th>
			<th>Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	@if($comments->isEmpty())
		<tr>
			<td colspan="5" align="center">There are no comments.</td>
		</tr>
	@else
		@foreach($comments as $comment)
			<tr>
				<td>
					<a href="{{ route('admin.comments.edit', $comment->id) }}">{{ $comment->content }}</a>
				</td>
				
				<td>{{ $comment->event->id }}</td>
				<td>{{ $comment->event->title }}</td>
				<td><span class="label 
				@if ($comment->event->status == 'Critical')
					label-danger"
				@elseif ($comment->event->status == 'Intermitant')
					label-warning"
				@elseif ($comment->event->status == 'Resolved')
					label-success"
				@endif
				>
						{{ $comment->event->status }}
					</span>
				</td>
				<td>
					<a href="{{ route('admin.comments.edit', $comment->id) }}">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
				</td>
				<td>
					<a href="{{ route('admin.comments.confirm', $comment->id) }}">
						<span class="glyphicon glyphicon-remove"></span>
					</a>
				</td>
			</tr>
		@endforeach
	@endif
	</tbody>
</table>
{!! $comments->render() !!}

@endsection