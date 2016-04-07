@extends('layouts.admin')

@section('title', 'Delete ' . $event->title)

@section('content')
	{!! Form::open(['method' => 'delete', 'route' => ['admin.events.destroy', $event->id]]) !!}
		<div class="alert alert-danger">
			<strong>Warning!</strong> You are about to delete an event. This action can't be undone. Are you sure you want to continue?
		</div>

		{!! Form::submit('Yes, delete this event!', ['class' => 'btn btn-danger']) !!}

		<a href="{{ route('admin.events.index') }}" class="btn btn-success">
			<strong>No! Get me out of here!</strong>
		</a>

	{!! Form::close() !!}
@endsection