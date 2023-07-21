<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksi";

    protected $fillable = [
        'no_transaksi',
        'tanggal_transaksi',
        'user_id',
        'status',
        'total',
    ];

    public function userTrransaksi()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
