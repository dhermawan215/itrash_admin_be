<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;

    protected $table = "jenis_sampah";

    protected $fillable = ['kategori_sampah_id', 'nama_sampah'];

    public function kategoriSampah()
    {
        return $this->belongsTo(KategoriSampah::class, 'kategori_sampah_id', 'id');
    }

    public function jenisSampahTransaksis()
    {
        return $this->hasMany(TransaksiDetail::class, 'jenis_sampah_id', 'id');
    }
}
