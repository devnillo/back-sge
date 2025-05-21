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
        Schema::create('infraestrutura_profissionais', function (Blueprint $table) {
            $table->id();
            $table->string('prof_agricultura_horta_plantio', 4)->nullable();
            $table->string('prof_auxiliares_secretaria', 4)->nullable();
            $table->string('prof_servicos_gerais', 4)->nullable();
            $table->string('prof_biblioteca_leitura', 4)->nullable();
            $table->string('prof_saude_urgencia_emergencia', 4)->nullable();
            $table->string('prof_coordenador_turno', 4)->nullable();
            $table->string('prof_fonoaudiologo', 4)->nullable();
            $table->string('prof_nutricionista', 4)->nullable();
            $table->string('prof_psicologo', 4)->nullable();
            $table->string('prof_cozinha_alimentacao', 4)->nullable();
            $table->string('prof_apoio_supervisao_pedagogica', 4)->nullable();
            $table->string('prof_secretario_escolar', 4)->nullable();
            $table->string('prof_segurança_patrimonial', 4)->nullable();
            $table->string('prof_tecnologia_laboratorio_multimeios', 4)->nullable();
            $table->string('prof_vice_diretor_gestor_administrativo', 4)->nullable();
            $table->string('prof_orientador_comunitario', 4)->nullable();
            $table->string('prof_interprete_libras', 4)->nullable();
            $table->string('prof_revisor_braille_assistente_vidente', 4)->nullable();
            $table->char('prof_nenhuma_funcao_listada', 1)->nullable();

            $table->foreignId('escola_infra_id')->constrained('escola_infraestruturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infraestrutura_profissionais');
    }
};
