<?php

namespace App\Http\Controllers;

use App\Models\Field_place;
use App\Models\Kriteria;
use App\Models\matrik;
use Illuminate\Http\Request;

class MatrikController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $matrik = matrik::all();
        return view('ahp.perhitungan', compact('kriteria', 'matrik'));
    }

    public function store(Request $request)
    {
        $kriteria = Kriteria::all();
        matrik::truncate();

        foreach ($kriteria as $kriteria_a) {
            foreach ($kriteria as $kriteria_b) {
                $nilai = 1; // Nilai default untuk kriteria yang sama
                if ($kriteria_a->id != $kriteria_b->id) {
                    if ($kriteria_a->id < $kriteria_b->id) {
                        $nilai = $request->input('nilai_' . $kriteria_a->id . '_' . $kriteria_b->id);

                        if (is_null($nilai)) {
                            return redirect()->route('admin.storeMatriks')->withErrors(['msg' => 'Nilai perbandingan tidak boleh kosong.']);
                        }
                    } else {
                        $nilai = 1 / matrik::where('kriteria_a', $kriteria_b->id)
                            ->where('kriteria_b', $kriteria_a->id)
                            ->value('nilai');
                    }
                }

                matrik::create([
                    'kriteria_a' => $kriteria_a->id,
                    'kriteria_b' => $kriteria_b->id,
                    'nilai' => $nilai
                ]);
            }
        }

        return redirect()->route('result')->with('success', 'Matriks berhasil disimpan.');
    }


    public function calculateSumMatrik()
    {
        // Menghitung jumlah setiap kolom (kriteria) dalam matriks perbandingan berpasangan
        return matrik::selectRaw('kriteria_b, SUM(nilai) as total')
            ->groupBy('kriteria_b')
            ->pluck('total', 'kriteria_b')
            ->all();
    }

    public function calculateNormalization($matriks, $sum_matrik)
    {
        $normalisasi = [];
        foreach ($matriks as $item) {
            $normalisasi[$item->kriteria_a][$item->kriteria_b] = $item->nilai / ($sum_matrik[$item->kriteria_b] ?? 1);
        }
        return $normalisasi;
    }


    public function calculateWeights($kriterias, $normalisasi)
    {
        $weight = [];
        foreach ($kriterias as $kriteria) {
            $sum = 0;
            foreach ($kriterias as $innerKriteria) {
                $sum += $normalisasi[$kriteria->id][$innerKriteria->id] ?? 0;
            }
            $weight[$kriteria->id] = round($sum / count($kriterias), 10); // Memiliki 10 angka setelah koma
        }
        return $weight;
    }



    public function calculateEigenValues($kriterias, $matriks, $weight)
    {
        $eigenValues = [];
        foreach ($kriterias as $kriteria_a) {
            $sum = 0;
            foreach ($kriterias as $kriteria_b) {
                $nilai = $matriks->where('kriteria_a', $kriteria_a->id)->where('kriteria_b', $kriteria_b->id)->first();
                if ($nilai) {
                    $sum += $nilai->nilai * ($weight[$kriteria_b->id] ?? 0);
                }
            }
            $eigenValues[$kriteria_a->id] = round($sum);
        }
        return $eigenValues;
    }

    public function calculateTValue($kriterias, $eigenValues, $weight)
    {
        $tValue = 0;
        foreach ($kriterias as $kriteria) {
            if ($weight[$kriteria->id] != 0) {
                $tValue += $eigenValues[$kriteria->id] / $weight[$kriteria->id];
            }
        }
        return $tValue / count($kriterias);
    }


    public function calculateCI($tValue, $n)
    {
        return round(($tValue - $n) / ($n - 1));
    }

    private function getRI($n)
    {
        $ri_values = [1 => 0.00, 2 => 0.00, 3 => 0.58, 4 => 0.90, 5 => 1.12, 6 => 1.24, 7 => 1.32, 8 => 1.41, 9 => 1.45, 10 => 1.49];
        return $ri_values[$n] ?? 1.12;
    }

    public function calculateCR($ci, $ri)
    {
        return round($ri != 0 ? $ci / $ri : 0);
    }

    public function hitung_alternatif()
    {
        // Mengambil semua data alternatif dari model Field_place
        $alternatifs = Field_place::all();

        // Menghitung nilai minimum dan maksimum untuk setiap kriteria
        $min_price = $alternatifs->min('price');
        $min_jarak = $alternatifs->min('jarak');
        $max_jenis_lapangan = $alternatifs->max('jenis_lapangan');
        $max_fasilitas_lapangan = $alternatifs->max('fasilitas_lapangan');
        $max_jumlah_pemain = $alternatifs->max('jumlah_pemain');

        // Array untuk menyimpan bobot dan detail normalisasi
        $weight = [];
        $normalisasi = [];

        // Menghitung bobot untuk setiap kriteria dan menyimpannya
        foreach ($alternatifs as $item) {
            $bobot_price = round($item->price / $min_price, 10);
            $bobot_jarak = round($item->jarak / $min_jarak, 10);
            $bobot_jenis_lapangan = round($item->jenis_lapangan / $max_jenis_lapangan, 10);
            $bobot_fasilitas_lapangan = round($item->fasilitas_lapangan / $max_fasilitas_lapangan, 10);
            $bobot_jumlah_pemain = round($item->jumlah_pemain / $max_jumlah_pemain, 10);

            $weight[] = [
                'name' => $item->name,
                'price' => $bobot_price,
                'jarak' => $bobot_jarak,
                'jenis_lapangan' => $bobot_jenis_lapangan,
                'fasilitas_lapangan' => $bobot_fasilitas_lapangan,
                'jumlah_pemain' => $bobot_jumlah_pemain,
            ];
        }


        // Menghitung sum bobot untuk setiap kriteria
        $sum_bobot_price = array_sum(array_column($weight, 'price'));
        $sum_bobot_jarak = array_sum(array_column($weight, 'jarak'));
        $sum_bobot_jenis_lapangan = array_sum(array_column($weight, 'jenis_lapangan'));
        $sum_bobot_fasilitas_lapangan = array_sum(array_column($weight, 'fasilitas_lapangan'));
        $sum_bobot_jumlah_pemain = array_sum(array_column($weight, 'jumlah_pemain'));

        // Melakukan normalisasi berdasarkan bobot yang sudah dihitung
        foreach ($weight as $item) {
            $normalisasi[] = [
                'name' => $item['name'],
                'price' => round($item['price'] / $sum_bobot_price, 10),
                'jarak' => round($item['jarak'] / $sum_bobot_jarak, 10),
                'jenis_lapangan' => round($item['jenis_lapangan'] / $sum_bobot_jenis_lapangan, 10),
                'fasilitas_lapangan' => round($item['fasilitas_lapangan'] / $sum_bobot_fasilitas_lapangan, 10),
                'jumlah_pemain' => round($item['jumlah_pemain'] / $sum_bobot_jumlah_pemain, 10),
            ];
        }

        // Mengembalikan hasil normalisasi dan bobot kriteria
        return [
            'normalisasi' => $normalisasi,
            'bobot_price' => round(array_sum(array_column($normalisasi, 'price')) / count($normalisasi), 10),
            'bobot_jarak' => round(array_sum(array_column($normalisasi, 'jarak')) / count($normalisasi), 10),
            'bobot_jenis_lapangan' => round(array_sum(array_column($normalisasi, 'jenis_lapangan')) / count($normalisasi), 10),
            'bobot_fasilitas_lapangan' => round(array_sum(array_column($normalisasi, 'fasilitas_lapangan')) / count($normalisasi), 10),
            'bobot_jumlah_pemain' => round(array_sum(array_column($normalisasi, 'jumlah_pemain')) / count($normalisasi), 10),
        ];
    }



    public function perangkingan()
    {
        // Mengambil data kriteria dan matriks
        $kriterias = Kriteria::all();
        $matriks = matrik::all();

        // Hitung sum matriks
        $sum_matrik = $this->calculateSumMatrik();

        // Normalisasi matriks
        $normalisasi_matrik = $this->calculateNormalization($matriks, $sum_matrik);

        // Hitung bobot menggunakan normalisasi matriks
        $bobot_kriteria = $this->calculateWeights($kriterias, $normalisasi_matrik);

        // Mengambil hasil normalisasi alternatif dari method hitung_alternatif
        $alternatif_data = $this->hitung_alternatif();
        $normalisasi_alternatif = $alternatif_data['normalisasi'];

        $total_utilities = [];

        // Hitung nilai total untuk setiap alternatif dengan pembulatan 10 angka di belakang koma
        foreach ($normalisasi_alternatif as $alternatif) {
            $skor_price = round($alternatif['price'] * $bobot_kriteria[1], 10);
            $skor_jarak = round($alternatif['jarak'] * $bobot_kriteria[2], 10);
            $skor_jenis_lapangan = round($alternatif['jenis_lapangan'] * $bobot_kriteria[3], 10);
            $skor_fasilitas_lapangan = round($alternatif['fasilitas_lapangan'] * $bobot_kriteria[4], 10);
            $skor_jumlah_pemain = round($alternatif['jumlah_pemain'] * $bobot_kriteria[5], 10);

            $skor = $skor_price + $skor_jarak + $skor_jenis_lapangan + $skor_fasilitas_lapangan + $skor_jumlah_pemain;

            $total_utilities[] = [
                'alternatif' => $alternatif['name'],
                'nilai_total' => $skor,
            ];
        }

        // Urutkan alternatif berdasarkan nilai total
        usort($total_utilities, function ($a, $b) {
            return $b['nilai_total'] <=> $a['nilai_total'];
        });

        // Menampilkan hasil
        return view('ahp.result', compact('total_utilities'));
    }
}
