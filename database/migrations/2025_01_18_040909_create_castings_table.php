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
        Schema::create('castings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_panggung');
            $table->string('nama_asli');
            $table->unsignedBigInteger('id_film');
            $table->timestamps();

            $table->foreign('id_film')->references('id')->on('films');
        });
    }

    public function down()
    {
        Schema::dropIfExists('castings');
    }
};
