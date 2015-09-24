@extends('app') @section('content')

<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>List : Client Detail</h1>
		</div>

		@if ($clientdetail)
		<table class="table table-hover">
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Coordinate</th>
				<th>Type</th>
				<th>Status</th>
			</tr>

			@foreach ($clientdetail as $index=>$detail)
			<tr>
				<td>{{ $index + 1 }}</td>
				<td><a href='/manage/clientdetail/{{ $detail->id }}/edit'> {{
						$detail->name }} </a></td>
				<td>{{ $detail->latitude }}, {{ $detail->longitude }}</td>
				<td>{{ $detail->type()->where('id', $detail->type_id)->first()->name
					}}</td>
				<td>{{ $detail->status()->where('id',
					$detail->status_id)->first()->name }}</td>
			</tr>
			@endforeach
		</table>
		@endif <a href='/manage/clientdetail/create'>Add New Client Detail</a>

	</div>
</div>
</div>

@stop
