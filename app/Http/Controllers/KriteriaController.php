<?php

namespace App\Http\Controllers;

use App\Models\Ahp;
use Illuminate\Http\Request;
use App\Models\Kriteria;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KriteriaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kriteria::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "<button data-id='$row->id' data-label='$row->label' data-kriteria='$row->kriteria' class='edit btn btn-warning btn-sm m-1'><i class='fas fa-edit'></i></button>";
                    $btn .= "<button data-id='$row->id' class='hapus btn btn-danger btn-sm m-1'><i class='fas fa-trash'></i></button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'kriteria';
        $th = ['No', 'Label', 'Kriteria', 'Aksi'];
        $urlDatatable = route('kriteria');
        $aksi = route('kriteria.aksi');
        return view('admin.kriteria.index', compact('title', 'th', 'urlDatatable', 'aksi'));
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
        $data = [];
        DB::beginTransaction();
        try {
            $role = new Kriteria();
            $role->label = 'C' . (Kriteria::all()->count() + 1);
            $role->kriteria = $request->kriteria;
            $role->save();
            Ahp::create([
                'kriteria1_id' => $role->id,
                'kriteria2_id' => $role->id,
                'nilai' => 1,
            ]);
            DB::commit();
            $data = ['status' => 'success', 'pesan' => 'Data berhasil ditambah'];
        } catch (Exception $e) {
            DB::rollBack();
            $data = ['status' => 'error', 'pesan' => 'Data gagal ditambah'];
        }
        return $data;
    }
    private function edit(Request $request)
    {
        $role = Kriteria::whereId($request->id)->first();
        if ($role) {
            $role->label = $request->label;
            $role->kriteria = $request->kriteria;
            $role->update();
            return ['status' => 'success', 'pesan' => 'Data berhasil diubah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
    private function hapus(Request $request)
    {
        $role = Kriteria::whereId($request->id)->first();
        if ($role) {
            $role->delete();
            return ['status' => 'success', 'pesan' => 'Data berhasil dihapus'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
}
