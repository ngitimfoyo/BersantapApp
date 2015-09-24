@extends('app') @section('content')

<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Update : Client Type > {!! $type->name !!}</h1>
		</div>

		{!! Form::model($type, ['method' => 'PATCH', 'action' =>
		['ClientTypeController@update', $type->id]]) !!}
		<div class="form-group">{!! Form::label('name', 'Client Type name : ')
			!!} {!! Form::text('name', null, ['class' => 'form-control']) !!}</div>

		<div class="form-group">{!! Form::submit('Update Client Type ',
			['class' => 'btn btn-primary form-control']) !!}</div>
		{!! Form::close() !!} @include('errors.list')

	</div>
</div>
</div>

@stop
