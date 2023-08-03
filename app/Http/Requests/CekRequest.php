<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CekRequest extends FormRequest
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
            'statusKolek' => 'required|not_in:0',
            'statusSlik'  => 'required|not_in:0',
            'note'        => 'required',
            'fasilitas'   => 'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'statusKolek'       => 'Status Kolek tidak boleh kosong',
            'statusSlik'        => 'Status slik tidak boleh kosong',
            'note.required'     => 'Note Tidak Boleh kosong',
            'fasilitas'         => 'Status Fasilitas Tidak Boleh kosong',
        ];
    }
}
