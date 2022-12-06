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

        <h5 class="card-title fw-bolder mb-3">Tambah Game</h5>

		<form method="post" action="{{ route('admin.store') }}">
			@csrf
            <div class="mb-3">
                <label for="game_id" class="form-label">ID Game</label>
                <input type="text" class="form-control" id="game_id" name="game_id">
            </div>
			<div class="mb-3">
                <label for="name" class="form-label">Nama Game</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="release_year" class="form-label">Tahun Keluar</label>
                <input type="text" class="form-control" id="release_year" name="release_year">
            </div>
            <div class="mb-3">
                <label for="FK_platform" class="form-label">FK Platform</label>
                <input type="text" class="form-control" id="FK_platform" name="FK_platform">
            </div>
            <div class="mb-3">
                <label for="FK_publisher" class="form-label">FK Publisher</label>
                <input type="text" class="form-control" id="FK_publisher" name="FK_publisher">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop