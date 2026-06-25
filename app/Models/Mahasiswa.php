<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Override;

class Mahasiswa extends Model
{   
    protected $table = 'mahasiswa';

    protected $primaryKey = 'npm';

    protected $guarded = [
        'npm',
        'nidn',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'nama'
    ];

    public function dosen(): HasOne
    {
        return $this->hasOne(dosen::class, 'nidn', 'nidn');
    }
}
