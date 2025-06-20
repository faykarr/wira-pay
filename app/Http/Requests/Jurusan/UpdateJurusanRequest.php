<?php

namespace App\Http\Requests\Jurusan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJurusanRequest extends FormRequest
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
            'nama_jurusan' => [
                'required',
                'string',
                'unique:jurusan,nama_jurusan,' . $this->route('jurusan')->id,
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nama_jurusan.required' => 'Nama jurusan harus diisi.',
            'nama_jurusan.string' => 'Nama jurusan harus berupa string.',
            'nama_jurusan.unique' => 'Nama jurusan sudah ada.',
        ];
    }
}
