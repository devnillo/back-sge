<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EscolaResource extends JsonResource
{

    public function formatField($field, ?string $customLabel = null): array
    {
        if (is_null($field) || $field === '') {
            return [
                'valor' => 'Não definido',
                'codigo' => '',
            ];
        }
        $label = is_object($field) && method_exists($field, 'label')
            ? $field->label()
            : strval($field);

        return [
            'valor' => $customLabel ?? $label,
            'codigo' => is_object($field) ? $field : strval($field)
        ];
    }
    public function toArray(Request $request): array
    {
        $dados = parent::toArray($request);
        $campos = [
            'vinculo_orgao_educacao',
            'vinculo_orgao_seguranca',
            'vinculo_orgao_saude',
            'vinculo_orgao_outro',
            'localizacao_diferenciada'
        ];
        foreach ($campos as $campo) {
            $dados[$campo] = $this->formatField($this->$campo);
        }
        return $dados;
    }
}
