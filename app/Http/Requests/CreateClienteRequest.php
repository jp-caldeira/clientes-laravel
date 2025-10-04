<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClienteRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'cnpj' => preg_replace('/[^0-9]/', '', $this->cnpj),
            'endereco.cep' => preg_replace('/[^0-9]/', '', $this->endereco['cep']),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'                      => 'required|string',
            'email'                     => 'required|email',
            'cnpj'                      => 'required|string|unique:clientes|digits:14',
            'observacao'                => 'present|nullable|string',
            'valor_contrato'            => 'required|decimal:2',
            'endereco.logradouro'        => 'required|string',
            'endereco.numero'            => 'required|string',
            'endereco.cep'               => 'required|numeric|digits:8',
            'endereco.complemento'       => 'present|nullable|string',
            'endereco.bairro'            => 'required|string',
            'endereco.cidade'            => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            "required"                  => ":Attribute é obrigatório",
            "email.email"               => "Email é inválido",
            "cnpj.digits"               => "CNPJ :input inválido, deve ter :digits dígitos",
            "cnpj.unique"               => "CNPJ :input já foi cadastrado",
            "valor_contrato.decimal"    => "Formato :input inválido, deve ser um número com duas casas decimais",
            "endereco.cep.digits"       => "CEP :input inválido, deve ter :digits dígitos",
            "present"                   => "Attribute deve estar no corpo da requisição"
        ];
    }
}
