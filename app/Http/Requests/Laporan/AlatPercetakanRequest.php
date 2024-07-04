<?php

namespace App\Http\Requests\Laporan;

use Illuminate\Foundation\Http\FormRequest;

class AlatPercetakanRequest extends FormRequest
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
            //
            'kode_alat' => 'required|string|max:255|unique:alat_percetakans,kode_alat',
            'nama_alat' => 'required|string|max:255',
            'stok' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'id_supplier' => 'required|uuid|exists:suppliers,id',
            'keterangan' => 'nullable|string|max:244',
        ];
    }
}
