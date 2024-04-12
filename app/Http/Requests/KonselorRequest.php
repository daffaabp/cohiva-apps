<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KonselorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'nama_konselor' => 'required|string',
			'notelpon_konselor' => 'string',
			'unit_kerja' => 'string',
			'foto_konselor' => 'mimes:jpg,png|max:2048',
			'is_aktif' => 'required',
        ];
    }
}
