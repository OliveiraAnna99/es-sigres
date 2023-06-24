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
            $table->string('ingredientes', 500);
            $table->double('valor');
            $table->string('status')->default('pendente');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cardapios');
    }
}