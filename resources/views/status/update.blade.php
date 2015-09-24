@extends('app') @section('content')

<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Update : Status> {!! $status->name !!}</h1>
		</div>

		{!! Form::model($status, ['method' => 'PATCH', 'action' =>
		['StatusController@update', $status->id]]) !!}
		<div class="form-group">{!! Form::label('name', 'Status name : ') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}</div>

		<div class="form-group">{!! Form::submit('Update Status', ['class' =>
			'btn btn-primary form-control']) !!}</div>
		{!! Form::close() !!} @include('errors.list')

	</div>
</div>
</div>

@stop
