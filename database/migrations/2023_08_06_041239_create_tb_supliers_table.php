<?php
// database/migrations/xxxx_xx_xx_create_tb_supliers_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSupliersTable extends Migration
{
   
    public function up()
    {
        Schema::create('tb_suplier', function (Blueprint $table) {
            $table->id('id_suplier');
            $table->string('nama_suplier');
            $table->string('nama_agen')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kontak')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_suplier');
    }
}
