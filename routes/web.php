<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\ProfileController;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    if(Auth::user()->role == 'admin'){
        return view('admin.dashboard');
    } else {return view('dashboard');}
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/jadwal/index', [JadwalController::class, 'index'])->name('jadwal.index');
});

require __DIR__.'/auth.php';

//  DOSEN
Route::middleware('auth', 'admin')->group(function(){
    Route::get('/admin/dashboard', [HomeController::class, 'index']);
    Route::get('/dosen/index', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
    Route::post('/dosen/store', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('/dosen/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::patch('/dosen/update/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
    });

//  MAHASISWA
Route::middleware('auth', 'admin')->group(function(){
    Route::get('/mahasiswa/index', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::patch('/mahasiswa/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
    
    });

    //  matakuliah
Route::middleware('auth', 'admin')->group(function(){
    Route::get('/matakuliah/index', [MatakuliahController::class, 'index'])->name('matakuliah.index');
    Route::get('/matakuliah/create', [MatakuliahController::class, 'create'])->name('matakuliah.create');
    Route::post('/matakuliah/store', [MatakuliahController::class, 'store'])->name('matakuliah.store');
    Route::get('/matakuliah/edit/{id}', [MatakuliahController::class, 'edit'])->name('matakuliah.edit');
    Route::patch('/matakuliah/update/{id}', [MatakuliahController::class, 'update'])->name('matakuliah.update');
    Route::delete('/matakuliah/delete/{id}', [MatakuliahController::class, 'destroy'])->name('matakuliah.destroy');
    });

//  Jadwal
Route::middleware('auth', 'admin')->group(function(){
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal/store', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::patch('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/delete/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
    });

//  KRS
Route::middleware('auth', 'verified')->group(function(){
    Route::get('/krs/index', [KrsController::class, 'index'])->name('krs.index');
    Route::get('/krs/create', [KrsController::class, 'create'])->name('krs.create');
    Route::post('/krs/store', [KrsController::class, 'store'])->name('krs.store');
    Route::delete('/krs/delete/{id}', [KrsController::class, 'destroy'])->name('krs.destroy');
    });

    //LOOK FOR ANY TYPO
    //DECARE THE PRIMARY KEY ON THE MODEL IF YOU STRUGGLE WITH PRIMARY (NEVERMIND, READ THE NOTE personal-note-problem.txt FIRST)

Route::middleware('auth')->group(function(){
    //
});



