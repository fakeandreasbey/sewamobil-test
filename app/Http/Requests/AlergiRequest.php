<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AlergiRequest extends FormRequest
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
            'tipe_alergi'       => 'required',
            'nama_alergi'       => 'required',
            'severity'          => 'required',
        ];
    }

    //custom messages request
    public function messages(): array
    {
        return [
            'tipe_alergi.required' => 'Tipe alergi harus dipilih!',
            'nama_alergi.required' => 'Nama alergi harus diisi!',
            'severity.required'    => 'Severity alergi harus dipilih!',
        ];
    }


}
