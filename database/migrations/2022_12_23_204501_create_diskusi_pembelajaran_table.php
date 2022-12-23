<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskusiPembelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskusi_pembelajaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pembelajaran_id');
            $table->text('komentar');
            $table->integer('like')->default(0);
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->foreign('pembelajaran_id')
                ->references('id')->on('pembelajaran');
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
        Schema::dropIfExists('diskusi_pembelajaran');
    }
}
