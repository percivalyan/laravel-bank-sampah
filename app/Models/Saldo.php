<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;
    protected $table = 'saldos';
    protected $fillable = [
        'user_id',
        'sampah_id',
        'transaksi_id',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sampah()
    {
        return $this->belongsTo(Sampah::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
