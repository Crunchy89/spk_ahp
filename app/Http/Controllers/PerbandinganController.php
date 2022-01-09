<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\PerhitunganAlternatif;
use App\Models\Alternatif;
use App\Models\PerbandinganAlternatif;

class PerbandinganController extends Controller
{
    //
    public function index(Request $request, $id)
    {
        $p = new PerhitunganAlternatif();
        $data = [
            'title' => 'perbandingan alternatif',
            'alternatif' => Alternatif::all(),
            'id' => $id,
            'input' => $p->getInput(),
            'pasangan' => $p->getData($id),
            'bobotrelatif' => $p->bobotRelatif($id),
            'prioritas' => $p->prioritas($id),
            'jumlah' => $p->jumlahPerbandinganBerpasangan($id),
            'sumBaris' => $p->sumBaris($id),
            'cm' => $p->cm($id),
            'ir' => $p->ir()
        ];
        return view('admin.alternatif.perbandingan', $data);
    }
    public function simpan(Request $request, $id)
    {
        $id1 = $request->id1;
        $id2 = $request->id2;
        $nilai = $request->nilai;
        for ($i = 0; $i < count($id1); $i++) {
            $cek1 = PerbandinganAlternatif::whereKriteria_id($id)->whereAlternatif1_id($id1[$i])->whereAlternatif2_id($id2[$i])->first();
            $cek2 = PerbandinganAlternatif::whereKriteria_id($id)->whereAlternatif1_id($id2[$i])->whereAlternatif2_id($id1[$i])->first();
            if ($nilai[$i] <= 10) {
                if ($cek1 && $cek2) {
                    $cek1->nilai = $nilai[$i];
                    $cek1->update();
                    $cek2->nilai = round(1 / $nilai[$i], 4);
                    $cek2->update();
                } else {
                    PerbandinganAlternatif::create([
                        'kriteria_id' => $id,
                        'alternatif1_id' => $id1[$i],
                        'alternatif2_id' => $id2[$i],
                        'nilai' => $nilai[$i]
                    ]);
                    PerbandinganAlternatif::create([
                        'kriteria_id' => $id,
                        'alternatif1_id' => $id2[$i],
                        'alternatif2_id' => $id1[$i],
                        'nilai' => round(1 / $nilai[$i], 4)
                    ]);
                }
            } else {

                if ($cek1 && $cek2) {
                    $cek2->nilai = ($nilai[$i] / 10);
                    $cek2->update();
                    $cek1->nilai = round(1 / ($nilai[$i] / 10), 4);
                    $cek1->update();
                } else {
                    PerbandinganAlternatif::create([
                        'kriteria_id' => $id,
                        'alternatif1_id' => $id2[$i],
                        'alternatif2_id' => $id1[$i],
                        'nilai' => ($nilai[$i] / 10)
                    ]);
                    PerbandinganAlternatif::create([
                        'kriteria_id' => $id,
                        'alternatif1_id' => $id1[$i],
                        'alternatif2_id' => $id2[$i],
                        'nilai' => round(1 / ($nilai[$i] / 10), 4)
                    ]);
                }
            }
        }
        return redirect()->back();
    }
}
