<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = "pembayaran";

    protected $fillable = [
        'user_id',
        'transaksi_id',
        'keterangan',
        'total',
    ];

    public function pembayaranTransaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }

    public function userPembayaran()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
