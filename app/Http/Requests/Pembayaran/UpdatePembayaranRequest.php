<?php

namespace App\Http\Requests\Pembayaran;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePembayaranRequest extends FormRequest
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
            'registration_fee' => 'required|numeric|min:0',
            'spi_fee' => 'required|numeric|min:0',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'registration_fee.required' => 'Biaya pendaftaran harus diisi.',
            'registration_fee.numeric' => 'Biaya pendaftaran harus berupa angka.',
            'registration_fee.min' => 'Biaya pendaftaran tidak boleh kurang dari 0.',
            'spi_fee.required' => 'Biaya SPI harus diisi.',
            'spi_fee.numeric' => 'Biaya SPI harus berupa angka.',
            'spi_fee.min' => 'Biaya SPI tidak boleh kurang dari 0.',
        ];
    }
}
