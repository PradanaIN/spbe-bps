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
        Schema::create('usulans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usulan')->nullable();
            $table->string('slug_usulan')->nullable();
            $table->integer('status_usulan')->nullable();
            $table->string('satuankerja')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('tujuan')->nullable();
            $table->integer('peserta')->nullable();
            $table->integer('lama')->nullable();
            $table->date('tanggalAwalPelaksanaan')->nullable();
            $table->date('tanggalAkhirPelaksanaan')->nullable();
            $table->timestamps();
            // foreign user_id
            $table->foreignId('user_id')->nullable();
            $table->foreignId('area_id')->nullable();
            $table->foreignId('pic_id')->nullable();;
            $table->foreignId('provinsi_id')->nullable();
            $table->foreignId('kabkota_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usulans');
    }
};
