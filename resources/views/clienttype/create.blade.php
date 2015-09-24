@extends('app') @section('content')
<h1>Create : Client Type</h1>

{!! Form::open(['url' => 'manage/clienttype']) !!}
<div class="form-group">{!! Form::label('name', 'Client Type name : ')
	!!} {!! Form::text('name', null, ['class' => 'form-control']) !!}</div>

<div class="form-group">{!! Form::submit('Add Client Type ', ['class' =>
	'btn btn-primary form-control']) !!}</div>
{!! Form::close() !!} @include('errors.list') @stop
