@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Kesuburan</h1>
    
    <a href="{{ route('kesuburan.create') }}" class="btn btn-primary mb-3">Tambah Data Kesuburan</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lahan</th>
                <th>pH</th>
                <th>C-Organik</th>
                <th>N-Total</th>
                <th>P-Tersedia</th>
                <th>K-Tersedia</th>
                <th>KTK</th>
                <th>Actions</th>
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
                    <td>
                        <a href="{{ route('kesuburan.show', $item->id) }}" class="btn btn-info btn-sm">Show</a>
                        <a href="{{ route('kesuburan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kesuburan.destroy', $item->id) }}" method="POST" style="display:inline;">
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
@endsection
