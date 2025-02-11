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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->enum('rating', [1, 2, 3, 4, 5]);
            $table->integer('id_user')->unsigned();
            $table->unsignedBigInteger('id_film');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_film')->references('id')->on('films');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
