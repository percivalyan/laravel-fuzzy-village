@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Harga</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Harga ID: {{ $harga->id }}</h6>
        </div>
        <div class="card-body">
            <p><strong>Nomor Lahan:</strong> {{ $harga->lahan->nomor_lahan ?? '-' }}</p>
            <p><strong>Harga per Hektar:</strong> {{ $harga->harga_per_hektar }}</p>
            <p><strong>Luas per Hektar:</strong> {{ $harga->luas_per_hektar }}</p>
            <p><strong>Harga Sebenarnya:</strong> {{ $harga->harga_sebenarnya }}</p>
            <p><strong>Nilai Fuzzy:</strong> {{ $nilai_fuzzy }}</p>
            <p><strong>Nilai Crisp:</strong> {{ $nilai_crisp }}</p>
            <p><strong>Kesimpulan Nilai Fuzzy:</strong> {{ $kesimpulan_nilai_fuzzy }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('harga.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
