<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    use HasFactory;
    protected $table = 'penarikans';
    protected $fillable = [
        'user_id',
        'saldo_id',
        'jumlah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function saldo()
    {
        return $this->belongsTo(Saldo::class);
    }
}
