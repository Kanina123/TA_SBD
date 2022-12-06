@extends('admin.layout')

@section('content')

<h4 class="mt-5">Recycle Bin Platform</h4>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Support</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->platform_id }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->support }}</td>
                <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#restoreModal{{ $data->platform_id }}">
                        Restore
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="restoreModal{{ $data->platform_id }}" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="restoreModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('admin.restore2', $data->platform_id) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin men-restore data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modalper fade" id="hapusPerModal{{ $data->platform_id }}" tabindex="-1" aria-labelledby="hapusModalPerLabel" aria-hidden="true">
                        <div class="modalper-dialog">
                            <div class="modalper-content">
                                <div class="modalper-header">
                                    <h5 class="modalper-title" id="hapusModalPerLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modalper" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('admin.restore2', $data->platform_id) }}">
                                    @csrf
                                    <div class="modalper-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modalper-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modalper">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </td> 
            </tr> 
        @endforeach 
    </tbody> 
</table> 
@stop