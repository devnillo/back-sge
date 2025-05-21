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
        Schema::create('instrumentos_materiais_pedagogicos', function (Blueprint $table) {
            $table->id();
            $table->char('mat_acervo_multimidia', 1);
            $table->char('mat_brinquedos_educacao_infantil', 1);
            $table->char('mat_materiais_cientificos', 1);
            $table->char('mat_equipamento_audio', 1);
            $table->char('mat_equipamento_agricola', 1);
            $table->char('mat_instrumentos_musicais', 1);
            $table->char('mat_atividades_culturais_artisticas', 1);
            $table->char('mat_educacao_profissional', 1);
            $table->char('mat_atividade_desportiva_recreacao', 1);
            $table->char('mat_educacao_bilingue_surdos', 1);
            $table->char('mat_educacao_escolar_indigena', 1);
            $table->char('mat_relacoes_etnico_raciais', 1);
            $table->char('mat_educacao_do_campo', 1);
            $table->char('mat_educacao_quilombola', 1);
            $table->char('mat_educacao_especial', 1);
            $table->char('mat_nenhum_listado', 1);

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrumentos_materiais_pedagogicos');
    }
};
