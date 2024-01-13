<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PlanningRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'deskripsi_planning'       => 'required|unique:template_soap_planning,deskripsi_planning,'.$this->id.',id',
        ];
    }

    //custom messages request
    public function messages(): array
    {
        return [
            'deskripsi_planning.required' => 'Deskripsi Planning harus diisi!',
            'deskripsi_planning.unique' => 'Planning ini sudah ada!',
        ];
    }


}
