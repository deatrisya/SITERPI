<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pakans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pakan_id')->nullable();
            $table->foreign('pakan_id')->references('id')->on('pakans');
            $table->date('tanggal');
            $table->enum('status',['Masuk','Keluar']);
            $table->enum('waktu',['Pagi','Siang','Sore'])->nullable();
            $table->double('jumlah');
            $table->double('harga_satuan');
            $table->double('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_pakans');
    }
}
