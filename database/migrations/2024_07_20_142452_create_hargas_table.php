<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hargas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lahan_id');
            $table->decimal('harga_per_hektar', 15, 2);
            $table->decimal('luas_per_hektar', 10, 2);
            $table->decimal('harga_sebenarnya', 20, 2);
            $table->timestamps();

            $table->foreign('lahan_id')->references('id')->on('lahans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hargas');
    }
}
