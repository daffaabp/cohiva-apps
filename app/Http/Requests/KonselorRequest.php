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
            'notelpon_konselor' => 'required|string',
            'unit_kerja' => 'required',
            'foto_konselor' => 'mimes:jpg,png|max:2048',
            'is_aktif' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_konselor.required' => 'Nama Konselor harus diisi!',
            'notelpon_konselor.required' => 'Nomor Telepon harus diisi!',
            'unit_kerja.required' => 'Unit Kerja harus diisi!',
            'foto_konselor.mimes' => 'Foto harus bertipe JPG atau PNG!',
            'foto_konselor.max' => 'Foto maksimal 2MB!'
        ];
    }
}
