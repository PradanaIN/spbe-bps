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
        Schema::create('perencanaan_provinsi', function (Blueprint $table) {
            $table->id();
            $table->integer('perencanaan_id');
            // $table->integer('area_id')->nullable();
            $table->integer('provinsi_id')->nullable();
            $table->integer('kab_id')->nullable();
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
        Schema::dropIfExists('perencanaans_provinsis');
    }
};
