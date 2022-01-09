<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\AksesMenu;

class AksesController extends Controller
{
    //
    public function index(Request $request)
    {
        $title = 'role';
        $th = ['No', 'Role', 'Menu', 'Aksi'];
        $role = Role::all();
        return view('admin.akses.index', compact('title', 'th', 'role'));
    }
    public function edit(Request $request, $id)
    {
        $title = 'akses edit';
        $menu = Menu::whereId_parent(0)->get();
        $role = AksesMenu::whereRole_id($id)->get();
        return view('admin.akses.edit', compact('menu', 'id', 'title', 'role'));
    }
    public function check(Request $request, $id)
    {
        $cek = AksesMenu::whereRole_id($id)->whereMenu_id($request->menu_id)->first();
        if ($cek) {
            $cek->delete();
            return response()->json(['status' => 'error', 'pesan' => 'Akses dicabut']);
        } else {
            $akses = new AksesMenu;
            $akses->role_id = $id;
            $akses->menu_id = $request->menu_id;
            $akses->save();
            return response()->json(['status' => 'success', 'pesan' => 'Akses diberikan']);
        }
    }
}
