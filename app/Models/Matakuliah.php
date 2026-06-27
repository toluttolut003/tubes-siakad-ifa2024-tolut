<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table='matakuliah';
    protected $primaryKey = 'kode_matakuliah';
    
    protected $fillable = [
        'sks',
        'nama_matakuliah'
    ];

    protected $guarded = [
        'kode_matakuliah',
        'created_at',
        'updated_at'
    ];
}
