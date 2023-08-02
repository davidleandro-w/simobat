<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_obat', function (Blueprint $table) {
            $table->id('id_obat');
            $table->integer('id_jenis_obat');
            $table->string('nama_obat');
            $table->string('satuan');
            $table->bigInteger('harga');
            $table->integer('stok');
            $table->date('tanggal_expired');
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
        Schema::dropIfExists('tb_obat');
    }
}
