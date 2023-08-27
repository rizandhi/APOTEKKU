<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tb_rekap', function (Blueprint $table) {
            $table->id(); // This will create an auto-increment primary key column
            $table->unsignedBigInteger('id_obat');
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->string('jenis');
            $table->timestamps();

            // Define foreign key relationships if needed
            $table->foreign('id_obat')->references('id_obat')->on('tb_obat'); // Menggunakan nama tabel yang benar, yaitu "tb_obat"

        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_rekap');
    }

};
