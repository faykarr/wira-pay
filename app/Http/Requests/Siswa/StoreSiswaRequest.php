<?php

namespace App\Http\Requests\Siswa;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
            'NIT' => 'required|string|max:20|unique:siswa,nit',
            'fullName' => 'required|string|max:100',
            'akademik' => 'required|exists:akademik,id'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'NIT.required' => 'NIT harus diisi.',
            'NIT.string' => 'NIT harus berupa string.',
            'NIT.max' => 'NIT tidak boleh lebih dari 20 karakter.',
            'NIT.unique' => 'NIT sudah ada.',
            'fullName.required' => 'Nama lengkap harus diisi.',
            'fullName.string' => 'Nama lengkap harus berupa string.',
            'fullName.max' => 'Nama lengkap tidak boleh lebih dari 100 karakter.',
            'akademik.required' => 'Akademik harus dipilih.',
            'akademik.exists' => 'Akademik yang dipilih tidak valid.'
        ];
    }
}
