<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManualController extends Controller
{
    //
    public function index()
    {
        $data = [
            'title' => 'user manual'
        ];
        return view('admin.manual.index', $data);
    }
}
