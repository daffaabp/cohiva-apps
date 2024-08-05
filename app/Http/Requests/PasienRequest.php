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
			'notelpon_pasien' => 'required|numeric',
			'jk_pasien' => 'required',
            'alamat_pasien' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'usia' => 'required|numeric',
            'id_user' => 'string'
        ];
    }

    public function messages()
    {
        return [
            'nama_pasien.required' => 'Nama pasien wajib diisi!',
            'nama_pasien.string' => 'Nama pasien wajib huruf!',
            'notelpon_pasien.required' => 'Nomor Telepon Pasien wajib diisi!',
            'notelpon_pasien.numeric' => 'Nomor Telepon Pasien wajib berupa angka!',
            'jk_pasien.required' => 'Jenis kelamin wajib dipilih!',
            'alamat_pasien.required' => 'Alamat wajib diisi!',
            'berat_badan.required' => 'Berat Badan wajib diisi!',
            'berat_badan.numeric' => 'Berat Badan wajib berupa angka!',
            'tinggi_badan.required' => 'Tinggi Badan wajib diisi!',
            'tinggi_badan.numeric' => 'Tinggi Badan wajib berupa angka!',
            'usia.required' => 'Usia wajib diisi!',
            'usia.numeric' => 'Usia wajib berupa angka'
        ];
    }
}