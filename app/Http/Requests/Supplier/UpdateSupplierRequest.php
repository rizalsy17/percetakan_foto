<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
             'nama_supplier' => 'sometimes|required|string|max:255',
            'perusahaan' => 'sometimes|nullable|string|max:255',
            'telepon' => 'sometimes|numeric|digits_between:1,15',
            'domisili' => 'sometimes|nullable|string|max:255',
            'alamat' => 'sometimes|required|string',
        ];
    }
}
