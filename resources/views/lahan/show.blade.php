@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Lahan Details</h1>
    <a href="{{ route('lahan.index') }}" class="btn btn-secondary mb-4">Back to List</a>
    <a href="{{ route('lahan.edit', $lahan->id) }}" class="btn btn-warning mb-4">Edit</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lahan Details</h6>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Status Lahan</label>
                <p>{{ $lahan->status_lahan }}</p>
            </div>
            <div class="form-group">
                <label>Nomor Lahan</label>
                <p>{{ $lahan->nomor_lahan }}</p>
            </div>
            <div class="form-group">
                <label>Pemilik</label>
                <p>{{ $lahan->pemilik }}</p>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <p>{{ $lahan->lokasi }}</p>
            </div>
            <div class="form-group">
                <label>Koordinat</label>
                <p>{{ $lahan->koordinat }}</p>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <p>{{ $lahan->keterangan }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
