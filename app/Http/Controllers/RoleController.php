<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('can_add', function ($row) {
                    return $row->can_add ? 'Ya' : 'Tidak';
                })
                ->addColumn('can_edit', function ($row) {
                    return $row->can_edit ? 'Ya' : 'Tidak';
                })
                ->addColumn('can_delete', function ($row) {
                    return $row->can_delete ? 'Ya' : 'Tidak';
                })
                ->addColumn('action', function ($row) {
                    $btn = "<button data-id='$row->id' data-role='$row->role' data-can_edit='$row->can_edit' data-can_add='$row->can_add' data-can_delete='$row->can_delete' class='edit btn btn-warning btn-sm m-1'><i class='fas fa-edit'></i></button>";
                    $btn .= "<button data-id='$row->id' class='hapus btn btn-danger btn-sm m-1'><i class='fas fa-trash'></i></button>";
                    return $btn;
                })
                ->rawColumns(['action', 'can_add', 'can_edit', 'can_delete'])
                ->make(true);
        }
        $title = 'role';
        $th = ['No', 'Role', 'Bisa Menambah', 'Bisa Mengedit', 'Bisa menghapus', 'Aksi'];
        $urlDatatable = route('role');
        $aksi = route('role.aksi');
        return view('admin.role.index', compact('title', 'th', 'urlDatatable', 'aksi'));
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
        $role = Role::create([
            'role' => $request->role,
            'can_add' => $request->can_add,
            'can_edit' => $request->can_edit,
            'can_delete' => $request->can_delete
        ]);
        if ($role) {
            return ['status' => 'success', 'pesan' => 'Data berhasil ditambah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data gagal ditambah'];
        }
    }
    private function edit(Request $request)
    {
        $role = Role::whereId($request->id)->first();
        if ($role) {
            $role->role = $request->role;
            $role->can_add = $request->can_add;
            $role->can_edit = $request->can_edit;
            $role->can_delete = $request->can_delete;
            $role->update();
            return ['status' => 'success', 'pesan' => 'Data berhasil diubah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
    private function hapus(Request $request)
    {
        $role = Role::whereId($request->id)->first();
        if ($role) {
            $role->delete();
            return ['status' => 'success', 'pesan' => 'Data berhasil dihapus'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
}
