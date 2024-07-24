@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Daftar Lahan</h1>
        <a href="{{ route('lahan.create') }}" class="btn btn-primary mb-4">Create New Lahan</a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Lahan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Status Lahan</th>
                                <th>Nomor Lahan</th>
                                <th>Pemilik</th>
                                <th>Lokasi</th>
                                <th>Koordinat</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lahans as $index => $lahan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $lahan->status_lahan }}</td>
                                    <td>{{ $lahan->nomor_lahan }}</td>
                                    <td>{{ $lahan->pemilik }}</td>
                                    <td>{{ $lahan->lokasi }}</td>
                                    <td>{{ $lahan->koordinat }}</td>
                                    <td>{{ $lahan->keterangan }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('lahan.show', $lahan->id) }}" class="btn btn-info btn-sm">Show</a>
                                        <a href="{{ route('lahan.edit', $lahan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('lahan.destroy', $lahan->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
