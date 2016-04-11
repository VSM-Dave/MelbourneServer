@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-danger">
		  <div class="panel-heading">
		    <h3 class="panel-title">Active</h3>
		  </div>
		  <div class="panel-body">
		  	<p>There are {{$active}} active events</p>
		  </div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-info">
		  <div class="panel-heading">
		    <h3 class="panel-title">Scheduled</h3>
		  </div>
		  <div class="panel-body">
		  	<p>There are {{$scheduled}} scheduled events</p>
		  </div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-success">
		  <div class="panel-heading">
		    <h3 class="panel-title">Resolved</h3>
		  </div>
		  <div class="panel-body">
		  	<p>There are {{$resolved}} resolved events</p>
		  </div>
		</div>
	</div>
</div>
@endsection