@extends('layouts.admin')

@section('title', 'Delete Comment')

@section('content')
	{!! Form::open(['method' => 'delete', 'route' => ['admin.comments.destroy', $comment->id]]) !!}
		<div class="alert alert-danger">
			<strong>Warning!</strong> You are about to delete a comment. This action can't be undone. Are you sure you want to continue?
		</div>

		{!! Form::submit('Yes, delete this comment!', ['class' => 'btn btn-danger']) !!}

		<a href="{{ route('admin.comments.index') }}" class="btn btn-success">
			<strong>No! Get me out of here!</strong>
		</a>

	{!! Form::close() !!}
@endsection