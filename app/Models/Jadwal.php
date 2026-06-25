<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kelas',
        'hari',
        'jam'
    ];

    protected $guarded = [
        'id',
        'kode_matakuliah',
        'nidn',
        'created_at',
        'updated_at'
    ];

    public function dosen(): HasOne
    {
        return $this->hasOne(dosen::class, 'nidn', 'nidn');
    } 

    public function matakuliah(): HasOne
    {
        return $this->hasOne(Matakuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }
}
