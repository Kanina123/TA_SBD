@extends('admin.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Platform</h5>

		<form method="post" action="{{ route('admin.store2') }}">
			@csrf
            <div class="mb-3">
                <label for="platform_id" class="form-label">ID Platform</label>
                <input type="text" class="form-control" id="platform_id" name="platform_id">
            </div>
			<div class="mb-3">
                <label for="name" class="form-label">Nama Platform</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="support" class="form-label">Support? (YES/NO)</label>
                <input type="text" class="form-control" id="support" name="support">
            </div>
            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop