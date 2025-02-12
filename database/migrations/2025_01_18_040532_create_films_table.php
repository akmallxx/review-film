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
            $table->string('poster');
            $table->string('judul');
            $table->text('deskripsi');
            $table->text('kategori_film');
            $table->year('tahun_rilis');
            $table->integer('durasi');
            $table->string('pencipta');
            $table->text('trailer');
            $table->string('kategori_umur');
            $table->integer('episode');
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
