<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dosen extends Model
{
    protected $table = 'dosen';

    protected $fillable = [
        'nama'
    ];

    protected $guarded = [
        'nidn',
        'created_at',
        'updated_at'
    ];

    // public function mahasiswa(): BelongsTo 
    // {
    //     return $this->belongsTo(Mahasiswa::class, 'nidn', 'nidn');
    // }

    // public function jadwal(): BelongsTo
    // {
    //     return $this->belongsTo(Jadwal::class, 'nidn', 'nidn');
    // }
}
