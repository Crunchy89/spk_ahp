<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Helper\PerhitunganAlternatif;

class CetakController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'Cetak',
            'kriteria' => Kriteria::all(),
            'alternatif' => Alternatif::all(),
            'data' => $this->concat(),
            'nilai' => $this->nilai(),
            'rangking' => $this->rangking(),
            'sortRangking' => $this->sortRangking()
        ];
        return view('admin.cetak.index', $data);
    }
    private function data()
    {
        $ahp = Kriteria::all();
        $perhitungan = new PerhitunganAlternatif();
        $data = [];
        foreach ($ahp as $k) {
            array_push($data, $perhitungan->prioritas($k->id));
        }
        return $data;
    }
    private function concat()
    {
        $data = $this->data();
        $result = [];
        for ($i = 0; $i < count($data[0]); $i++) {
            $list = [];
            for ($j = 0; $j < count($data); $j++) {
                $list[] = $data[$j][$i];
            }
            $result[] = $list;
        }
        return $result;
    }
    private function nilai()
    {
        $data = $this->concat();
        $bobot = Kriteria::all()->pluck('bobot');
        $result = [];
        foreach ($data as $d) {
            $tempt = [];
            foreach ($d as $j => $nilai) {
                array_push($tempt, round($nilai * $bobot[$j], 4));
            }
            $result[] = round(array_sum($tempt), 4);
        }
        return $result;
    }
    private function rangking()
    {
        $alternatif = Alternatif::all();
        $nilai = $this->nilai();
        $data = [];
        foreach ($nilai as $i => $val) {
            $data[] = $val;
        }
        return $data;
    }
    private function sortRangking()
    {
        $alternatif = Alternatif::all();
        $nilai = $this->nilai();
        $data = [];
        foreach ($nilai as $i => $val) {
            $data[$alternatif[$i]->alternatif] = $val;
        }
        arsort($data);
        return $data;
    }

    public function cetak()
    {
        $data = [
            'title' => 'print',
            'kriteria' => Kriteria::all(),
            'alternatif' => Alternatif::all(),
            'data' => $this->concat(),
            'nilai' => $this->nilai(),
            'rangking' => $this->rangking(),
            'sortRangking' => $this->sortRangking()
        ];
        return view('admin.cetak.cetak', $data);
    }
}
