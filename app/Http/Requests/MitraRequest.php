<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MitraRequest extends FormRequest
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
    'name'=>['required', Rule::unique('mitras')->ignore($this->mitra)],
    'tlp'=>'required',
    'alamat'=>'required',
    ];
    }

    public function messages()
    {
    return [
    'name.required' => 'Nama mitra tidak boleh kosong',
    'name.unique' => 'Nama mitra sudah ada dalam database',
    'tlp.required' => 'Telepon mitra tidak boleh kosong',
    'alamat.required' => 'Alamat mitra tidak boleh kosong',
    ];
    }
}
