<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Lahan;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the periodes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodes = Periode::with('lahan')->get();
        return view('periode.index', compact('periodes'));
    }

    /**
     * Show the form for creating a new periode.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usedLahanIds = Periode::pluck('lahan_id')->toArray();
        $lahans = Lahan::whereNotIn('id', $usedLahanIds)->get();  
        return view('periode.create', compact('lahans'));
    }

    /**
     * Store a newly created periode in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lahan_id' => 'required|exists:lahans,id',
            'nama_tim_penggarap' => 'nullable|string',
            'jumlah_penggarap' => 'nullable|integer',
            'nama_penggarap' => 'nullable|string',
            'tanggal_pengerjaan_sawah_awal' => 'nullable|date',
            'tanggal_pengerjaan_sawah_akhir' => 'nullable|date',
            'penyewa' => 'nullable|string',
            'harga_sewa_lahan' => 'nullable|numeric',
            'harga_pupuk' => 'nullable|numeric',
            'harga_irigasi' => 'nullable|numeric',
            'jumlah_panen' => 'nullable|integer',
            'gaji_penggarap_per_orang' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Periode::create($request->all());

        return redirect()->route('periode.index')
                         ->with('success', 'Periode created successfully.');
    }

    /**
     * Display the specified periode.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        $periode->load('lahan');
        return view('periode.show', compact('periode'));
    }

    /**
     * Show the form for editing the specified periode.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Periode $periode)
    {
        $usedLahanIds = Periode::where('id', '!=', $periode->id)->pluck('lahan_id')->toArray();
        $lahans = Lahan::whereNotIn('id', $usedLahanIds)->get();
        return view('periode.edit', compact('periode', 'lahans'));
    }

    /**
     * Update the specified periode in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode $periode)
    {
        $request->validate([
            'lahan_id' => 'required|exists:lahans,id',
            'nama_tim_penggarap' => 'nullable|string',
            'jumlah_penggarap' => 'nullable|integer',
            'nama_penggarap' => 'nullable|string',
            'tanggal_pengerjaan_sawah_awal' => 'nullable|date',
            'tanggal_pengerjaan_sawah_akhir' => 'nullable|date',
            'penyewa' => 'nullable|string',
            'harga_sewa_lahan' => 'nullable|numeric',
            'harga_pupuk' => 'nullable|numeric',
            'harga_irigasi' => 'nullable|numeric',
            'jumlah_panen' => 'nullable|integer',
            'gaji_penggarap_per_orang' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $periode->update($request->all());

        return redirect()->route('periode.index')
                         ->with('success', 'Periode updated successfully.');
    }

    /**
     * Remove the specified periode from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
        $periode->delete();

        return redirect()->route('periode.index')
                         ->with('success', 'Periode deleted successfully.');
    }
}
