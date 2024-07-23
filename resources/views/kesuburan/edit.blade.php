@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Data Kesuburan</h1>

    <form action="{{ route('kesuburan.update', $kesuburan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="lahan_id">Lahan</label>
            <p id="lahan_id_display">
                @foreach($lahans as $lahan)
                    @if($lahan->id == $kesuburan->lahan_id)
                        {{ $lahan->id }}
                    @endif
                @endforeach
            </p>
            <input type="hidden" name="lahan_id" id="lahan_id" value="{{ $kesuburan->lahan_id }}">
            @error('lahan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pH">pH</label>
            <input type="number" step="0.01" name="pH" id="pH" class="form-control" value="{{ old('pH', $kesuburan->pH) }}" required>
            @error('pH')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="c_organik">C-Organik</label>
            <input type="number" step="0.01" name="c_organik" id="c_organik" class="form-control" value="{{ old('c_organik', $kesuburan->c_organik) }}" required>
            @error('c_organik')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="n_total">N-Total</label>
            <input type="number" step="0.01" name="n_total" id="n_total" class="form-control" value="{{ old('n_total', $kesuburan->n_total) }}" required>
            @error('n_total')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="p_tersedia">P-Tersedia</label>
            <input type="number" step="0.01" name="p_tersedia" id="p_tersedia" class="form-control" value="{{ old('p_tersedia', $kesuburan->p_tersedia) }}" required>
            @error('p_tersedia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="k_tersedia">K-Tersedia</label>
            <input type="number" step="0.01" name="k_tersedia" id="k_tersedia" class="form-control" value="{{ old('k_tersedia', $kesuburan->k_tersedia) }}" required>
            @error('k_tersedia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ktk">KTK</label>
            <input type="number" step="0.01" name="ktk" id="ktk" class="form-control" value="{{ old('ktk', $kesuburan->ktk) }}" required>
            @error('ktk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $kesuburan->keterangan) }}</textarea>
            @error('keterangan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
