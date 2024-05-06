<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserKonselorRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|regex:/^\S*$/',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|min:8|confirmed|regex:/^\S*$/',
            'password_confirmation' => 'required|min:8|regex:/^\S*$/'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi!',
            'username.required' => 'Username harus diisi!',
            'username.regex' => 'Username TIDAK BOLEH mengandung spasi!',
            'email.required'  => 'Email harus diisi!',
            'email.unique'  => 'Email sudah pernah terdaftar!',
            'email.email'  => 'Format email harus sesuai!',
            'password.required'  => 'Password harus diisi!',
            'password.confirmed'  => 'Password harus sama!',
            'password.min'  => 'Password minimal 8 karakter!',
            'password.regex'  => 'Password TIDAK BOLEH mengandung spasi!',
            'password_confirmation.required'  => 'Konfirmasi Password harus diisi!',
            'password_confirmation.regex'  => 'Konfirmasi Password TIDAK BOLEH mengandung spasi!',
            'password_confirmation.min'  => 'Konfirmasi Password minimal 8 karakter!',
        ];
    }
}
