<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;

    protected $table = "transaksi_detail";

    protected $fillable = [
        'transaksi_id',
        'jenis_sampah_id',
        'qty',
        'subtotal',
    ];

    public function jenisSampahTransaksi()
    {
        return $this->belongsTo(JenisSampah::class, 'jenis_sampah_id', 'id');
    }

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'transaksi_id', 'id');
    }
}
