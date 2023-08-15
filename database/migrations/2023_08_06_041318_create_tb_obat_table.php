<?php
// database/migrations/xxxx_xx_xx_create_tb_obats_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbObatTable extends Migration
{
    public function up()
    {
        Schema::create('tb_obat', function (Blueprint $table) {
            $table->id('id_obat');
            $table->unsignedBigInteger('id_kategori');
            $table->string('kode_obat');
            $table->string('nama_obat');
            $table->decimal('harga_jual', 10, 2);
            $table->integer('jumlah');
            $table->date('tgl_exp');
            $table->unsignedBigInteger('id_suplier');
            $table->timestamps();

            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategori')->onDelete('cascade');
            $table->foreign('id_suplier')->references('id_suplier')->on('tb_suplier')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_obat');
    }
}
