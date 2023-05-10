<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelPendaftar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_user')->reference('id')->on('users');
            $table->foreignId('id_jurusan')->reference('id')->on('jurusan');
            $table->foreignId('id_periode')->reference('id')->on('periode');
            $table->integer('no_pendaftar');
            $table->string('status_seleksi',20);

            $table->string('nama',100);
            $table->string('nisn',50);
            $table->string('tempat_lahir',50);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['L','P']);
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara');
            $table->string('agama',15);
            $table->string('hp',15)->nullable();
            $table->string('hobi',20)->nullable();
            $table->string('cita_cita',20)->nullable(); 

            $table->string('jenis_tempat_tinggal')->nullable();
            $table->string('alamat')->nullable();
            $table->string('desa',50)->nullable();
            $table->string('kecamatan',50)->nullable();
            $table->string('kota',50)->nullable();
            $table->string('propinsi',50)->nullable();
            $table->string('rt',5)->nullable();
            $table->string('rw',5)->nullable();
            $table->string('kode_pos',5)->nullable();
            $table->string('jarak',20)->nullable();
            $table->string('transportasi',20)->nullable();
            
            $table->string('no_kk',50)->nullable();
            $table->string('nama_kk',100)->nullable();
            $table->string('no_kks',50)->nullable();
            $table->string('no_pkh',50)->nullable();
            $table->string('no_kip',50)->nullable();

            $table->string('nama_ayah',100)->nullable();
            $table->string('nik_ayah',50)->nullable();
            $table->string('tahun_lahir_ayah',50)->nullable();
            $table->string('status_ayah',50)->nullable();
            $table->string('pekerjaan_ayah',50)->nullable();
            $table->string('penghasilan_ayah',50)->nullable();
            $table->string('pendidikan_ayah',50)->nullable();

            $table->string('nama_ibu',100)->nullable();
            $table->string('nik_ibu',50)->nullable();
            $table->string('tahun_lahir_ibu',50)->nullable();
            $table->string('status_ibu',50)->nullable();
            $table->string('pekerjaan_ibu',50)->nullable();
            $table->string('penghasilan_ibu',50)->nullable();
            $table->string('pendidikan_ibu',50)->nullable();

            $table->string('nama_wali',100)->nullable();
            $table->string('nik_wali',50)->nullable();
            $table->string('tahun_lahir_wali',50)->nullable();
            $table->string('status_wali',50)->nullable();
            $table->string('pekerjaan_wali',50)->nullable();
            $table->string('penghasilan_wali',50)->nullable();
            $table->string('pendidikan_wali',50)->nullable();
            $table->string('hp_wali',15)->nullable();

            $table->string('nama_sekolah',50)->nullable();
            $table->string('jenjang_sekolah',50)->nullable();
            $table->string('status_sekolah',50)->nullable();
            $table->string('lokasi_sekolah',50)->nullable();
            $table->integer('tahun_lulus')->nullable();
            $table->string('no_un',20)->nullable();
            $table->string('prestasi',100)->nullable();

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
        Schema::dropIfExists('pendaftar');
    }
}
