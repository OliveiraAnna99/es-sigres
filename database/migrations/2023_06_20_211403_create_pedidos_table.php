<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero_mesa');
            $table->integer('status');
            $table->string('obs')->nullable();
            $table->timestamps();

        });

        Schema::create('pedidos_cardapio', function (Blueprint $table) {
            $table->unsignedBigInteger('pedidos_id');
            $table->unsignedBigInteger('cardapio_id');

            $table->foreign('pedidos_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('cardapio_id')->references('id')->on('cardapios')->onDelete('cascade');
        });

        Schema::create('pedido_pagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('pedidos_id');
            $table->unsignedBigInteger('forma_pagamento_id');

            $table->foreign('pedidos_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('forma_pagamento_id')->references('id')->on('forma_pagamentos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos_cardapio');

        Schema::dropIfExists('pedidos');
    }
}
