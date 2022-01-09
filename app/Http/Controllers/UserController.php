<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('user.*', 'role.role')->join('role', 'user.role_id', '=', 'role.id')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aktif', function ($row) {
                    $aktif = $row->is_active ? "Aktif" : "Nonaktif";
                    return $aktif;
                })
                ->addColumn('action', function ($row) {
                    $btn = "<button data-id='$row->id' data-role='$row->role' data-username='$row->username' data-role_id='$row->role_id' data-is_active='$row->is_active' class='edit btn btn-warning btn-sm m-1'><i class='fas fa-edit'></i></button>";
                    $btn .= "<button data-id='$row->id' class='hapus btn btn-danger btn-sm m-1'><i class='fas fa-trash'></i></button>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $title = 'user';
        $th = ['No', 'Username', 'Role', 'Aktif', 'Aksi'];
        $urlDatatable = route('user');
        $aksi = route('user.aksi');
        $role = Role::all();
        return view('admin.user.index', compact('title', 'th', 'urlDatatable', 'aksi', 'role'));
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
        $role = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'is_active' => $request->is_active
        ]);
        if ($role) {
            return ['status' => 'success', 'pesan' => 'Data berhasil ditambah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data gagal ditambah'];
        }
    }
    private function edit(Request $request)
    {
        $role = User::whereId($request->id)->first();
        if ($role) {
            $role->username = $request->username;
            $role->role_id = $request->role_id;
            $role->is_active = $request->is_active;
            if ($request->password)
                $role->password = Hash::make($request->password);
            $role->update();
            return ['status' => 'success', 'pesan' => 'Data berhasil diubah'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
    private function hapus(Request $request)
    {
        $role = User::whereId($request->id)->first();
        if ($role) {
            $role->delete();
            return ['status' => 'success', 'pesan' => 'Data berhasil dihapus'];
        } else {
            return ['status' => 'error', 'pesan' => 'Data tidak ditemukan'];
        }
    }
}
