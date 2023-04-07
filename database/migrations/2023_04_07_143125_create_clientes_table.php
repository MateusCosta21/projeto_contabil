<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cnpj',18);
            $table->string('razao_social');
            $table->string('nome_fantasia', 255);
            $table->string('telefone');
            $table->string('email',100);
            $table->string('cep',10);
            $table->string('rua',150);
            $table->string('numero',20);
            $table->string('complemento');
            $table->string('bairro',50);
            $table->string('cidade',50);
            $table->string('estado');

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
        Schema::dropIfExists('clientes');
    }
}
