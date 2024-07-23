<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Lahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = Foto::with('lahan')->get();
        return view('foto.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usedLahanIds = Foto::pluck('lahan_id')->toArray();
        $lahans = Lahan::whereNotIn('id', $usedLahanIds)->get();
        return view('foto.create', compact('lahans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lahan_id' => 'required|exists:lahans,id|unique:fotos,lahan_id',
            'foto_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoData = $request->all();

        if ($request->hasFile('foto_1')) {
            $fotoData['foto_1'] = $request->file('foto_1')->store('pictures', 'public');
        }
        if ($request->hasFile('foto_2')) {
            $fotoData['foto_2'] = $request->file('foto_2')->store('pictures', 'public');
        }
        if ($request->hasFile('foto_3')) {
            $fotoData['foto_3'] = $request->file('foto_3')->store('pictures', 'public');
        }
        if ($request->hasFile('foto_4')) {
            $fotoData['foto_4'] = $request->file('foto_4')->store('pictures', 'public');
        }

        Foto::create($fotoData);

        return redirect()->route('foto.index')->with('success', 'Foto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        return view('foto.show', compact('foto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
{
    // Ambil semua lahan yang belum memiliki foto atau milik entri saat ini
    $usedLahanIds = Foto::where('id', '!=', $foto->id)->pluck('lahan_id')->toArray();
    $lahans = Lahan::whereNotIn('id', $usedLahanIds)->get();

    return view('foto.edit', compact('foto', 'lahans'));
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        $request->validate([
            'lahan_id' => 'required|exists:lahans,id|unique:fotos,lahan_id,' . $foto->id,
            'foto_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $fotoData = $request->all();

        if ($request->hasFile('foto_1')) {
            if ($foto->foto_1) {
                Storage::disk('public')->delete($foto->foto_1);
            }
            $fotoData['foto_1'] = $request->file('foto_1')->store('pictures', 'public');
        }
        if ($request->hasFile('foto_2')) {
            if ($foto->foto_2) {
                Storage::disk('public')->delete($foto->foto_2);
            }
            $fotoData['foto_2'] = $request->file('foto_2')->store('pictures', 'public');
        }
        if ($request->hasFile('foto_3')) {
            if ($foto->foto_3) {
                Storage::disk('public')->delete($foto->foto_3);
            }
            $fotoData['foto_3'] = $request->file('foto_3')->store('pictures', 'public');
        }
        if ($request->hasFile('foto_4')) {
            if ($foto->foto_4) {
                Storage::disk('public')->delete($foto->foto_4);
            }
            $fotoData['foto_4'] = $request->file('foto_4')->store('pictures', 'public');
        }

        $foto->update($fotoData);

        return redirect()->route('foto.index')->with('success', 'Foto updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        if ($foto->foto_1) {
            Storage::disk('public')->delete($foto->foto_1);
        }
        if ($foto->foto_2) {
            Storage::disk('public')->delete($foto->foto_2);
        }
        if ($foto->foto_3) {
            Storage::disk('public')->delete($foto->foto_3);
        }
        if ($foto->foto_4) {
            Storage::disk('public')->delete($foto->foto_4);
        }

        $foto->delete();

        return redirect()->route('foto.index')->with('success', 'Foto deleted successfully.');
    }
}
