@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kesuburan</h1>

    <div class="card">
        <div class="card-header">
            Data Kesuburan
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Deskripsi</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lahan</td>
                        <td>{{ $kesuburan->lahan->nomor_lahan }}</td>
                    </tr>
                    <tr>
                        <td>pH</td>
                        <td>{{ $kesuburan->pH }}</td>
                    </tr>
                    <tr>
                        <td>C Organik</td>
                        <td>{{ $kesuburan->c_organik }}</td>
                    </tr>
                    <tr>
                        <td>N Total</td>
                        <td>{{ $kesuburan->n_total }}</td>
                    </tr>
                    <tr>
                        <td>P Tersedia</td>
                        <td>{{ $kesuburan->p_tersedia }}</td>
                    </tr>
                    <tr>
                        <td>K Tersedia</td>
                        <td>{{ $kesuburan->k_tersedia }}</td>
                    </tr>
                    <tr>
                        <td>KTK</td>
                        <td>{{ $kesuburan->ktk }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>{{ $kesuburan->keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Nilai Crisp</td>
                        <td>{{ $nilai_crisp }}</td>
                    </tr>
                    <tr>
                        <td>Kesimpulan Deskriptif</td>
                        <td>{{ $kesimpulan }}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Nilai Fuzzy</h3>
            @foreach (['pH', 'c_organik', 'n_total', 'p_tersedia', 'k_tersedia', 'ktk'] as $field)
                <h4>Nilai Fuzzy {{ ucfirst(str_replace('_', ' ', $field)) }}</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Set</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fuzzy_values[$field] as $set => $value)
                            <tr>
                                <td>{{ ucfirst($set) }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
        <div class="card-footer">
            <a href="{{ route('kesuburan.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection
