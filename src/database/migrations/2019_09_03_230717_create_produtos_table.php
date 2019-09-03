<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id',);
            $table->string('nome',);
            $table->decimal('valorUnitario',, 8,2);
            // $table->decimal('estoque', 8,3); AINDA NÃO IREI FAZER ESSA FUNCIONALIDADE
            $table->string('barCode',)->nullable();
            $table->string('qrCode',)->nullable();
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
        Schema::dropIfExists('produtos');
    }
}
