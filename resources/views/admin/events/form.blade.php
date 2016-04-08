@extends('layouts.admin')

@section('title', $event->exists ? 'Editing ' . $event->title : 'Create New Event')

@section('content')

{!! Form::model($event, [
	'method' => $event->exists ? 'put' : 'post',
	'route'	=> 	$event->exists ? ['admin.events.update', $event->id] : ['admin.events.store']
	]) !!}

<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('description') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('status') !!}
		{!! Form::select('status', array('Critical' => 'Critical', 'Intermitant' => 'Intermitant', 'Resolved' => 'Resolved'), $event->exists ? $event->status : 'critical', ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('scheduled for') !!}
		{!! Form::text('scheduled_for', null, array('id' => 'datepicker')) !!}
	</div>

	{!! Form::submit($event->exists ? 'Save Event' : 'Create New Event', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}



<script>

$('#datepicker').datetimepicker({
	allowInputToggle: true,
	format: 'YYYY/MM/DD HH:mm:ss',
	defaultDate: '{{ old('scheduled_for', $event->scheduled_for) }}',
	widgetPositioning: {
		horizontal: 'right',
		vertical: 'bottom'
	}
});

// var d = new Date(),
//     output = [
//         d.getFullYear(),
//         ('0' + (d.getMonth() + 1)).substr(-2), 
//         ('0' + d.getDate()).substr(-2)
//     ].join('/');

// $('#datepicker').val(output);
// 	$('#datepicker').datetimepicker();
</script>
@endsection