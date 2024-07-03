<?php

namespace App\Http\Requests\Barang;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBarangRequest extends FormRequest
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
            // 'kode_barang' => 'sometimes|required|string|max:255|unique:barangs,kode_barang',
            'nama_barang' => 'sometimes|required|string|max:255',
            'id_supplier' => 'sometimes|required|exists:suppliers,id',
            'harga_jual' => 'sometimes|required|numeric',
            'harga_beli' => 'sometimes|required|numeric',
            'stok' => 'sometimes|required|numeric',
            'satuan' => 'sometimes|required|string|max:255',
            'keterangan' => 'sometimes|nullable|string',
        ];
    }
}
