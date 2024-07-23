@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fotos</h1>
    <a href="{{ route('foto.create') }}" class="btn btn-primary mb-4">Create New Foto</a>
    <div class="row">
        @foreach ($fotos as $foto)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">ID: {{ $foto->id }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Pemilik:</strong> {{ $foto->lahan->pemilik }}</p>
                    <p><strong>Lokasi:</strong> {{ $foto->lahan->lokasi }}</p>
                    <div class="mb-3">
                        <a href="{{ asset('storage/' . $foto->foto_1) }}" data-lightbox="foto-{{ $foto->id }}" data-title="{{ $foto->keterangan_1 }}">
                            <img src="{{ asset('storage/' . $foto->foto_1) }}" alt="Image 1" class="img-fluid">
                        </a>
                        <p>{{ $foto->keterangan_1 }}</p>
                    </div>
                    <div class="mb-3">
                        <a href="{{ asset('storage/' . $foto->foto_2) }}" data-lightbox="foto-{{ $foto->id }}" data-title="{{ $foto->keterangan_2 }}">
                            <img src="{{ asset('storage/' . $foto->foto_2) }}" alt="Image 2" class="img-fluid">
                        </a>
                        <p>{{ $foto->keterangan_2 }}</p>
                    </div>
                    <div class="mb-3">
                        <a href="{{ asset('storage/' . $foto->foto_3) }}" data-lightbox="foto-{{ $foto->id }}" data-title="{{ $foto->keterangan_3 }}">
                            <img src="{{ asset('storage/' . $foto->foto_3) }}" alt="Image 3" class="img-fluid">
                        </a>
                        <p>{{ $foto->keterangan_3 }}</p>
                    </div>
                    <div class="mb-3">
                        <a href="{{ asset('storage/' . $foto->foto_4) }}" data-lightbox="foto-{{ $foto->id }}" data-title="{{ $foto->keterangan_4 }}">
                            <img src="{{ asset('storage/' . $foto->foto_4) }}" alt="Image 4" class="img-fluid">
                        </a>
                        <p>{{ $foto->keterangan_4 }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('foto.show', $foto->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('foto.edit', $foto->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('foto.destroy', $foto->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
