<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_trainings', function (Blueprint $table) {
            $table->id();
            $table->integer('id_admin')->unsigned();
            $table->string('nama_videotraining')->nullable();
            $table->string('deskripsi_videotraining')->nullable();
            $table->string('link_video')->nullable();
            $table->string('durasi')->nullable();
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
        Schema::dropIfExists('video_trainings');
    }
};
