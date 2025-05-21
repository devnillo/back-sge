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
        Schema::create('formas_educacao_ambientals', function (Blueprint $table) {
            $table->id();
            $table->char('educ_ambiental_conteudo_curricular', 1)->nullable();
            $table->char('educ_ambiental_componente_especifico', 1)->nullable();
            $table->char('educ_ambiental_eixo_estruturante', 1)->nullable();
            $table->char('educ_ambiental_eventos', 1)->nullable();
            $table->char('educ_ambiental_projetos_transversais', 1)->nullable();
            $table->char('educ_ambiental_nenhuma_opcao', 1)->nullable();

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formas_desenvolvimento_educacao_ambientals');
    }
};
