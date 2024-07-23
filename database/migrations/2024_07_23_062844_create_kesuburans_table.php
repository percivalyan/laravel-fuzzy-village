<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKesuburansTable extends Migration
{
    public function up()
    {
        Schema::create('kesuburans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lahan_id');
            $table->float('pH', 5, 2);
            $table->float('c_organik', 5, 2); // Persentase C-Organik
            $table->float('n_total', 5, 2); // Persentase N-Total
            $table->float('p_tersedia', 5, 2); // ppm P-Tersedia
            $table->float('k_tersedia', 5, 2); // me/100g K-Tersedia
            $table->float('ktk', 5, 2); // me/100g KTK
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            $table->foreign('lahan_id')->references('id')->on('lahans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kesuburans');
    }
}
