<?php

namespace App\Http\Requests\Laporan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlatPercetakanRequest extends FormRequest
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
            // 'kode_alat' => 'required|string|max:255|unique:alat_percetakans,kode_alat',
            'nama_alat' => 'sometimes|required|string|max:255',
            'stok' => 'sometimes|required|numeric|min:0',
            'harga' => 'sometimes|required|numeric|min:0',
            'id_supplier' => 'sometimes|required|uuid|exists:suppliers,id',
            'keterangan' => 'sometimes|nullable|string|max:244',
        ];
    }
}
