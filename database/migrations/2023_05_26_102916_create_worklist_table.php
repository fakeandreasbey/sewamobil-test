<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('worklist', function (Blueprint $table) {
            $table->id();
            $table->string('no_rj',14)->nullable();
            $table->string('no_rm',8)->nullable();
            $table->string('id_dokter',2)->nullable();
            $table->string('kode_tujuan',2)->nullable();
            $table->string('tipe_kedatangan',1)->nullable();
            $table->string('keluhan',255)->nullable();
            $table->enum('vital', array('1', '0'));
            $table->enum('soap', array('1', '0'));
            $table->enum('resep', array('1', '0'));
            $table->enum('lab', array('1', '0'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worklist');
    }
};
