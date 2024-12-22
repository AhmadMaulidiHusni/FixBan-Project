<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksis extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // Nama tabel di database
    protected $fillable = [
        'nama_pelanggan',
        'jasa',
        'tanggal',
        'harga',
        'status',
    ];
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'jasa', 'name');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
