<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'rekening';

    protected $fillable = [
        'rekening_id',
        'kode_rekening',
        'nama_rekening',
    ];

    protected $hidden = [];

    protected $primaryKey = 'rekening_id';
}
