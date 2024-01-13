<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
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
            'nama_lengkap'          => 'required|max:255|string',
            'jenis_kelamin'         => 'required',
            'tanggal_lahir'         => 'required',
            'alamat_lengkap'        => 'required',
            'no_handphone'          => 'max:15',
            'no_telp_rumah'         => 'max:10',
            'no_handphone_darurat'  => 'max:15',
        ];
    }
}