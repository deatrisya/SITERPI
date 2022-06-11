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
        'statussapi',
        'status_bobot'
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
        $umur = \Carbon\Carbon::parse($this->tanggal_lahir)->diff(\Carbon\Carbon::now())->m;
        // dd($umur);
        if ($umur < 2) {
            $status_umur = 'Anak';
        } elseif ($umur >2 or $umur < 7) {
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

    public function getStatusBobotAttribute(){
        $jenis_kelamin = $this->jenis_kelamin;
        $bobot = $this->bobot;
        $umur = \Carbon\Carbon::parse($this->tanggal_lahir)->diff(\Carbon\Carbon::now())->m;

       if($jenis_kelamin == 'Jantan') {
           if($umur < 2 && $bobot < 27) {
               $status_bobot = 'Kurus';
           }elseif ($umur <2 && $bobot >= 27 && $bobot < 67) {
               $status_bobot = 'Ideal';
           } elseif($umur >=2 && $umur < 7 && $bobot < 67){
               $status_bobot = 'Kurus';
           } elseif($umur >= 2 && $umur < 7 && $bobot >=67 && $bobot <= 103) {
               $status_bobot = 'Ideal';
           } elseif($umur >= 7 && $bobot < 103 ) {
               $status_bobot = "Kurus";
           } else {
               $status_bobot = "Ideal";
           }
       } elseif($jenis_kelamin == 'Betina'){
            if($umur < 2 && $bobot < 22) {
                $status_bobot = 'Kurus';
            }elseif ($umur <2 && $bobot >= 22 && $bobot < 62) {
                $status_bobot = 'Ideal';
            } elseif($umur >=2 && $umur < 7 && $bobot < 62){
                $status_bobot = 'Kurus';
            } elseif($umur >= 2 && $umur < 7 && $bobot >=62 && $bobot <= 98) {
                $status_bobot = 'Ideal';
            } elseif($umur >= 7 && $bobot < 98 ) {
                $status_bobot = "Kurus";
            } else {
                $status_bobot = "Ideal";
            }
       }
        return $status_bobot;
    }

    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }

}
