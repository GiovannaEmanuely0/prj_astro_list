<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaFormRequest extends FormRequest
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

    public function rules(): array
    {
        return [
            'titulo' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],

            'descricao'=>[
                'required',
                'string',
                'max:1000',
            ],

            'dataInicio' => [
                'nullable',
                'date',
                'after_or_equal:today',
            ],

            'dataTermino' => [
                'nullable',
                'date',
                'after_or_equal:today',
            ],

            'prioridade' => [
                'required',
                'in:Baixa,Média,Alta',
            ],

            'status' => [
                'required',
                'in:Pendente,Em Progresso,Concluída',
            ],

            'categoria' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' =>
                'O título da tarefa é obrigatório.',

            'titulo.min' =>
                'O título deve ter pelo menos 3 caracteres.',

            'titulo.max' =>
                'O título deve ter no máximo 255 caracteres.',

            'descricao.required' =>
                'A descrição da tarefa é obrigatória.',
            
            'descricao.max' =>
                'A descrição deve ter no máximo 1000 caracteres.',

            'dataInicio.date' =>
                'Informe uma data inicial válida.',

            'dataInicio.after_or_equal' =>
                'A data inicial deve ser hoje ou uma data futura.',

            'dataTermino.date' =>
                'Informe uma data final válida.',

            'dataTermino.after_or_equal' =>
                'A data final deve ser igual ou posterior à data inicial.',

            'prioridade.required' =>
                'A prioridade da tarefa é obrigatória.',

            'prioridade.in' =>
                'A prioridade deve ser Baixa, Média ou Alta.',

            'status.required' =>
                'O status da tarefa é obrigatório.',

            'status.in' =>
                'O status deve ser Pendente, Em Progresso ou Concluída.',

            'categoria' =>
                'A categoria da tarefa é obrigatória.',
            
            'categoria.min' =>
                'A categoria deve ter pelo menos 3 caracteres.',
            
            'categoria.max' =>
                'A categoria deve ter no máximo 255 caracteres.',

            
        ];
    }
}
