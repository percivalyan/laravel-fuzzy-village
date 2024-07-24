<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lahan_id');
            $table->string('nama_tim_penggarap')->nullable();
            $table->integer('jumlah_penggarap')->nullable();
            $table->text('nama_penggarap')->nullable();
            $table->date('tanggal_pengerjaan_sawah_awal')->nullable();
            $table->date('tanggal_pengerjaan_sawah_akhir')->nullable();
            $table->string('penyewa')->nullable();
            $table->decimal('harga_sewa_lahan', 15, 2)->nullable();
            $table->decimal('harga_pupuk', 15, 2)->nullable();
            $table->decimal('harga_irigasi', 15, 2)->nullable();
            $table->integer('jumlah_panen')->nullable();
            $table->decimal('gaji_penggarap_per_orang', 15, 2)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Add foreign key constraint if 'lahan_id' references the 'lahans' table
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
        Schema::dropIfExists('periodes');
    }
}
