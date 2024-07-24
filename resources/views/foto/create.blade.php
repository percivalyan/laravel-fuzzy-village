@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Create Foto</h1>
    <a href="{{ route('foto.index') }}" class="btn btn-secondary mb-4">Back to List</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Foto</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('foto.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="lahan_id">Lahan</label>
                    <select name="lahan_id" id="lahan_id" class="form-control @error('lahan_id') is-invalid @enderror">
                        <option value="">Pilih Lahan</option>
                        @foreach($lahans as $lahan)
                        <option value="{{ $lahan->id }}">{{ $lahan->nomor_lahan }} - {{ $lahan->pemilik }}</option>
                        @endforeach
                    </select>
                    @error('lahan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @for ($i = 1; $i <= 4; $i++)
                    <div class="form-group">
                        <label for="foto_{{ $i }}">Foto {{ $i }}</label>
                        <input type="file" name="foto_{{ $i }}" id="foto_{{ $i }}" class="form-control @error('foto_'.$i) is-invalid @enderror">
                        @error('foto_'.$i)
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="keterangan_{{ $i }}">Keterangan {{ $i }}</label>
                        <textarea name="keterangan_{{ $i }}" id="keterangan_{{ $i }}" class="form-control @error('keterangan_'.$i) is-invalid @enderror"></textarea>
                        @error('keterangan_'.$i)
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endfor

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
