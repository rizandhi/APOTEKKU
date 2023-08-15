<?php

// database/migrations/xxxx_xx_xx_create_tb_penjualans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenjualansTable extends Migration
{
    public function up()
    {
        Schema::create('tb_penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->unsignedBigInteger('id_obat');
            $table->integer('jumlah');
            $table->decimal('total', 10, 2);
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_obat')->references('id_obat')->on('tb_obat')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('tb_user')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_penjualans');
    }
}
