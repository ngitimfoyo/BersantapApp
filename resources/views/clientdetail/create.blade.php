@extends('app') @section('content')
<h1>Create : Client Detail</h1>

{!! Form::open(['url' => 'manage/clientdetail']) !!}
<div class="form-group">{!! Form::label('name', 'Client name : ') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}</div>

<div class="form-group">{!! Form::label('latitude', 'Latitude : ') !!}
	{!! Form::text('latitude', null, ['class' => 'form-control']) !!}</div>

<div class="form-group">{!! Form::label('longitude', 'Longitude : ') !!}
	{!! Form::text('longitude', null, ['class' => 'form-control']) !!}</div>

<div class="form-group">{!! Form::label('type', 'Type : ') !!} {!!
	Form::select('type_id', $types, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">{!! Form::label('status', 'Status : ') !!} {!!
	Form::select('status_id', $statuses, null, ['class' => 'form-control'])
	!!}</div>

<div class="form-group">{!! Form::submit('Add Client Detail ', ['class'
	=> 'btn btn-primary form-control']) !!}</div>
{!! Form::close() !!} 

@include('errors.list')

@include('map')

@stop
