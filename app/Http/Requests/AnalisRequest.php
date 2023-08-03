<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnalisRequest extends FormRequest
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
            'debitur_id'=>['required', Rule::unique('analis')->ignore($this->analis)]
        ];
    }

        public function messages()
    {
        return [
            'debitur_id.unique' => 'Nomor Debitur sudah ada dalam database',
            'debitur_id.required' => 'Nomor Debitur tidak boleh kosong',
        ];
    }
}
