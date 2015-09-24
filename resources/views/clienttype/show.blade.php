@extends('app') @section('content')

<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>List : Client Type</h1>
		</div>

		@if ($types)
		<table class="table table-hover">
			<tr>
				<th>No</th>
				<th>Name</th>
			</tr>

			@foreach ($types as $index=>$type)
			<tr>
				<td>{{ $index + 1 }}</td>
				<td><a href='/manage/clienttype/{{ $type->id }}/edit'> {{
						$type->name }} </a></td>
			</tr>
			@endforeach
		</table>
		@endif <a href='/manage/clienttype/create'>Add New Client Type</a>

	</div>
</div>
</div>

@stop
