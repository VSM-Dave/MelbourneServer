@extends('layouts.admin')

@section('title', $comment->exists ? 'Editing Comment' : 'Create New Comment')

@section('content')

{!! Form::model($comment, [
	'method' => $comment->exists ? 'put' : 'post',
	'route'	=> 	$comment->exists ? ['admin.comments.update', $comment->id] : ['admin.comments.store']
	]) !!}
{!! Form::hidden('user_id', Auth::user()->id) !!}
<div class="form-group">
		{!! Form::label('content') !!}
		{!! Form::text('content', null, ['class' => 'form-control']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('status') !!}
		{!! Form::select('status', array('Critical' => 'Critical', 'Intermitant' => 'Intermitant', 'Resolved' => 'Resolved'), $comment->exists ? $comment->event->status : 'critical', ['class' => 'form-control']) !!}
	</div>

	@if ($comment->exists)
	{!! Form::hidden('post_id', $comment->post_id) !!}
	
	@else
		<div class="form-group">
		  {!! Form::Label('event', 'Event:') !!}
		  <select class="form-control" name="post_id">
		    @foreach($events as $event)
		      <option value="{{$event->id}}" 
		      @if ($event->id == $event_id)
		      selected
		      @endif
		      >{{$event->status}} - {{$event->title}}</option>
		    @endforeach
		  </select>
		</div>
	@endif
	{!! Form::submit($comment->exists ? 'Save Comment' : 'Create New Comments', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}


@endsection