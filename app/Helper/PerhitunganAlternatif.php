<?php

namespace App\Helper;

use App\Models\PerbandinganAlternatif;
use App\Models\Alternatif;

class PerhitunganAlternatif
{
    protected $alternatif;
    public function __construct()
    {
        $this->alternatif = Alternatif::all();
    }

    public function getInput()
    {
        $data = [];
        foreach ($this->alternatif as $a) {
            foreach ($this->alternatif as $b) {
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
            $cek1 = Alternatif::whereId($a[0])->first();
            $cek2 = Alternatif::whereId($a[1])->first();
            array_push($ret, ['id_1' => $a[0], 'alternatif_1' => $cek1->alternatif, 'id_2' => $a[1], 'alternatif_2' => $cek2->alternatif]);
        }
        return $ret;
    }

    public function getData($id)
    {
        $data = [];
        foreach ($this->alternatif as $a) {
            $column = [];
            foreach ($this->alternatif as $b) {
                array_push($column, $this->getNilai($id, $a->id, $b->id));
            }
            $data[] = $column;
        }
        return $data;
    }
    private function getNilai($id, $idA, $idB)
    {
        if ($idA == $idB) {
            return 1;
        } else {
            $data = PerbandinganAlternatif::whereKriteria_id($id)->where('alternatif1_id', $idA)->where('alternatif2_id', $idB)->first();
            if ($data) {
                return $data->nilai;
            } else {
                return 1;
            }
        }
    }
    public function jumlahPerbandinganBerpasangan($id)
    {
        return PerbandinganAlternatif::selectRaw('SUM(nilai) +1  as jumlah')->whereKriteria_id($id)->groupBy('alternatif2_id')->get();
    }
    public function bobotRelatif($id)
    {
        $data = $this->getData($id);
        $jumlah = $this->jumlahPerbandinganBerpasangan(($id));
        $list = [];
        foreach ($data as $d) {
            $row = [];
            foreach ($d as $j => $val) {
                array_push($row, round($val / ($jumlah[$j]->jumlah ?? 1), 4));
            }
            array_push($list, $row);
        }
        return $list;
    }
    public function prioritas($id)
    {
        $data = $this->bobotRelatif($id);
        $result = [];
        foreach ($data as $d) {
            array_push($result, round(array_sum($d) / count($this->alternatif), 4));
        }
        return $result;
    }
    public function sumBaris($id)
    {
        $data = $this->getData($id);
        $prioritas = $this->prioritas($id);
        $result = [];
        foreach ($data as $d) {
            $temp = [];
            foreach ($d as $i => $nilai) {
                array_push($temp, round($nilai * $prioritas[$i], 4));
            }
            array_push($result, $temp);
        }
        return $result;
    }
    public function cm($id)
    {
        $baris = $this->sumBaris($id);
        $prioritas = $this->prioritas($id);
        $data = [];
        foreach ($baris as $i => $b) {
            array_push($data, round((array_sum($b)) / $prioritas[$i], 4));
        }
        return $data;
    }
    public function ir()
    {
        $jumlah = count($this->alternatif);
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
