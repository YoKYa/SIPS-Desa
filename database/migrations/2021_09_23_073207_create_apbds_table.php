<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApbdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apbd', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rekening_1')->nullable();
            $table->string('kode_rekening_2')->nullable();
            $table->string('uraian')->nullable();
            $table->unsignedBigInteger('anggaran')->nullable();
            $table->string('sumber')->nullable();
            $table->year('tahun');
            $table->enum('jenis', ['Pendapatan','Belanja']);
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
        Schema::dropIfExists('apbd');
    }
}
