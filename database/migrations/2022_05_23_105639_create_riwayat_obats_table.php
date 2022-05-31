<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_obats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obat_id')->nullable();
            $table->foreign('obat_id')->references('id')->on('obats');
            $table->integer('isi');
            $table->enum('status',['Masuk','Keluar']);
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
        Schema::dropIfExists('riwayat_obats');
    }
}
