@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Lahan</h1>
    <a href="{{ route('lahan.index') }}" class="btn btn-secondary mb-4">Back to List</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Lahan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('lahan.update', $lahan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="status_lahan">Status Lahan</label>
                    <select class="form-control" id="status_lahan" name="status_lahan" required>
                        <option value="" disabled selected>Select Status</option>
                        <option value="Lahan produktif Tani">Lahan produktif Tani</option>
                        <option value="Lahan tidak produktif">Lahan tidak produktif</option>
                        <option value="Lahan kosong">Lahan kosong</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomor_lahan">Nomor Lahan</label>
                    <input type="text" class="form-control" id="nomor_lahan" name="nomor_lahan" value="{{ $lahan->nomor_lahan }}" required>
                </div>
                <div class="form-group">
                    <label for="pemilik">Pemilik</label>
                    <input type="text" class="form-control" id="pemilik" name="pemilik" value="{{ $lahan->pemilik }}" required>
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $lahan->lokasi }}" required>
                </div>
                <div class="form-group">
                    <label for="koordinat">Koordinat</label>
                    <input type="text" class="form-control" id="koordinat" name="koordinat" value="{{ $lahan->koordinat }}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $lahan->keterangan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
