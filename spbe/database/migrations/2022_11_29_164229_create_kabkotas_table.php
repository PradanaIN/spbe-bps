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
        Schema::create('kabkotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kabkota');
            $table->string('slug_kabkota');
            $table->timestamps();
            // foreign id
            // $table->foreignId('pic_id')->nullable();
            // $table->foreignId('area_id')->nullable();
            $table->foreignId('provinsi_id')->nullable();
            // $table->foreignId('perencanaan_id')->nullable();
            // $table->foreignId('pengelolaan_id')->nullable();
            // $table->foreignId('usulan_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kabkotas');
    }
};
