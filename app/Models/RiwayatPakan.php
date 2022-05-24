<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPakan extends Model
{
    use HasFactory;
    protected $table ='pakans';
    protected $primaryKey = 'id';

    protected $fillable =[
        'jenis_pakan'
    ];

    public function riwayatpakan(){
        return $this->hasMany(RiwayatPakan::class);
    }
}
