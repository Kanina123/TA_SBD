@extends('admin.layout')

@section('content')

<h4 class="mt-5">Search Data</h4>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<div>
    <div class="mx-auto pull-right">
        <div class="">
            <form action="{{ route('admin.search') }}" method="GET" role="search">
                <div class="input-group">
                    <input type="text" class="form-control mr-2" name="term" placeholder="Search for Game" id="term">
                    <span class="input-group-btn mr-5 mt-1">
                        <button class="btn btn-info" type="submit" title="Search Data">
                            Search
                        </button>
                    </span>
                    <a href="{{ route('admin.search') }}" class=" mt-1">
                        <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="Refresh page">
                                Reset
                            </button>
                        </span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Tahun Release</th>
        <th>Platform</th>
        <th>Publisher</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->release_year }}</td>
                <td>{{ $data->platform_name }}</td>
                <td>{{ $data->publisher_name }}</td>
            </tr> 
        @endforeach 
    </tbody> 
</table> 
@stop