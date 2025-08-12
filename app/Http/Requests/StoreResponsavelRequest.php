<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreResponsavelRequest extends FormRequest
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
            'nome' => 'required|string|max:8|unique:responsaveis',
            'sexo' => 'max:255',
            'cor' => 'max:2',
            'nacionalidade' => 'date',
            'cpf' => 'date|max:11|unique:responsaveis',
            'data_nascimento' => 'string',
            'naturalidade' => 'string',
            'endereco' => 'string|max:8',
            'telefone' => 'string|max:7',
            'email' => 'string|max:2',
            'escolaridade' => 'string|max:2',
            'parentesco' => 'string|max:2',
        ];
    }
}
