<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPakan extends Model
{
    use HasFactory;
    protected $table ='riwayat_pakans';
    protected $primaryKey = 'id';

    protected $fillable =[
        'pakan_id',
        'tanggal',
        'status',
        'waktu',
        'jumlah',
        'harga_satuan',
        'total_harga'
    ];

    public function pakan(){
        return $this->belongsTo(Pakan::class);
    }
}
