<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kesuburan;
use App\Models\Lahan;

class KesuburanController extends Controller
{
    // Method to display the list of fertility data
    public function index()
    {
        $kesuburan = Kesuburan::all();
        
        return view('kesuburan.index', compact('kesuburan'));
    }

    // Method to show the form for creating new fertility data
    public function create()
    {
        $usedLahanIds = Kesuburan::pluck('lahan_id')->toArray();
        $lahans = Lahan::whereNotIn('id', $usedLahanIds)->get();  
        return view('kesuburan.create', compact('lahans'));
    }

    // Method to store newly created fertility data in storage
    public function store(Request $request)
    {
        $request->validate([
            'lahan_id' => 'required|exists:lahans,id',
            'pH' => 'required|numeric',
            'c_organik' => 'required|numeric',
            'n_total' => 'required|numeric',
            'p_tersedia' => 'required|numeric',
            'k_tersedia' => 'required|numeric',
            'ktk' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $data = $request->all();

        // Process Fuzzy Sugeno calculations here
        $data['nilai_crisp'] = $this->calculateFuzzySugeno($data);

        Kesuburan::create($data);

        return redirect()->route('kesuburan.index')->with('success', 'Data kesuburan berhasil ditambahkan.');
    }

    // Method to show the form for editing the specified fertility data
    public function edit(Kesuburan $kesuburan)
    {
        // Ambil semua lahan yang belum memiliki foto atau milik entri saat ini
    $usedLahanIds = Kesuburan::where('id', '!=', $kesuburan->id)->pluck('lahan_id')->toArray();
    $lahans = Lahan::whereNotIn('id', $usedLahanIds)->get();
        return view('kesuburan.edit', compact('kesuburan', 'lahans'));
    }
    
    // Method to update the specified fertility data in storage
    public function update(Request $request, Kesuburan $kesuburan)
    {
        $request->validate([
            'lahan_id' => 'required|exists:lahans,id',
            'pH' => 'required|numeric',
            'c_organik' => 'required|numeric',
            'n_total' => 'required|numeric',
            'p_tersedia' => 'required|numeric',
            'k_tersedia' => 'required|numeric',
            'ktk' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $data = $request->all();

        // Process Fuzzy Sugeno calculations here
        $data['nilai_crisp'] = $this->calculateFuzzySugeno($data);

        $kesuburan->update($data);

        return redirect()->route('kesuburan.index')->with('success', 'Data kesuburan berhasil diubah.');
    }

    // Method to display the details of a specific fertility data
    public function show(Kesuburan $kesuburan)
    {
        // Calculate fuzzy values for each parameter
        $fuzzy_values = [
            'pH' => $this->fuzzyRule('pH', $kesuburan->pH),
            'c_organik' => $this->fuzzyRule('c_organik', $kesuburan->c_organik),
            'n_total' => $this->fuzzyRule('n_total', $kesuburan->n_total),
            'p_tersedia' => $this->fuzzyRule('p_tersedia', $kesuburan->p_tersedia),
            'k_tersedia' => $this->fuzzyRule('k_tersedia', $kesuburan->k_tersedia),
            'ktk' => $this->fuzzyRule('ktk', $kesuburan->ktk),
        ];

        // Calculate the crisp value using Fuzzy Sugeno
        $nilai_crisp = $this->calculateFuzzySugeno($kesuburan->toArray());

        // Determine the descriptive conclusion based on the crisp value
        $kesimpulan = $this->getDescriptiveConclusion($nilai_crisp);

        return view('kesuburan.show', compact('kesuburan', 'fuzzy_values', 'nilai_crisp', 'kesimpulan'));
    }

    // Method to remove the specified fertility data from storage
    public function destroy(Kesuburan $kesuburan)
    {
        $kesuburan->delete();
        return redirect()->route('kesuburan.index')->with('success', 'Data kesuburan berhasil dihapus.');
    }

    // Method to calculate the crisp value using Fuzzy Sugeno
    private function calculateFuzzySugeno($data)
    {
        // Define fuzzy sets and rules
        $rules = [
            'pH' => $this->fuzzyRule('pH', $data['pH']),
            'c_organik' => $this->fuzzyRule('c_organik', $data['c_organik']),
            'n_total' => $this->fuzzyRule('n_total', $data['n_total']),
            'p_tersedia' => $this->fuzzyRule('p_tersedia', $data['p_tersedia']),
            'k_tersedia' => $this->fuzzyRule('k_tersedia', $data['k_tersedia']),
            'ktk' => $this->fuzzyRule('ktk', $data['ktk']),
        ];

        // Combine the rules to compute the final crisp value
        $nilai_crisp = $this->combineRules($rules);

        return $nilai_crisp;
    }

    // Apply fuzzy rule based on the value and the type of parameter
    private function fuzzyRule($parameter, $value)
    {
        // Define fuzzy membership functions for each parameter
        // Define fuzzy membership functions for each parameter
$fuzzy_sets = [
    'pH' => [
        'very_low' => [0, 4.0, 5.0],
        'low' => [4.5, 5.5, 6.5],
        'medium' => [6.0, 6.5, 7.0],
        'high' => [6.5, 7.5, 8.0],
        'very_high' => [7.5, 8.5, 9.0],
    ],
    'c_organik' => [
        'very_low' => [0, 0.5, 1.0],
        'low' => [0.5, 1.0, 2.0],
        'medium' => [1.5, 2.0, 3.0],
        'high' => [2.5, 3.0, 4.0],
        'very_high' => [3.5, 4.0, 5.0],
    ],
    'n_total' => [
        'very_low' => [0, 0.05, 0.1],
        'low' => [0.05, 0.1, 0.2],
        'medium' => [0.15, 0.2, 0.3],
        'high' => [0.25, 0.3, 0.4],
        'very_high' => [0.35, 0.4, 0.5],
    ],
    'p_tersedia' => [
        'very_low' => [0, 2, 5],
        'low' => [3, 5, 10],
        'medium' => [7, 10, 15],
        'high' => [12, 15, 20],
        'very_high' => [18, 20, 25],
    ],
    'k_tersedia' => [
        'very_low' => [0, 20, 50],
        'low' => [20, 50, 100],
        'medium' => [75, 100, 150],
        'high' => [125, 150, 200],
        'very_high' => [175, 200, 250],
    ],
    'ktk' => [
        'very_low' => [0, 5, 10],
        'low' => [5, 10, 20],
        'medium' => [15, 20, 30],
        'high' => [25, 30, 40],
        'very_high' => [35, 40, 50],
    ],
];


        // Calculate fuzzy membership value
        $membership = [];
        foreach ($fuzzy_sets[$parameter] as $set => $params) {
            $membership[$set] = $this->membershipFunction($value, $params);
        }

        // Determine the maximum membership value
        return $membership;
    }

    // Membership function for fuzzy sets
    private function membershipFunction($value, $params)
    {
        list($a, $b, $c) = $params;
        if ($value <= $a) {
            return 0;
        } elseif ($value <= $b) {
            return ($value - $a) / ($b - $a);
        } elseif ($value <= $c) {
            return ($c - $value) / ($c - $b);
        } else {
            return 0;
        }
    }

    // Combine fuzzy rules into a crisp value
    private function combineRules($rules)
    {
        // Define Sugeno weights for each rule (these are example weights)
        $weights = [
            'pH' => 0.2,
            'c_organik' => 0.2,
            'n_total' => 0.2,
            'p_tersedia' => 0.2,
            'k_tersedia' => 0.1,
            'ktk' => 0.1,
        ];

        $weighted_sum = 0;
        $total_weight = 0;

        foreach ($rules as $key => $value) {
            $max_value = max($value);
            $weighted_sum += $max_value * $weights[$key];
            $total_weight += $weights[$key];
        }

        // Calculate the final crisp value as a weighted average
        return $total_weight > 0 ? $weighted_sum / $total_weight : 0;
    }

    // Get descriptive conclusion based on crisp value
    private function getDescriptiveConclusion($nilai_crisp)
    {
        // Example conclusions based on crisp value ranges
        if ($nilai_crisp >= 90) {
            return 'Sangat Baik';
        } elseif ($nilai_crisp >= 80) {
            return 'Baik Sekali';
        } elseif ($nilai_crisp >= 70) {
            return 'Baik';
        } elseif ($nilai_crisp >= 60) {
            return 'Baik Cukup';
        } elseif ($nilai_crisp >= 50) {
            return 'Cukup Baik';
        } elseif ($nilai_crisp >= 40) {
            return 'Cukup';
        } elseif ($nilai_crisp >= 30) {
            return 'Kurang Cukup';
        } elseif ($nilai_crisp >= 20) {
            return 'Kurang Baik';
        } elseif ($nilai_crisp >= 10) {
            return 'Buruk';
        } elseif ($nilai_crisp >= 5) {
            return 'Sangat Buruk';
        } else {
            return 'Sangat Tidak Memadai';
        }
    }
    
}
