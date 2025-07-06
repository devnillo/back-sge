<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEscolaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponse::error(
                'Erro de validação',
                422,
                $validator->errors()
            )
        );
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'tipo_registro' => 'required|string|max:2',
            'codigo_escola_inep' => 'required|string|max:8|unique:escolas',
            'nome_escola' => 'required|string|max:255|unique:escolas',
            'situacao_funcionamento' => 'string|max:2',
            'data_inicio_ano_letivo' => 'date',
            'data_termino_ano_letivo' => 'date',
            'escola_indigena' => 'string',
            'educacao_ambiental' => 'string',

            'cep' => 'required|string|max:8',
            'municipio_codigo' => 'required|string|max:7',
            'distrito_codigo' => 'required|string|max:2',
            'endereco' => 'required|string|max:100',
            'numero' => 'required|string|max:10',
            'complemento' => 'max:20',
            'bairro' => 'max:50',

            'ddd' => 'string|max:2',
            'telefone' => 'string|max:9',
            'outro_telefone' => 'string|max:9',
            'email_escola' => 'string|email|max:255|unique:escolas',

            'codigo_orgao_regional' => 'string|max:5',
            'localizacao_zona' => 'string|max:1',
            'localizacao_diferenciada' => 'string|max:1',
            'dependencia_administrativa' => 'string|max:1',

            'vinculo_orgao_educacao' => 'string|max:1',
            'vinculo_orgao_seguranca' => 'string|max:1',
            'vinculo_orgao_saude' => 'string|max:1',
            'vinculo_orgao_outro' => 'string|max:1',

            'mantenedora_empresa_privada' => 'string|max:1',
            'mantenedora_sindicato_assoc_coop' => 'string|max:1',
            'mantenedora_ong' => 'string|max:1',
            'mantenedora_sem_fins_lucrativos' => 'string|max:1',
            'mantenedora_sistema_s' => 'string|max:1',
            'mantenedora_oscip' => 'string|max:1',

            'categoria_escola_privada' => 'string|max:1',
            'parceria_convenio_resp_estadual' => 'string|max:1',
            'parceria_convenio_resp_municipal' => 'string|max:1',
            'parceria_convenio_nao_possui' => 'string|max:1',

            'parc_est_termo_colaboracao' => 'string|max:1',
            'parc_est_termo_fomento' => 'string|max:1',
            'parc_est_acordo_cooperacao' => 'string|max:1',
            'parc_est_contrato_prestacao_servico' => 'string|max:1',
            'parc_est_termo_coop_tec_fin' => 'string|max:1',
            'parc_est_contrato_consorcio_convenio' => 'string|max:1',

            'parc_mun_termo_colaboracao' => 'string|max:1',
            'parc_mun_termo_fomento' => 'string|max:1',
            'parc_mun_acordo_cooperacao' => 'string|max:1',
            'parc_mun_contrato_prestacao_servico' => 'string|max:1',
            'parc_mun_termo_coop_tec_fin' => 'string|max:1',
            'parc_mun_contrato_consorcio_convenio' => 'string|max:1',

            'cnpj_mantenedora_principal' => 'string|max:14',
            'cnpj_escola_privada' => 'string|max:14',

            'regulamentacao_autorizacao_conselho' => 'string|max:1',
            'esfera_adm_conselho_federal' => 'string|max:1',
            'esfera_adm_conselho_estadual' => 'string|max:1',
            'esfera_adm_conselho_municipal' => 'string|max:1',

            'vinculo_outra_instituicao_tipo' => 'string|max:1',
            'codigo_escola_sede_vinculada' => 'string|max:8',
            'codigo_ies_vinculada' => 'string|max:9',

            'secretaria_id' => 'required|integer',
            'diretor_id' => 'max:255',
            'status' => 'string',
        ];
    }
}
