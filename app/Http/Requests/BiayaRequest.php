<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BiayaRequest extends FormRequest
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
            'namaBiaya' => ['required', Rule::unique('biayas')->ignore($this->biaya)],
            'bunga' => 'required',
            'provisi' => 'required',
            'admin' => 'required',
            'tabungan' => 'required',
            'hold' => 'required',
            'materai' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'namaBiaya.required' => 'Nama Biaya tidak boleh kosong',
            'namaBiaya.unique' => 'Nama Biaya sudah ada dalam database',
            'bunga.required' => 'bunga cabang tidak boleh kosong',
            'provisi.required' => 'provisi cabang tidak boleh kosong',
            'admin.required' => 'admin cabang tidak boleh kosong',
            'tabungan.required' => 'tabungan cabang tidak boleh kosong',
            'hold.required' => 'hold cabang tidak boleh kosong',
            'materai.required' => 'materai cabang tidak boleh kosong',
        ];
    }
}
