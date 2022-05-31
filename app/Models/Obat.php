<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Riwayat_Obat;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table ='obats';
    protected $primaryKey = 'id';

    protected $fillable =[
        'nama_obat',
        'satuan',
        'harga'
    ];

    public function riwayatobat(){
        return $this->hasMany(Riwayat_Obat::class);
    }
}
