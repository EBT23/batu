<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = [
        'id_barang',
        'jumlah_berat',
        'barang_in',
        'barang_out',
        'status_pemesanan',
        'total_harga',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
