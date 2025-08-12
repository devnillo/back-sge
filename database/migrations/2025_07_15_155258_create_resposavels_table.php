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
        Schema::create('responsaveis', function (Blueprint $table) {
            $table->id();
            $table->string('nome_responsavel', 100)->nullable();
            $table->string('sexo_responsavel')->nullable();
            $table->string('cor_responsavel')->nullable();
            $table->string('nacionalidade_responsavel')->nullable();
            $table->string('cpf_responsavel')->nullable();
            $table->string('data_nascimento_responsavel')->nullable();
            $table->string('naturalidade_responsavel')->nullable();
            $table->string('endereco_responsavel')->nullable();
            $table->string('telefone_responsavel')->nullable();
            $table->string('email_responsavel')->nullable();
            $table->string('escolaridade_responsavel')->nullable();
            $table->string('parentesco_responsavel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsaveis');
    }
};
