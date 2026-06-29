<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\dosen;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(){
        $data['jadwal'] = Jadwal::with(['dosen','matakuliah'])->get();
        return view('jadwal.index', $data);
    }

    public function create(){
        $data['dosen'] = dosen::all();
        $data['matakuliah'] = Matakuliah::all();
        return view('jadwal.create', $data);
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            'kode_matakuliah' => 'required|string',
            'nidn' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'jam' => 'required|string',
        ],[
            'kode_matakuliah.required' => 'matakuliah tidak boleh kosong',
            'nidn.required' => 'nidn tidak boleh kosong',
            'kelas.required' => 'kelas tidak boleh kosong',
            'hari.required' => 'hari tidak boleh kosong',
            'jam.required' => 'jam tidak boleh kosong',
        ]);

        Jadwal::create($validated);
        

        if($request->save == true){
            return redirect()->route('jadwal.index')->with('success', 'matakuliah berhasil ditambahkan!');
        } else {
            return redirect()->route('jadwal.create');
        }
    }

    public function edit(String $id){
        $data['jadwal'] = Jadwal::where('id', $id)->firstOrFail();
        $data['dosen'] = dosen::all();
        $data['matakuliah'] = Matakuliah::all();
        return view('jadwal.edit', $data);
    }

    public function update(Request $request, String $id){
        $validated = $request->validate([
            'kode_matakuliah' => 'required|string',
            'nidn' => 'required|string',
            'kelas' => 'required|string',
            'hari' => 'required|string',
            'jam' => 'required|string',
        ],[
            'kode_matakuliah.required' => 'matakuliah tidak boleh kosong',
            'nidn.required' => 'nidn tidak boleh kosong',
            'kelas.required' => 'kelas tidak boleh kosong',
            'hari.required' => 'hari tidak boleh kosong',
            'jam.required' => 'jam tidak boleh kosong',
        ]);

        Jadwal::where('id', $id)->update($validated);
        
        $notification = array(
            'message' => 'data berhasil di perbarui',
            'alert-type' => 'success'
        );

        if($request->save == true){
            return redirect()->route('jadwal.index')->with('success', 'matakuliah berhasil ditambahkan!');
        } else {
            return redirect()->route('jadwal.create');
        }
    }

    public function destroy (String $id){
        $jadwal = Jadwal::where('id', $id)->firstOrFail();
        $jadwal->where('id', $id)->delete();
        return redirect()->route('Jadwal.index')->with('success', ' berhasil dihapus');
     }
}

