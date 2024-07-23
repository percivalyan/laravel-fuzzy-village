@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Tambah Data Kesuburan</h1>

    <form action="{{ route('kesuburan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="lahan_id">Lahan</label>
            <select name="lahan_id" id="lahan_id" class="form-control" required>
                <option value="">Pilih Lahan</option>
                @foreach($lahans as $lahan)
                    <option value="{{ $lahan->id }}">{{ $lahan->nomor_lahan }}</option>
                @endforeach
            </select>
            @error('lahan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pH">pH</label>
            <select name="pH" id="pH" class="form-control" required>
                <option value="">Pilih pH</option>
                @foreach(range(4.0, 9.0, 0.1) as $value)
                    <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                @endforeach
            </select>
            @error('pH')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="c_organik">C-Organik</label>
            <select name="c_organik" id="c_organik" class="form-control" required>
                <option value="">Pilih C-Organik</option>
                @foreach(range(0, 5, 0.1) as $value)
                    <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                @endforeach
            </select>
            @error('c_organik')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="n_total">N-Total</label>
            <select name="n_total" id="n_total" class="form-control" required>
                <option value="">Pilih N-Total</option>
                @foreach(range(0, 2, 0.1) as $value)
                    <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                @endforeach
            </select>
            @error('n_total')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="p_tersedia">P-Tersedia</label>
            <select name="p_tersedia" id="p_tersedia" class="form-control" required>
                <option value="">Pilih P-Tersedia</option>
                @foreach(range(0, 30, 0.5) as $value)
                    <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                @endforeach
            </select>
            @error('p_tersedia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="k_tersedia">K-Tersedia</label>
            <select name="k_tersedia" id="k_tersedia" class="form-control" required>
                <option value="">Pilih K-Tersedia</option>
                @foreach(range(0, 200, 1) as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            @error('k_tersedia')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="ktk">KTK</label>
            <select name="ktk" id="ktk" class="form-control" required>
                <option value="">Pilih KTK</option>
                @foreach(range(0, 40, 0.5) as $value)
                    <option value="{{ number_format($value, 1) }}">{{ number_format($value, 1) }}</option>
                @endforeach
            </select>
            @error('ktk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
            @error('keterangan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
