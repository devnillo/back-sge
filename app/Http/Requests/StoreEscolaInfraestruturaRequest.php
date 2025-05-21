<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEscolaInfraestruturaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            
                'codigo_escola_inep' => 'required|max:8|',
                'predio_escolar' => 'max:1|required',
                'salas_em_outra_escola' => 'max:1|required',
                'galpao_rancho_paiol_barracao' => 'max:1|required',
                'unidade_atendimento_socioeducativa' => 'max:1|required',
                'unidade_prisional' => 'max:1|required',
                'outros_locais_funcionamento' => 'max:1|required',
                'forma_ocupacao_predio' => 'max:1',
                'predio_compartilhado_outra_escola' => 'max:1',
                'codigo_escola_compartilha_1' => 'max:8',
                'codigo_escola_compartilha_2' => 'max:8',
                'codigo_escola_compartilha_3' => 'max:8',
                'codigo_escola_compartilha_4' => 'max:8',
                'codigo_escola_compartilha_5' => 'max:8',
                'codigo_escola_compartilha_6' => 'max:8',
                'alimentacao_escolar_alunos' => 'max:1|required',
                'escola_id' => 'required',
            
          
        ];
    }
}
