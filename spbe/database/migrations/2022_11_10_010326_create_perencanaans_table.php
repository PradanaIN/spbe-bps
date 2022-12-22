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
        Schema::create('perencanaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan')->nullable();
            $table->string('slug_kegiatan')->unique();
            $table->text('deskripsi')->nullable();
            $table->text('tujuan')->nullable();
            $table->integer('peserta')->nullable();
            $table->integer('lama')->nullable();
            $table->date('tanggalAwalPelaksanaan')->nullable();
            $table->date('tanggalAkhirPelaksanaan')->nullable();
            $table->integer('status_kegiatan')->nullable();
            // $table->integer('status_persetujuan')->nullable();
            // $table->text('deskripsi_tolak')->nullable();
            $table->timestamps();
            // foreign id
            // $table->foreignId('provinsi_id')->nullable();
            // $table->foreignId('kabkota_id')->nullable();
            $table->foreignId('area_id')->nullable();
            $table->foreignId('pic_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perencanaans');
    }
};
