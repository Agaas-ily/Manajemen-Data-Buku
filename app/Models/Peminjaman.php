<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $guarded = [];
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'peminjaman_bukus', 'peminjaman_id', 'buku_id')->withTimestamps();
    }
}
