<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiHarian extends Model
{
    use HasFactory;

    protected $table = 'transaksi_harian';

    protected $fillable = [
        'transaksi_id',
        'kode_rekening',
        'via_bayar',
        'tanggal_setor',
        'jumlah_bayar',
    ];

    protected $hidden = [];

    protected $primaryKey = 'transaksi_id';

    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'kode_rekening', 'kode_rekening');
    }
    public function target()
    {
        return $this->belongsTo(Target::class, 'kode_rekening', 'kode_rekening');
    }
}
