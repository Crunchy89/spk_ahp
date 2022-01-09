<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'profil aplikasi'
        ];
        return view('admin.profil.index', $data);
    }
}
