<?php

namespace App\Http\Requests\Akademik;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAkademikRequest extends FormRequest
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
        $id = $this->akademik->id;
        return [
            'tahun_akademik' => [
                'required',
                'string',
                'max:20',
                'unique:akademik,tahun_akademik,' . $id,
                function ($attribute, $value, $fail) {
                    [$tahun_awal, $tahun_akhir] = explode('/', $value);

                    if ((int) $tahun_akhir <= (int) $tahun_awal) {
                        return $fail('Tahun akhir harus lebih besar dari tahun awal.');
                    }
                },
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'tahun_akademik.required' => 'Tahun akademik harus diisi.',
            'tahun_akademik.string' => 'Tahun akademik harus berupa string.',
            'tahun_akademik.max' => 'Tahun akademik tidak boleh lebih dari 20 karakter.',
            'tahun_akademik.unique' => 'Tahun akademik sudah terdaftar.',
        ];
    }
}
