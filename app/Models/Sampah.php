<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $table = 'sampahs';

    protected $fillable = [
        'nama',
        'satuan',
        'harga',
        'deskripsi',
    ];
}
