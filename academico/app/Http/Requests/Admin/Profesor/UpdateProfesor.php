<?php

namespace App\Http\Requests\Admin\Profesor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProfesor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.profesor.edit', $this->profesor);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', 'string'],
            'apellido' => ['sometimes', 'string'],
            'dni' => ['sometimes', 'string'],
            'usuario' => ['sometimes', Rule::unique('Profesor', 'usuario')->ignore($this->profesor->getKey(), $this->profesor->getKeyName()), 'string'],
            'email' => ['sometimes', 'email', Rule::unique('Profesor', 'email')->ignore($this->profesor->getKey(), $this->profesor->getKeyName()), 'string'],
            'password' => ['sometimes', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],
            
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
