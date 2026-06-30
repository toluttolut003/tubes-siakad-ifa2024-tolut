<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Override;

class Mahasiswa extends Model
{   
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $primaryKey = 'npm';

    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'nama',
        'npm',
        'nidn'
    ];

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(dosen::class, 'nidn', 'nidn');
    }

    public function krs(): HasMany
    {
        return $this->HasMany(Krs::class, 'nidn', 'nidn');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'npm', 'npm');
    }
}
