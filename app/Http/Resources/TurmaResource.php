<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TurmaResource extends JsonResource
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

        // Formata os dias da semana como estava
        $campos = [
            'domingo',
            'segunda',
            'terca',
            'quarta',
            'quinta',
            'sexta',
            'sabado',
        ];

        foreach ($campos as $campo) {
            $dados[$campo] = $this->formatField($this->$campo);
        }

        // Adiciona as relações com pessoas separadas por role
        $dados['pessoas'] = [
            'alunos' => $this->whenLoaded('pessoas', function () {
                return $this->pessoas->roles->where('name', "=",'admin')
                    ->map(function ($aluno) {
                        return $this->formatField($aluno);
                    })
                    ->values();
            })
        ];

        return $dados;
    }
}
