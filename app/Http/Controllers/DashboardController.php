<?php

namespace App\Http\Controllers;

use App\Models\AksesMenu;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'dashboard',
            'user' => User::all()->count(),
            'role' => Role::all()->count(),
            'kriteria' => Kriteria::all()->count(),
            'alternatif' => Alternatif::all()->count()
        ];
        return view('admin.dashboard', $data);
    }
    private function getData($id_parent)
    {
        $menu = Menu::whereId_parent($id_parent)->orderBy('urutan', 'ASC')->get();
        if ($menu) {
            $result = [];
            foreach ($menu as $m) {
                $list = [
                    'title' => $m->title,
                    'icon' => $m->icon,
                    'link' => $m->link,
                    'data' => $this->getData($m->id)
                ];
                $result[] = $list;
            }
            return $result;
        } else {
            return [];
        }
    }
    public function getMenu()
    {
        $data = AksesMenu::join('menu as m', 'akses_menu.menu_id', '=', 'm.id')
            ->where('akses_menu.role_id', Auth::user()->role_id)
            ->orderBy('m.urutan', 'ASC')
            ->get();
        if ($data) {
            $result = [];
            foreach ($data as $d) {
                $list = [
                    'title' => $d->title,
                    'icon' => $d->icon,
                    'link' => $d->link,
                    'data' => $this->getData($d->id)
                ];
                $result[] = $list;
            }
            return response()->json($result);
        } else {
            return response()->json([]);
        }
    }
}
