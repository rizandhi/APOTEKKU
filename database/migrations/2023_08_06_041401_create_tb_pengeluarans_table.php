<?php
// database/migrations/xxxx_xx_xx_create_tb_pengeluarans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPengeluaransTable extends Migration
{
    public function up()
    {
        Schema::create('tb_pengeluaran', function (Blueprint $table) {
            $table->id('id_pengeluaran');
            $table->unsignedBigInteger('id_obat');
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->decimal('total_harga', 10, 2);
            $table->timestamps();

            $table->foreign('id_obat')->references('id_obat')->on('tb_obat')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_pengeluaran');
    }
}
