<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\NilaiAlternatif;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AlternatifController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Alternatif::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "<button data-id='$row->id' data-label='$row->label' data-alternatif='$row->alternatif' class='edit btn btn-warning btn-sm m-1'><i class='fas fa-edit'></i></button>";
                    $btn .= "<button data-id='$row->id' class='hapus btn btn-danger btn-sm m-1'><i class='fas fa-trash'></i></button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'alternatif';
        $th = ['No', 'Label', 'Alternatif', 'Aksi'];
        $urlDatatable = route('alternatif');
        $aksi = route('alternatif.aksi');
        return view('admin.alternatif.index', compact('title', 'th', 'urlDatatable', 'aksi'));
    }
    public function aksi(Request $request)
    {
        $aksi = $request->aksi;
        $data = [];
        switch ($aksi) {
            case 'tambah':
                $data = $this->tambah($request);
                break;
            case 'edit':
                $data = $this->edit($request);
                break;
            case 'hapus':
                $data = $this->hapus($request);
                break;
            default:
                $data = ['status' => 'error', 'status' => 'Aksi tidak ditemukan'];
                break;
        }
        return response()->json($data);
    }
    private function tambah(Request $request)
    {
        $role = Alternatif::create([
            'label' => 'Alt. ' . (Alternatif::all()->count() + 1),
            'alternatif' => $request->alternatif,
        ]);
        if ($role) {
            return ['status' => 'success', 'pesan' => 'Data berhasil ditambah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data gagal ditambah'];
        }
    }
    private function edit(Request $request)
    {
        $role = Alternatif::whereId($request->id)->first();
        if ($role) {
            $role->label = $request->label;
            $role->alternatif = $request->alternatif;
            $role->update();
            return ['status' => 'success', 'pesan' => 'Data berhasil diubah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
    private function hapus(Request $request)
    {
        $role = Alternatif::whereId($request->id)->first();
        if ($role) {
            $role->delete();
            return ['status' => 'success', 'pesan' => 'Data berhasil dihapus'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
    public function nilai()
    {
        $data = [
            'title' => 'nilai alternatif',
            'alternatif' => Alternatif::all(),
            'kriteria' => Kriteria::all()
        ];
        return view('admin.alternatif.nilai', $data);
    }
    public function simpan(Request $request)
    {
        NilaiAlternatif::truncate();
        $alternatif_id = $request->alternatif_id;
        $kriteria_id = $request->kriteria_id;
        $nilai = $request->nilai;
        $data = [];
        for ($i = 0; $i < count($nilai); $i++) {
            $data[] = [
                'alternatif_id' => $alternatif_id[$i],
                'kriteria_id' => $kriteria_id[$i],
                'nilai' => $nilai[$i] ?? 0,
            ];
        }
        NilaiAlternatif::insert($data);
        return redirect()->back();
    }
}
