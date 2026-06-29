<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use Illuminate\Http\Request;

class KrsController extends Controller
{
    public function index(){
        $data['krs'] = Krs::all();
        return view('krs.index', $data);
    }

    public function create(){
        //
    }

    public function store(){
        //
    }

    public function edit(){
        //
    }

    public function update(){
        //
    }

    public function destroy(){
        //
    }
}
