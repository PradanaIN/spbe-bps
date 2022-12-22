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
        Schema::create('pics', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pic');
            $table->string('slug_pic');
            $table->timestamps();
            // foreign id
            // $table->foreignId('area_id')->nullable();
            // $table->foreignId('provinsi_id')->nullable();
            // $table->foreignId('kabkota_id')->nullable();
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
        Schema::dropIfExists('pics');
    }
};
