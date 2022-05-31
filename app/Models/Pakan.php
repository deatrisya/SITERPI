<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RiwayatPakan;
use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    use HasFactory;
    protected $table ='pakans';
    protected $primaryKey = 'id';

    protected $fillable =[
        'jenis_pakan',
        'harga'
    ];

    public function riwayatpakan(){
        return $this->hasMany(RiwayatPakan::class);
    }
}
