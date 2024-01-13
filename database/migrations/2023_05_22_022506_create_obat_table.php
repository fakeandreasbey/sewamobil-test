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
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('kode_obat',6)->nullable();
            $table->string('nama_obat',100)->nullable();
            $table->integer('stok',3)->nullable();
            $table->integer('stok_minimal',3)->nullable();
            $table->integer('id_golongan',1)->nullable();
            $table->integer('id_satuan',3)->nullable();
            $table->integer('id_sediaan',3)->nullable();
            $table->integer('hna',3)->nullable();
            $table->integer('ppn_hna',3)->nullable();
            $table->integer('hasil_hna_ppn',3)->nullable();
            $table->integer('etiket',1)->nullable();
            $table->date('tanggal_kadaluarsa',1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
