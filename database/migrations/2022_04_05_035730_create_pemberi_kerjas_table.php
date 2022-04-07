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
        Schema::create('pemberi_kerjas', function (Blueprint $table) {
            $table->id('id_pemberikerja');
            $table->string('nama_pemberikerja');
            $table->string('email');
            $table->string('password');
            $table->string('umur');
            $table->string('alamat');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->string('no_telepon');
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
        Schema::dropIfExists('pemberi_kerjas');
    }
};
