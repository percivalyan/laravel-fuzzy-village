@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Periode</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $periode->id }}</p>
            <p><strong>Lahan:</strong> {{ $periode->lahan->pemilik ?? 'N/A' }}</p>
            <p><strong>Nama Tim Penggarap:</strong> {{ $periode->nama_tim_penggarap }}</p>
            <p><strong>Jumlah Penggarap:</strong> {{ $periode->jumlah_penggarap }}</p>
            <p><strong>Nama Penggarap:</strong> {{ $periode->nama_penggarap }}</p>
            <p><strong>Tanggal Pengerjaan Sawah Awal:</strong> {{ $periode->tanggal_pengerjaan_sawah_awal }}</p>
            <p><strong>Tanggal Pengerjaan Sawah Akhir:</strong> {{ $periode->tanggal_pengerjaan_sawah_akhir }}</p>
            <p><strong>Penyewa:</strong> {{ $periode->penyewa }}</p>
            <p><strong>Harga Sewa Lahan:</strong> {{ $periode->harga_sewa_lahan }}</p>
            <p><strong>Harga Pupuk:</strong> {{ $periode->harga_pupuk }}</p>
            <p><strong>Harga Irigasi:</strong> {{ $periode->harga_irigasi }}</p>
            <p><strong>Jumlah Panen:</strong> {{ $periode->jumlah_panen }}</p>
            <p><strong>Gaji Penggarap Per Orang:</strong> {{ $periode->gaji_penggarap_per_orang }}</p>
            <p><strong>Keterangan:</strong> {{ $periode->keterangan }}</p>
        </div>
    </div>

    <a href="{{ route('periode.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
