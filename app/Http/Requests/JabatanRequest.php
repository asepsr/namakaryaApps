<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JabatanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
        public function rules()
    {
        return [
        'name'=>['required', Rule::unique('jabatans')->ignore($this->jabatan)],
        'divisi'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama jabatan tidak boleh kosong',
            'name.unique' => 'Nama jabatan sudah ada dalam database',
            'divisi.required' => 'Divisi tidak boleh kosong',
        ];
    }
}
