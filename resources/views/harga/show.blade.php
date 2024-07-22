@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Detail Harga</h1>
        <a href="{{ route('harga.index') }}" class="btn btn-primary mb-4">Kembali ke Daftar Harga</a>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data Harga</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $harga->id }}</td>
                    </tr>
                    <tr>
                        <th>Harga per Hektar</th>
                        <td>{{ number_format($harga->harga_per_hektar, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Luas per Hektar</th>
                        <td>{{ number_format($harga->luas_per_hektar, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Harga Sebenarnya</th>
                        <td>{{ number_format($harga->harga_sebenarnya, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Fuzzy</th>
                        <td>{{ number_format($nilai_fuzzy, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Crisp</th>
                        <td>{{ number_format($nilai_crisp, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Kesimpulan Nilai Fuzzy</th>
                        <td>{{ $kesimpulan_nilai_fuzzy }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
