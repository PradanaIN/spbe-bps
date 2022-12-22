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
        Schema::create('kabkota_perencanaan', function (Blueprint $table) {
            $table->id();
            $table->integer('kabkota_id');
            $table->integer('perencanaan_id');
            $table->integer('area_id')->nullable();
            $table->integer('provinsi_id')->nullable();
            $table->integer('status_persetujuan')->nullable();
            $table->integer('persentase_akhir')->nullable();
            $table->integer('role_id')->nullable();
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
        Schema::dropIfExists('kabkota_perencanaan');
    }
};
