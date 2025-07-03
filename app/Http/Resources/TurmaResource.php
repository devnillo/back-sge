<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TurmaResource extends JsonResource
{
    public function formatField($field, ?string $customLabel = null): array
    {
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
            'domingo'
        ];
        foreach($campos as $campo){
            $dados[$campo] = $this->formatField($this->$campo);
        }
        return $dados;
    }
}
