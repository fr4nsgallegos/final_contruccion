<?php

namespace App\Http\Requests\Admin\MallaCurso;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMallaCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.malla-curso.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cantidad_horas_tipologia' => ['required', 'integer'],
            'cantidad_credito' => ['required', 'numeric'],
            'malla_academica_id' => ['required', 'integer'],
            'asignatura_id' => ['required', 'integer'],
            'tipologia_clase_id' => ['required', 'integer'],
            'semestre_academico_id' => ['required', 'integer'],
            'anio_academico_id' => ['required', 'integer'],
            
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
