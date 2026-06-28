<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
        $data['dosen'] = dosen::all();
        return view('dosen.index', $data);
    }

    public function create (){
        return view('dosen.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nidn' => 'required|string|size:10',
            'nama' => 'required|string|max:50',
        ],[
            'nidn.required' => 'nidn tidak boleh kosong',
            'nidn.size' => 'NIDN tidak boleh kurang atau lebih dari 10',
            'nidn.max' => 'NIDN tidak boleh kurang atau lebih dari 10',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter',
            'nama.required' => 'Nama tidak boleh kosong',
        ]);

        dosen::create($validated);

        if($request->save == true){
            return redirect()->route('dosen.index');
        } else {
            return redirect()->route('dosen.create');
        }
    }

    //edit
    public function edit(String $id){
        $data['dosen'] = dosen::where('nidn', $id)->firstOrFail();
        return view('dosen.edit', $data);
    }
    //update
    public function update(Request $request, String $id){
        $validated = $request->validate([
            'nidn' => 'required|string|size:10',
            'nama' => 'required|string|max:50',
        ],[
            'nidn.required' => 'nidn tidak boleh kosong',
            'nidn.size' => 'NIDN tidak boleh kurang atau lebih dari 10',
            'nidn.max' => 'NIDN tidak boleh kurang atau lebih dari 10',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter',
            'nama.required' => 'Nama tidak boleh kosong',
        ]);

        dosen::where('nidn', $id)->update($validated);

        $notification = array(
           'message' => 'data berhasil di perbarui',
           'alert-type' => 'success'  
        );

        if($request->save == true){
            return redirect()->route('dosen.index');
        }else{
            return redirect()->route('dosen.edit');
        }

    }

    public function destroy(String $id){
        $dosen = dosen::where('nidn', $id)->firstOrFail();
        $dosen->where('nidn', $id)->delete();
        return redirect()->route('dosen.index')->with('success', 'Data Dosen berhasil dihapus');
    }
}
