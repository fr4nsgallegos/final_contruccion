<?php

namespace App\Http\Requests\Admin\MallaCurso;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMallaCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.malla-curso.edit', $this->mallaCurso);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cantidad_horas_tipologia' => ['sometimes', 'integer'],
            'cantidad_credito' => ['sometimes', 'numeric'],
            'malla_academica_id' => ['sometimes', 'integer'],
            'asignatura_id' => ['sometimes', 'integer'],
            'tipologia_clase_id' => ['sometimes', 'integer'],
            'semestre_academico_id' => ['sometimes', 'integer'],
            'anio_academico_id' => ['sometimes', 'integer'],
            
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
