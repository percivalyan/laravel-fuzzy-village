@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Harga</h1>

    <a href="{{ route('harga.create') }}" class="btn btn-primary mb-4">Tambah Harga</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Harga</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Nomor Lahan</th>
                            <th>Harga per Hektar</th>
                            <th>Luas per Hektar</th>
                            <th>Harga Sebenarnya</th>
                            <th>Nilai Fuzzy</th>
                            <th>Kesimpulan Nilai Fuzzy</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hargas as $harga)
                        <tr>
                            <td>{{ $harga->id }}</td>
                            <td>{{ $harga->lahan->nomor_lahan ?? '-' }}</td>
                            <td>{{ $harga->harga_per_hektar }}</td>
                            <td>{{ $harga->luas_per_hektar }}</td>
                            <td>{{ $harga->harga_sebenarnya }}</td>
                            <td>{{ $harga->nilai_fuzzy }}</td>
                            <td>{{ $harga->kesimpulan_nilai_fuzzy }}</td>
                            <td class="text-center">
                                <a href="{{ route('harga.show', $harga->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('harga.edit', $harga->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('harga.destroy', $harga->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
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
