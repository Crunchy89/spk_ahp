<?php

namespace App\Helper;

use App\Models\Kriteria;
use App\Models\Ahp as Model;

class Ahp
{
    protected $kriteria;
    protected $jumlah;
    public function __construct()
    {
        $this->kriteria = Kriteria::all();
    }
    public function getInput()
    {
        $data = [];
        foreach ($this->kriteria as $a) {
            foreach ($this->kriteria as $b) {
                if ($a->id != $b->id) {
                    array_push($data, [$a->id, $b->id]);
                }
            }
        }
        $list = [];
        foreach ($data as $d) {
            sort($d);
            array_push($list, $d);
        }
        $return = array_unique($list, SORT_REGULAR);
        $ret = [];
        foreach ($return as $a) {
            $cek1 = Kriteria::whereId($a[0])->first();
            $cek2 = Kriteria::whereId($a[1])->first();
            array_push($ret, ['id_1' => $a[0], 'kriteria_1' => $cek1->kriteria, 'id_2' => $a[1], 'kriteria_2' => $cek2->kriteria]);
        }
        return $ret;
    }
    public function getData()
    {
        $data = [];
        foreach ($this->kriteria as $a) {
            $column = [$a->kriteria];
            foreach ($this->kriteria as $b) {
                array_push($column, $this->getNilai($a->id, $b->id));
            }
            $data[] = $column;
        }
        return $data;
    }
    private function getNilai($idA, $idB)
    {
        if ($idA == $idB) {
            return 1;
        } else {
            $data = Model::where('kriteria1_id', $idA)->where('kriteria2_id', $idB)->first();
            if ($data) {
                return $data->nilai;
            } else {
                return 1;
            }
        }
    }
    public function bobot()
    {
        $nilai = $this->nilai();
        $jumlah = $this->getJumlah();
        $data = [];
        for ($i = 0; $i < count($nilai); $i++) {
            $list = [];
            for ($j = 0; $j < count($nilai[$i]); $j++) {
                array_push($list, round($nilai[$i][$j] / $jumlah[$j], 4));
            }
            array_push($data, $list);
        }
        return $data;
    }
    public function bobotBaris()
    {
        $data = $this->bobot();
        $return = [];
        foreach ($data as $d) {
            array_push($return, array_sum($d));
        }
        return $return;
    }
    public function prioritas()
    {
        $jumlah = $this->bobotBaris();
        for ($i = 0; $i < count($this->kriteria); $i++) {
            Kriteria::whereId($this->kriteria[$i]->id)->update([
                'bobot' => round($jumlah[$i] / count($this->kriteria), 4)
            ]);
        }
        return Kriteria::select('bobot')->get();
    }
    public function getJumlah()
    {
        $jumlah = Model::selectRaw('SUM(nilai) as total')->groupBy('kriteria2_id')->get();
        if ($jumlah) {
            $sum = [];
            foreach ($jumlah as $j) {
                array_push($sum, $j->total);
            }
            return $sum;
        } else {
            return [];
        }
    }
    public function nilai()
    {
        $data = [];
        foreach ($this->kriteria as $a) {
            $column = [];
            foreach ($this->kriteria as $b) {
                array_push($column, $this->getNilai($a->id, $b->id) ?? 1);
            }
            $data[] = $column;
        }
        return $data;
    }
    public function sumBaris()
    {
        $nilai = $this->nilai();
        $sum = [];
        for ($i = 0; $i < count($nilai); $i++) {
            $list = [];
            for ($j = 0; $j < count($nilai[$i]); $j++) {
                array_push($list, round($nilai[$i][$j] * $this->kriteria[$j]->bobot, 4));
            }
            $sum[] = round(array_sum($list), 4);
        }
        return $sum;
    }
    public function konsistensi()
    {
        $data = [];
        $jumlah = $this->sumBaris();
        for ($i = 0; $i < count($jumlah); $i++) {
            array_push($data, round($jumlah[$i] / ($this->kriteria[$i]->bobot ?? 1), 4));
        }
        return $data;
    }
    public function ir()
    {
        $jumlah = count($this->kriteria);
        $data = 0;
        if ($jumlah >= 15)
            $data = 1.59;
        else if ($jumlah >= 14)
            $data = 1.57;
        else if ($jumlah >= 13)
            $data = 1.56;
        else if ($jumlah >= 12)
            $data = 1.48;
        else if ($jumlah >= 11)
            $data = 1.51;
        else if ($jumlah >= 10)
            $data = 1.49;
        else if ($jumlah >= 9)
            $data = 1.45;
        else if ($jumlah >= 8)
            $data = 1.41;
        else if ($jumlah >= 7)
            $data = 1.32;
        else if ($jumlah >= 6)
            $data = 1.24;
        else if ($jumlah >= 5)
            $data = 1.12;
        else if ($jumlah >= 4)
            $data = 0.90;
        else if ($jumlah >= 3)
            $data = 0.58;
        else
            $data = 0;

        return $data;
    }
}
