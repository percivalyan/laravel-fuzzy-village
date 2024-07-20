<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harga;

class HargaController extends Controller
{
    // Menampilkan daftar harga
    public function index()
    {
        $hargas = Harga::all()->map(function ($harga) {
            $harga->nilai_fuzzy = $this->evaluateFuzzy($harga->harga_per_hektar);
            $harga->kesimpulan_nilai_fuzzy = $this->getKesimpulan($harga->harga_per_hektar);
            return $harga;
        });
    
        return view('harga.index', compact('hargas'));
    }

    // Menampilkan form untuk membuat harga baru
    public function create()
    {
        return view('harga.create');
    }

    // Menyimpan data harga baru
public function store(Request $request)
{
    $request->validate([
        'harga_per_hektar' => 'required|numeric',
        'luas_per_hektar' => 'required|numeric',
    ]);

    $harga_per_hektar = $request->input('harga_per_hektar');
    $luas_per_hektar = $request->input('luas_per_hektar');
    $harga_sebenarnya = $harga_per_hektar * $luas_per_hektar;

    // Hitung nilai fuzzy, nilai crisp, dan kesimpulan
    $nilai_fuzzy = $this->evaluateFuzzy($harga_per_hektar);
    $nilai_crisp = $this->calculateCrispValue($harga_per_hektar);
    $kesimpulan_nilai_fuzzy = $this->getKesimpulan($harga_per_hektar);

    // Simpan data dalam database
    Harga::create([
        'harga_per_hektar' => $harga_per_hektar,
        'luas_per_hektar' => $luas_per_hektar,
        'harga_sebenarnya' => $harga_sebenarnya,
    ]);

    // Kirim data tambahan ke view
    return redirect()->route('harga.index')
        ->with('success', 'Harga berhasil ditambahkan.')
        ->with([
            'nilai_fuzzy' => $nilai_fuzzy,
            'nilai_crisp' => $nilai_crisp,
            'kesimpulan_nilai_fuzzy' => $kesimpulan_nilai_fuzzy,
        ]);
}

    // Menampilkan form untuk mengedit harga
    public function edit($id)
    {
        $harga = Harga::findOrFail($id);
        return view('harga.edit', compact('harga'));
    }

    // Memperbarui data harga
public function update(Request $request, $id)
{
    $request->validate([
        'harga_per_hektar' => 'required|numeric',
        'luas_per_hektar' => 'required|numeric',
    ]);

    $harga_per_hektar = $request->input('harga_per_hektar');
    $luas_per_hektar = $request->input('luas_per_hektar');
    $harga_sebenarnya = $harga_per_hektar * $luas_per_hektar;

    // Hitung nilai fuzzy, nilai crisp, dan kesimpulan
    $nilai_fuzzy = $this->evaluateFuzzy($harga_per_hektar);
    $nilai_crisp = $this->calculateCrispValue($harga_per_hektar);
    $kesimpulan_nilai_fuzzy = $this->getKesimpulan($harga_per_hektar);

    $harga = Harga::findOrFail($id);
    $harga->update([
        'harga_per_hektar' => $harga_per_hektar,
        'luas_per_hektar' => $luas_per_hektar,
        'harga_sebenarnya' => $harga_sebenarnya,
    ]);

    // Kirim data tambahan ke view
    return redirect()->route('harga.index')
        ->with('success', 'Harga berhasil diperbarui.')
        ->with([
            'nilai_fuzzy' => $nilai_fuzzy,
            'nilai_crisp' => $nilai_crisp,
            'kesimpulan_nilai_fuzzy' => $kesimpulan_nilai_fuzzy,
        ]);
}

    // Menampilkan detail harga
public function show($id)
{
    $harga = Harga::findOrFail($id);

    // Hitung nilai fuzzy, nilai crisp, dan kesimpulan
    $nilai_fuzzy = $this->evaluateFuzzy($harga->harga_per_hektar);
    $nilai_crisp = $this->calculateCrispValue($harga->harga_per_hektar);
    $kesimpulan_nilai_fuzzy = $this->getKesimpulan($harga->harga_per_hektar);

    return view('harga.show', compact('harga', 'nilai_fuzzy', 'nilai_crisp', 'kesimpulan_nilai_fuzzy'));
}

    // Menghitung nilai fuzzy
    private function evaluateFuzzy($harga_per_hektar)
    {
        if ($harga_per_hektar <= 100000000) {
            return 10;
        } elseif ($harga_per_hektar <= 200000000) {
            return 8;
        } elseif ($harga_per_hektar <= 300000000) {
            return 6;
        } elseif ($harga_per_hektar <= 400000000) {
            return 4;
        } elseif ($harga_per_hektar <= 500000000) {
            return 3;
        } elseif ($harga_per_hektar <= 600000000) {
            return 2;
        } elseif ($harga_per_hektar <= 700000000) {
            return 1;
        } elseif ($harga_per_hektar <= 800000000) {
            return 0.8;
        } elseif ($harga_per_hektar <= 900000000) {
            return 0.6;
        } else {
            return 0.4;
        }
    }

    // Menghitung nilai crisp (misalnya)
    private function calculateCrispValue($harga_per_hektar)
    {
        // Implementasi perhitungan nilai crisp
        return $harga_per_hektar; // Ubah sesuai perhitungan yang diperlukan
    }

    // Mendapatkan kesimpulan berdasarkan nilai harga
    private function getKesimpulan($harga_per_hektar)
    {
        if ($harga_per_hektar <= 100000000) {
            return 'Sangat murah, direkomendasikan.';
        } elseif ($harga_per_hektar <= 200000000) {
            return 'Murah, mungkin direkomendasikan dengan pertimbangan lebih lanjut.';
        } elseif ($harga_per_hektar <= 300000000) {
            return 'Terjangkau, disarankan untuk menilai faktor-faktor tambahan.';
        } elseif ($harga_per_hektar <= 400000000) {
            return 'Sedang, evaluasi kondisi tanah dan lokasi sebelum membuat keputusan.';
        } elseif ($harga_per_hektar <= 500000000) {
            return 'Mahal, pertimbangkan keuntungan jangka panjang dan lokasi.';
        } elseif ($harga_per_hektar <= 600000000) {
            return 'Sangat mahal, perlu analisis mendalam tentang nilai tanah.';
        } elseif ($harga_per_hektar <= 700000000) {
            return 'Harga tinggi, pastikan ada justifikasi yang kuat untuk investasi.';
        } elseif ($harga_per_hektar <= 800000000) {
            return 'Harga premium, pertimbangkan dengan cermat berdasarkan potensi pengembalian investasi.';
        } elseif ($harga_per_hektar <= 900000000) {
            return 'Harga sangat tinggi, hanya jika ada keuntungan yang sangat menjanjikan.';
        } else {
            return 'Sangat mahal, perlu analisis mendalam dan pertimbangan risiko sebelum investasi.';
        }
    }
}
