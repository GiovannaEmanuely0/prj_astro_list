<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'nome' => ['required','string','max:255', 'min:3'],
            'email' => ['required','email:rfc,dns','unique:usuario,email'],
            'senha' => ['required','min:6'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O nome deve ser um texto.',
            'nome.max' => 'O nome deve ter no máximo 255 caracteres.',
            'nome.min' => 'O nome deve ter no mínimo 3 caracteres.',

            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deve ser um endereço válido.',
            'email.unique' => 'O email informado já está em uso.',

            'senha.required' => 'O campo senha é obrigatório.',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres.',
        ];
    }
}
