<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cliente_enderecos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('logradouro');
            $table->string('numero');
            $table->string('cep');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->integer('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente_enderecos');
    }
};
