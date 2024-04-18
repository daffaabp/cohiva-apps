<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JanjiKonselingRequest extends FormRequest
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
			'id_jadwalkonselor' => 'numeric',
			'id_pasien' => 'numeric',
			'status_janji' => 'string',
            'id_konselor' => 'numeric',
            'tgl_janji_konseling' => 'date',
        ];
    }
}
