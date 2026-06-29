<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'npm', 'npm');
    }

    public function matakuliah(): BelongsTo
    {
        return $this->belongsTo(Matakuliah::class, 'kode_matakuliah', 'kode_matakuliah');
    }
}
