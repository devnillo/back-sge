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
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->char('tipo_registro', 2)->default('20');
            $table->char('codigo_escola_inep', 8);
            $table->string('codigo_turma', 20);
            $table->string('codigo_turma_inep', 10)->nullable();
            $table->string('nome_turma', 80);
            $table->char('tipo_medicao', 1);
            
            $table->char('horario_inicio', 2)->nullable();
            $table->char('horario_minuto_inicio', 2)->nullable();
            $table->char('horario_fim', 2)->nullable();
            $table->char('horario_minuto_fim', 2)->nullable();
            
            $table->char('domingo', 1)->nullable();
            $table->char('segunda', 1)->nullable();
            $table->char('terca', 1)->nullable();
            $table->char('quarta', 1)->nullable();
            $table->char('quinta', 1)->nullable();
            $table->char('sexta', 1)->nullable();
            $table->char('sabado', 1)->nullable();
            
            $table->char('escolarizacao', 1);
            $table->char('atividade_complementar', 1);
            $table->char('atendimento_educacional_especial', 1);
            
            $table->char('formacao_geral_basica', 1)->nullable();
            $table->char('itinerario_formativo', 1)->nullable();
            $table->char('nao_se_aplica', 1)->nullable();
            
            $table->char('atividade_complementar_codigo_1', 5)->nullable();
            $table->char('atividade_complementar_codigo_2', 5)->nullable();
            $table->char('atividade_complementar_codigo_3', 5)->nullable();
            $table->char('atividade_complementar_codigo_4', 5)->nullable();
            $table->char('atividade_complementar_codigo_5', 5)->nullable();
            $table->char('atividade_complementar_codigo_6', 5)->nullable();
            
            $table->char('local_funcionamento_diferenciado_turma', 1)->nullable();
            $table->char('modalidade', 1)->nullable();
            $table->string('etapa', 2)->nullable();
            $table->string('codigo_curso', 8)->nullable();
            
            $table->char('serie_ano', 1)->nullable();
            $table->char('periodos_semestrais', 1)->nullable();
            $table->char('ciclos', 1)->nullable();
            $table->char('grupos_nao_seriados', 1)->nullable();
            $table->char('modulos', 1)->nullable();
            $table->char('alternancia_regular_periodos', 1)->nullable();
            
            $table->char('eletivas', 1)->nullable();
            $table->char('libras', 1)->nullable();
            $table->char('lingua_indigena', 1)->nullable();
            $table->char('lingua_estrangeira_espanhol', 1)->nullable();
            $table->char('lingua_estrangeira_frances', 1)->nullable();
            $table->char('lingua_estrangeira_outra', 1)->nullable();
            $table->char('projeto_vida', 1)->nullable();
            $table->char('trilhas_aprofundamento', 1)->nullable();
            $table->string('outras_unidades_curriculares', 500)->nullable();
            
            $table->char('quimica', 1)->nullable();
            $table->char('fisica', 1)->nullable();
            $table->char('matematica', 1)->nullable();
            $table->char('biologia', 1)->nullable();
            $table->char('ciencias', 1)->nullable();
            $table->char('portugues', 1)->nullable();
            $table->char('ingles', 1)->nullable();
            $table->char('espanhol', 1)->nullable();
            $table->char('outra_lingua_estrangeira', 1)->nullable();
            $table->char('arte', 1)->nullable();
            $table->char('educacao_fisica', 1)->nullable();
            $table->char('historia', 1)->nullable();
            $table->char('geografia', 1)->nullable();
            $table->char('filosofia', 1)->nullable();
            $table->char('informatica', 1)->nullable();
            $table->char('areas_conhecimento_profissionalizantes', 1)->nullable();
            $table->char('materia_libras', 1)->nullable();
            $table->char('areas_conhecimento_pedagogicas', 1)->nullable();
            $table->char('ensino_religioso', 1)->nullable();
            $table->char('lingua_indigina', 1)->nullable();
            $table->char('estudos_sociais', 1)->nullable();
            $table->char('sociologia', 1)->nullable();
            $table->char('literatura_frances', 1)->nullable();
            $table->char('lingua_portuguesa_segunda_lingua', 1)->nullable();
            $table->char('estagio_supervisionado', 1)->nullable();
            $table->char('materia_projeto_vida', 1)->nullable();
            $table->char('outras_areas_conhecimento', 1)->nullable();
            
            $table->char('classe_bilingue_surdos', 1);
            
            $table->string('qtd_vagas_alunos')->nullable();
            $table->string('carga_horaria')->nullable();
            $table->string('status')->default('ativa');

            $table->foreignId('escola_id')->constrained('escolas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};
