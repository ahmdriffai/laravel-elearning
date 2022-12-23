<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('pelajaran_id');
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('guru_id')
                ->references('id')->on('guru');
            $table->foreign('pelajaran_id')
                ->references('id')->on('pelajaran');
            $table->foreign('tahun_ajaran_id')
                ->references('id')->on('tahun_ajaran');
            $table->foreign('kelas_id')
                ->references('id')->on('kelas');
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
        Schema::dropIfExists('pembelajaran');
    }
}
