<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'guard_name' => 'required|string',
            'permission' => 'required|array',
        ];

        // Jika sedang dalam proses pembaruan, aturan unik tidak diterapkan pada nama
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['name'] .= '|unique:roles,name,' . $this->route('role')->id;
        } else {
            // Jika sedang dalam proses pembuatan baru
            $rules['name'] .= '|unique:roles';
        }

        return $rules;
    }
}