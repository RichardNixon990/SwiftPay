<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Pembayaran():HasMany{
        return $this->hasMany(Pembayaran::class, 'id_petugas');
    }
}
