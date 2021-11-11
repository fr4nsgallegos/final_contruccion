<?php

namespace App\Http\Requests\Admin\MallaCurso;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexMallaCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.malla-curso.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,cantidad_horas_tipologia,cantidad_credito,malla_academica_id,asignatura_id,tipologia_clase_id,semestre_academico_id,anio_academico_id|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
