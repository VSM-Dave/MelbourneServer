@extends('layouts.front')

@section('title', $event->title)

@section('content')
{{$event->description}}
@endsection