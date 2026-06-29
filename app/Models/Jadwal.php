<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id';

    protected $fillable = [
        
        'kelas',
        'hari',
        'jam',
        'kode_matakuliah',
        'nidn',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(dosen::class, 'nidn', 'nidn');
    } 

    public function matakuliah(): BelongsTo
    {
        return $this->belongsTo(Matakuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }
}
