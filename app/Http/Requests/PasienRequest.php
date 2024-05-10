<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'nama_pasien' => 'required|string',
			'alamat_pasien' => 'string',
			'notelpon_pasien' => 'required|string',
			'jk_pasien' => 'required',
            'alamat_pasien' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'usia' => 'required',
            'id_user' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'nama_pasien.required' => 'Nama pasien wajib diisi!',
            'nama_pasien.string'> 'Nama pasien wajib huruf!',
            'notelpon_pasien.required'> 'Nomor Telepon Pasien wajib diisi!',
            'jk_pasien.required' => 'Jenis kelamin wajib dipilih!',
            'alamat_pasien.required' => 'Alamat wajib diisi!',
            'berat_badan.required' => 'Berat Badan wajib diisi!',
            'tinggi_badan.required' => 'Tinggi Badan wajib diisi!',
            'usia.required' => 'Usia wajib diisi!'
        ];
    }
}
