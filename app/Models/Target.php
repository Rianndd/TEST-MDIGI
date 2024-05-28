<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table = 'target';

    protected $fillable = [
        'target_id',
        'kode_rekening',
        'target',
        'periode_id',
    ];

    protected $hidden = [];

    protected $primaryKey = 'target_id';

    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'kode_rekening', 'kode_rekening');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id', 'periode_id');
    }
    public function transaksiHarian()
    {
        return $this->hasMany(TransaksiHarian::class, 'kode_rekening', 'kode_rekening');
    }
}
