@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Harga</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Harga</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('harga.update', $harga->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="lahan_id">Lahan</label>
                    <select name="lahan_id" id="lahan_id" class="form-control">
                        @foreach ($lahans as $lahan)
                        <option value="{{ $lahan->id }}" {{ $harga->lahan_id == $lahan->id ? 'selected' : '' }}>{{ $lahan->nomor_lahan }}</option>
                        @endforeach
                    </select>
                    @error('lahan_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="harga_per_hektar">Harga per Hektar</label>
                    <input type="number" name="harga_per_hektar" id="harga_per_hektar" class="form-control" value="{{ $harga->harga_per_hektar }}">
                    @error('harga_per_hektar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="luas_per_hektar">Luas per Hektar</label>
                    <input type="number" name="luas_per_hektar" id="luas_per_hektar" class="form-control" value="{{ $harga->luas_per_hektar }}">
                    @error('luas_per_hektar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
