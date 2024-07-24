@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Periode</h1>
    <a href="{{ route('periode.create') }}" class="btn btn-primary mb-4">Tambah Periode</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Periode</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Lahan</th>
                            <th>Nama Tim Penggarap</th>
                            <th>Jumlah Penggarap</th>
                            <th>Nama Penggarap</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($periodes as $periode)
                        <tr>
                            <td>{{ $periode->id }}</td>
                            <td>{{ $periode->lahan->pemilik ?? 'N/A' }}</td>
                            <td>{{ $periode->nama_tim_penggarap }}</td>
                            <td>{{ $periode->jumlah_penggarap }}</td>
                            <td>{{ $periode->nama_penggarap }}</td>
                            <td>{{ $periode->tanggal_pengerjaan_sawah_awal }}</td>
                            <td>{{ $periode->tanggal_pengerjaan_sawah_akhir }}</td>
                            <td class="text-center">
                                <a href="{{ route('periode.show', $periode->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('periode.edit', $periode->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('periode.destroy', $periode->id) }}" method="POST" style="display:inline-block;">
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
