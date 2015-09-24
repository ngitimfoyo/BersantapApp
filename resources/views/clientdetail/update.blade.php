@extends('app') @section('content')

<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Update : Client Detail > {!! $clientdetail->name !!}</h1>
		</div>

		{!! Form::model($clientdetail, ['method' => 'PATCH', 'action' =>
		['ClientDetailController@update', $clientdetail->id]]) !!}
		<div class="form-group">{!! Form::label('name', 'Client name : ') !!}
			{!! Form::text('name', null, ['class' => 'form-control']) !!}</div>

		<div class="form-group">{!! Form::label('latitude', 'Latitude : ') !!}
			{!! Form::text('latitude', null, ['class' => 'form-control']) !!}</div>

		<div class="form-group">{!! Form::label('longitude', 'Longitude : ')
			!!} {!! Form::text('longitude', null, ['class' => 'form-control'])
			!!}</div>

		<div class="form-group">{!! Form::label('type', 'Type : ') !!} {!!
			Form::select('type_id', $types, $clientdetail->type()->where('id',
			$clientdetail->type_id)->first()->id , ['class' => 'form-control'])
			!!}</div>

		<div class="form-group">{!! Form::label('status', 'Status : ') !!} {!!
			Form::select('status_id', $statuses, null, ['class' =>
			'form-control']) !!}</div>

		<div class="form-group">{!! Form::submit('Update Client Detail ',
			['class' => 'btn btn-primary form-control']) !!}</div>
		{!! Form::close() !!} @include('errors.list')
	
		@include('map')
		
	</div>
</div>


@stop
