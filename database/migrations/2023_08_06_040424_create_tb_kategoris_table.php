<?php
// database/migrations/xxxx_xx_xx_create_tb_kategoris_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKategorisTable extends Migration
{
    public function up()
    {
        Schema::create('tb_kategori', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('kategori');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_kategori');
    }
}
