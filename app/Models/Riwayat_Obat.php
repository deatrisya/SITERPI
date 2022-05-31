<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Obat;
use Illuminate\Database\Eloquent\Model;

class Riwayat_Obat extends Model
{
    use HasFactory;
    protected $table = 'riwayat_obats';
    protected $primaryKey = 'id';

    protected $fillable = [
        'obat_id',
        'isi',
        'status',
        'harga_satuan',
        'total_harga'
    ];

    public function obat(){
        return $this->belongsTo(Obat::class);
    }
}
