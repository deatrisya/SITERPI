<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_Sapi extends Model
{
    use HasFactory;
    protected $table ='jenis_sapis';
    protected $primaryKey = 'id';

    protected $fillable =[
        'jenis_sapi'
    ];

    public function datasapi(){
        return $this->hasMany(Sapi::class);
    }
}
