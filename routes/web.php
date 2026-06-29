<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

    //LOOK FOR ANY TYPO
    //DECARE THE PRIMARY KEY ON THE MODEL IF YOU STRUGGLE WITH PRIMARY (NEVERMIND, READ THE NOTE personal-note-problem.txt first)

Route::middleware('auth')->group(function(){
    //
});



