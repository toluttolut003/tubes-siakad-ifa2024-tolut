<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $data['mahasiswa'] = Mahasiswa::with('dosen')->get();
        return view('mahasiswa.index', $data);
    }

    public function create(){
        $data['dosen'] = dosen::all();
        return view('mahasiswa.create', $data);
    }

    

    public function store(Request $request){
        $validated = $request->validate([
            'npm' => 'required|string|size:10',
            'nama' => 'required|string|max:50',
            'nidn' => 'required|string|max:10',
        ],[
            'npm.required' => 'NPM tidak boleh kosong',
            'npm.size' => 'NPM tidak boleh kurang atau lebih dari 10',
            'npm.max' => 'NPM tidak boleh kurang atau lebih dari 10',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter',
            'nama.required' => 'Nama tidak boleh kosong',
        ]);

        Mahasiswa::create($validated);

        if($request->save == true){
            return redirect()->route('mahasiswa.index');
        } else {
            return redirect()->route('mahasiswa.create');
        }
    }

    public function edit(string $id){
        $data['mahasiswa'] = Mahasiswa::where('npm', $id)->firstOrFail();
        $data['dosen'] = dosen::all();
        return view('mahasiswa.edit', $data);
    }

    public function update(Request $request, String $id){
        $validated = $request->validate([
            'npm' => 'required|string|size:10',
            'nama' => 'required|string|max:50',
            'nidn' => 'required|string|max:10',
        ],[
            'npm.required' => 'NPM tidak boleh kosong',
            'npm.size' => 'NPM tidak boleh kurang atau lebih dari 10',
            'npm.max' => 'NPM tidak boleh kurang atau lebih dari 10',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter',
            'nama.required' => 'Nama tidak boleh kosong',
        ]);

        Mahasiswa::where('npm', $id)->update($validated);

        $notification = array(
            'message' => 'data berhasil di perbarui',
            'alert-type' => 'success'
        );

        if($request->save == true){
            return redirect()->route('mahasiswa.index');
        } else {
            return redirect()->route('mahasiswa.create');
        }
    }
    
     public function destroy(String $id){
            $mahasiswa = Mahasiswa::where('npm', $id)->firstOrFail();
            $mahasiswa->where('npm', $id)->delete();
            return redirect()->route('mahasiswa.index')->with('success', 'Data Dosen berhasil dihapus');
     }

}
