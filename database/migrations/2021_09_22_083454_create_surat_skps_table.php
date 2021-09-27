<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratSkpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_skpp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('nik');
            $table->boolean('jk');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('kewarganegaraan');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('statuspernikahan');
            $table->string('alamatasal');
            $table->string('alamat_pindah_kelurahan')->nullable();
            $table->string('alamat_pindah_kecamatan')->nullable();
            $table->string('alamat_pindah_kabupaten')->nullable();
            $table->string('alamat_pindah_provinsi')->nullable();
            $table->enum('status',['Ajukan','Diterima','Ditolak'])->default('Ajukan');
            $table->string('file')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('surat_skpp');
    }
}
