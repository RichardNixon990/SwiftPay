<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Siswa(): BelongsTo
    {
        return $this->BelongsTo(Siswa::class, 'id_siswa');
    }

    public function Petugas(): BelongsTo
    {
        return $this->BelongsTo(Petugas::class, 'id_petugas');
    }

    public function Spp(): BelongsTo
    {
        return $this->BelongsTo(Spp::class, 'id_spp');
    }


}
