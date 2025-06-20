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
        Schema::create('escola_infraestruturas', function (Blueprint $table) {
            $table->id();
            
            
            
            
            
            
            $table->string('tipo_registro')->default("10");
            $table->string('codigo_escola_inep')->max('8');

            $table->char('predio_escolar', 1);
            $table->char('salas_em_outra_escola', 1);
            $table->char('galpao_rancho_paiol_barracao', 1);
            $table->char('unidade_atendimento_socioeducativa', 1);
            $table->char('unidade_prisional', 1);
            $table->char('outros_locais_funcionamento', 1);
            
            $table->char('forma_ocupacao_predio', 1)->nullable();
            $table->char('predio_compartilhado_outra_escola', 1)->nullable();
            $table->string('codigo_escola_compartilha_1', 8)->nullable();
            $table->string('codigo_escola_compartilha_2', 8)->nullable();
            $table->string('codigo_escola_compartilha_3', 8)->nullable();
            $table->string('codigo_escola_compartilha_4', 8)->nullable();
            $table->string('codigo_escola_compartilha_5', 8)->nullable();
            $table->string('codigo_escola_compartilha_6', 8)->nullable(); 
            
            $table->char('alimentacao_escolar_alunos', 1); 
            
            // $table->char('alimentacao_escolar_alunos', 1); 
            

            $table->foreignId('escola_id')->constrained('escolas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escola_infraestruturas');
    }
};
