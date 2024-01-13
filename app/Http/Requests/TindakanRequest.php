<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TindakanRequest extends FormRequest
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
            'nama_tindakan'       => 'required|max:255|string',
            'jasa_dokter'         => 'numeric',
            'klinik'              => 'numeric',
            'j_pelayanan'         => 'numeric',
            'bahp'                => 'numeric',
            'lainnya'             => 'numeric',
            'total'               => 'numeric',
            'kso'                 => 'numeric',
        ];
    }
}
