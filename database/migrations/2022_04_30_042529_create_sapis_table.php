<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sapis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenissapi_id')->nullable();
            $table->foreign('jenissapi_id')->references('id')->on('jenis_sapis');
            $table->string('NIS',10);
            $table->date('tanggal_lahir');
            $table->integer('umur');
            $table->enum('status_umur',['Anak','Muda','Dewasa']);
            $table->enum('status',['Terjual','Belum Terjual']);
            $table->enum('jenis_kelamin',['Jantan','Betina']);
            $table->double('bobot');
            $table->double('harga');
            $table->enum('kondisi',['Sakit','Sehat']);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('sapis');
    }
}
