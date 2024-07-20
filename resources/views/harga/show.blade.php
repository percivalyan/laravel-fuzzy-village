@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Harga</h1>
        <table class="table">
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
        <a href="{{ route('harga.index') }}" class="btn btn-primary">Kembali ke Daftar Harga</a>
    </div>
@endsection
