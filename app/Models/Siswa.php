<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Siswa extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['password']; // Pastikan password tersembunyi

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function pembayaran(): HasMany
    {
        return $this->hasMany(Pembayaran::class, 'nisn', 'nisn');
    }
}
