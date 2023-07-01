<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('cpf')->unique();
            $table->string('endereco');
            $table->string('contato');
            $table->timestamp('dataNascimento')->nullable();
            $table->string('rg', 15);
            $table->string('funcao', 150);
            $table->string('email');
            $table->string('senha');
            $table->boolean('funcionario')->default(0);
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
        Schema::dropIfExists('funcionarios');
    }
}
