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
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->char('tipo_registro', 2)->default('30');
            $table->char('codigo_escola_inep', 8)->nullable();
            $table->string('codigo_pessoa_fisica_sistema_proprio', 20);
            $table->char('identificacao_unica_inep', 12)->nullable();
            $table->char('numero_cpf', 11);
            $table->string('nome_completo', 100);
            $table->string('data_nascimento', 11);
            $table->char('filiacao', 1);
            $table->string('filiacao_1', 100)->nullable();
            $table->string('filiacao_2', 100)->nullable();
            $table->char('sexo', 1);
            $table->char('cor_raca', 1);

            $table->char('nacionalidade', 1);
            $table->string('pais_nacionalidade', 2);
            $table->char('municipio_nascimento', 7)->nullable();

            $table->char('pessoa_fisica_com_deficiencia_ou_transtorno', 1)->nullable();
            $table->char('pessoa_fisica_com_deficiencia_ou_transtorno_autismo', 1)->nullable();
            $table->char('cegueira', 1)->nullable();
            $table->char('baixa_visao', 1)->nullable();
            $table->char('visao_monocular', 1)->nullable();
            $table->char('surdez', 1)->nullable();
            $table->char('deficiencia_auditiva', 1)->nullable();
            $table->char('surdocegueira', 1)->nullable();
            $table->char('deficiencia_fisica', 1)->nullable();
            $table->char('deficiencia_intelectual', 1)->nullable();
            $table->char('deficiencia_multipla', 1)->nullable();
            $table->char('transtorno_espectro_autista', 1)->nullable();
            $table->char('altas_habilidades_superdotacao', 1)->nullable();
            $table->char('auxilio_ledor', 1)->nullable();
            $table->char('auxilio_transcricao', 1)->nullable();
            $table->char('guia_interprete', 1)->nullable();
            $table->char('tradutor_interprete_libras', 1)->nullable();
            $table->char('leitura_labial', 1)->nullable();
            $table->char('prova_ampliada', 1)->nullable();
            $table->char('prova_superampliada', 1)->nullable();
            $table->char('cd_audio_deficiente_visual', 1)->nullable();
            $table->char('prova_lingua_portuguesa_segunda_lingua', 1)->nullable();
            $table->char('prova_video_libras', 1)->nullable();
            $table->char('material_didatico_prova_braille', 1)->nullable();
            $table->char('nenhum_recurso', 1)->nullable();

            $table->char('numero_matricula_certidao_nascimento', 32)->nullable();

            $table->string('pais_residencia', 3)->nullable();
            $table->char('cep', 8)->nullable();
            $table->char('municipio_residencia', 7)->nullable();
            $table->char('localizacao_zona_residencia', 1)->nullable();
            $table->char('localizacao_diferenciada_residencia', 1)->nullable();

            $table->char('maior_nivel_escolaridade_concluido', 1)->nullable();
            $table->char('tipo_ensino_medio_cursado', 1)->nullable();
            $table->char('codigo_curso_1', 8)->nullable();
            $table->char('ano_conclusao_1', 4)->nullable();
            $table->string('instituicao_educacao_superior_1', 7)->nullable();
            $table->char('codigo_curso_2', 8)->nullable();
            $table->char('ano_conclusao_2', 4)->nullable();
            $table->string('instituicao_educacao_superior_2', 7)->nullable();
            $table->char('codigo_curso_3', 8)->nullable();
            $table->char('ano_conclusao_3', 4)->nullable();
            $table->string('instituicao_educacao_superior_3', 7)->nullable();

            $table->string('area_conhecimento_componentes_curriculares_1', 2)->nullable();
            $table->string('area_conhecimento_componentes_curriculares_2', 2)->nullable();
            $table->string('area_conhecimento_componentes_curriculares_3', 2)->nullable();

            $table->char('tipo_pos_graduacao_1', 1)->nullable();
            $table->string('area_pos_graduacao_1', 2)->nullable();
            $table->char('ano_conclusao_pos_graduacao_1', 4)->nullable();
            $table->char('tipo_pos_graduacao_2', 1)->nullable();
            $table->string('area_pos_graduacao_2', 2)->nullable();
            $table->char('ano_conclusao_pos_graduacao_2', 4)->nullable();
            $table->char('tipo_pos_graduacao_3', 1)->nullable();
            $table->string('area_pos_graduacao_3', 2)->nullable();
            $table->char('ano_conclusao_pos_graduacao_3', 4)->nullable();
            $table->char('tipo_pos_graduacao_4', 1)->nullable();
            $table->string('area_pos_graduacao_4', 2)->nullable();
            $table->char('ano_conclusao_pos_graduacao_4', 4)->nullable();
            $table->char('tipo_pos_graduacao_5', 1)->nullable();
            $table->string('area_pos_graduacao_5', 2)->nullable();
            $table->char('ano_conclusao_pos_graduacao_5', 4)->nullable();
            $table->char('tipo_pos_graduacao_6', 1)->nullable();
            $table->string('area_pos_graduacao_6', 2)->nullable();
            $table->char('ano_conclusao_pos_graduacao_6', 4)->nullable();
            $table->char('nao_tem_pos_graduacao_concluida', 1)->nullable();

            $table->char('creche', 1)->nullable();
            $table->char('pre_escola', 1)->nullable();
            $table->char('anos_iniciais_ensino_fundamental', 1)->nullable();
            $table->char('anos_finais_ensino_fundamental', 1)->nullable();
            $table->char('ensino_medio', 1)->nullable();
            $table->char('educacao_jovens_adultos', 1)->nullable();
            $table->char('educacao_especial', 1)->nullable();
            $table->char('educacao_indigena', 1)->nullable();
            $table->char('educacao_campo', 1)->nullable();
            $table->char('educacao_ambiental', 1)->nullable();
            $table->char('educacao_direitos_humanos', 1)->nullable();
            $table->char('educacao_bilingue_surdos', 1)->nullable();
            $table->char('educacao_tecnologia_informacao_comunicacao', 1)->nullable();
            $table->char('genero_diversidade_sexual', 1)->nullable();
            $table->char('direitos_crianca_adolescente', 1)->nullable();
            $table->char('educacao_relacoes_etnico_raciais_historia_afro', 1)->nullable();
            $table->char('gestao_escolar', 1)->nullable();
            $table->char('outros', 1)->nullable();
            $table->char('nenhum', 1)->nullable();

            $table->string('endereco_eletronico_email', 100)->nullable();

            $table->foreignId('escola_id')->nullable()->constrained('escolas');
            $table->foreignId('secretaria_id')->nullable()->constrained('secretarias');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pessoas');
    }
};
