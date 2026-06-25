<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Krs extends Model
{
    protected $table = 'krs';
    protected $primaryKey = 'id';

    protected $guarded = [
        'id',
        'npm',
        'kode_matakuliah',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [];

    public function mahasiswa(): HasOne
    {
        return $this->hasOne(Mahasiswa::class, 'npm', 'npm');
    }

    public function matakuliah(): HasOne
    {
        return $this->hasOne(Matakuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }
}
