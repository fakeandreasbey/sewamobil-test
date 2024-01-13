<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class addListObatRequest extends FormRequest
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
            'cari_obat'        => 'required',
            'qty'              => 'required|numeric|digits_between:1,3',
            // 'td_systolic'         => 'required|numeric|digits_between:2,3',
            // 'td_diastolic'        => 'required|numeric|digits_between:2,3',
            // 'frekuensi_nafas'     => 'required|numeric|digits_between:2,3',
            // 'frekuensi_nadi'      => 'required|numeric|digits_between:2,3',
            // 'suhu'                => 'required|max:5',
        ];
    }
}
