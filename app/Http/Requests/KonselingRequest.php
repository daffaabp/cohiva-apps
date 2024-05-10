<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KonselingRequest extends FormRequest
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
			'tgl_konseling' => 'required',
			'keterangan' => 'required|string',
			'status_pasien' => 'required|string',
			'keluhan' => 'required',
			'penilaian' => 'required|string',
			'jenis_konseling' => 'required|string',
			'status_konseling' => 'required|string',
            'id_janjikonseling' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'tgl_konseling.required' => 'Tanggal konseling wajib diisi!',
			'keterangan.required' => 'Keterangan wajib diisi!',
			'status_pasien.required' => 'Status wajib diisi!',
			'keluhan.required' => 'Keluhan wajib diisi!',
			'penilaian.required' => 'Penilaian wajib diisi!',
			'jenis_konseling.required' => 'Jenis konseling wajib diisi!',
			'status_konseling.required' => 'Status konseling wajib diisi!',
        ];
    }
}
