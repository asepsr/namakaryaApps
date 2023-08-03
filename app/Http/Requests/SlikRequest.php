<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlikRequest extends FormRequest
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
            'tglSlik'=>'required',
            'statusKolek'=>'required|not_in:0',
            'statusSlik'=>'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
        'tglSlik' => 'Tanggal tidak boleh kosong',
        'statusKolek' => 'Status tidak boleh kosong',
        'statusSlik' => 'Status tidak boleh kosong',
        ];
    }
}
