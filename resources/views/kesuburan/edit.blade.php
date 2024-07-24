@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Data Kesuburan</h1>
    <a href="{{ route('kesuburan.index') }}" class="btn btn-secondary mb-4">Back to List</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Kesuburan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('kesuburan.update', $kesuburan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="lahan_id">Lahan</label>
                    <p id="lahan_id_display">
                        @foreach($lahans as $lahan)
                            @if($lahan->id == $kesuburan->lahan_id)
                                {{ $lahan->nomor_lahan }}
                            @endif
                        @endforeach
                    </p>
                    <input type="hidden" name="lahan_id" id="lahan_id" value="{{ $kesuburan->lahan_id }}">
                    @error('lahan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pH">pH</label>
                    <input type="number" step="0.01" name="pH" id="pH" class="form-control @error('pH') is-invalid @enderror" value="{{ old('pH', $kesuburan->pH) }}" required>
                    @error('pH')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="c_organik">C-Organik</label>
                    <input type="number" step="0.01" name="c_organik" id="c_organik" class="form-control @error('c_organik') is-invalid @enderror" value="{{ old('c_organik', $kesuburan->c_organik) }}" required>
                    @error('c_organik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="n_total">N-Total</label>
                    <input type="number" step="0.01" name="n_total" id="n_total" class="form-control @error('n_total') is-invalid @enderror" value="{{ old('n_total', $kesuburan->n_total) }}" required>
                    @error('n_total')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="p_tersedia">P-Tersedia</label>
                    <input type="number" step="0.01" name="p_tersedia" id="p_tersedia" class="form-control @error('p_tersedia') is-invalid @enderror" value="{{ old('p_tersedia', $kesuburan->p_tersedia) }}" required>
                    @error('p_tersedia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="k_tersedia">K-Tersedia</label>
                    <input type="number" step="0.01" name="k_tersedia" id="k_tersedia" class="form-control @error('k_tersedia') is-invalid @enderror" value="{{ old('k_tersedia', $kesuburan->k_tersedia) }}" required>
                    @error('k_tersedia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ktk">KTK</label>
                    <input type="number" step="0.01" name="ktk" id="ktk" class="form-control @error('ktk') is-invalid @enderror" value="{{ old('ktk', $kesuburan->ktk) }}" required>
                    @error('ktk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $kesuburan->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
