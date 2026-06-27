<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function mahasiswa(): HasMany 
    {
        return $this->HasMany(Mahasiswa::class, 'nidn', 'nidn');
    }

    public function jadwal(): HasMany 
    {
        return $this->HasMany(Jadwal::class, 'nidn', 'nidn');
    }


    // i still dont understand if this function supposed to be put in here too braahhh

    // public function jadwal(): BelongsTo
    // {
    //     return $this->belongsTo(Jadwal::class, 'nidn', 'nidn');
    // }
}
