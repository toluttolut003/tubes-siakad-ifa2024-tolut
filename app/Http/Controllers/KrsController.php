<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{   
    
    public function index(){

        $mahasiswa = Auth::user()->mahasiswa;
        if($mahasiswa){
            $npmUser = $mahasiswa->npm;
            $data['krs'] = Krs::where('npm', $npmUser)->with('matakuliah')->get();
        } else {
            $data['krs'] = Krs::all();
        }
        return view('krs.index', $data);
    }

    public function create(){
        $mahasiswa = Auth::user()->mahasiswa;
        if($mahasiswa){
            $npmUser = $mahasiswa->npm;
            $data['krs'] = Krs::where('npm', $npmUser)->with('matakuliah')->get();
        } else {
            $data['krs'] = Krs::all();
        }
            $data['matakuliah'] = Matakuliah::all();
        return view('krs.create', $data);
    }

    public function store(Request $request){
        
        
        $mahasiswa = Auth::user()->mahasiswa;
        if($mahasiswa){
            $validated = $request->validate([
            'kode_matakuliah' => 'required',
            ],[
            'kode_matakuliah.required' => 'matakuliah tidak boleh kosong',
            'npm.required' => 'npm tidak boleh kosong',
            ]);

            $KodeMatkul = $request->input('kode_matakuliah');
            $npmUser = Auth::user()->mahasiswa->npm;
            $Isdupe = Krs::where('npm', $npmUser)->where('kode_matakuliah', $KodeMatkul)->exists();
            if($Isdupe){
                return redirect()->back()->withErrors([
                    'duplicate' => 'Matakuliah ini sudah di ambil'
                ]);
            }

            Krs::create([
            'npm' => $npmUser,
            'kode_matakuliah' => $validated['kode_matakuliah'],
            ]);
        } else {
            
            $validated = $request->validate([
                'npm' => 'required',
                'kode_matakuliah' => 'required',
            ],[
                'kode_matakuliah.required' => 'matakuliah tidak boleh kosong',
                'npm.required' => 'npm tidak boleh kosong',
            ]);

            $KodeMatkul = $request->input('kode_matakuliah');
            $npmUser = $request->input('npm');
            $Isdupe = Krs::where('npm', $npmUser)->where('kode_matakuliah', $KodeMatkul)->exists();
            
            if($Isdupe){
                return redirect()->back()->withErrors([
                    'duplicate' => 'Matakuliah ini sudah di ambil'
                ]);
            }

            Krs::create($validated);
        }
        

        if($request->save == true){
            return redirect()->route('krs.index');
        } else {
            return redirect()->route('krs.create');
        }
    }

    public function destroy(String $id){
        $krs = Krs::where('id', $id)->firstOrFail();
        $krs->where('id', $id)->delete();
        return redirect()->route('krs.index')->with('success', 'Matakuliah berhasil di hapus');
    }
}
