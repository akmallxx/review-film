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
        Schema::create('genre_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_film');
            $table->unsignedBigInteger('id_genre');
            $table->timestamps();

            $table->foreign('id_film')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('id_genre')->references('id')->on('genres')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('genre_relations');
    }
};
