<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Kelas(): BelongsTo
    {
        return $this->BelongsTo(Kelas::class, 'id_kelas');
    }

    public function Spp():HasMany{
        return $this->hasMany(Spp::class, 'id_siswa');
    }

    public function Pembayaran():HasMany{
        return $this->hasMany(Pembayaran::class, 'id_siswa');
    }
}
