@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Foto</h1>
    <form action="{{ route('foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="lahan_id">Lahan</label>
            <select name="lahan_id" id="lahan_id" class="form-control @error('lahan_id') is-invalid @enderror">
                <option value="">Pilih Lahan</option>
                @foreach($lahans as $lahan)
                <option value="{{ $lahan->id }}" {{ $foto->lahan_id == $lahan->id ? 'selected' : '' }}>
                    {{ $lahan->nomor_lahan }} - {{ $lahan->pemilik }}
                </option>
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
                @if($foto->{'foto_'.$i})
                <img src="{{ Storage::url($foto->{'foto_'.$i}) }}" alt="Foto {{ $i }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                @endif
            </div>
            <div class="form-group">
                <label for="keterangan_{{ $i }}">Keterangan {{ $i }}</label>
                <textarea name="keterangan_{{ $i }}" id="keterangan_{{ $i }}" class="form-control @error('keterangan_'.$i) is-invalid @enderror">{{ $foto->{'keterangan_'.$i} }}</textarea>
                @error('keterangan_'.$i)
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        @endfor

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
