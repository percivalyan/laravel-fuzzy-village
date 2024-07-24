@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Edit Periode</h1>

    <a href="{{ route('lahan.index') }}" class="btn btn-secondary mb-4">Back to List</a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Periode</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('periode.update', $periode->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Baris 1 -->
                    <div class="col-md-4 mb-3">
                        <label for="lahan_id">Lahan</label>
                        <select name="lahan_id" id="lahan_id" class="form-control @error('lahan_id') is-invalid @enderror" required>
                            <option value="">Pilih Lahan</option>
                            @foreach($lahans as $lahan)
                            <option value="{{ $lahan->id }}" {{ $lahan->id == old('lahan_id', $periode->lahan_id) ? 'selected' : '' }}>
                                {{ $lahan->pemilik }}
                            </option>
                            @endforeach
                        </select>
                        @error('lahan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="nama_tim_penggarap">Tim Penggarap</label>
                        <input type="text" name="nama_tim_penggarap" id="nama_tim_penggarap" class="form-control @error('nama_tim_penggarap') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('nama_tim_penggarap', $periode->nama_tim_penggarap) }}">
                        @error('nama_tim_penggarap')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="jumlah_penggarap">Jumlah Penggarap</label>
                        <input type="number" name="jumlah_penggarap" id="jumlah_penggarap" class="form-control @error('jumlah_penggarap') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('jumlah_penggarap', $periode->jumlah_penggarap) }}">
                        @error('jumlah_penggarap')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Baris 2 -->
                    <div class="col-md-12 mb-3">
                        <label for="nama_penggarap">Nama Penggarap</label>
                        <textarea name="nama_penggarap" id="nama_penggarap" class="form-control @error('nama_penggarap') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya">{{ old('nama_penggarap', $periode->nama_penggarap) }}</textarea>
                        @error('nama_penggarap')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Baris 3 -->
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_pengerjaan_sawah_awal">Tanggal Pengerjaan Sawah Awal</label>
                        <input type="date" name="tanggal_pengerjaan_sawah_awal" id="tanggal_pengerjaan_sawah_awal" class="form-control @error('tanggal_pengerjaan_sawah_awal') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('tanggal_pengerjaan_sawah_awal', $periode->tanggal_pengerjaan_sawah_awal) }}">
                        @error('tanggal_pengerjaan_sawah_awal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_pengerjaan_sawah_akhir">Tanggal Pengerjaan Sawah Akhir</label>
                        <input type="date" name="tanggal_pengerjaan_sawah_akhir" id="tanggal_pengerjaan_sawah_akhir" class="form-control @error('tanggal_pengerjaan_sawah_akhir') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('tanggal_pengerjaan_sawah_akhir', $periode->tanggal_pengerjaan_sawah_akhir) }}">
                        @error('tanggal_pengerjaan_sawah_akhir')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Baris 4 -->
                    <div class="col-md-4 mb-3">
                        <label for="penyewa">Penyewa</label>
                        <input type="text" name="penyewa" id="penyewa" class="form-control @error('penyewa') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('penyewa', $periode->penyewa) }}">
                        @error('penyewa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="harga_sewa_lahan">Harga Sewa Lahan</label>
                        <input type="number" name="harga_sewa_lahan" id="harga_sewa_lahan" class="form-control @error('harga_sewa_lahan') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('harga_sewa_lahan', $periode->harga_sewa_lahan) }}">
                        @error('harga_sewa_lahan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="harga_pupuk">Harga Pupuk</label>
                        <input type="number" name="harga_pupuk" id="harga_pupuk" class="form-control @error('harga_pupuk') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('harga_pupuk', $periode->harga_pupuk) }}">
                        @error('harga_pupuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Baris 5 -->
                    <div class="col-md-4 mb-3">
                        <label for="harga_irigasi">Harga Irigasi</label>
                        <input type="number" name="harga_irigasi" id="harga_irigasi" class="form-control @error('harga_irigasi') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('harga_irigasi', $periode->harga_irigasi) }}">
                        @error('harga_irigasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="jumlah_panen">Jumlah Panen</label>
                        <input type="number" name="jumlah_panen" id="jumlah_panen" class="form-control @error('jumlah_panen') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('jumlah_panen', $periode->jumlah_panen) }}">
                        @error('jumlah_panen')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="gaji_penggarap_per_orang">Gaji Per Penggarap</label>
                        <input type="number" name="gaji_penggarap_per_orang" id="gaji_penggarap_per_orang" class="form-control @error('gaji_penggarap_per_orang') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya" value="{{ old('gaji_penggarap_per_orang', $periode->gaji_penggarap_per_orang) }}">
                        @error('gaji_penggarap_per_orang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Baris 6 -->
                    <div class="col-md-12 mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Boleh Dikosongkan Saja Datanya">{{ old('keterangan', $periode->keterangan) }}</textarea>
                        @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
