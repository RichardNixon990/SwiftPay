<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spp extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Siswa(): BelongsTo
    {
        return $this->BelongsTo(Siswa::class, 'id_siswa');
    }

    public function Pembayaran():HasMany{
        return $this->hasMany(Pembayaran::class, 'id_spp');
    }
}
