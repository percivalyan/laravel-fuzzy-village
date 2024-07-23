<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lahan_id');
            $table->string('foto_1')->nullable();
            $table->text('keterangan_1')->nullable();
            $table->string('foto_2')->nullable();
            $table->text('keterangan_2')->nullable();
            $table->string('foto_3')->nullable();
            $table->text('keterangan_3')->nullable();
            $table->string('foto_4')->nullable();
            $table->text('keterangan_4')->nullable();
            $table->timestamps();

            $table->foreign('lahan_id')
                  ->references('id')
                  ->on('lahans')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos');
    }
}
