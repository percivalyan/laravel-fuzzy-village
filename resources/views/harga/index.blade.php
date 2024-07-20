@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Harga</h1>
        <a href="{{ route('harga.create') }}" class="btn btn-primary">Tambah Harga Baru</a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
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
                            <form action="{{ route('harga.destroy', $harga->id) }}" method="POST" style="display:inline;">
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
@endsection
