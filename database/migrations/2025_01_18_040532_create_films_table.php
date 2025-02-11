<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('poster');
            $table->text('deskripsi');
            $table->integer('tahun_rilis');
            $table->integer('durasi');
            $table->string('pencipta');
            $table->string('trailer');
            $table->string('kategori_umur');
            $table->integer('id_users')->unsigned();
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('film');
    }
};
