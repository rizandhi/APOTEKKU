<?php

// database/migrations/xxxx_xx_xx_create_tb_persediaans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPersediaanTable extends Migration
{
    public function up()
    {
        Schema::create('tb_persediaan', function (Blueprint $table) {
            $table->id('id_persediaan');
            $table->unsignedBigInteger('id_obat');
            $table->string('letak');
            $table->timestamps();

            $table->foreign('id_obat')->references('id_obat')->on('tb_obat')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_persediaan');
    }
}
