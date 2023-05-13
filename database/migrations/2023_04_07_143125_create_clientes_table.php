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
            $table->integer('tipo');
            $table->string('cnpj',18)->nullable();
            $table->string('cpf',14)->nullable();
            $table->string('cnpj_cpf')->nullable();
            $table->string('razao_social')->nullable();
            $table->string('nome_fantasia', 255)->nullable();
            $table->string('telefone');
            $table->string('email',100);
            $table->string('cep',10);
            $table->string('rua',150);
            $table->string('numero',20);
            $table->string('complemento')->nullable();
            $table->string('bairro',50);
            $table->string('cidade',50);
            $table->string('estado');
            $table->unsignedBigInteger('usuario_id'); 
            $table->foreign('usuario_id')->references('id')->on('users'); 
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
