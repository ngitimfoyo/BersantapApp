@extends('app') @section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>
				<div id="kotak-peta"></div>

				<div class="panel-body">
					Cari lokasi : <input type="text" id="text-cari"
						class="form-control" />
					<div class="teks"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
