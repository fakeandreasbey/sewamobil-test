<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
// use Validator;

class VitalSignRequest extends FormRequest
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
            // 'tinggi_badan'        => 'required|numeric',
            // 'berat_badan'         => 'required|numeric',
            'td_systolic'         => 'required|numeric',
            'td_diastolic'        => 'required|numeric',
            'frekuensi_nafas'     => 'required|numeric',
            'frekuensi_nadi'      => 'required|numeric|digits_between:2,3',
            'suhu'                => 'required|max:5',
        ];
    }

        //custom messages request
        public function messages(): array
        {
            return [
                'td_systolic.required'  => 'Ketik 0 jika tidak ada',
                'td_diastolic.required' => 'Ketik 0 jika tidak ada',
                'td_diastolic.required' => 'Ketik 0 jika tidak ada',
            ];
        }
}
