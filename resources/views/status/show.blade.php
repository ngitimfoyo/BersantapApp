@extends('app') @section('content')

<div class="col-md-10 col-md-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>List : Status</h1>
		</div>

		@if ($statuses)
		<table class="table table-hover">
			<tr>
				<th>No</th>
				<th>Name</th>
			</tr>

			@foreach ($statuses as $index=>$status)
			<tr>
				<td>{{ $index + 1 }}</td>
				<td><a href='/manage/status/{{ $status->id }}/edit'> {{
						$status->name }} </a></td>
			</tr>
			@endforeach
		</table>
		@endif <a href="/manage/status/create">Add New Status</a>

	</div>
</div>
</div>

@stop
