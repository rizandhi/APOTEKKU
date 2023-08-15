<?php
// database/migrations/xxxx_xx_xx_create_tb_transaksis_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_penjualan');
            $table->unsignedBigInteger('id_pengeluaran');
            $table->timestamps();

            $table->foreign('id_penjualan')->references('id_penjualan')->on('tb_penjualan')->onDelete('cascade');
            $table->foreign('id_pengeluaran')->references('id_pengeluaran')->on('tb_pengeluaran')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
}
