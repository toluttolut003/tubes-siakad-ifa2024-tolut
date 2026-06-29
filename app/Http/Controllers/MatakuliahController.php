<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    public function index(){
        $data['matakuliah'] = Matakuliah::all();
        return view('matakuliah.index', $data);
    }

    public function create(){
        return view('matakuliah.create');
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            'kode_matakuliah' => 'required|string|size:6',
            'nama_matakuliah' => 'required|string|max:50',
            'sks' => 'required',
        ],[
            'kode_matakuliah.required' => 'nidn tidak boleh kosong',
            'kode_matakuliah.size' => 'kode tidak boleh kurang atau lebih dari 6',
            'kode_matakuliah.max' => 'kode tidak boleh kurang atau lebih dari 6',
            'nama_matakuliah.max' => 'Nama tidak boleh lebih dari 50 karakter',
            'nama_matakuliah.required' => 'Nama tidak boleh kosong',
            'sks.required' => 'sks tidak boleh kosong',
        ]);

        $kode = $validated['kode_matakuliah'];
        $create = "MK{$kode}";
        Matakuliah::create([
            'kode_matakuliah' => $create,
            'nama_matakuliah' => $validated['nama_matakuliah'],
            'sks' => $validated['sks']
        ]);

        if($request->save == true){
            return redirect()->route('matakuliah.index');
        } else {
            return redirect()->route('matakuliah.create');
        }
    }

    public function edit(String $id){
        $data['matakuliah'] = Matakuliah::where('kode_matakuliah', $id)->firstOrFail();
        return view('matakuliah.edit', $data);
    }

    public function update(Request $request, String $id){
        $validated = $request->validate([
            'kode_matakuliah' => 'required|string|size:6',
            'nama_matakuliah' => 'required|string|max:50',
            'sks' => 'required',
        ],[
            'kode_matakuliah.required' => 'nidn tidak boleh kosong',
            'kode_matakuliah.size' => 'kode tidak boleh kurang atau lebih dari 6',
            'kode_matakuliah.max' => 'kode tidak boleh kurang atau lebih dari 6',
            'nama_matakuliah.max' => 'Nama tidak boleh lebih dari 50 karakter',
            'nama_matakuliah.required' => 'Nama tidak boleh kosong',
            'sks.required' => 'sks tidak boleh kosong',
        ]);

        $kode = $validated['kode_matakuliah'];
        $create = "MK{$kode}";
        Matakuliah::where('kode_matakuliah', $id)->update([
            'kode_matakuliah' => $create,
            'nama_matakuliah' => $validated['nama_matakuliah'],
            'sks' => $validated['sks']
        ]);

        $notification = array(
           'message' => 'data berhasil di perbarui',
           'alert-type' => 'success'  
        );

        if($request->save == true){
            return redirect()->route('matakuliah.index');
        } else {
            return redirect()->route('matakuliah.create');
        }
    }

    public function destroy(String $id){
        $dosen = Matakuliah::where('kode_matakuliah', $id)->firstOrFail();
        $dosen->where('kode_matakuliah', $id)->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil dihapus');
    }
}
