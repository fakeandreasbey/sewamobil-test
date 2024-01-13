<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm',8)->nullable();
            $table->string('no_identitas', 20)->nullable();
            $table->string('title_pasien', 10)->nullable();
            $table->string('nama_lengkap',150);
            $table->enum('jenis_kelamin', array('Laki-laki', 'Perempuan'));
            $table->string('tempat_lahir',50);
            $table->date('tanggal_lahir');
            $table->text('alamat_lengkap');
            $table->string('kode_provinsi',10)->nullable();
            $table->string('kode_kota',10)->nullable();
            $table->string('kode_kecamatan',10)->nullable();
            $table->string('kode_kelurahan',10)->nullable();
            $table->string('no_handphone',15)->nullable();
            $table->string('no_telp_rumah',10)->nullable();
            $table->string('email',100)->nullable();
            $table->string('agama',15)->nullable();
            $table->string('gol_darah',3)->nullable();
            $table->text('alergi')->nullable();
            $table->string('nama_kontak_darurat',150)->nullable();
            $table->string('kode_hub_darurat',2)->nullable();
            $table->string('no_handphone_darurat',15)->nullable();
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
        Schema::dropIfExists('pasien');
    }
}
