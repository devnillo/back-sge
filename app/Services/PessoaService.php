<?php

namespace App\Services;

use App\Models\Pessoa;
use Spatie\Permission\Models\Role;

class PessoaService
{
    public function register(array $validated): Pessoa
    {
        $validated['codigo_pessoa_fisica_sistema_proprio'] = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);

        $pessoa = Pessoa::create([
            'tipo_registro' => "30",
            'codigo_escola_inep' => $validated['codigo_escola_inep'] ?? null,
            'codigo_pessoa_fisica_sistema_proprio' => $validated['codigo_pessoa_fisica_sistema_proprio'] ?? null,
            'identificacao_unica_inep' => $validated['identificacao_unica_inep']  ?? null,
            'numero_cpf' => $validated['numero_cpf'],
            'nome_completo' => $validated['nome_completo'],
            'data_nascimento' => $validated['data_nascimento'],
            'filiacao' => $validated['filiacao'],
            'filiacao_1' => $validated['filiacao_1'] ?? null,
            'filiacao_2' => $validated['filiacao_2'] ?? null,
            'sexo' => $validated['sexo'],
            'cor_raca' => $validated['cor_raca'],
            'nacionalidade' => $validated['nacionalidade'],
            'pais_nacionalidade' => $validated['pais_nacionalidade'],
            'municipio_nascimento' => $validated['municipio_nascimento'] ?? null,
            'pessoa_fisica_com_deficiencia_ou_transtorno' => $validated['pessoa_fisica_com_deficiencia_ou_transtorno']  ?? null,
            'pessoa_fisica_com_deficiencia_ou_transtorno_autismo' => $validated['pessoa_fisica_com_deficiencia_ou_transtorno_autismo'] ?? null,
            'cegueira' => $validated['cegueira'] ?? null,
            'baixa_visao' => $validated['baixa_visao'] ?? null,
            'visao_monocular' => $validated['visao_monocular'] ?? null,
            'surdez' => $validated['surdez'] ?? null,
            'deficiencia_auditiva' => $validated['deficiencia_auditiva'] ?? null,
            'surdocegueira' => $validated['surdocegueira'] ?? null,
            'deficiencia_fisica' => $validated['deficiencia_fisica'] ?? null,
            'deficiencia_intelectual' => $validated['deficiencia_intelectual'] ?? null,
            'deficiencia_multipla' => $validated['deficiencia_multipla'] ?? null,
            'transtorno_espectro_autista' => $validated['transtorno_espectro_autista'] ?? null,
            'altas_habilidades_superdotacao' => $validated['altas_habilidades_superdotacao'] ?? null,
            'auxilio_ledor' => $validated['auxilio_ledor'] ?? null,
            'auxilio_transcricao' => $validated['auxilio_transcricao'] ?? null,
            'guia_interprete' => $validated['guia_interprete'] ?? null,
            'tradutor_interprete_libras' => $validated['tradutor_interprete_libras'] ?? null,
            'leitura_labial' => $validated['leitura_labial'] ?? null,
            'prova_ampliada' => $validated['prova_ampliada'] ?? null,
            'prova_superampliada' => $validated['prova_superampliada'] ?? null,
            'cd_audio_deficiente_visual' => $validated['cd_audio_deficiente_visual'] ?? null,
            'prova_lingua_portuguesa_segunda_lingua' => $validated['prova_lingua_portuguesa_segunda_lingua'] ?? null,
            'prova_video_libras' => $validated['prova_video_libras'] ?? null,
            'material_didatico_prova_braille' => $validated['material_didatico_prova_braille'] ?? null,
            'nenhum_recurso' => $validated['nenhum_recurso'] ?? null,
            'numero_matricula_certidao_nascimento' => $validated['numero_matricula_certidao_nascimento'] ?? null,
            'pais_residencia' => $validated['pais_residencia'] ?? null,
            'cep' => $validated['cep'] ?? null,
            'municipio_residencia' => $validated['municipio_residencia']  ?? null,
            'localizacao_zona_residencia' => $validated['localizacao_zona_residencia'] ?? null,
            'localizacao_diferenciada_residencia' => $validated['localizacao_diferenciada_residencia'] ?? null,
            'maior_nivel_escolaridade_concluido' => $validated['maior_nivel_escolaridade_concluido'] ?? null,
            'tipo_ensino_medio_cursado' => $validated['tipo_ensino_medio_cursado'] ?? null,
            'codigo_curso_1' => $validated['codigo_curso_1'] ?? null,
            'ano_conclusao_1' => $validated['ano_conclusao_1'] ?? null,
            'instituicao_educacao_superior_1' => $validated['instituicao_educacao_superior_1'] ?? null,
            'codigo_curso_2' => $validated['codigo_curso_2'] ?? null,
            'ano_conclusao_2' => $validated['ano_conclusao_2'] ?? null,
            'instituicao_educacao_superior_2' => $validated['instituicao_educacao_superior_2'] ?? null,
            'codigo_curso_3' => $validated['codigo_curso_3'] ?? null,
            'ano_conclusao_3' => $validated['ano_conclusao_3'] ?? null,
            'instituicao_educacao_superior_3' => $validated['instituicao_educacao_superior_3'] ?? null,
            'area_conhecimento_componentes_curriculares_1' => $validated['area_conhecimento_componentes_curriculares_1'] ?? null,
            'area_conhecimento_componentes_curriculares_2' => $validated['area_conhecimento_componentes_curriculares_2'] ?? null,
            'area_conhecimento_componentes_curriculares_3' => $validated['area_conhecimento_componentes_curriculares_3'] ?? null,
            'tipo_pos_graduacao_1' => $validated['tipo_pos_graduacao_1'] ?? null,
            'area_pos_graduacao_1' => $validated['area_pos_graduacao_1'] ?? null,
            'ano_conclusao_pos_graduacao_1' => $validated['ano_conclusao_pos_graduacao_1'] ?? null,
            'tipo_pos_graduacao_2' => $validated['tipo_pos_graduacao_2'] ?? null,
            'area_pos_graduacao_2' => $validated['area_pos_graduacao_2'] ?? null,
            'ano_conclusao_pos_graduacao_2' => $validated['ano_conclusao_pos_graduacao_2'] ?? null,
            'tipo_pos_graduacao_3' => $validated['tipo_pos_graduacao_3'] ?? null,
            'area_pos_graduacao_3' => $validated['area_pos_graduacao_3'] ?? null,
            'ano_conclusao_pos_graduacao_3' => $validated['ano_conclusao_pos_graduacao_3'] ?? null,
            'tipo_pos_graduacao_4' => $validated['tipo_pos_graduacao_4'] ?? null,
            'area_pos_graduacao_4' => $validated['area_pos_graduacao_4'] ?? null,
            'ano_conclusao_pos_graduacao_4' => $validated['ano_conclusao_pos_graduacao_4'] ?? null,
            'tipo_pos_graduacao_5' => $validated['tipo_pos_graduacao_5'] ?? null,
            'area_pos_graduacao_5' => $validated['area_pos_graduacao_5'] ?? null,
            'ano_conclusao_pos_graduacao_5' => $validated['ano_conclusao_pos_graduacao_5'] ?? null,
            'tipo_pos_graduacao_6' => $validated['tipo_pos_graduacao_6'] ?? null,
            'area_pos_graduacao_6' => $validated['area_pos_graduacao_6'] ?? null,
            'ano_conclusao_pos_graduacao_6' => $validated['ano_conclusao_pos_graduacao_6']  ?? null,
            'nao_tem_pos_graduacao_concluida' => $validated['nao_tem_pos_graduacao_concluida'] ?? null,
            'creche' => $validated['creche'] ?? null,
            'pre_escola' => $validated['pre_escola'] ?? null,
            'anos_iniciais_ensino_fundamental' => $validated['anos_iniciais_ensino_fundamental'] ?? null,
            'anos_finais_ensino_fundamental' => $validated['anos_finais_ensino_fundamental'] ?? null,
            'ensino_medio' => $validated['ensino_medio'] ?? null,
            'educacao_jovens_adultos' => $validated['educacao_jovens_adultos'] ?? null,
            'educacao_especial' => $validated['educacao_especial'] ?? null,
            'educacao_indigena' => $validated['educacao_indigena'] ?? null,
            'educacao_campo' => $validated['educacao_campo'] ?? null,
            'educacao_ambiental' => $validated['educacao_ambiental'] ?? null,
            'educacao_direitos_humanos' => $validated['educacao_direitos_humanos'] ?? null,
            'educacao_bilingue_surdos' => $validated['educacao_bilingue_surdos'] ?? null,
            'educacao_tecnologia_informacao_comunicacao' => $validated['educacao_tecnologia_informacao_comunicacao'] ?? null,
            'genero_diversidade_sexual' => $validated['genero_diversidade_sexual'] ?? null,
            'direitos_crianca_adolescente' => $validated['direitos_crianca_adolescente'] ?? null,
            'educacao_relacoes_etnico_raciais_historia_afro' => $validated['educacao_relacoes_etnico_raciais_historia_afro'] ?? null,
            'gestao_escolar' => $validated['gestao_escolar'] ?? null,
            'outros' => $validated['outros'] ?? null,
            'nenhum' => $validated['nenhum'] ?? null,
            'endereco_eletronico_email' => $validated['endereco_eletronico_email'] ?? null,
            'escola_id' => $validated['escola_id'] ?? null,
            'secretaria_id' => $validated['secretaria_id'] ?? null,
            'turma_id' => $validated['turma_id'] ?? null,

        ]);

        $role = Role::where('name', $validated['role'])->first();
        if ($role) {
            $pessoa->assignRole($role);
        }

        return $pessoa;
    }
}
