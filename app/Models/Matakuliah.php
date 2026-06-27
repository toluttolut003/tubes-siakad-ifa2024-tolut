<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function krs(): HasMany
    {
        return $this->hasMany(Krs::class, 'kode_matakuliah', 'kode_matakuliah');
    }

    public function jadwal(): HasMany
    {
        return $this->hasMany(Jadwal::class, 'kode_matakuliah', 'kode_matakuliah');
    }

}
