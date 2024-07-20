@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Harga Baru</h1>
        <form action="{{ route('harga.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="harga_per_hektar">Harga per Hektar</label>
                <input type="number" step="0.01" name="harga_per_hektar" id="harga_per_hektar" class="form-control" value="{{ old('harga_per_hektar') }}" required>
                @error('harga_per_hektar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="luas_per_hektar">Luas per Hektar</label>
                <input type="number" step="0.01" name="luas_per_hektar" id="luas_per_hektar" class="form-control" value="{{ old('luas_per_hektar') }}" required>
                @error('luas_per_hektar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
