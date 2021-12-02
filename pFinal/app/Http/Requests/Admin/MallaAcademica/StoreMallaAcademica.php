<?php

namespace App\Http\Requests\Admin\MallaAcademica;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMallaAcademica extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.malla-academica.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre_malla_academica' => ['required', Rule::unique('Malla_Academica', 'nombre_malla_academica'), 'string'],
            'anio_creacion' => ['required', 'date'],
            'cantidad_anios' => ['required', 'integer'],
            'cantidad_semestre' => ['required', 'integer'],
            
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
