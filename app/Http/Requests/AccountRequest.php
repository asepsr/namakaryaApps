<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
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
            'name' => ['required', Rule::unique('account_officers')->ignore($this->accountofficer)],
            'tlp' => 'required',
            'alamat' => 'required',
            'spv' => 'required',
            'cabang_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'cabang_id.required' => 'Cabang Account officer tidak boleh kosong',
            'name.unique' => 'Nama Account officer sudah ada dalam database',
            'name.required' => 'Nama Account officer tidak boleh kosong',
            'spv.required' => 'Nama Spv tidak boleh kosong',
            'tlp.required' => 'Telepon Account officer tidak boleh kosong',
            'alamat.required' => 'Alamat Account officer tidak boleh kosong',
        ];
    }
}
