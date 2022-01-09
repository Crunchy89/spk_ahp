<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Yajra\DataTables\Facades\DataTables;

class SubmenuController extends Controller
{
    //
    public function index(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Menu::whereId_parent($id)->orderBy('urutan', 'ASC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = "<button data-id='$row->id' data-title='$row->title' data-icon='$row->icon' data-link='$row->link' class='edit btn btn-warning btn-sm m-1'><i class='fas fa-edit'></i></button>";
                    $btn .= "<button data-id='$row->id' class='hapus btn btn-danger btn-sm m-1'><i class='fas fa-trash'></i></button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'submenu';
        $th = ['No', 'Title', 'Link', 'Urutan', 'Aksi'];
        $urlDatatable = route('submenu', $id);
        $aksi = route('submenu.aksi', $id);
        $id_parent = $id;
        return view('admin.menu.submenu', compact('title', 'th', 'urlDatatable', 'aksi', 'id_parent'));
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
        $role = Menu::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'link' => $request->link,
            'urutan' => (Menu::whereId_parent($request->id_parent)->get()->count() + 1),
            'id_parent' => $request->id_parent ?? 0
        ]);
        if ($role) {
            return ['status' => 'success', 'pesan' => 'Data berhasil ditambah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data gagal ditambah'];
        }
    }
    private function edit(Request $request)
    {
        $role = Menu::whereId($request->id)->first();
        if ($role) {
            $role->title = $request->title;
            $role->link = $request->link;
            $role->update();
            return ['status' => 'success', 'pesan' => 'Data berhasil diubah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
    private function hapus(Request $request)
    {
        $role = Menu::whereId($request->id)->first();
        if ($role) {
            $role->delete();
            return ['status' => 'success', 'pesan' => 'Data berhasil dihapus'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
}
