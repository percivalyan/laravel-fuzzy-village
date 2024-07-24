@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Kesuburan</h1>

    <a href="{{ route('kesuburan.create') }}" class="btn btn-primary mb-4">Tambah Data Kesuburan</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kesuburan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Lahan</th>
                            <th>pH</th>
                            <th>C-Organik</th>
                            <th>N-Total</th>
                            <th>P-Tersedia</th>
                            <th>K-Tersedia</th>
                            <th>KTK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kesuburan as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->lahan->pemilik }}</td>
                            <td>{{ $item->pH }}</td>
                            <td>{{ $item->c_organik }}</td>
                            <td>{{ $item->n_total }}</td>
                            <td>{{ $item->p_tersedia }}</td>
                            <td>{{ $item->k_tersedia }}</td>
                            <td>{{ $item->ktk }}</td>
                            <td class="text-center">
                                <a href="{{ route('kesuburan.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('kesuburan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kesuburan.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
