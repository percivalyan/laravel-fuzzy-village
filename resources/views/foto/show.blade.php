@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Show Foto</h1>
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Foto Details</h5>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $foto->id }}</p>
            <p><strong>Lahan ID:</strong> {{ $foto->lahan_id }}</p>

            @if($foto->foto_1)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $foto->foto_1) }}" alt="Foto 1" class="img-fluid">
                <p><strong>Keterangan 1:</strong> {{ $foto->keterangan_1 }}</p>
            </div>
            @endif

            @if($foto->foto_2)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $foto->foto_2) }}" alt="Foto 2" class="img-fluid">
                <p><strong>Keterangan 2:</strong> {{ $foto->keterangan_2 }}</p>
            </div>
            @endif

            @if($foto->foto_3)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $foto->foto_3) }}" alt="Foto 3" class="img-fluid">
                <p><strong>Keterangan 3:</strong> {{ $foto->keterangan_3 }}</p>
            </div>
            @endif

            @if($foto->foto_4)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $foto->foto_4) }}" alt="Foto 4" class="img-fluid">
                <p><strong>Keterangan 4:</strong> {{ $foto->keterangan_4 }}</p>
            </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('foto.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
