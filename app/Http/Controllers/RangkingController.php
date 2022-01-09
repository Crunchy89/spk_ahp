<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RangkingController extends Controller
{
    //
    public function index(Request $request)
    {
        $data = [
            'title' => 'perangkingan'
        ];
        return view('admin.rangking.index', $data);
    }
}
