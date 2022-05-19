<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id';

    protected $fillable = [
        'sapi_id',
        'status_transaksi',
        'harga'
    ];

    public function sapi(){
        return $this->belongsTo(sapi::class);
    }

}

