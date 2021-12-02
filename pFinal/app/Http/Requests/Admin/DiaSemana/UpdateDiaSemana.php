<?php

namespace App\Http\Requests\Admin\DiaSemana;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDiaSemana extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.dia-semana.edit', $this->diaSemana);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre_dia_semana' => ['sometimes', Rule::unique('Dia_Semana', 'nombre_dia_semana')->ignore($this->diaSemana->getKey(), $this->diaSemana->getKeyName()), 'string'],
            'orden' => ['sometimes', 'string'],
            'sigla' => ['sometimes', 'string'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
