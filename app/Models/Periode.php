<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table = 'periode';

    protected $fillable = [
        'periode_id',
        'awal_masa',
        'akhir_masa',
    ];

    protected $hidden = [];

    protected $primaryKey = 'periode_id';
}
