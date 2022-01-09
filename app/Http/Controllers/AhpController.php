<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Ahp;
use App\Models\AksesMenu;
use App\Models\Kriteria;
use App\Models\Ahp as Model;

class AhpController extends Controller
{
    //

    public function index()
    {
        $ahp = new Ahp();
        $input = $ahp->getInput();
        $kriteria = Kriteria::all();
        $jumlah = $ahp->getJumlah();
        $bobot = $ahp->bobot();
        $bobotBaris = $ahp->bobotBaris();
        $prioritas = $ahp->prioritas();
        $nilai = $ahp->nilai();
        $data = $ahp->getData();
        $sumBaris = $ahp->sumBaris();
        $konsistensi = $ahp->konsistensi();
        $ir = $ahp->ir();
        $title = 'perhitungan ahp';
        return view('admin.ahp.index', compact('title', 'data', 'kriteria', 'input', 'jumlah', 'bobot', 'bobotBaris', 'prioritas', 'nilai', 'sumBaris', 'konsistensi', 'ir'));
    }
    public function simpan(Request $request)
    {
        $id1 = $request->id1;
        $id2 = $request->id2;
        $nilai = $request->nilai;
        for ($i = 0; $i < count($id1); $i++) {
            $cek1 = Model::whereKriteria1_id($id1[$i])->whereKriteria2_id($id2[$i])->first();
            $cek2 = Model::whereKriteria1_id($id2[$i])->whereKriteria2_id($id1[$i])->first();
            if ($nilai[$i] <= 10) {
                if ($cek1 && $cek2) {
                    $cek1->nilai = $nilai[$i];
                    $cek1->update();
                    $cek2->nilai = round(1 / $nilai[$i], 3);
                    $cek2->update();
                } else {
                    Model::create([
                        'kriteria1_id' => $id1[$i],
                        'kriteria2_id' => $id2[$i],
                        'nilai' => $nilai[$i]
                    ]);
                    Model::create([
                        'kriteria1_id' => $id2[$i],
                        'kriteria2_id' => $id1[$i],
                        'nilai' => round(1 / $nilai[$i], 3)
                    ]);
                }
            } else {

                if ($cek1 && $cek2) {
                    $cek2->nilai = ($nilai[$i] / 10);
                    $cek2->update();
                    $cek1->nilai = round(1 / ($nilai[$i] / 10), 3);
                    $cek1->update();
                } else {
                    Model::create([
                        'kriteria1_id' => $id2[$i],
                        'kriteria2_id' => $id1[$i],
                        'nilai' => ($nilai[$i] / 10)
                    ]);
                    Model::create([
                        'kriteria1_id' => $id1[$i],
                        'kriteria2_id' => $id2[$i],
                        'nilai' => round(1 / ($nilai[$i] / 10), 3)
                    ]);
                }
            }
        }
        return redirect()->back();
    }
}
