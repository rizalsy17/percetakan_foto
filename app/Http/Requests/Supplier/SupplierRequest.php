<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'nama_supplier' => 'required|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'telepon' => 'required|string|max:15',
            'domisili' => 'nullable|string|max:255',
            'alamat' => 'required|string',
        ];
    }
}
