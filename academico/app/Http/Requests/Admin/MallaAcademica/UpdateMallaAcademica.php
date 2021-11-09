<?php

namespace App\Http\Requests\Admin\MallaAcademica;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateMallaAcademica extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.malla-academica.edit', $this->mallaAcademica);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', Rule::unique('Malla_Academica', 'nombre')->ignore($this->mallaAcademica->getKey(), $this->mallaAcademica->getKeyName()), 'string'],
            'anio_creacion' => ['sometimes', 'date'],
            'cantidad_anios' => ['sometimes', 'integer'],
            'cantidad_semestre' => ['sometimes', 'integer'],
            
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
