<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'transaksi_id',
        'nama_pelanggan',
        'jasa',
        'harga',
        'tanggal',
        'metode_pembayaran',
        'status_pembayaran',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksis::class, 'transaksi_id');
    }
}
