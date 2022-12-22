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
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->text('rincian_perkembangan')->nullable();
            $table->integer('peserta')->nullable();
            $table->integer('realisasi_kegiatan')->nullable();
            $table->string('file')->nullable();
            $table->text('deskripsi_tolak')->nullable();
            $table->timestamps();
            // foreign user_id
            $table->foreignId('pengelolaan_id')->nullable();
            $table->foreignId('pengelolaan_kabkota_id')->nullable();
            $table->foreignId('area_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
};
