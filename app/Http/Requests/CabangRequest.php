<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CabangRequest extends FormRequest
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
        'name'=>['required', Rule::unique('cabangs')->ignore($this->cabang)],
        'tlp'=>'required',
        'alamat'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama cabang tidak boleh kosong',
            'name.unique' => 'Nama cabang sudah ada dalam database',
            'tlp.required' => 'Telepon cabang tidak boleh kosong',
            'alamat.required' => 'Alamat cabang tidak boleh kosong',
        ];
    }
}
