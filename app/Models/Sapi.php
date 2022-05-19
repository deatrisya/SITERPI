<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sapi extends Model
{
    use HasFactory;
    protected $table = 'sapis';
    protected $primaryKey = 'id';
    protected $appends = [
        'umur',
        'status_umur',
        'statussapi'
    ];

    protected $fillable = [
        'jenissapi_id',
        'nis',
        'tanggal_lahir',
        'status',
        'jenis_kelamin',
        'status_asal',
        'bobot',
        'harga',
        'kondisi',
        'keterangan'
    ];

    public function jenissapi(){
        return $this->belongsTo(Jenis_Sapi::class);
    }

    public function getUmurAttribute(){
        return \Carbon\Carbon::parse($this->tanggal_lahir)->diff(\Carbon\Carbon::now())->format('%y tahun, %m bulan dan %d hari');
    }
    public function getStatusUmurAttribute(){
        $umur = \Carbon\Carbon::parse($this->tanggal_lahir)->diff(\Carbon\Carbon::now())->y;
        if ($umur < 5) {
            $status_umur = 'Anak';
        } elseif ($umur >5 or $umur < 10) {
            $status_umur = 'Muda';
        } else {
            $status_umur = 'Dewasa';
        }
        return $status_umur;
    }

    public function getStatusSapiAttribute(){
        $status = $this->status;

        if ($status == 'Terjual') {
              $badge = '<span class="badge badge-pill badge-success">Terjual</span>';
        } else {
            $badge = '<span class="badge badge-pill badge-primary">Belum Terjual</span>';
        }

        return $badge;
    }

    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
}
