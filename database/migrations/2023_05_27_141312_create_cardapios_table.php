<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardapiosTable extends Migration
{
    public function up()
    {
        Schema::create('cardapios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 60);
            $table->double('valor');
            $table->timestamps();
        });

        Schema::create('cardapio_estoque', function (Blueprint $table) {
            $table->unsignedBigInteger('cardapio_id');
            $table->unsignedBigInteger('estoque_id');

            $table->foreign('cardapio_id')->references('id')->on('cardapios')->onDelete('cascade');
            $table->foreign('estoque_id')->references('id')->on('estoques')->onDelete('cascade');
        });

    
    }

    public function down()
    {
        Schema::dropIfExists('cardapio_estoque');
        Schema::dropIfExists('cardapios');
    }
}
