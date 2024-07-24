@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Data Kesuburan</h1>
    <a href="{{ route('kesuburan.index') }}" class="btn btn-secondary mb-4">Back to List</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kesuburan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('kesuburan.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="lahan_id">Lahan</label>
                    <select name="lahan_id" id="lahan_id" class="form-control @error('lahan_id') is-invalid @enderror" required>
                        <option value="">Pilih Lahan</option>
                        @foreach($lahans as $lahan)
                            <option value="{{ $lahan->id }}">{{ $lahan->nomor_lahan }}</option>
                        @endforeach
                    </select>
                    @error('lahan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pH">pH</label>
                    <select name="pH" id="pH" class="form-control @error('pH') is-invalid @enderror" required>
                        <option value="">Pilih pH</option>
                        @foreach(range(4.0, 9.0, 0.1) as $value)
                            <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                        @endforeach
                    </select>
                    @error('pH')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="c_organik">C-Organik</label>
                    <select name="c_organik" id="c_organik" class="form-control @error('c_organik') is-invalid @enderror" required>
                        <option value="">Pilih C-Organik</option>
                        @foreach(range(0, 5, 0.1) as $value)
                            <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                        @endforeach
                    </select>
                    @error('c_organik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="n_total">N-Total</label>
                    <select name="n_total" id="n_total" class="form-control @error('n_total') is-invalid @enderror" required>
                        <option value="">Pilih N-Total</option>
                        @foreach(range(0, 2, 0.1) as $value)
                            <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                        @endforeach
                    </select>
                    @error('n_total')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="p_tersedia">P-Tersedia</label>
                    <select name="p_tersedia" id="p_tersedia" class="form-control @error('p_tersedia') is-invalid @enderror" required>
                        <option value="">Pilih P-Tersedia</option>
                        @foreach(range(0, 30, 0.5) as $value)
                            <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                        @endforeach
                    </select>
                    @error('p_tersedia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="k_tersedia">K-Tersedia</label>
                    <select name="k_tersedia" id="k_tersedia" class="form-control @error('k_tersedia') is-invalid @enderror" required>
                        <option value="">Pilih K-Tersedia</option>
                        @foreach(range(0, 200, 1) as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('k_tersedia')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ktk">KTK</label>
                    <select name="ktk" id="ktk" class="form-control @error('ktk') is-invalid @enderror" required>
                        <option value="">Pilih KTK</option>
                        @foreach(range(0, 40, 0.5) as $value)
                            <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                        @endforeach
                    </select>
                    @error('ktk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
