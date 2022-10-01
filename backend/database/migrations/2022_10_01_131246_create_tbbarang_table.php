<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbbarang', function (Blueprint $table) {
            $table->string('kodebarang',200)->primary();
            $table->string('nama', 200);
            $table->string('jenis', 200);
            $table->string('merk', 200);
            $table->string('satuan', 200);
            $table->double('jumlah_stock',15);
            $table->double('harga_jual',15);
            $table->double('harga_beli',15);
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
        Schema::dropIfExists('tbbarang');
    }
};
