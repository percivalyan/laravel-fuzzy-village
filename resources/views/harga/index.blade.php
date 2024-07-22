@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Daftar Harga</h1>
        <a href="{{ route('harga.create') }}" class="btn btn-primary mb-4">Tambah Harga Baru</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Harga</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Harga per Hektar</th>
                                <th>Luas per Hektar</th>
                                <th>Harga Sebenarnya</th>
                                <th>Kesimpulan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hargas as $harga)
                                <tr>
                                    <td>{{ $harga->id }}</td>
                                    <td>{{ number_format($harga->harga_per_hektar, 2) }}</td>
                                    <td>{{ number_format($harga->luas_per_hektar, 2) }}</td>
                                    <td>{{ number_format($harga->harga_sebenarnya, 2) }}</td>
                                    <td>{{ $harga->kesimpulan_nilai_fuzzy }}</td>
                                    <td>
                                        <a href="{{ route('harga.show', $harga->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('harga.edit', $harga->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('harga.destroy', $harga->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
