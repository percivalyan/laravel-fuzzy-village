<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use Illuminate\Http\Request;

class LahanController extends Controller
{
    public function index()
    {
        $lahans = Lahan::all();
        return view('lahan.index', compact('lahans'));
    }

    public function create()
    {
        return view('lahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_lahan' => 'nullable|unique:lahans',
            'status_lahan' => 'nullable|string',
            'pemilik' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'koordinat' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        Lahan::create($request->all());

        return redirect()->route('lahan.index')
                         ->with('success', 'Lahan created successfully.');
    }

    public function show(Lahan $lahan)
    {
        return view('lahan.show', compact('lahan'));
    }

    public function edit(Lahan $lahan)
    {
        return view('lahan.edit', compact('lahan'));
    }

    public function update(Request $request, Lahan $lahan)
    {
        $request->validate([
            'nomor_lahan' => 'nullable|unique:lahans,nomor_lahan,'.$lahan->id,
            'status_lahan' => 'nullable|string',
            'pemilik' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'koordinat' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $lahan->update($request->all());

        return redirect()->route('lahan.index')
                         ->with('success', 'Lahan updated successfully.');
    }

    public function destroy(Lahan $lahan)
    {
        $lahan->delete();

        return redirect()->route('lahan.index')
                         ->with('success', 'Lahan deleted successfully.');
    }
}
