<?php

namespace App\Http\Requests\Admin\Turno;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTurno extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.turno.edit', $this->turno);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre_turno' => ['sometimes', Rule::unique('Turno', 'nombre_turno')->ignore($this->turno->getKey(), $this->turno->getKeyName()), 'string'],
            'sigla' => ['sometimes', 'string'],
            'orden' => ['sometimes', 'string'],
            'hora_inicio' => ['sometimes', 'date_format:H:i:s'],
            'hora_fin' => ['sometimes', 'date_format:H:i:s'],
            'sesion_clase_id' => ['sometimes', 'integer'],
            
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
