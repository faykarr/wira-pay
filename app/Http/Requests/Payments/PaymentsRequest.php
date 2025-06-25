<?php

namespace App\Http\Requests\Payments;

use Illuminate\Foundation\Http\FormRequest;

class PaymentsRequest extends FormRequest
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
            'jenis_pembayaran' => 'required|string|max:255',
            'nit' => 'required|exists:siswa,nit',
            'kode_transaksi' => 'required|string|max:255',
            'created_at' => 'required',
            'nominal' => 'required|numeric|min:50000',
            'angsuran' => 'nullable|numeric|min:0',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'jenis_pembayaran.required' => 'Jenis pembayaran harus diisi.',
            'nit.required' => 'NIT siswa harus diisi.',
            'nit.exists' => 'NIT siswa tidak ditemukan.',
            'kode_transaksi.required' => 'Kode transaksi harus diisi.',
            'created_at.required' => 'Tanggal transaksi harus diisi.',
            'nominal.required' => 'Nominal pembayaran harus diisi.',
            'nominal.numeric' => 'Nominal pembayaran harus berupa angka.',
            'nominal.min' => 'Nominal pembayaran minimal adalah 50.000.',
            'angsuran.numeric' => 'Angsuran harus berupa angka.',
            'angsuran.min' => 'Angsuran tidak boleh kurang dari 0.',
        ];
    }
}
