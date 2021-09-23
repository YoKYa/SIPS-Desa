<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratSktmsTable extends Migration
{
    public function up()
    {
        Schema::create('surat_sktm', function (Blueprint $table) {
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
            $table->string('alamat');
            $table->string('keterangan')->nullable();
            $table->enum('status', ['Ajukan', 'Diterima', 'Ditolak'])->default('Ajukan');
            $table->string('file')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    public function down()
    {
        Schema::dropIfExists('surat_sktm');
    }
}
