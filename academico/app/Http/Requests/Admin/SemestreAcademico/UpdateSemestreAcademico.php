<?php

namespace App\Http\Requests\Admin\SemestreAcademico;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateSemestreAcademico extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.semestre-academico.edit', $this->semestreAcademico);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', Rule::unique('Semestre_Academico', 'nombre')->ignore($this->semestreAcademico->getKey(), $this->semestreAcademico->getKeyName()), 'string'],
            'orden' => ['sometimes', 'string'],
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
