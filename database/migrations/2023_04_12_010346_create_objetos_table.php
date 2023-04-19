<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id'); 
            $table->string('descricao', 300)->nullable(false);
            $table->unsignedBigInteger('cliente_id'); 
            $table->unsignedBigInteger('tipo_id'); 
            $table->string('observacao', 300)->nullable(false);
            $table->dateTime('data_limite')->nullable();
            $table->dateTime('data_envio')->nullable();
            $table->string('status', 45)->nullable(false);
            $table->string('op_envio', 45)->nullable(false);
            $table->string('digitalizado', 45)->nullable(false)->default('0');
            $table->foreign('usuario_id')->references('id')->on('users'); 
            $table->foreign('cliente_id')->references('id')->on('clientes'); 
            $table->foreign('tipo_id')->references('id')->on('tipo_objetos'); 
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
        Schema::dropIfExists('objetos');
    }
}
