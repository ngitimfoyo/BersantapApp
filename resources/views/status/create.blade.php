@extends('app') @section('content')
<h1>Create : Status</h1>

{!! Form::open(['url' => 'manage/status']) !!}
<div class="form-group">{!! Form::label('name', 'Status name : ') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}</div>

<div class="form-group">{!! Form::submit('Add Status', ['class' => 'btn
	btn-primary form-control']) !!}</div>
{!! Form::close() !!} @include('errors.list') @stop
