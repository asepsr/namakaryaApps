<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HasilRequest extends FormRequest
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
            'sttApprovel' => 'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'sttApprovel' => 'Status Approvel tidak boleh kosong',
        ];
    }
}
