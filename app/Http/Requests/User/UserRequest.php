<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'cedula' => 'required|unique:personas,cedula',
            'email' => 'required|unique:users,email',
            'primer_nombre' => 'required',
            'primer_apellido' => 'required',
            'fecha' => 'required',
            'lugarnac' => 'required',
            'nacionalidad' => 'required',
            'sexo' => 'required',
            'celular' => 'required',
            'parentesco' => 'required',
            'estados_id' => 'required',
            'ciudades_id' => 'required',
            'municipios_id' => 'required',
            'parroquias_id' => 'required',
            'urbanizacion' => 'required',
            'tzona' => 'required',
            'nzona' => 'required',
            'tcalle' => 'required',
            'ncalle' => 'required',
            'tvivienda' => 'required',
            'nvivienda' => 'required',
            'name' => 'required',
            'rol' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ];
    }
}
